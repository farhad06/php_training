<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-AJAX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="modal-header" style="justify-content: center;">
            <h1>CRUD Operations With PHP & AJAX</h1>
        </div>
        <div style="float:right; margin-top:12px;">
            <div class="input-group rounded">
                <input type="search" class="form-control rounded" placeholder="Search By Name" aria-label="Search" aria-describedby="search-addon" id="search" name="search" autocomplete="off" />
            </div>
        </div>
        <!-- <div>
            <button class="btn btn-md btn-info" id="loadData">Load Data</button>
        </div> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary shadow-none" data-toggle="modal" data-target="#exampleModal" style="margin-top: 12px;">
            + ADD
        </button>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registration Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="regForm">
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="age" class="col-sm-2 col-form-label">Age</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="age" name="age">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="age" class="col-sm-2 col-form-label">Gender</label>
                                <div class="col-sm-10">
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Male" name="gender" id="gender">Male
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Female" name="gender" id="gender">Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-sm-2 col-form-label">City</label>
                                <div class="col-sm-10">
                                    <select id="city" class="form-control" name="city">
                                        <option selected>Select</option>
                                        <option value="Kolkata">Kolkata</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Pune">Pune</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-sm-12">
                                    <button class="btn btn-sm btn-primary" id="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- modal box end -->

        <!-- Table Start Here -->
        <div style="margin-top: 15px;" id="showData">
            <!-- <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">PHONE</th>
                        <th scope="col">AGE</th>
                        <th scope="col">GENDER</th>
                        <th scope="col">CITY</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>

                    </tr> -->
            </tbody>
            </table>
        </div>
        <!-- Table End Here -->
        <script>
            $(document).ready(function() {
                console.log(" jQuery Loaded!");
                /*$('#loadData').on('click', function(e) {
                    //e.preventDefault();
                    $.ajax({
                        url: "show-data.php",
                        type: "POST",
                        success: function(data) {
                            $('#showData').html(data);
                        }
                    });
                });*/
                //show table data
                function loadTableData() {
                    $.ajax({
                        url: "show-data.php",
                        type: "POST",
                        success: function(data) {
                            $('#showData').html(data);
                        }
                    });
                }

                loadTableData();
                //insert data
                $('#submit').on('click', function(e) {
                    e.preventDefault();
                    var name = $('#name').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var age = $('#age').val();
                    //var gender = $('#gender').val();
                    var gender = $("#gender:checked").val();
                    var city = $('#city').val();
                    var password = $('#password').val();
                    console.log(`${name} ${email}  ${phone} ${age}  ${gender}  ${city}`);

                    $.ajax({
                        url: "insert-data.php",
                        type: 'POST',
                        data: {
                            name: name,
                            email: email,
                            phone: phone,
                            age: age,
                            gender: gender,
                            city: city,
                            password: password
                        },
                        success: function(data) {
                            if (data == 1) {
                                $('#regForm').trigger('reset');
                                $('#exampleModal').modal('hide');
                                loadTableData();
                            } else {
                                alert("Data Not saved");
                            }
                        }
                    });
                });
                //search 
                $('#search').on('keyup', function() {
                    var search = $(this).val();
                    console.log(search);
                    $.ajax({
                        url: 'search.php',
                        type: 'POST',
                        data: {
                            search: search
                        },
                        success: function(data) {
                            $('#showData').html(data);
                        }
                    });

                });
                //delete data
                $(document).on('click', '#delete-btn', function() {
                    //console.log(playerId);console.log(element);
                    if (confirm('Do U want delete it?')) {
                        var playerId = $(this).data('id');
                        var element = this;
                        $.ajax({
                            url: "delete-data.php",
                            type: 'POST',
                            data: {
                                id: playerId
                            },
                            success: function(data) {
                                if (data == 1) {
                                    $(element).closest("tr").fadeOut();
                                } else {
                                    alert("Delete Failed.!");
                                }
                            }
                        });

                    }
                });
            });
        </script>
        <!-- Bootstrape link for Modal -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    </div>

</body>

</html>