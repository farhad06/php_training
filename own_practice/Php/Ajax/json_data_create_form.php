<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <form action="create_json_file_using_form_data.php" method="post">
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">City</label>
                <input type="text" name="city" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="number" name="age" class="form-control">
            </div>
            <div class="from-group">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</body>

</html>