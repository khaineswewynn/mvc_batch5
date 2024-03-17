<?php
include_once './model/job.php';

class JobController{
    private $job;
    function __construct(){
        $this->job=new Job();
    }

    public function getJobs()
    {
       return $this->job->getJobs();
    }

    public function getJob($id)
    {
        return $this->job->getJob($id);
    }

    public function updateJob($id,$job_title,$min_salary,$max_salary)
    {
        return $this->job->updateJob($id,$job_title,$min_salary,$max_salary);
    }

    public function deleteJob($id)
    {
        return $this->job->deleteJob($id);
    }
    public function filter($min,$max)
    {
        return $this->job->filter($min,$max);
    }

}



?>