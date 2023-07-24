<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->

    <title>Sign-up</title>
</head>

<body>
    <div class="container">
        <h1 class="modal-header">Fill the Form</h1>
        <form action="registration.php" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" name="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="number" name="age" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Gender:</label> &nbsp;
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="Male">Male
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="Female">Female
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" value="Other">Other
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Language:</label>&nbsp;
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="Bengali" name="ch[]">Bengali
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="English" name="ch[]">English
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="Hindi" name="ch[]">Hindi
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="">City</label>
                <select class="form-control" id="City" name="city">
                    <option value="">Choose a City</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Mumbai">Mumbai</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Sign UP</button>
            </div>
        </form>
    </div>

</body>

</html>