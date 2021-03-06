<?php 
    require_once "./mvc/patterns/SqlQuery/ISQLQueryBuilder.php";

    class SQLQueryBuilder implements ISQLQueryBuilder {
        protected $query;

        public function __construct() {}

        function resetSQL() {
            $this->query = new \stdClass();
        }

        // select query
        function select($table, $field) :ISQLQueryBuilder{
            $this->resetSQL();
            $this->query->type = 'select';

            if (empty($field)) {
                $this->query->base = "SELECT * FROM " . $table;
            } else {
                $this->query->base = "SELECT " . implode(', ', $field) . " FROM " . $table;
            }

            return $this;
        }

        // insert query
        function insert($table, $field, $value) :ISQLQueryBuilder{
            $this->resetSQL();
            $this->query->type = 'insert';

            if (!empty($field))
                $this->query->base = "INSERT INTO " . $table . "(" . implode(", ", $field) . ")" . " VALUES (" . implode(", ", $value) . ")";
            else 
                $this->query->base = "INSERT INTO " . $table . " VALUES (" . implode(", ", $value) . ")";
            return $this;
        }
        
        // update query
        function update($table) :ISQLQueryBuilder{
            $this->resetSQL();
            $this->query->type = 'update';

            $this->query->base = "UPDATE " . $table;

            return $this;
        }

        function set($field, $value, $operator = '=') :ISQLQueryBuilder{
            if ($this->query->type != 'update') {
                throw new \Exception("SET can only be added to UPDATE");
            }

            $this->query->base .= " SET $field $operator $value";
            return $this;
        }

        function onDuplicateKeyUpdate($field) {
            $this->query->onDuplicateUpdate[] = $field . " = " . "VALUE(" . $field . ")";

            return $this;
        }

        function inner_join($table) :ISQLQueryBuilder {
            if ($this->query->type != 'select') {
                throw new \Exception("INNER JOIN can only be added to SELECT");
            }

            $this->query->base .= " INNER JOIN $table";
            return $this;
        }

        function left_join($table) :ISQLQueryBuilder {
            if ($this->query->type != 'select') {
                throw new \Exception("LEFT JOIN can only be added to SELECT");
            }

            $this->query->base .= " LEFT JOIN $table";
            return $this;
        }

        function right_join($table) :ISQLQueryBuilder {
            if ($this->query->type != 'select') {
                throw new \Exception("RIGHT JOIN can only be added to SELECT");
            }

            $this->query->base .= " RIGHT JOIN $table";
            return $this;
        }

        function on($table1, $table2) :ISQLQueryBuilder {
            $this->query->base .= " ON $table1 = $table2";
            return $this;
        }

        // delete query
        function delete($table) :ISQLQueryBuilder{
            $this->resetSQL();
            $this->query->type = 'delete';

            $this->query->base = "DELETE FROM " . $table;
            return $this;
        }

        function where($field, $value, $operator = '=') :ISQLQueryBuilder{
            if (!in_array($this->query->type, ['select', 'update', 'delete'])) {
                throw new \Exception("WHERE can only be added to SELECT, UPDATE OR DELETE");
            }

            $this->query->base .= " WHERE $field $operator $value"; 

            return $this;
        }

        
        function or($field, $value, $operator = '=') :ISQLQueryBuilder {
            $this->query->base .= " OR $field $operator $value"; 

            return $this;
        }

        function and($field, $value, $operator = '=') :ISQLQueryBuilder {
            $this->query->base .= " AND $field $operator $value"; 

            return $this;
        }

        function more_value($value) :ISQLQueryBuilder {
            $this->query->base .= " (" . implode(", ", $value) . ")"; 

            return $this;
        }

        function getSQL() :String{
            $query = $this->query;
            $sql = $query->base;

            if (!empty($query->onDuplicateKeyUpdate)) {
                $sql .= " ON DUPLICATE KEY UPDATE " . implode(", ", $query->onDuplicateKeyUpdate);
            }

            $sql .= ";";
            return $sql;
        }
    }
?>