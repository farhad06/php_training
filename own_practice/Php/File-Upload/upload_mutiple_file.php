<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple File</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Choose File</label>
                <input type="file" name='images[]' multiple='multiple' class="form-control">
            </div>
            <div class="form-group">
                <button class='btn btn-primary' name='save'>Save</button>
            </div>
        </form>
        <?php
        if (isset($_POST['save'])) {
            //count_total_number_of images selected
            $file_count=count($_FILES['images']['name']);
            for($i=0;$i<$file_count;$i++){
                $tempFilePath=$_FILES['images']['tmp_name'][$i];
                $filePathName='Images/'.$_FILES['images']['name'][$i];
                move_uploaded_file($tempFilePath,$filePathName);
                
            }
            echo "Images are Uploaded";
        }



        ?>
    </div>
</body>

</html>