<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/app.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>(login page)Login to your GCC account</title>
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div class="login-container-background">
      <div class="login-main-container">
        <img src="" alt="login-logo">
        <div class="login-content">
          <label class="login-label" for="userlogin">Community Member</label>
          <input class="login-input" type="text" name="email" id="loginemail" placeholder="Email" maxlength="20">
          <input class="login-input" type="password" name="password" id="loginpw" placeholder="Password" minlength="6" maxlength="20">
          <button class="login-button">LOGIN</button>
          <a class="login-forgot-password" href="">Forgot Password?</a>
          <a class="login-create-account" href="/register">Create your Account</a>
        </div>
      </div>
    </div>
  </body>
</html>