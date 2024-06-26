<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family:'Jost', sans-serif;
            background: linear-gradient(to bottom, #0f0c29,#302b63,#24243e);
        }
        .main{
            width: 350px;
            height: 600px;
            background: red;
            overflow: hidden;
            background:url("1.jpeg") no-repeat center / cover;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #000;


        }

        #chk{
            display: none;

        }
        .signup{
            position: relative;
            width: 100%;
            height: 100%;
        }
        label{
            color: #fff;
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }
        input{
            width: 60%;
            height: 20px;
            background: #e0dede;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 10px;
            border: none;
            outline:none;
            border-radius: 5px;

        }
        button{
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: #573b8a;
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }
        button:hover{
            background: #6d44b8;
        }
        .login{
            height: 560px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: .8s ease-in-out;

        }
        .login label{
            color: #573b8a;
            transform: scale(.6);
        }
        #chk:checked ~ .login{
            transform: translateY(-600px);
        }
        #chk:checked ~ .login label{
            transform: scale(1);
        }
        #chk:checked ~ .signup label{
            transform: scale(.6);
        }
        
    </style>

</head>
<body>
    
    <div class="main">

        <input type="checkbox" name="" id="chk" aria-hidden="true">
        <div class="signup">
            <form action="/pengguna/insert" method="post">
                @csrf
                <label for="chk" aria-hidden="true">Sign Up</label>
                <input type="text" name="username" id="username" placeholder="username" required>
                <input type="password" name="password" id="password" placeholder="password" required>
                <input type="text" name="name" id="name" placeholder="Name" required>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="text" name="phone" id="phone" placeholder="Phone" required>
                <button>Sign Up</button>
            </form>

        </div>

        <div class="login">
            <form action="/pengguna/login" method="post">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="text" name="username" id="username" placeholder="username">
                <input type="password" name="password" id="password" placeholder="password">
                <button>Login</button>
            </form>
        </div>
    </div>

</body>
</html>