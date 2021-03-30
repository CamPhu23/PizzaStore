<?php 
    require_once './mvc/patterns/reports/IReportCommand.php';
    require_once './mvc/patterns/reports/File.php';

    class WordReportCommand implements IReportCommand {
        private $file;

        public function __construct() {
            $this->file = new File();
        }

        function CreateReport() {
            $this->file->CreateWordReport();
        }
    }
?>