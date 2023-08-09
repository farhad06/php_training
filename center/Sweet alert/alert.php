<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweet Alert</title>
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css " rel="stylesheet">
</head>

<body>

    <button type="submit" id="submit" style="font-size: 15px; background-color: blueviolet;">Submit</button>

    <script>
        let btn = document.getElementById('submit');

        btn.addEventListener('click', function() {
            Swal.fire({
                title: 'Success!',
                text: 'Button Clicked',
                icon: 'success',
                confirmButtonText: "OK"
            });

        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
</body>

</html>