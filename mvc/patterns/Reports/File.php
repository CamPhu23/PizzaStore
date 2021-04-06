<?php

require_once './vendor/shuchkin/simplexlsxgen/src/SimpleXLSXGen.php';

    class File {
        private $data;

        public function __construct($data)
        {
            $this->data = $data;
        }

        function CreateExcelReport($filename) {
            $reportFile = [['Mã đơn hàng', 'Loại thanh toán', 'Tình trạng', 'Tổng cộng', 'Thời gian' ]];

            foreach ($this->data as $record) {
                $row = array($record["id"], $record["method"], $record["status"], $record["total"], $record["time"]);
                array_push($reportFile, $row);
            }

            $xlsx = SimpleXLSXGen::fromArray($reportFile);
            $xlsx->downloadAs($filename . '.xlsx');
        }

        function CreateWordReport($filename) {
            $phpWord = new \PhpOffice\PhpWord\PhpWord();

            $section = $phpWord->addSection();
            $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
            $styleCell = array('valign' => 'center');
            $fontStyle = array('bold' => true, 'align' => 'center');
            $phpWord->addTableStyle('Fancy Table', $styleTable);
            $table = $section->addTable('Fancy Table');
            $table->addRow();
            $table->addCell(1500, $styleCell)->addText(htmlspecialchars('Mã đơn hàng'), $fontStyle);
            $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Loại thanh toán'), $fontStyle);
            $table->addCell(1200, $styleCell)->addText(htmlspecialchars('Tình trạng'), $fontStyle);
            $table->addCell(1500, $styleCell)->addText(htmlspecialchars('Tổng cộng'), $fontStyle);
            $table->addCell(2500, $styleCell)->addText(htmlspecialchars('Thời gian'), $fontStyle);

            foreach ($this->data as $record) {
                $table->addRow();
                $table->addCell(1500)->addText($record["id"]);
                $table->addCell(2000)->addText($record["method"]);
                $table->addCell(1200)->addText($record["status"]);
                $table->addCell(1500)->addText($record["total"]);
                $table->addCell(2500)->addText($record["time"]);
            }

            $phpWord->save($filename . '.docx', 'Word2007', true);
        }
        
        function CreatePDFReport($filename) {
            $phpWord = new \PhpOffice\PhpWord\PhpWord();

            $section = $phpWord->addSection();
            $styleTable = array('borderSize' => 6, 'borderColor' => '006699', 'cellMargin' => 80);
            $styleCell = array('valign' => 'center');
            $fontStyle = array('bold' => true, 'align' => 'center', 'name' => 'Arial');
            $phpWord->addTableStyle('Fancy Table', $styleTable);
            $table = $section->addTable('Fancy Table');
            $table->addRow();
            $table->addCell(1500, $styleCell)->addText(htmlspecialchars('ID Order'));
            $table->addCell(2000, $styleCell)->addText(htmlspecialchars('Payment method'));
            $table->addCell(1200, $styleCell)->addText(htmlspecialchars('Status'));
            $table->addCell(1500, $styleCell)->addText(htmlspecialchars('Total'));
            $table->addCell(2500, $styleCell)->addText(htmlspecialchars('Time'));

            foreach ($this->data as $record) {
                $table->addRow();
                $table->addCell(1500)->addText($record["id"]);
                $table->addCell(2000)->addText($record["method"] === "Tiền mặt" ? "Cash" : "Credit Card");
                $table->addCell(1200)->addText($record["status"]);
                $table->addCell(1500)->addText($record["total"]);
                $table->addCell(2500)->addText($record["time"]);
            }

            $phpWord->save($filename . '.pdf', 'PDF', true);
        }
    }
?>