<?php
session_start();
$edulist = implode(',', $_POST['education']);
$_SESSION['education_list'] = $edulist;
include('header.php');
?>
<header class="modal-header">
    <h2>Language Details</h2>
</header>

<form action="show.php" method='post'>
    <label for="">Language Known</label>
    <div class="form-group">
        <input type="checkbox" name="lang[]" value="Bengali">Bengali
        <input type="checkbox" name="lang[]" value="English">English
        <input type="checkbox" name="lang[]" value="Hindi">Hindi
        <input type="checkbox" name="lang[]" value="Telegu">Telegu
        <input type="checkbox" name="lang[]" value="Marathi">Marathi
        <input type="checkbox" name="lang[]" value="Urdu">Urdu

    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-outline-success">Submit</button>
    </div>

</form>
<div class="row">
    <div class="col-md-12">
        <a href="education.php" class="btn btn-sm btn-outline-info">&laquo;Previous</a>
    </div>
</div>
<?php include('footer.php'); ?>