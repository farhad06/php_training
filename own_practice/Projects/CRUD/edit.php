<?php include ('header.php'); ?>
        <div id="main-contain" style="margin-top:3px;">
        <h3 style="text-align:center">Update Records</h3>
        <div class="col-md-6 offset-md-3" id="addForm">
                       <?php 
                        $conn=mysqli_connect('localhost','root','','crud') or die('Connection Failed.');
                        $stu_id=$_GET['id'];
                        $sql="SELECT * FROM student WHERE sid={$stu_id}";
                        $result=mysqli_query($conn,$sql) or die('Connection Unsuccessful.');
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                        
                        ?>
                      <form action="" method="">
                      <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" name="sid" value="<?php echo $row['sid'] ?>">
                                <input type="text" class="form-control" name="sname" value="<?php echo $row['sname'] ?>">
                            </div>
                      </div>
                       <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="saddress" value="<?php echo $row['saddress'] ?>">
                            </div>
                      </div>
                       <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Class:</label>
                            <div class="col-sm-10">
                                <select name="class" class="custom-select">
                                    <option value="">Select</option>
                                    <option value="">BCA</option>
                                    <option value="">BCA</option>
                                    <option value="">BCA</option>
                                </select>
                            </div>
                         </div>
                       <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Phone:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sphone" value="<?php echo $row['sphone'] ?>">
                            </div>
                      </div>
                       <div class="form-group row">
                            <div class="col-sm-12"  >
                                <button class="btn btn-success" name='update' id='btn'>UPDATE</button>
                            </div>
                      </div>
                </form>
                <?php }}?>

          </div>
            
        </div>
</div>
</body>
</html>