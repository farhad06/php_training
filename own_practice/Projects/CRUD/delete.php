<?php include ('header.php'); ?>
        <div id="main-contain" style="margin-top:3px;">
        <?php 
        if(isset($_POST['delete'])){
            $stu_id=$_POST['sid'];
            $conn=mysqli_connect('localhost','root','','crud') or die("Connection failed");
            $sql="DELETE FROM student WHERE sid={$stu_id}";
            $result=mysqli_query($conn,$sql) or die("Unsuccessful.");
            header('Location: http://127.0.0.1/php_tranning/own_practice/Projects/CRUD/index.php');
            mysqli_close($conn);
        }
        ?>
        <h3 style="text-align:center">Delete Records</h3>
        <div class="col-md-6 offset-md-3" id="addForm">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method='post'>
                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sid">
                            </div>
                      </div>
                       <div class="form-group row">
                            <div class="col-sm-12"  >
                                <button class="btn btn-danger" name='delete' id='btn'>DELETE</button>
                            </div>
                      </div>
                </form>

          </div>   
        </div>
        </div>
</div>
</body>
</html>