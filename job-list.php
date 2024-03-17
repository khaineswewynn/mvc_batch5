<?php
include_once 'layouts/sidebar.php';
include_once 'controller/jobController.php';

$job_controller=new JobController();
$job_results=$job_controller->getJobs();
if(isset($_GET['status']))
{
    $status=$_GET['status'];
    if($status=='success')
    {
        echo "<div class='alert alert-success'>Job is successfully updated.</div>";
    }
    else if($status=='fail')
    {
        echo "<div class='alert alert-danger'>can not delete.</div>";
    }
}


?>
<div class="main">
    <div class="row">
        <div class="col-md-12">
            <form action="">
                <div class="d-flex justify-space-between gap-3 m-5">
                    <label for="">Min Salary</label>
                    <input type="number" name="min" id="min_salary" class="form-control">
                    <label for="">Max Salary</label>
                    <input type="number" name="max" id="max_salary" class="form-control">
                    <button class="btn btn-info" id="filter"> Filter </button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Min Salary</th>
                <th>Max Salary</th>   
                <th>Actions</th>             
            </tr>
        </thead>
        <tbody id="data-body">
                <?php
                    foreach($job_results as $job){
                        if($job['deleted_at']==null)
                        {
                        echo "<tr id=".$job['job_id']." >";
                        echo "<td>".$job['job_id']."</td>";
                        echo "<td>".$job['job_title']."</td>";
                        echo "<td>".$job['min_salary']."</td>";
                        echo "<td>".$job['max_salary']."</td>";
                        echo "<td><a class='btn btn-success mx-2' href='job.php?id=".$job['job_id']."'>View</a><a class='btn btn-warning mx-2' href='edit_job.php?id=".$job['job_id']."'>Edit</a><a class='btn btn-danger mx-2' href='delete_job.php?id=".$job['job_id']."'>Delete</a></td>";
                        echo "<td><button class='btn btn-warning verify'>Verify</button></td>";
                        echo "</tr>";
                        }
                        
                        
                    }
                ?>
        </tbody>
    </table>
        </div>
    </div>
    
</div>
<?php
include_once 'layouts/footer.php';
?>