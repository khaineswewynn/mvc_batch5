<?php
include_once 'controller/jobController.php';
$min=$_POST['min'];
$max=$_POST['max'];

$job_controller=new JobController();
$results=$job_controller->filter($min,$max);
//string or json
$output_string="";
foreach($results as $job)
{
    echo $output_string."<tr>";
    echo $output_string."<td>".$job['job_id']."</td>";
    echo $output_string."<td>".$job['job_title']."</td>";
    echo $output_string."<td>".$job['min_salary']."</td>";
    echo $output_string."<td>".$job['max_salary']."</td>";
    echo $output_string."</tr>";
}
echo $output_string;
?>