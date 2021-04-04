<?php 
   interface ISQLQueryBuilder {
        function select($table, $field) :ISQLQueryBuilder; 
        function where($field, $value, $operator = '=') :ISQLQueryBuilder; 
        function insert($table, $field, $value) :ISQLQueryBuilder; 
        function update($table) :ISQLQueryBuilder; 
        function delete($table) :ISQLQueryBuilder;
        function set($field, $value, $operator = '=') :ISQLQueryBuilder; 

        function getSQL() :String;
   }
?>