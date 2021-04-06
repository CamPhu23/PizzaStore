<?php

require_once './mvc/patterns/Reports/PDFReportCommand.php';
require_once './mvc/patterns/Reports/WordReportCommand.php';
require_once './mvc/patterns/Reports/ExcelReportCommand.php';

class Report {
    private $command1, $command2, $command3;
    private $filename;

    public function __construct($name)
    {
        $this->filename = $name;
    }

    public function setCmd1($cmd) {
        $this->command1 = $cmd;
    }

    public function setCmd2($cmd) {
        $this->command2 = $cmd;
    }

    public function setCmd3($cmd) {
        $this->command3 = $cmd;
    }

    public function option1() {
        $this->command1->CreateReport($this->filename);
    }

    public function option2() {
        $this->command2->CreateReport($this->filename);
    }

    public function option3() {
        $this->command3->CreateReport($this->filename);
    }
}


?>
