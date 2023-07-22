<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="modal-header">
            <h1>Fill The Form</h1>
        </div>
        <form action="show.php" method="post">
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text" name="name" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Phone:</label>
                <input type="text" name="phone" maxlength=10 class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text" name="email" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Age:</label>
                <input type="text" name="age" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="">Gender:</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="Male" name="gender">Male
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="Female" name="gender">Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="">City:</label>
                <select name="city" id="" class="form-control">
                    <option value=" ">Select</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Pune">Pune</option>
                    <option value="Hyderabad">Hyderabad</option>
                </select>

            </div>
            <div class="form-group">
                <label for="">Language:</label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="Bengali" name="lang[]">Bengali
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="English" name="lang[]">English
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="Hindi" name="lang[]">Hindi
                    </label>
                </div>

            </div>
            <div class="form-group">
                <label for="">Password:</label>
                <input type="password" name="psw" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <button class="btn btn-sm btn-primary" name='save'>Submit</button>
            </div>

        </form>
    </div>

</body>

</html>