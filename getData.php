<?php
include_once './controller/emp_controller.php';

$emp_controller=new EmployeeController();
$result=$emp_controller->getChartData();
// $output="";
// foreach($result as $emp)
// {
//     json_encode()
// }
echo json_encode($result);
?>