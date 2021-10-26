
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    

   <!-- estilos css-->
   <link rel="stylesheet" href="{{asset('css/main.css')}}">     


    <title>Acceso 911</title>

</head>
<body>
    <div class="login">
        <h1>Acceso al 911</h1>
        <form method="POST">
            @csrf
            <input type="text" name="user" placeholder="Username" required="required" />
            <input type="password" name="password" placeholder="Password" required="required" />
            <button type="submit" class="btn btn-primary btn-block btn-large">Login.</button>
        </form>
    </div>
</body>
</html>




