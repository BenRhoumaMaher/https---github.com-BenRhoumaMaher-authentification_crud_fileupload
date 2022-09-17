<?php
session_start();
require('app/app.php');
ensureauthentif();
$search = chars($_POST["search"]);

$sql = "SELECT * FROM crudalpha.users WHERE 
name LIKE '%$search%' OR lastname LIKE '%$search%' OR phone LIKE '%$search%' OR country LIKE '%$search%' ";

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
                <img src="./uploads/<?= $result -> image ?>" alt="no data">
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
            

