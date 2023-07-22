<?php 
session_start(); 
include('header.php'); 
?>
<header class="modal-header">
    <h2>Personal Details</h2>
</header>

<form action="education.php" method='post'>
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Phone</label>
        <input type="number" name="phone" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Adderss</label>
        <textarea name="address" id="" cols="40" rows="4" class="form-control" style="resize:false;"></textarea>
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-outline-primary">Next <span>&raquo;</span></button>
    </div>

</form>
<?php include('footer.php'); ?>