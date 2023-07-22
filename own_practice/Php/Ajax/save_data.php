<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <form id="saveData" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="number" name="age" id="age" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
            </div>
            <div class="form-group">
                <label for="">Profile Pic</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <!-- <label for="">Name</label> -->
                <input type="submit" class="btn btn-outline-info" id="submit" name="submit" value="Submit">
            </div>
        </form>
        <div id='responce'></div>

        <script>
            $(document).ready(function() {
                console.log('Page Ready');
                $("#submit").on('click', function(e) {
                    e.preventDefault();
                    var name = $('#name').val();
                    var age = $('#age').val();
                    if (name == '' || age == '') {
                        $('#responce').fadeIn();
                        $('#responce').html('Please Fill the Form!').addClass('alert alert-warning');
                        $('#responce').fadeOut(5000);
                        //$('#responce').removeClass('alert alert-warning');

                        //$('#responce').css("background-color", "");

                        /*setTimeout(function() {
                            $('#responce').fadeOut()
                        },5000);*/
                    } else {
                        //console.log('Save button clicked.');
                        var formdata = $('#saveData').serialize();
                        console.log(formdata);
                        $.post(
                            'save.php',
                            formdata,
                            function(data) {
                                if (data == 1) {
                                    $('#saveData').trigger('reset');
                                    $('#responce').fadeIn();
                                    $('#responce').removeClass('alert alert-warning');
                                    $('#responce').removeClass('alert alert-danger');
                                    $('#responce').html('Data Saved Successfully!').addClass('alert alert-success');
                                    $('#responce').fadeOut(5000);

                                } else {
                                    //alert('Not Saved');
                                    $('#responce').fadeIn();
                                    $('#responce').html('Some Thing went Wrong').addClass('alert alert-danger');
                                    $('#responce').fadeOut(5000);
                                }
                            }
                        );
                    }
                });
            });
        </script>
    </div>
</body>

</html>