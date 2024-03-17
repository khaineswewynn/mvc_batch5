<?php
session_start();
include_once 'layouts/sidebar.php';

$_SESSION['invoices']=[];
?>
<div class="main">
    <div class="m-3">
        <button class='btn btn-dark btnAdd'>Add</button>
        <a href="invoiceList.php" class='btn btn-success'>Go to Invoice List</a>
    </div>
<form action="add_invoice.php" id="invoiceForm">
    <div class="row">
        <div class="col-md-2">
            <input type="text" name="" id="" class="form-control cname">
        </div>
        <div class="col-md-2">
            <input type="date" name="" id="" class="form-control date">
        </div>
    </div>
    <div class='invoice'>
        <div class="row m-3">
            <div class="col-md-3">
                <input type="text" name="product[]" id="" class='form-control title'>
            </div>
            <div class="col-md-2">
                <input type="text" name="price[]" id="" class='form-control price'>
            </div>
            <div class="col-md-2">
                <input type="text" name="qty[]" id="" class='form-control qty'>
            </div>
            <div class="col-md-2">
                <input type="text" name="subTotal[]" id="" class='form-control subtotal'>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">

        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-2">
            Total
        </div>
        <div class="col-md-2">
            <input type="number" name="" id="" class="form-control total">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">

        </div>
        <div class="col-md-2">

        </div>
        <div class="col-md-2">
            Discount
        </div>
        <div class="col-md-2">
            <input type="number" name="" id="" class="form-control discount">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-3">

        </div>
        <div class="col-md-2">

        </div>
                <div class="col-md-2">
            Amount
        </div>
        <div class="col-md-2">
            <input type="number" name="" id="" class="form-control amount">
        </div>
    </div>
    <div class="row m-3">
        <div class="col-md-2">
            <button class="btn btn-dark d-block w-100 btnSubmit">Submit</button>
        </div>        
    </div>
</form>
</div>
<?php
include_once 'layouts/footer.php';
?>