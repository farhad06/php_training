<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-2"><em>Load Data Using AJAX</em></h2>
        <label for="" class="form-label fw-bold">Select Brand</label>
        <select id="dataSelect" class="form-select shadow-none mb-3">
            <option value="">Select Brand</option>
        </select>
        <div id="result"></div>
        <label for="" class="form-label fw-bold">Select Model</label>
        <select name="" id="selectmodel" class="form-select shadow-none">
            <option value="">Select Model</option>
        </select>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'fetch.php', // Replace with the path to your PHP script
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    var select = $('#dataSelect');

                    $.each(data, function(index, item) {
                        //console.log(item.b_name);
                        select.append('<option value="' + item.b_name + '">' + item.b_name + '</option>');
                    });
                },
                // error: function(xhr, status, error) {
                //     console.error('Error: ' + status);
                // }
            });

            $('#dataSelect').on('change', function() {
                var selectBrand = $(this).val();
                var modelselect = $('#selectmodel');
                $.ajax({
                    url: 'get_model.php',
                    type: 'GET',
                    data: {
                        brand: selectBrand
                    },
                    dataType: 'json',
                    success: function(data) {
                        //var c_data = JSON.stringify(data);
                        console.log(data);
                        // modelselect.empty();
                        // modelselect.append('<option value="">Select Model</option>');
                        // var dataArray = JSON.parse(data.substring(data.indexOf('[')));

                        // // Access the 'b_model' values in a loop
                        // for (var i = 0; i < dataArray.length; i++) {
                        //     var bModel = dataArray[i].b_model;
                        //     //console.log(bModel);
                        //     modelselect.append('<option value="' + bModel + '">' + bModel + '</option>');
                        // }
                        // $.each(data, function(index, model) {
                        //     modelselect.append('<option>' + model.b_model + '</option>');
                        // });
                    }

                });

            });

        });
    </script>
</body>

</html>