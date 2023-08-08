<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div>
            <h2 class="text-center mt-2 fw-bold">Registration Form</h2>
        </div>
        <div class="bg-light shadow-sm rounded px-3 py-2">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label mt-1">Name</label>
                            <input type="text" name="name" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label mt-1">Email</label>
                            <input type="email" name="email" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="number" name="phone" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Age</label>
                            <input type="number" name="age" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Admission Class</label>
                            <input type="text" name="admission_class" class="form-control shadow-none">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label d-block">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input shadow-none" type="radio" name="gender" id="male"
                                value="male">
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input shadow-none" type="radio" name="gender" id="female"
                                value="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">City</label>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option selected>Select</option>
                                <option value="Kolkata">Kolkata</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Pune">Pune</option>
                                <option value="Chennai">Chennai</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <textarea name="address" rows="2" class="form-control shadow-none"
                                style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="" class="form-label">Photo</label>
                            <input type="file" class="form-control shadow-none" name="photo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="password" class="form-control shadow-none" name="password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control shadow-none" name="c_password">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="register" class="btn btn-dark shadow-none">REGISTER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>