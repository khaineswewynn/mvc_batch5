<?php
session_start();
include_once 'layouts/sidebar.php';
if(isset($_GET['status']))
{
   echo "<div class='alert alert-success'>New Employee is successfully added.</div>";
}
?>
<div class="main">
    <div class="row">
        <div class="col-md-4">
            <button class='btn btn-success mx-3' id='verify'>Verify</button>
        
        </div>
        <div class="col-md-4">
        <a href="add-employee.php" class="btn btn-dark mx-3"> Add New Employee</a>
        </div>
        
       
    </div>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped">

        </table>
        </div>
    </div>
    
</div>
<?php
include_once 'layouts/footer.php';
?>