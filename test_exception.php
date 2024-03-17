<?php
$age=99;
$username="";
try{
    if($age>100)
    {
        throw new Exception("Age is beyond limit");
    }
    if(empty($username))
    {
        throw new Exception("Empty Username");
    }
}
catch(Exception $e)
{
    echo $e->getMessage();
}
finally{
    echo "Finish";
}


?>