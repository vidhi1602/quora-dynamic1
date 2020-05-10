<?php
                  while ($row = mysqli_fetch_array($result)) {
                  ?>
                    <li> <a class="l1" href="?id=<?= $row["id"]?>&name=<?= $row["name"]?>"><?php echo $row["name"]; ?></a> </li>
                      <?php
                      }
?>