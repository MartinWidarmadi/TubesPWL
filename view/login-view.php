<!-- <head>
  <link rel="stylesheet" href="../css/login.css">
</head> -->

<div class="text-center mt-5">
  <form style="max-width: 300px; margin:auto;" method="POST">
    <h2 class="form-signin-heading">Please login</h2>
    <div class="mt-2">
      <input type="text" class="form-control" name="txtEmail" placeholder="Email Address" required autofocus autocomplete="off">
    </div>
    <div class="mt-2">
      <input type="password" class="form-control" name="txtPassword" placeholder="Password" required autocomplete="off">
    </div>
    <div class="mt-3 d-flex flex-row justify-content-around">
      <button class="btn btn-primary" style="width: 8rem;" type="submit" name="btnSubmit">Login</button>
      <a class="btn btn-primary" style="width: 8rem;" href="?menu=signup">Sign Up</a>
    </div>
  </form>
</div>