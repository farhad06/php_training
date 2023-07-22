<?php
session_start();
include('../header.php');
if (isset($_SESSION['USER'])) {
?>
    <div style="float: right;">
        <?php echo 'Welcome Mr. ' . $_SESSION['USER']; ?>
        <a href="logout.php">Logout</a>
    </div>
<?php } else {
    header('location:index.php?auth=false');
}
?>
<!-- this code for if a user idle in this particular page for 10 sec it will automatically logout this user -->
<script>
    $(document).ready(function() {
        console.log('Loaded');
        var count = 0;
        setInterval(function() {
            if (count == 10) {
                window.location.href = 'logout.php';

            }
            count++;
            //console.log(count);
        }, 1000);
        //if user can press any key from key board count set to zero(0)
        $(this).keypress(function() {
            count = 0;
        });
        //if user can move mouse in this page count set to zero(0)
        $(this).mousemove(function() {
            count = 0;
        });
    });
</script>

<?php include('../footer.php'); ?>