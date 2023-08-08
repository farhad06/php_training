<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .custom-alert {
            position: fixed;
            top: 90px;
            right: 55px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div>
            <h1 class="text-center mt-3 text-light bg-dark p-2">CRUD Operation With PHP & Ajax</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div>
                    <h3 style="color: indianred;" class="text-center"><u>Registration Form</u></h3>
                </div>
                <div class="overflow-auto">
                    <form id="add_student_form">
                        <div class="form-group">
                            <label for="" class='form-label'>Name</label>
                            <input type="text" name="name" class="form-control shadow-none rounded mb-1" required>
                        </div>
                        <div class="form-group">
                            <label for="" class='form-label'>Email</label>
                            <input type="text" name="email" class="form-control shadow-none rounded mb-1" required>
                        </div>
                        <div class="form-group">
                            <label for="" class='form-label'>Phone</label>
                            <input type="text" name="phone" class="form-control shadow-none rounded mb-1" required>
                        </div>
                        <div class="form-group">
                            <label for="" class='form-label'>Age</label>
                            <input type="text" name="age" maxlength="2" class="form-control shadow-none rounded mb-1" required>
                        </div>
                        <div class="form-group">
                            <label for="" class='form-label'>Total Marks Obtain</label>
                            <input type="text" name="marks" maxlength="3" class="form-control shadow-none rounded" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">City</label>
                            <select class="form-select shadow-none" aria-label="Default select example" name="city">
                                <option selected value="">Select</option>
                                <option value="Kolkata">Kolkata</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Pune">Pune</option>
                                <option value="Chennai">Chennai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="radio" name="gender" id="male" value="Male">
                                <label class="form-check-label" for="male">
                                    Male
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="radio" name="gender" id="female" value="Female">
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label d-block">Language Known</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lang" id="Bengali" value="Bengali">
                                <label class="form-check-label" for="Bengali">
                                    Bengali
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lang" id="English" value="English">
                                <label class="form-check-label" for="English">
                                    English
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input shadow-none" type="checkbox" name="lang" id="Hindi" value="Hindi">
                                <label class="form-check-label" for="Hindi">
                                    Hindi
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control shadow-none">
                        </div>
                        <div class="text-center my-2">
                            <button type="submit" id="submit" class="btn btn-outline-dark shadow-none">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div style="float: left;">
                    <h3 style="color: indianred;" class="text-center"><u>Students Data</u></h3>
                </div>
                <div style="float: right;">
                    <input type="text" name="search_name" id="search_name" class="form-control shadow-none rounded" placeholder="Search By Name" oninput="search_stu(this.value)">
                </div>
                <div class="table table-responsive">
                    <table class="table table-bodered">
                        <thead>
                            <tr>
                                <th scope="col">Sl.No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Age</th>
                                <th scope="col">Marks</th>
                                <!-- <th scope="col">City</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Languages</th> -->
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="stu-data">


                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <div class="modal fade" id="editForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Update Form</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="edit_student_form">
                            <div class="form-group">
                                <label for="" class='form-label'>Name</label>
                                <input type="text" name="u_name" class="form-control shadow-none rounded mb-1" required>
                            </div>
                            <div class="form-group">
                                <label for="" class='form-label'>Email</label>
                                <input type="text" name="u_email" class="form-control shadow-none rounded mb-1" required>
                            </div>
                            <div class="form-group">
                                <label for="" class='form-label'>Phone</label>
                                <input type="text" name="u_phone" class="form-control shadow-none rounded mb-1" required>
                            </div>
                            <div class="form-group">
                                <label for="" class='form-label'>Age</label>
                                <input type="text" name="u_age" maxlength="2" class="form-control shadow-none rounded mb-1" required>
                            </div>
                            <div class="form-group">
                                <label for="" class='form-label'>Total Marks Obtain</label>
                                <input type="text" name="u_marks" maxlength="3" class="form-control shadow-none rounded" required>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">City</label>
                                <select class="form-select shadow-none" aria-label="Default select example" name="u_city">
                                    <option selected value="">Select</option>
                                    <option value="Kolkata">Kolkata</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Pune">Pune</option>
                                    <option value="Chennai">Chennai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow-none" type="radio" name="u_gender" id="male" value="Male">
                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow-none" type="radio" name="u_gender" id="female" value="Female">
                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label d-block">Language Known</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow-none" type="checkbox" name="u_lang" id="Bengali" value="Bengali">
                                    <label class="form-check-label" for="Bengali">
                                        Bengali
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow-none" type="checkbox" name="u_lang" id="English" value="English">
                                    <label class="form-check-label" for="English">
                                        English
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input shadow-none" type="checkbox" name="u_lang" id="Hindi" value="Hindi">
                                    <label class="form-check-label" for="Hindi">
                                        Hindi
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="form-label">Image</label>
                                <input type="file" name="u_image" class="form-control shadow-none">
                            </div>
                            <section><img src="" id="disp_img" height="68px" width="68px"></section>
                            <input type="hidden" name="stu_id">
                            <div class="text-center my-2">
                                <button type="submit" id="update" class="btn btn-outline-success shadow-none">UPDATE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="ajax.js"></script>
    <script>
        function responce_msg(type, msg) {
            let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';

            let element = document.createElement('div');
            element.innerHTML = `
              <div class="alert ${bs_class} custom-alert" id="res_msg">
                    <strong>${msg}</strong>
              </div>
            `;
            document.body.append(element);
            setTimeout(removeMsg, 4000);

        }
        //setTimeout(remove_response_msg, 4000);

        function removeMsg() {
            document.getElementById('res_msg').remove();
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>