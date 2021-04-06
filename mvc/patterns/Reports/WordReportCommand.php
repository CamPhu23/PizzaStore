<?php 
    require_once './mvc/patterns/Reports/IReportCommand.php';
    require_once './mvc/patterns/Reports/File.php';

    class WordReportCommand implements IReportCommand {
        private $file;

        public function __construct($data) {
            $this->file = new File($data);
        }

        function CreateReport($filename) {
            $this->file->CreateWordReport($filename);
        }
    }
?>