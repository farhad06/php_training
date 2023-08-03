<?php 
require('db_config.php');

if(isset($_POST['add_student'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $marks = $_POST['marks'];

    //echo $name." ".$email." ".$phone;

    $sql = "INSERT INTO `student`(`name`, `email`, `phone`, `age`, `marks`) VALUES ('$name','$email','$phone',$age,'$marks')";

    $conn->query($sql);

    $res = $conn->affected_rows;

    if($res){
        echo 1;
    }else{
        echo 0;
    }
}

if(isset($_POST['get_student_data'])){
    $sql = "SELECT * FROM `student`";
    $res = $conn->query($sql);
    if(mysqli_num_rows($res)>0){
        $sl_no=1;
        $data="";
        while($row = $res->fetch_assoc()){
            $data.="
                    <tr>
                        <td>$sl_no</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[age]</td>
                        <td>$row[marks]</td>
                        <td>
                        <button type='button' onclick='get_one_student($row[id])' class='btn btn-sm btn-outline-success shadow-none' data-bs-toggle='modal' data-bs-target='#editForm'>
                            Update
                        </button>
                        <button type='button' onclick='delete_student($row[id])' class='btn btn-sm btn-outline-danger shadow-none'>Delete</button>
                        </td>
                    </tr>";
                    $sl_no++;
        }
        echo $data;

    }else{
        echo 'no_data_found';
    }
    
}

if(isset($_POST['delete_student'])){
    $id = $_POST['delete_student'];

    $sql="DELETE FROM `student` WHERE `id`=$id";

    $conn->query($sql);

    $res = $conn->affected_rows;

    if ($res) {
        echo 1;
    } else {
        echo 0;
    }
}

if(isset($_POST['get_one_student'])){
    $id = $_POST['get_one_student'];

    $sql = "SELECT * FROM `student` WHERE `id` = $id";
    $res = $conn->query($sql);

    $data = $res->fetch_assoc();

    $json_data = json_encode($data);
    //print_r($data);
    echo $json_data;

}

if(isset($_POST['edit_student'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $marks = $_POST['marks'];
    $id = $_POST['id'];

    $sql= "UPDATE `student` SET `name`='$name',`email`='$email',`phone`='$phone',`age`=$age,`marks`='$marks' WHERE `id`=$id";

    $conn->query($sql);

    $res = $conn->affected_rows;
    if($res){
        echo 1;
    }else{
        echo 0;
    }
    

}

if (isset($_POST['search_stu'])) {
    $name = $_POST['search_stu'];
    $sql = "SELECT * FROM `student` WHERE `name` LIKE '%$name%'";
    $res = $conn->query($sql);
    if (mysqli_num_rows($res) > 0) {
        $sl_no = 1;
        $data = "";
        while ($row = $res->fetch_assoc()) {
            $data .= "
                    <tr>
                        <td>$sl_no</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[age]</td>
                        <td>$row[marks]</td>
                        <td>
                        <button type='button' onclick='get_one_student($row[id])' class='btn btn-sm btn-outline-success shadow-none' data-bs-toggle='modal' data-bs-target='#editForm'>
                            Update
                        </button>
                        <button type='button' onclick='delete_student($row[id])' class='btn btn-sm btn-outline-danger shadow-none'>Delete</button>
                        </td>
                    </tr>";
            $sl_no++;
        }
        echo $data;
    } else {
        echo '<div class="text-danger text-center"><h4>No Data Found</h4></div>';
    }
}









?>