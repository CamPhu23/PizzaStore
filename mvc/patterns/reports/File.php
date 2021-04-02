<?php 
    class File {
        public function __construct() {}

        function CreateExcelReport($filename) {
            print_r("Xuất file excel" . $filename);
        }

        function CreateWordReport($filename) {
            print_r("Xuất file Word" . $filename);
        }
        
        function CreatePDFReport($filename) {
            print_r("Xuất file PDF" . $filename);
        }
    }
?>