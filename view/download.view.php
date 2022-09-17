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
    <style>
      body {
        overflow-x : hidden;
      }
    </style>
    <title>Document</title>
  </head>
  <body class="bg-dark vh-100 text-primary">
        <span class="text-danger ms-5"><?= message() ?></span>
        <table
          class="table text-danger text-center mt-4 container table-striped"
        >
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">LastName</th>
              <th scope="col">Country</th>
              <th scope="col">Phone</th>
            </tr>
          </thead>
          <tbody>
            <?php
                $sql = "SELECT * FROM crudalpha.users";
                GLOBAL $dba;
                $smt = $dba->prepare($sql); 
                $smt->execute(); 
                $query = $smt->rowCount(); 
                $qu = $smt->fetchAll(PDO:: FETCH_OBJ); 
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
            </tr>
            <?php 
                     }
                }
            ?>
          </tbody>
        </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
  </body>
</html>
