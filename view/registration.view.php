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
    <h2 class="text-center mt-5 display-1 fw-bold">Registration</h2>
    <form action="" method="post" class="pb-5">
      <div class="container mt-5">
        <div class="row">
          <div class="col-6">
            <label for="name" class="mb-2 text-success"
              >Name : <span class="text-danger me-2">*</span><span class="text-danger"><?= $errorname ?></span></label
            >
            <input
              type="text"
              name="name"
              id="name"
              class="form-control"
              placeholder="Name"
            />
          </div>
          <div class="col-6">
            <label for="Lastname" class="mb-2 text-success"
              >LastName : <span class="text-danger me-2">*</span><span class="text-danger"><?= $errorlastname ?></span></label
            >
            <input
              type="text"
              class="form-control"
              placeholder="LastName"
              name="lastname"
            />
          </div>
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
            <label for="phone" class="mb-2 text-success"
              >Phone : <span class="text-danger me-2">*</span><span class="text-danger"><?= $errorphone ?></span></label
            >
            <input
              type="text"
              class="form-control"
              placeholder="Phone"
              name="phone"
            />
          </div>
          <div class="col-12 mt-5">
            <label for="country" class="mb-2 text-success"
              >Country : <span class="text-danger me-2">*</span><span class="text-danger"><?= $errorcountry ?></span></label
            >
            <input
              type="text"
              class="form-control"
              placeholder="Country"
              name="country"
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
          <div class="col-6 mt-5">
            <label for="confirm" class="mb-2 text-success"
              >Confirm password : <span class="text-danger">*</span><span class="text-danger"><?= $confirmpass ?></span></label
            >
            <input
              type="password"
              class="form-control"
              placeholder="confirm your password"
              name="confirm"
            />
          </div>
        </div>
        <button class="btn btn-danger mt-2 w-25" name="done" type="submit">Done</button>
        <div class="mt-2">
          <p><span class="text-muted"> You have an account ?</span><a href="../authentification/login.php" class="text-decoration-none ps-2">Login</a> </p>
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
