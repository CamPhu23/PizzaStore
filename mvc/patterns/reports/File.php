<?php 
    class File {
        public function __construct() {}

        function CreateExcelReport() {
            print_r("Xuất file excel");
        }
      
        function CreateWordReport() {
            print_r("Xuất file Word");
        }
        
        function CreatePDFReport() {
            print_r("Xuất file PDF");
        }
    }
?>