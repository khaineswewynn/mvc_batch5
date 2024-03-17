<?php
session_start();

include_once './controller/jobController.php';
$job_controller=new JobController();
if(isset($_GET['id']))
{
    $id=$_GET['id'];
    $job=$job_controller->getJob($id);
}
if(isset($_POST['update']))
{
    $error=false;
    if(!empty($_POST['job_title']))
    {
        $job_title=$_POST['job_title'];
    }
    else{
        $error=true;
    }
    if(!empty($_POST['min_salary']))
    {
        $min_salary=$_POST['min_salary'];
    }
    else{
        $error=true;
    }
    if(!empty($_POST['max_salary']))
    {
        $max_salary=$_POST['max_salary'];
    }
    else{
        $error=true;
    }
    if(!$error)
    {
       $status= $job_controller->updateJob($id,$job_title,$min_salary,$max_salary);
       if($status)
       {
        header('location:job-list.php?status=success');
       }
    }

    
}
include_once 'layouts/sidebar.php';
?>
<div class="main">
    
    <div class="row">
        <div class="col-md-12">
            <form action="" method="post">
                <div class='m-4'>
                    <label for="" class='form-label'>Job Title</label>
                    <input type="text" name="job_title" class='form-control' id="" value="<?php echo $job['job_title']; ?>">
                </div>
                <div class='m-4'>
                    <label for="" class='form-label'>Min Salary</label>
                    <input type="number" name="min_salary" class='form-control' id="" value="<?php echo $job['min_salary']; ?>">
                </div>
                <div class='m-4'>
                    <label for="" class='form-label'>Max Salary</label>
                    <input type="number" name="max_salary" class='form-control' id="" value="<?php echo $job['max_salary']; ?>">
                </div>
                <div class="m-4">
                    <button class='btn btn-warning' name='update'>UPDATE</button>
                </div>
            </form>
        </div>
    </div>
    
</div>
<?php
include_once 'layouts/footer.php';
?>