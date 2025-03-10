<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subjectText }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #222222;
            padding: 20px;
            border-radius: 8px;
            color: #ffffff;
            text-align: center;
        }

        .logo img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        .content {
            text-align: center;
            font-size: 16px;
            line-height: 1.6;
        }

        .btnnew {
            display: inline-block;
            background-color: #FA7823;
            color: #ffffff;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            margin-top: 20px;
        }

        .ii a[href] {
            color: #ffffff !important;
        }

        .footer {
            margin-top: 20px;
            font-size: 14px;
            opacity: 0.8;
        }

    </style>
</head>
<body>

    <div class="email-container">
        <div class="logo">
            <img src="https://dbaconsultancy.in/assets/images/dbalogo.png" alt="Company Logo">
        </div>

        <h3>{{ $subjectText }}</h3>

        <div class="content">
            <p>{!! nl2br(e($messageBody)) !!}</p>
        </div>

        <a href="http://127.0.0.1:8000/user/changepassoword/{{$encryptedEmail}}" class="btnnew">Reset Password</a>

        <p class="footer">If you did not request a password reset, please ignore this email.</p>
    </div>

</body>
</html>
