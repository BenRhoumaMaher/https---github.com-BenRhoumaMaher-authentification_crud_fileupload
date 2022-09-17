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
  <body class="bg-dark vh-100 text-primary" style="overflow-y : hidden">
    <h2 class="text-center mt-5 display-1 fw-bold">Recover</h2>
    <form action="" method="post" class="pb-5">
        <div class="container mt-5 text-center">
        <div class="row">
          
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
        
      </div>
    </form>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
