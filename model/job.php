<?php
include_once './includes/db.php';
class Job{
    private $con,$statement;
    public function getJobs(){
        $this->con=Database::connect();
        $sql="select * from jobs"; //string
        $this->statement=$this->con->prepare($sql); //prepare statement
        if($this->statement->execute())
        {
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            //fetch for one row and fetchAll for all rows
            return $results;
        } //sql run
       

    }

    public function getJob($id)
    {
        $this->con=Database::connect();
        $sql="select * from jobs where job_id=:id"; //string
        $this->statement=$this->con->prepare($sql); //prepare statement
        $this->statement->bindParam(":id",$id);
        if($this->statement->execute())
        {
            $result=$this->statement->fetch(PDO::FETCH_ASSOC);
            //fetch for one row and fetchAll for all rows
            return $result;
        }
    }
    public function updateJob($id,$job_title,$min_salary,$max_salary)
    {
        $this->con=Database::connect();
        $sql="update jobs set job_title=:title,min_salary=:min, 
        max_salary=:max where job_id=:id"; //string
        $this->statement=$this->con->prepare($sql); //prepare statement
        $this->statement->bindParam(":id",$id);
        $this->statement->bindParam(":title",$job_title);
        $this->statement->bindParam(":min",$min_salary);
        $this->statement->bindParam(":max",$max_salary);
        return $this->statement->execute();
        
    }

    public function deleteJob($id)
    {  
        $status="deleted";
        $this->con=Database::connect();
        $sql1="select * from employees where job_id=:id";
        $statement1=$this->con->prepare($sql1);
        $statement1->bindParam(":id",$id);
        if($statement1->execute())
        {
            $employees=$statement1->fetchAll(PDO::FETCH_ASSOC);
            if(sizeof($employees)==0){
               
                $sql="update jobs set deleted_at=:status where job_id=:id"; //string
                $this->statement=$this->con->prepare($sql); //prepare statement
                $this->statement->bindParam(":id",$id);
                $this->statement->bindParam(":status",$status);
                return $this->statement->execute();
            }
            return false;
        }
        
        
    }
    public function filter($min,$max)
    {
        $this->con=Database::connect();
        $sql="select * from jobs where min_salary>=:min and max_salary<=:max"; //string
        $this->statement=$this->con->prepare($sql); //prepare statement
      
        $this->statement->bindParam(":min",$min);
        $this->statement->bindParam(":max",$max);
        if($this->statement->execute())
        {
            return $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}



?>