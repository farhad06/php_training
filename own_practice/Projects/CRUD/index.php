<?php include ('header.php'); ?>
        <div id="main-contain" style="margin-top:3px;">
        <h3 style="text-align:center">All Records</h3>
        <?php $conn=mysqli_connect('localhost','root','','crud') or die('Connection Failed.');
        
        $sql="SELECT * FROM student JOIN studentclass WHERE student.sclass=studentclass.cid";
        //$sql='SELECT * FROM student';
        $result=mysqli_query($conn,$sql) or die('Connection Unsuccessful.');
        if(mysqli_num_rows($result)>0){
        
        ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Class</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['sid'] ?></td>
                        <td><?php echo $row['sname'] ?></td>
                        <td><?php echo $row['saddress'] ?></td>
                        <td><?php  echo $row['cname'] ?></td>
                        <td><?php  echo $row['sphone'] ?></td>
                        <td>
                              <a class="btn btn-sm btn-info" href='edit.php?id=<?php echo $row['sid'] ?>'>Edit</a>
                              <a class="btn btn-sm btn-danger" href='delete_records.php?id=<?php echo $row['sid'] ?>'>Delete</a>
                        </td>
                        
                    </tr>
                    <?php }?>
                    
                </tbody>
                </table>
                <?php }?>
        </div>
</div>
</body>
</html>