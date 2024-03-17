<?php
session_start();
include_once 'layouts/sidebar.php';

// echo $_GET['name'];
// echo $_GET['parent'];

echo $_SESSION['name'];
?>
<div>

</div>
<?php
include_once 'layouts/footer.php';
?>