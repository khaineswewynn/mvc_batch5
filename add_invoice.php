<?php
session_start();
$invoice=[];
$count=sizeof($_POST['price']);
$price=$_POST['price'];
$title=$_POST['title'];
$qty=$_POST['qty'];
$name=$_POST['customer'];
$date=$_POST['date'];
$products=[];
if($count>0)
{
    $invoice["name"]=$name;
    $invoice["date"]=$date;
    for($index=0;$index<$count;$index++)
    {
        $products[$index]=[$title[$index],$price[$index],$qty[$index]];
    }
    $invoice['products']=$products;
    array_push($_SESSION['invoices'],$invoice);
    
    echo "success";
}









?>