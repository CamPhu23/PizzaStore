<?php 
    require_once './mvc/patterns/reports/IReportCommand.php';
    require_once './mvc/patterns/reports/File.php';

    class ExcelReportCommand implements IReportCommand {
        private $file;

        public function __construct($data) {
            $this->file = new File($data);
        }

        function CreateReport($filename) {
            $this->file->CreateExcelReport($filename);
        }
    }
?>