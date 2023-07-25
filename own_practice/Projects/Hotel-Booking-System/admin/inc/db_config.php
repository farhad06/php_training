<?php 
$hostname='localhost';
$username='root';
$password='';
$db= 'taj_bengal';

$conn=mysqli_connect($hostname,$username,$password,$db);

if(!$conn){
    die("Database not connect".mysqli_connect_error());
}

function  filteration($data){
    foreach($data as $key => $value){
        $data[$key] = trim($value);
        $data[$key] = stripcslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);

    }

    return $data;
}

function select($sql,$values,$datatypes){
    $conn=$GLOBALS['conn'];
    if($stmt=mysqli_prepare($conn,$sql)){
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if(mysqli_stmt_execute($stmt)){
            $res=mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;

        }else{
            mysqli_stmt_close($stmt);
            die("Query Can not be Executed --Select");
        }
    }else{
        die("Query Can not be prepared --Select");
    }

}
function update($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query Can not be Executed --Update");
        }
    } else {
        die("Query Can not be prepared --Update");
    }
}

function insert($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query Can not be Executed --Insert");
        }
    } else {
        die("Query Can not be prepared --Insert");
    }
}

function selectAll($table){
    $conn = $GLOBALS['conn'];

    $sql= "SELECT * FROM $table";
    $res=mysqli_query($conn,$sql);
    return $res;

}

function delete($sql, $values, $datatypes)
{
    $conn = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die("Query Can not be Executed --Delete");
        }
    } else {
        die("Query Can not be prepared --Delete");
    }
}



?>