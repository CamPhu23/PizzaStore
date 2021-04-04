<?php 
    require_once "./mvc/patterns/sqlQuery/ISQLQueryBuilder.php";

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

            $this->query->base = "SELECT" . implode(', ', $field) . " FROM " . $table;

            return $this;
        }

        // insert query
        function insert($table, $field, $value) :ISQLQueryBuilder{
            $this->resetSQL();
            $this->query->type = 'insert';

            if (!empty($field))
                $this->query->base = "INSERT INTO " . $table . "(" . implode(", ", $field) . ")" . " VALUE (" . implode(", ", $value) . ")";
            else 
                $this->query->base = "INSERT INTO " . $table . " VALUE (" . implode(", ", $value) . ")";
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

            $this->query->set[] = "$field $operator $value";
            return $this;
        }

        function onDuplicateKeyUpdate($field) {
            $this->query->onDuplicateUpdate[] = $field . " = " . "VALUE(" . $field . ")";

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

            $this->query->where[] = "$field $operator $value"; 

            return $this;
        }

        function getSQL() :String{
            $query = $this->query;
            $sql = $query->base;

            if (!empty($query->set)) {
                $sql .= " SET " . implode(", ", $query->set);
            }

            if (!empty($query->onDuplicateKeyUpdate)) {
                $sql .= "ON DUPLICATE KEY UPDATE " . implode(", ", $query->onDuplicateKeyUpdate);
            }

            if (!empty($query->where)) {
                $sql .= " WHERE " . implode(" AND ", $query->where);
            }

            $sql .= ";";
            return $sql;
        }
    }
?>