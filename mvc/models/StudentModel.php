<?php

class StudentModel {
    protected $dbf, $conn;
    
    public function __construct($dbf) {
        $this->dbf = $dbf;
        $this->conn = $this->dbf->CreateConnection();
    }

    public function getList() {
        $this->dbf->CreateCommand("SELECT * FROM `SinhVien`");
        $result = $this->dbf->Excute($this->conn);

        return $result;
    }

    public function getStudentByID($id) {
        $this->dbf->CreateCommand("SELECT * FROM `SinhVien` WHERE mssv=$id");
        $result = $this->dbf->Excute($this->conn);

        return $result;
    }

    public function insertStudent($id, $name, $birthday, $class) {
        $this->dbf->CreateCommand("INSERT INTO `SinhVien` (mssv, hoTen, ngaySinh, lop)
        VALUES ($id, '$name', '$birthday', '$class')");
        $result = $this->dbf->Excute($this->conn);

        return $result;
    }

    public function deleteStudent($id) {
        $this->dbf->CreateCommand("DELETE FROM `SinhVien` WHERE mssv=$id");
        $result = $this->dbf->Excute($this->conn);

        return $result;
    }

    public function updateStudent($id, $name, $birthday, $class) {
        $this->dbf->CreateCommand("UPDATE `SinhVien` SET hoTen='$name', ngaySinh='$birthday', lop='$class' WHERE mssv=$id");
        $result = $this->dbf->Excute($this->conn);

        return $result;
    }
}

?>