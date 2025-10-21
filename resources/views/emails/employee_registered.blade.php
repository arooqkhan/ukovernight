<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Registered</title>
</head>
<body>
    <h1>Welcome, {{ $employee->first_name }}!</h1> <!-- Accessing first_name directly -->
    <p>Dear {{ $employee->first_name }} {{ $employee->last_name }},</p>
<<<<<<< HEAD
    <p>Congratulations! You have been enrolled as an employee ({{$employee->role}}) at UK Overnight Limited. 
        Please use this link <a href="https://hrmfiles.com/">Sign in to the system</a> in to the system using your email <strong>{{$email}}</strong> and password <strong>{{$password}}</strong>.
=======
    <p>Congratulations! You have been enrolled as an employee ({{$employee->role}}) at The Fan Services Limited. 
        Please use this link <a href="https://hrm.thefanservices.co.uk/">Sign in to the system</a> in to the system using your email <strong>{{$email}}</strong> and password <strong>{{$password}}</strong>.
>>>>>>> 3b7a978bb23a960f14109a463d57bd3e5d10d8f6
    </p>
    
    <p>Thank you,</p>
    <p>The Company Team</p>
</body>
</html>
