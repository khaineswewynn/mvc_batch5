<?php
include_once 'layouts/sidebar.php';
include_once 'controller/jobController.php';
$id=$_GET['id'];
$job_controller=new JobController();
$job_results=$job_controller->getJobs();
?>
<div class="main">
    <div class="row">
        <div class="col-md-12">
            <?php
                foreach($job_results as $job)
                {
                    if($job['job_id']==$id)
                    {
                        $job_new=$job;
                        break;
                    }
                }
                echo "<h2> Job Title:".$job['job_title']."</h2>";
                echo "<h2> Min Salary:".$job['min_salary']."</h2>";
                echo "<h2> Max Salary:".$job['max_salary']."</h2>";
            ?>
        </div>
    </div>
    
</div>
<?php
include_once 'layouts/footer.php';
?>