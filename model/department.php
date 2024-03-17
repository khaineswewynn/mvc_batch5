<?php
include_once './includes/db.php';
class Department{
    private $con,$statement;
    public function getDepartments()
    {
        $this->con=Database::connect();
        $sql="select * from departments"; //string
        $this->statement=$this->con->prepare($sql); //prepare statement
        if($this->statement->execute())
        {
            $results=$this->statement->fetchAll(PDO::FETCH_ASSOC);
            //fetch for one row and fetchAll for all rows
            return $results;
        } //sql run
    }

}
?>