
<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">
  <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    />
  <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 

</head>
<body>
<a href="./home-page.php"> <button class="close-home"><i class="fa-solid fa-x"></i></button></a>
  
 
<div class="main-box">
 
    <form  method="POST" action="login.inc.php" class="form-login">
    <h1>Login</h1>
      <label for="username" class="label-login">
        username:
      </label>
      <input type="text" id="username" name="email" class="box"></br></br> 
      <label for="pwd" class="label-login">
        Password:
      </label>
      <input type="password" id="password" name="password" class="box" ></br></br>
      <a href="#" class="a">Forgot password?</a>
      <input type="submit" id="submit-btn-login" value="Login" name="submit">
      <p >Dont have an Account? <a href="#"> Sign UP</a></p>
      
      
    </form>
    <div class="form-pic">

  <dotlottie-player src="https://lottie.host/88ac892a-8c3c-4330-b266-adbbeee86c7c/xvx1zArt0t.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay class="lottie-img"></dotlottie-player>
  
    </div>

    <!-- <img src="./assets/image copy 21.png" alt=""> -->
    <?php
if(isset($_GET["error"])){
if($_GET["error"]== "emptyinput"){
  echo "<p>Fill in all fields</p>";
}else if($_GET["error"] == "wronglogin"){
echo "<p>Incorrect login infomation</p>";
}
}
?>

  </div>


  
</body>
</html>
