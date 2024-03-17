<?php
session_start();
include_once 'layouts/sidebar.php';
echo $_SESSION['name'];

var_dump($_SESSION);
session_unset(); //delete session variables
var_dump($_SESSION);
echo $_SESSION['name'];
echo session_id();
session_destroy(); //delete session
echo "id...".session_id();
echo "<br>";

$_SESSION['username']="admin";
echo $_SESSION['username'];
var_dump($_SESSION);
echo session_id();


?>
<div class='body'>

</div>
<?php
include_once 'layouts/footer.php';

?>