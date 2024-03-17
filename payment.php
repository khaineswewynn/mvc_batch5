<?php

if(isset($_POST['submit']))
{
    var_dump($_FILES['payment']);
    var_dump($_FILES['payment']['name']);
    var_dump($_FILES['payment']['type']);
    $filename=$_FILES['payment']['name'];
    $filesize=$_FILES['payment']['size']; 
    $fileinfo=explode('.',$filename); // file name seperate using .
    $filetype=end($fileinfo); // take the last element as file extension
    $allowedTypes=['jpg','jpeg','png','svg','webp'];
    if($_FILES['payment']['error']==0) //No error
    {
        if(in_array($filetype,$allowedTypes)) //file type
        {
            if($filesize<2000000)
            {
                $f_name=time().$filename;
                if(move_uploaded_file($_FILES['payment']['tmp_name'],'upload_image/'.$f_name))
                {
                    echo "Success uploading";
                }
                else
                {
                    
                }
            
            }
            else
            {
                echo "Image size is exceeded";
            }
        }
        else
        {
            echo "Type is not allowed.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.min.css">
</head>
<body>
    <div class="container">
    <form action="" enctype="multipart/form-data" method="post">
        <div>
            <label for="" class="form-label">Name</label>
            <input type="text" name="customerName" id="" class="form-control">
        </div>
        <div>
            <label for="" class="form-label">Date</label>
            <input type="date" name="date" id="" class="form-control">
        </div>
        <div>
            <label for="" class="form-label">Amount</label>
            <input type="number" name="amount" id="" class="form-control">
        </div>
        <div>
            <label for="" class="form-label">Description</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            
        </div>
        <div>
            <label for="" class="form-label">Payment Slip (screenshots)</label>
            <input type="file" name="payment" id="" class="form-control">
        </div>
        <div>
            <button class="btn btn-dark" name="submit">Submit</button>
        </div>
    </form>
    </div>
    
    <script src="js/main.js"></script>
</body>
</html>