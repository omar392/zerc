<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Email From The Website</title>
</head>
<body>
    <div style="text-align: center;">
        <div style="background: linear-gradient(to right, rgb(42, 88, 189), rgb(73, 138, 212));height:40px; border-radius: 10px; width:90%; margin:0 auto;box-shadow: 0 5px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;">
          <span style="color:white; font-size: large;font-family: Arial, Helvetica, sans-serif;line-height: 40px; vertical-align: middle;">The Content</span>
        </div>
        <div style="width:90%; margin:0 auto; padding-top:15px;font-family: Arial, Helvetica, sans-serif;font-size: large;margin-bottom:50px;">
        <h2>
        <p style="color:red">Dears, My Name Is : {{$details['name']}}</p> <br>
        <p>Email Is : {{ $details['email'] }}</p><br>
        <p> Phone Is : {{$details['phone']}}</p><br>
        <p> Subject Is : {{$details['subject']}}</p>
        <p> Message Is : {{$details['message']}}</p>
        </h2>
        </div>


        <div style="width:90%; margin:0 auto; padding-top:15px;font-family: Arial, Helvetica, sans-serif;font-size: large;margin-bottom:50px;">
          <p>Please treat email with care</p>
        </div>

   
</body>
</html>
