<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>

<body>
    <div class="container">
        <div>
            <center>
                <h2>Upload an Image.</h2>
            </center>
        </div>
        <div>
            <form method="post" enctype="multipart/form-data">
                <label for="">Image:</label>
                <input type="file" name="image"><br><br>
                <button name="save">Save</button>
            </form>
        </div>
        <?php 
        if(isset($_POST['save'])){
            // print('<pre>');
            // print_r($_FILES);
            $fileName = $_FILES['image']['name'];
            $fileType = $_FILES['image']['type'];
            $fileTemp = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            //if folder not exist in my current directory then it create a new folder using this name.
            if(!file_exists('Images')) mkdir('Images');
            if($fileType=='image/png'||$fileType=='image/jpg'||$fileType=='image/jpeg'||$fileType=='image/gif'){
                if($fileSize<=500000){
                    move_uploaded_file($fileTemp,'Images/'.$fileName);
                    //echo"<script>alert('Image Uploaded');</script>";
                    echo "<h4 style='color:green'>Image Uploaded Successfully!</h4>";
                }else{
                    echo "<h4 style='color:red'>Upload Image Under 500KB!</h4>";

                }
            }else{
                echo "<h4 style='color:red'>Only JPEG/JPG/PNG/GIF Images Supported!</h4>";

            }

        }
        ?>
        <section>
            <img src="<?php echo "Images/".$fileName; ?>" width="350px" height="250px" style="margin-top:12px">
        </section>
    </div>
</body>

</html>