<?php
session_start();
$_SESSION['name'] = $_POST['name'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['address'] = $_POST['address'];
include('header.php');
?>
<header class="modal-header">
    <h2>Education Details</h2>
</header>

<form action="language.php" method='post'>
    <div class="form-group">
        <label for="">Education</label>
        <select name="education[]" id="" multiple class="form-control">
            <!-- <option value="">Select</option> -->
            <option value="Secondary">10<sup>th</sup></option>
            <option value="Higher Secondary">12<sup>th</sup></option>
            <option value="Graduation">Graduation</option>
            <option value="Post Graduation">Post Graduation</option>
        </select>
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-outline-primary">Next <span>&raquo;</span></button>
    </div>

</form>
<div class="row">
    <div class="col-md-12">
        <a href="index.php" class="btn btn-sm btn-outline-info">&laquo;Previous</a>
    </div>
</div>
<?php include('footer.php'); ?>