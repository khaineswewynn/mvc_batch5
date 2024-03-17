<?php
include_once 'controller/jobController.php';

$id=$_GET['id'];

$job_controller=new JobController();
$status=$job_controller->deleteJob($id);

if($status)
{
    header('location:job-list.php');
}
else{
    header('location:job-list.php?status=fail');
}
?>