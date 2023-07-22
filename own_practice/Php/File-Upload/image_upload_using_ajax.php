<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data" id="dataForm">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn  btn-outline-success" id="saveBtn">Save</button>

            </div>
        </form>
        <script>
            //this code is used for image/file upload using ajax and php 
            $(document).ready(function() {
                console.log('pade ready');
                $('#saveBtn').click(function(e) {
                    e.preventDefault();
                    // var name = $('#name').val();
                    // var imgname = $('#image').val();
                    var formdata = new FormData($('#dataForm')[0]);
                    //var formdata=$('#dataForm').serialize();
                    console.log(formdata);
                    $.ajax({
                        url: 'upload_using_ajax.php',
                        type: 'POST',
                        data: formdata,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(data) {
                            if (data == 1) {
                                $('#dataForm').trigger('reset');
                                alert('Successfully Uploaded Image');
                            } else {
                                //console.log("Error");
                                alert('Some Thing Went Wrong!');

                            }
                        }
                    });
                });
            });
        </script>
    </div>
</body>

</html>