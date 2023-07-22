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
        <div class="modal-header">
            <h1>Read JSON Data Using AJAX.</h1>
        </div>
        <div class="card">
            <h5 class="card-header">JSON Data</h5>
            <div class="card-body">
                <!-- <h5 class="card-title">Special title treatment</h5> -->
                <p class="card-text" id="load-data">

                </p>
                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $.ajax({
                    url: "https://jsonplaceholder.typicode.com/posts", // this is the name of the URL where I fetch JSON data.
                    type: "GET",
                    success: function(data) {
                        console.log(data);
                        $.each(data, function(key, value) {
                            $('#load-data').append(value.id + "<br>" + value.title + "<br>");
                            // $('#load-data').append('<tr><td>' + value.id + '</td></tr>')
                            // $('#load-data').append('<tr><td>' + value.title + '</td></tr>')

                        });
                    }
                });
            });
        </script>
    </div>
</body>

</html>