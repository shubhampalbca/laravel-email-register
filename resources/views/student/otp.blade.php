<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .alert {
            color: #ff0000;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        @if (session('status'))
            <div class="alert">{{ session('status') }}</div>
        @endif
        <h2>OTP Verification</h2>

        <form action="{{url('verify-otp')}}" method="post">
            @csrf
            <label for="otp">Enter OTP:</label>
            <input type="text" id="otp" name="otp" maxlength="4" pattern="\d{4}" required>
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>
