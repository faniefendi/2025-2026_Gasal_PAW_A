<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background: #e6e6e6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box{
            background: white;
            width: 350px;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            text-align: center;
        }
        .login-box h2{
            margin-bottom: 20px;
            color: #2b6cb0;
        }
        .login-box input{
            width: 90%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        .btn{
            width: 96%;
            padding: 12px;
            background: #2196F3;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .btn:hover{
            background: #0b7dda;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Admin</h2>
    <form action="proses-login.php" method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button class="btn" type="submit">Login</button>
    </form>
</div>

</body>
</html>
