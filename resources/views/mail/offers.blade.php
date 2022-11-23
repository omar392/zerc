<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Employment Order From The Website</title>
</head>
<body>

        <p>Dears, My Name Is : {{$details['name']}}</p> <br>
        <p>Birth Date Is : {{ $details['date'] }}</p><br>
        <p>Phone Is : {{$details['phone']}} , My Age : {{$details['age']}}</p><br>
        <p>My Passport Id Is : {{ $details['passport_id'] }}</p><br>
        <p>My National Id Is : {{ $details['national_id'] }}, Place Of Residence: {{ $details['place_of_residence'] }}</p><br>
        <p>NEXT OF KIN'S INFORMATION</p><br>
        <p>My Name : {{ $details['alt_name'] }}</p><br>
        <p>Phone : {{ $details['alt_phone'] }}</p><br>
        </div>

        <div style="width:90%; margin:0 auto; padding-top:15px;font-family: Arial, Helvetica, sans-serif;font-size: large;margin-bottom:50px;">
          <p>Please treat email with care - not reply email</p>
        </div>


</body>
</html>
