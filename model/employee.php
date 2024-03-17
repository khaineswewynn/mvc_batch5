<?php
include_once './includes/db.php';
class Employee{
    private $con,$statement;
    public function getEmps()
    {
        $this->con=Database::connect();
        $sql="select * from employees"; //string
        $this->statement=$this->con->prepare($sql); //prepare statement
        if($this->statement->execute())
        {
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            //fetch for one row and fetchAll for all rows
            return $results;
        } //sql run
       
    }

    public function addEmp($first,$last,$email,$phone,$join_date,$job_title,$salary,$manager,$dept)
    {
        $this->con=Database::connect();
        $sql="INSERT INTO employees(first_name,last_name,email,phone_number,hire_date,job_id,salary,manager_id,department_id) 
        VALUES (:firstname,:lastname,:email,:ph,:join_date,:title,:salary,:manager,:dept)"; //string
        $this->statement=$this->con->prepare($sql); //prepare statement
        $this->statement->bindParam(':firstname',$first);
        $this->statement->bindParam(':lastname',$last);
        $this->statement->bindParam(':email',$email);
        $this->statement->bindParam(':ph',$phone);
        $this->statement->bindParam(':join_date',$join_date);
        $this->statement->bindParam(':title',$job_title);
        $this->statement->bindParam(':salary',$salary);
        $this->statement->bindParam(':manager',$manager);
        $this->statement->bindParam(':dept',$dept);
        return $this->statement->execute();
           
    }
    public function getEmployee($id)
    {
        $this->con=Database::connect();
        $sql="select * from employees where employee_id=:id"; //string
        $this->statement=$this->con->prepare($sql); //prepare statement
        $this->statement->bindParam(":id",$id);
        if($this->statement->execute())
        {
            $result=$this->statement->fetch(PDO::FETCH_ASSOC);
            //fetch for one row and fetchAll for all rows
            return $result;
        } //sql run
    }

    function getChartData()
    {
        $this->con=Database::connect();
        $sql="select departments.department_name,result.total_emps
        from 
        (select department_id ,count(*) as total_emps
        from employees 
        group by department_id) as result
        join departments
        where result.department_id=departments.department_id;"; //string
        $this->statement=$this->con->prepare($sql); //prepare statement
       
        if($this->statement->execute())
        {
            $result=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            //fetch for one row and fetchAll for all rows
            return $result;
        } //sql run
    }

}

?>