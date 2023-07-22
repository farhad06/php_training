<?php include ('header.php'); ?>
    <div id="main-contain" style="margin-top:3px;">
        <h3 style="text-align:center">Add New Records</h3>
          <div class="col-md-6 offset-md-3" id="addForm">
                <form action="savedata.php" method="post">
                      <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Name:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sname" required>
                            </div>
                      </div>
                       <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Address:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="saddress" required>
                            </div>
                      </div>
                       <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Class:</label>
                            <div class="col-sm-10">
                                <select class="custom-select" name="class" required>
                                    <option value="" selected >Select Class</option>
                                    <?php 
                                    $conn=mysqli_connect('localhost','root','','crud') or die('Connection Failed.');
        
                                    $sql="SELECT * FROM studentclass";
                                    $result=mysqli_query($conn,$sql) or die('Connection Unsuccessful.');
                                    if(mysqli_num_rows($result)>0){
                                        while($row=mysqli_fetch_assoc($result)){
                                    
                                    ?>
                                    <option value="<?php echo $row['cid'];?>"><?php echo $row['cname'];?></option>
                                     <?php } }?>
                                </select>
                               
                            </div>
                      </div>
                       <div class="form-group row">
                            <label class="col-sm-2 col-form-label" required>Phone:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sphone" maxlength=10>
                            </div>
                      </div>
                       <div class="form-group row">
                            <div class="col-sm-12"  >
                                <button class="btn btn-primary" name='add' id='btn'>SAVE</button>
                            </div>
                      </div>
                </form>

          </div>
    </div>
</div>
</body>
</html>