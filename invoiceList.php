<?php
session_start();
include_once 'layouts/sidebar.php';
$invoices=$_SESSION['invoices'];
?>
<div class="main">
    <div class="row">
        <div class="col-md-12">
        <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for($index=0;$index<sizeof($invoices);$index++)
            {
                echo "<tr>";
                $total=0;
                $qty=0;
                echo "<td>".($index+1)."</td>";
                echo "<td>".$invoices[$index]['name']."</td>";
                echo "<td>".$invoices[$index]['date']."</td>";
                for($count=0;$count<sizeof($invoices[$index]['products']);$count++)
                {
                    $invoice=$invoices[$index]['products']; //two dimensional array
                    $total+=$invoice[$count][1]*$invoice[$count][2];
                    $qty+=$invoice[$count][2];
                }
                
               
                echo "<td>$total</td>";
                echo "<td>$qty</td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
        </div>
    </div>
    
</div>
<?php
include_once 'layouts/footer.php';
?>