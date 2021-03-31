<?php 
    require_once './mvc/patterns/reports/IReportCommand.php';
    require_once './mvc/patterns/reports/File.php';

    class PDFReportCommand implements IReportCommand {
        private $file;

        public function __construct() {
            $this->file = new File();
        }

        function CreateReport($filename) {
            $this->file->CreatePDFReport($filename);
        }
    }
?>