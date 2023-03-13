<!DOCTYPE html>
<style>
    body{
        margin: 0;
        padding: 0;
        background-image: linear-gradient(to right, violet , rgba(255,0,0,0));
        font-size: 20px;
        font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif ;
        width: 100%;
        height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    }
    form{
         border: 2px solid rosybrown;
         display: flex;
         justify-content: center;
         align-items: center;
        margin: 100px;
        width: 30%;
        height: 50%;
        border-radius: 100px  20px   ;
        background-color: transparent;
    }
    input{
        display: block;
        margin: 10px;
        padding: 7px;
        border: none;
        width: 100%;
        height: 20%;
        background-color: white;
    }
   .submit-btn{
        display: block;
        margin: 10px;
        padding: 2px;
        border: none;
        color: black;
        cursor: pointer;
        border-radius: 4px ;
   } 
   a{
    font-size: 15px;
    margin-left: 200px;
   }
   h2{
    text-align: center;
   }
</style>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM1</title>
</head>
<body>
    <form action="validation_login.php" method="post">
<div class="form-structor">
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login">Log in</h2>
			<div class="form-holder">
                <input type="text" name="username" required placeholder="username">
				<input type="password" class="input" placeholder="Password" required name="password"/>
			</div>
			<button class="submit-btn" name="submit">Log in</button>
            <a href="form2.php">Sign up</a>
		</div>
	</div>
</div>
    </form>
</body>
</html>