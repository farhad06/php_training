<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        table {
            margin: auto;
        }
      
    </style>
</head>

<body>
    <div class="main">
        <table>
            <caption style="margin-bottom: 8px;">Login Form</caption>
            <form method="POST" action="{{url('/loggedin')}}">
                @csrf
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit">Login</button></td>
                </tr>
            </form>
        </table>
    </div>

</body>

</html>