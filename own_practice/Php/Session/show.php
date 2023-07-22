<?php
session_start();
$language = implode(',', $_POST['lang']);
$_SESSION['language_list'] = $language;
include('header.php');
?>
<header class="modal-header">
    <h2>Show Details</h2>
</header>
<table class="table table-border">
    <thead>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Education</th>
        <th>Language Known</th>
    </thead>
    <tbody>
        <td><?php echo $_SESSION['name']; ?></td>
        <td><?php echo $_SESSION['phone']; ?></td>
        <td><?php echo $_SESSION['address']; ?></td>
        <td><?php echo $_SESSION['education_list']; ?></td>
        <td><?php echo $_SESSION['language_list']; ?></td>
    </tbody>

</table>
<div class="row">
    <div class="col-md-12">
        <a href="language.php" class="btn btn-sm btn-outline-info">&laquo;Previous</a>
    </div>
</div>
<?php session_destroy(); ?>
<?php include('footer.php'); ?>