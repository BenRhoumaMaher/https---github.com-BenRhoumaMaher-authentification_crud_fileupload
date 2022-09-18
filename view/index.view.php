<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css"
    />
    <style>
      .but {
        transform: translate(-70px,-30px);
      }
      h2 {
        transform: translateX(70px);
      }
      td {
        vertical-align : middle;
      }
      body {
        overflow-x : hidden;
      }
      .pagination {
        margin-left: 100px;
      }
    </style>
  </head>
  <body class="bg-dark vh-100 text-primary">
    <a href="authentification/logout.php">
      <button class="btn btn-danger float-end me-5 but" type="button">
        Logout
      </button>
    </a>
      <h2 class="text-center mt-5 display-1 fw-bold">Table</h2>
      <div class="d-flex justify-content-between container mb-5">
        <a href="./crud/add.php">
          <button class="btn btn-secondary ms-5 mt-4">Add</button>
        </a>
        <a href="./download.php">
          <button class="btn btn-warning ms-5 mt-4">Download</button>
        </a>
      </div>
      <div class="mb-3 w-25 mx-auto">
        <input type="text" class="form-control" placeholder="Search Here" id="search" autocomplete ='off'>
      </div>
      <form action="" method="post">
        <span class="text-danger ms-5"><?= message() ?></span>
        <table
          class="table text-danger text-center mt-4 container table-striped"
        >
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Image</th>
              <th scope="col">Name</th>
              <th scope="col">LastName</th>
              <th scope="col">Country</th>
              <th scope="col">Phone</th>
              <th scope="col">Update</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody id="here">
            <?php
                $qr = "SELECT * FROM crudalpha.users LIMIT $startingrow,$perpage";
                GLOBAL $dba;
                $smtt = $dba->prepare($qr); 
                $smtt->execute();
                $query = $smtt->rowCount(); 
                $qu = $smtt->fetchAll(PDO:: FETCH_OBJ); 
                if($query > 0)
                { 
                foreach($qu as $result)
                { 
                ?>
            <tr>
              <td class="text-primary">
                <?= chars($result ->
                id); ?>
              </td>
              <td>
                  <img src="./uploads/<?= $result -> image ; ?>" alt="no data">
              </td>
              <td class="text-primary">
                <?= chars($result ->
                name); ?>
              </td>
              <td class="text-primary">
                <?= chars($result ->
                lastname); ?>
              </td>
              <td class="text-primary">
                <?= chars($result ->
                country); ?>
              </td>
              <td class="text-primary">
                <?= chars($result ->
                phone); ?>
              </td>
              <td>
                <a
                  href="crud/update.php?id=<?= chars($result -> id); ?>"
                  class="text-decoration-none text-success"
                  >Update</a
                >
              </td>
              <td>
                <a
                  href="crud/delete.php?id=<?= chars($result -> id); ?>"
                  class="text-decoration-none text-danger"
                  >Delete</a
                >
              </td>
            </tr>
            <?php 
                     }
                }
            ?>
          </tbody>
        </table>
      </form>
      <ul class="pagination pb-5">
        <?php
      for($page = 1; $page<$numpages; $page++){
        echo'<li class="page-item "><a href="./index.php?page='.$page.'" class="page-link">'.$page.'</a></li>';
      }
      ?>
      </ul>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    <script>
      $(document).ready(function(){
        $('#search').on("keyup",function(){
          var search = $(this).val();
          $.ajax({
            method: 'POST',
            url:'./search.php',
            data:{search:search},
            success:function(response)
            {
              $("#here").html(response);
            }
          });
        });
      });
    </script>
  </body>
</html>
