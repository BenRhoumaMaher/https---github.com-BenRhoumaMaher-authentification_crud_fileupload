<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <title>Document</title>
  </head>
  <body class="bg-dark vh-100 text-primary">
    <h2 class="text-center mt-5 display-1 fw-bold">Connexion</h2>
    <form action="" method="post" class="pb-5">
        <div class="container mt-5">
          <span class="text-danger"><?= $errorcredentials ?></span>
          <span class="text-danger"><?= message() ?></span>
          <span class="text-success"><?= $erroractivate ?></span>
        <div class="row">
          
          <div class="col-6 mt-5">
            <label for="email" class="mb-2 text-success"
              >Email : <span class="text-danger me-2">*</span><span class="text-danger"><?= $erroremail ?></span><span class="text-danger"><?= $errorexist ?></span></label
            >
            <input
              type="text"
              class="form-control"
              placeholder="Email"
              name="email"
            />
          </div>
          
          <div class="col-6 mt-5">
            <label for="password" class="mb-2 text-success"
              >Password : <span class="text-danger me-2">*</span><span class="text-danger"><?= $errorpassword ?></span></label
            >
            <input
              type="password"
              class="form-control"
              placeholder="enter your password"
              name="password"
            />
          </div>
        
        </div>
        <button class="btn btn-danger mt-2 w-25" name="done" type="submit">Done</button>
        <div class="mt-2">
          <input type="radio" name="remember" id=""><span class="ps-2 text-success">Remember me</span> 
          <span class="ps-4"><a href="forgot.php" class="text-decoration-none"> Forgot Password ?</a></span>
        </div>
        <div class="mt-2">
          <p><span class="text-muted"> You don't have an account ?</span><a href="registration.php" class="text-decoration-none"> Register</a></p>
        </div>
      </div>
    </form>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
