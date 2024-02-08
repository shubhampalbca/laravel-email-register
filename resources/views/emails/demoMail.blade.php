



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Verify Email</title>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
      .resized-image {
        
        height: 70px;
        width: 70px;
       margin-bottom: 10px;
       border-radius: 90%;
    object-fit: fill;
  }
    </style>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-lg-12">
    <img src="{{ asset('public/logo.jpg') }}" class="resized-image">
      <h4>Shubham pal</h4>
      <h2>Verify Your Email Address</h2>
      
      <p>To verify your email address,use this security code:<strong>{{ $mailData['otp'] }}</strong></p>
      <p>If you didn't request this code,you can safely ignore this email.Someone else might have typed your email address by mistake.</p>
        <p style="text-align: right;">{{ $mailData['name'] }}</p>

      
    </div>
    
  </div>
</div>
</body>
</html>