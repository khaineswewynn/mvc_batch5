<?php
session_start();

include_once 'controller/emp_controller.php';
include_once 'controller/jobController.php';
include_once 'controller/dept_controller.php';

$emp_controller=new EmployeeController();
$employees=$emp_controller->getEmployees();

$job_controller=new JobController();
$jobs=$job_controller->getJobs();

$dept_controller=new DepartmentController();
$depts=$dept_controller->getDepts();

if(isset($_POST['submit']))
{
    $error=false;
    if(!empty($_POST['firstname']))
    {
        $firstname=$_POST['firstname'];
    }
    else{
        $error=true;
        $firstname_error="Please enter your firstname";
    }
    if(!empty($_POST['lastname']))
    {
        $lastname=$_POST['lastname'];
    }
    else{
        $error=true;
        $lastname_error="Please enter your lastname";
    }
    if(!empty($_POST['email']))
    {
        $email=$_POST['email'];
    }
    else{
        $error=true;
        $email_error="Please enter your email";
    }
    if(!empty($_POST['phone']))
    {
        $phone=$_POST['phone'];
    }
    else{
        $error=true;
        $phone_error="Please enter your phone";
    }

    if(!empty($_POST['join_date']))
    {
        $join_date=$_POST['join_date'];
    }
    else{
        $error=true;
        $join_date_error="Please enter your join_date";
    }
    if(!empty($_POST['salary']))
    {
        $salary=$_POST['salary'];
    }
    else{
        $error=true;
        $salary_error="Please enter your salary";
    }
    $job=$_POST['job'];
    $manager=$_POST['manager'];
    $department=$_POST['department'];
    if(!$error){
        $status=$emp_controller->addEmployee($firstname,$lastname,$email,$phone,$join_date,$job,$salary,$manager,$department);
        if($status)
        {
            $message="success";
            header('location:employees.php?status='.$message);
        }
    }
}
include_once 'layouts/sidebar.php';
?>
<div class="main">
    <div class="row">
        <div class="col-md-8">

        </div>
        <div class="col-md-4">
        <a href="employees.php" class="btn btn-dark mx-3"> Back</a>
        </div>
        
       
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-8 ">
            <form action="" method="post">
                
                <div>
                    <label for="" class="form-label">First Name</label>
                    <input type="text" name="firstname" id="" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">Last Name</label>
                    <input type="text" name="lastname" id="" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" id="" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">Phone Number</label>
                    <input type="tel" name="phone" id="" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">Join Date</label>
                    <input type="date" name="join_date" id="" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">Job Title</label>
                    <select name="job" id="" class="form-select">
                        <?php
                        foreach($jobs as $job)
                        {
                            echo "<option value=".$job['job_id'].">".$job['job_title']."</option>";
                        }

                        ?>
                    </select>
                </div>
                <div>
                    <label for="" class="form-label">Salary</label>
                    <input type="number" name="salary" id="" class="form-control">
                </div>
                <div>
                    <label for="" class="form-label">Manager</label>
                    <select name="manager" id="" class="form-select">
                        <?php
                            foreach($employees as $employee)
                            {
                                echo "<option value=".$employee['employee_id'].">".$employee['first_name']." ".$employee['last_name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="" class="form-label">Department</label>
                    <select name="department" id="" class="form-select">
                       
                        <?php
                            foreach($depts as $dept)
                            {
                                echo "<option value=".$dept['department_id'].">".$dept['department_name']."</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="mt-3">
                    <button class="btn btn-dark" name="submit">Add </button>
                </div>
            </form>
        </div>
    </div>
    
</div>
<?php
include_once 'layouts/footer.php';
?>