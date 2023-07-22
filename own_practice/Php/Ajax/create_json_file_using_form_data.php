<?php 
$name = $_POST['name'];
$city = $_POST['city'];
$age = $_POST['age'];
if($name!=''||$city!=''||$age!=''){
    if(file_exists('JSON-Files/data-using-form-data.json')){
        $current_data=file_get_contents('JSON-Files/data-using-form-data.json');
        $curr_arr=json_decode($current_data,true);
        $new_arr=array(
            'name' => $name,
            'city' => $city,
            'age' => $age
        );
        $curr_arr[]=$new_arr;
        $json_data=json_encode($curr_arr,JSON_PRETTY_PRINT);
        //echo $json_data;
        $file_name= 'JSON-Files/data-using-form-data.json';
        if(file_put_contents($file_name,$json_data)){
            //echo "<h3>JSON File Created Successfully!</h3>";
            echo "<script>alert('JSON File Created Successfully!');
            window.location.href = 'json_data_create_form.php'</script>";
            #I use javascript rediraction not php because if i use php then alert box not show.
            // header('location:json_data_create_form.php');
        }else{
            echo "<h3>Can't create JSON File!</h3>";

        }
    }else{
        echo "<h3>File Does Not Exists!</h3>";

    }

}else{
    //echo "<h3>All Fields are Required!</h3>";
    echo "<script>alert('All Fields are Required!');
            window.location.href = 'json_data_create_form.php'</script>";
}
