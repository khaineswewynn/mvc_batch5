<?php
include_once './model/employee.php';
class EmployeeController{
    private $employee;
    function __construct()
    {
        $this->employee=new Employee();
    }

    function getEmployees()
    {
        return $this->employee->getEmps();
    }
    function addEmployee($first,$last,$email,$phone,$join_date,$job_title,$salary,$manager,$dept)
    {
        return $this->employee->addEmp($first,$last,$email,$phone,$join_date,$job_title,$salary,$manager,$dept);
    }
    function getEmployee($id)
    {
        return $this->employee->getEmployee($id);
    }
    function countEmployees()
    {
        return sizeof($this->employee->getEmps());
    }
    function getChartData()
    {
        return $this->employee->getChartData();
    }
}

?>