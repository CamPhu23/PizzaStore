<?php

require_once './vendor/shuchkin/simplexlsxgen/src/SimpleXLSXGen.php';

    class File {
        function CreateExcelReport($filename) {
            $books = [
                ['ISBN', 'title', 'author', 'publisher', 'ctry' ],
                [618260307, 'The Hobbit', 'J. R. R. Tolkien', 'Houghton Mifflin', 'USA'],
                [908606664, 'Slinky Malinki', 'Lynley Dodd', 'Mallinson Rendel', 'NZ']
            ];
            $xlsx = SimpleXLSXGen::fromArray( $books );
            $xlsx->downloadAs($filename . '.xlsx');
        }

        function CreateWordReport($filename) {
            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $section = $phpWord->addSection();

            $section->addText(
                'hello',
                array(
                    'name' => 'Arial',
                    'size' => 14
                )
            );

            //Tạo tập tin Word
            $phpWord->save($filename . '.docx', 'Word2007', true);
        }
        
        function CreatePDFReport($filename) {


            $phpWord = new \PhpOffice\PhpWord\PhpWord();
            $section = $phpWord->addSection();

            $section->addText(
                'hello',
                array(
                    'name' => 'Arial',
                    'size' => 14
                )
            );

            //Tạo tập tin Word
            $phpWord->save($filename . '.pdf', 'PDF', true);
        }
    }
?>