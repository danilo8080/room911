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
        <h1>Access to 911</h1>
        <form method="POST" action="{{route('employed.login')}}">
            @csrf
            
            <input type="text" name="user" placeholder="ID" required="required" />
            {!! $errors->first('user','<span class="help-block">:message</span><br>') !!}
            <br>
            <button type="submit" class="btn btn-primary btn-block btn-large">Login.</button>
        </form>
    </div>
</body>
</html>