<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
    
    <div class="table-responsive">
        <table class="table table-bordered" id="employedsTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th >Date</th>
                    <th >Hour</th>
                </tr>
            </thead>
            <tbody class="tbodyRecord">
                @foreach($employed as $key => $empl)
                    <tr>
                        <td style="text-align: center">{{$empl->date}}</td>
                        <td style="text-align: center">{{$empl->hour}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
                               
</body>
</html>