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
                <div class="card-text" class='table-responsive'>
                    <table class="table table-bordered" id="load-data">
                        <thead>
                            <th>Name</th>
                            <th>Jersey-No</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Salary</th>
                            <th>City</th>
                            <th>Role</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $.getJSON(
                    'fetch_table_data.php',
                    'GET',
                    function(data) {
                        //console.log(data);
                        $.each(data, function(key, value) {
                            //show each data in the table.
                            $('#load-data').append('<tr>' + '<td>' + value.name + '</td>' + '<td>' + value.jersey_number + '</td>' + '<td>' + value.phone + '</td>' + '<td>' + value.email + '</td>' + '<td>' + value.salary + '</td>' + '<td>' + value.city + '</td>' + '<td>' + value.role + '</td>' + '</tr>');
                        });
                    }

                );

            });
        </script>
    </div>
</body>

</html>