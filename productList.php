<?php  
session_start();
include 'connection.php';
include 'header.php';
$catid=0;
if(isset($_GET['catid']) )
        {
            $catid= $_GET['catid'];
        }
?>
<div class="container">

          <div class="row">
          <?php
               $result = $con->query("SELECT * FROM products where categoryId=$catid LIMIT 9");
               while ($row = $result->fetch_assoc()) {
                 $id = $row['id'];
                 $name = $row['name']; 
                 $imagest=$row['photo'];
                echo "<div class='col-md-4'>";
                echo "<div class='card mb-4 box-shadow'>";
                echo '<img class="card-img-top" src="data:image;base64,'.base64_encode($imagest).'"  style="height: 300px; width: 100%; display: block;" />';
                echo "    <div class='card-body'>";
                echo "        <p class='card-text'>".$row['description']."</p>";
                echo "        <div class='d-flex justify-content-between align-items-center'>";
                echo "        <div class='btn-group'>";
                echo "            <a href='productdetail.php?id=$id' class='btn btn-sm btn-outline-secondary'>Detail</a>";
                echo "        </div>";
                echo "        <small class='text-muted'>9 mins</small>";
                echo "        </div>";
                echo "    </div>";
                echo "    </div>";
                echo "</div>  ";
                            }
                ?>
          </div>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</div>
 
<?php 
include 'footer.php';
?>