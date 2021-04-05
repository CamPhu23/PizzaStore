<?php 
   interface ISQLQueryBuilder {
        function select($table, $field) :ISQLQueryBuilder; 
        function where($field, $value, $operator = '=') :ISQLQueryBuilder; 
        function insert($table, $field, $value) :ISQLQueryBuilder; 
        function update($table) :ISQLQueryBuilder; 
        function delete($table) :ISQLQueryBuilder;
        function set($field, $value, $operator = '=') :ISQLQueryBuilder;
        function inner_join($table) :ISQLQueryBuilder; 
        function left_join($table) :ISQLQueryBuilder; 
        function right_join($table) :ISQLQueryBuilder;
        function on($table1, $table2) :ISQLQueryBuilder;

        function or($field, $value, $operator = '=') :ISQLQueryBuilder; 
        function and($field, $value, $operator = '=') :ISQLQueryBuilder;
        function more_value($value) :ISQLQueryBuilder; 

        function getSQL() :String;
   }
?>