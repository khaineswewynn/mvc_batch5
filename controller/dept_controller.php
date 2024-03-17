<?php
include_once './model/department.php';
class DepartmentController{
    private $dept;
    function __construct(){
        $this->dept=new Department();
    }

    public function getDepts(){
        return $this->dept->getDepartments();
    }


}



?>