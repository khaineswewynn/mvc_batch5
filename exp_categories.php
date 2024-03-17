<?php
session_start();

if(isset($_POST['submit']))
{
    
    
    $error_status=false;
    if(!empty($_POST['exp_name']))
    {
        $exp_name=$_POST['exp_name'];
    }
    else
    {
        $exp_error="Please enter expense name";
        $error_status=true;
    }
    if(!empty($_POST['parent']))
    {
        $parent=$_POST['parent'];
    }
    else{
        $parent_error="Please choose parent category";
        $error_status=true;
    }
    if(!$error_status)
    {
       // header('Location:exp_list.php?name='.$exp_name.'&parent='.$parent);
       $_SESSION['name']=$exp_name;
       $_SESSION['parent']=$parent;
       header('Location:exp_list.php');
        
    }
}
include_once 'layouts/sidebar.php';
?>
<div class='body m-5'>
    <form action="" method="post">
        <div>
            <label for="" class="form-label">Name</label>
            <input type="text" name="exp_name" id="" class="form-control" value=<?php if(isset($exp_name)) echo $exp_name;?>>
            <span class="text-danger"><?php if(isset($exp_error)) echo $exp_error; ?></span>
        </div>
        <div>
            <label for="" class="form-label">Parent Category</label>
            <select name="parent" id="" class='form-select'>
                <option value="">Select Parent Category</option>
                <option value="parent1" <?php if(isset($_POST['parent']) && $_POST['parent']=='parent1') echo "selected"; ?>>Parent 1</option>
                <option value="parent2" <?php if(isset($_POST['parent']) && $_POST['parent']=='parent2') echo "selected"; ?>>Parent 2</option>
                <option value="parent3" <?php if(isset($_POST['parent']) && $_POST['parent']=='parent3') echo "selected"; ?>>Parent 3</option>
            </select>
            <span class='text-danger'><?php if(isset($parent_error)) echo $parent_error; ?></span>
        </div>
        <div>
            <label for="" class="form-label">Remark</label>
            <input type="text" name="remark" id="" class="form-control">
        </div>
        <div class="mt-3">
            <button class="btn btn-dark" name="submit"> Add </button>
        </div>
    </form>
</div>
<?php
include_once 'layouts/footer.php';

?>