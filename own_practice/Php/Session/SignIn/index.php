<?php
session_start();
include('../header.php');
?>
<header class="modal-header">
    <h1>Sign In</h1>
</header>
<form action="login.php" method="post">
    <div class="form-group">
        <label for="">User Name</label>
        <input type="text" name="user_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" id="password" class="form-control">
        <!-- <span><i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i></span> -->
    </div>
    <div style="margin-bottom: 10px;">
        <input type="checkbox" onclick="showPassword()">&nbsp;Show Password
    </div>
    <div class="form-group">
        <button class="btn btn-md btn-primary">Log In</button>
    </div>
</form>
<?php
if (isset($_GET['error'])) {
    echo "<div class='alert alert-danger'>Invaid Name or Password!</div>";
}
if (isset($_GET['logout'])) {
    echo "<div class='alert alert-success' id='logoutMsg'>You Successfully logged out.</div>";
}
if (isset($_GET['auth'])) {
    echo "<div class='alert alert-warning'>Unothorized access!</div>";
}

?>
<script>
    $(document).ready(function() {
        $('#logoutMsg').fadeOut(10000);
    });

    function showPassword() {
        var x = document.getElementById('password');
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php include('../footer.php'); ?>