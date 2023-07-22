<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="modal-header">
            <h1>Upload Files</h1>
        </div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="">PDF</label>
                <input type="file" name="pdf" class="form-control" accept="application/pdf">
            </div>
            <div class="form-group">
                <label for="">WORD</label>
                <input type="file" name="word" class="form-control">
            </div>
            <div class="form-group">
                <label for="">EXCEL</label>
                <input type="file" name="excel" class="form-control">
            </div>
            <div class="form-group">
                <button name='submit' class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>
</body>


</html>