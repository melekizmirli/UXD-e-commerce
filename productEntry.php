<?php
session_start();
include 'Session.php';
        include 'connection.php';
        $id = null;
        if( isset( $_POST['id']) )
        {
            $id= $_POST['id']??0;
          
        }
        if(isset($_GET['id']) )
        {
            $id= $_GET['id'];
        }
        $name=$_POST['name']??'';
        $description=$_POST['description']??'';
        $categoryId=$_POST['categoryId']??'';
        $stock=$_POST['stock']??'';
        $price=$_POST['price']??'';
      // $photo=$_POST['photo'];
        $imgContent=null;
        if (count($_FILES) > 0) {
          if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
              $image = $_FILES['photo']['tmp_name']; 
              $imgContent = addslashes(file_get_contents($image)); 
          }
      }

      if ($id!=null && isset($_POST['id'])) {
            
            if( $id == 0) {
                $sql="insert into  products (name,description,categoryId,stock,price,photo,create_time) values ('$name','$description',$categoryId,$stock,$price,'$imgContent',now())";
                if (mysqli_query($con, $sql)) {
                    $id = mysqli_insert_id($con);
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    exit();
                }
                
            }else{
                $sql="update products set "
                    ." name = '$name',"
                    ." description = '$description',"
                    ." categoryId = $categoryId,"
                    ." stock = $stock,"
                    ." price = $price,"
                    ." photo = '$imgContent'"
                    ." where id = $id";

                    if (mysqli_query($con, $sql)) {
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                        exit();
                    }
            }
              
       }
       
       if($id>0) {
        $sql = "SELECT * from products u  WHERE u.id=$id";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $name=$row['name']??"";
        $description=$row['description']??"";
        $categoryId=$row['categoryId']??-1;
        $stock=$row['stock']??0;
        $price=$row['price']??0;
       }
       
   ?>
<?php 
include 'header.php';
?>
      <hr>
      <div class="container mt-3 border p-3" >
        <form name="Nameform" action="productEntry.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id??0 ?>">
          <div class="row jumbotron box8">
            <div class="col-sm-12 mx-t3 mb-4">
              <div class="row" style="display: block;text-align: center;">                
              <h2 class="text-center  mt-3">Product Entry</h2>
            </div>
            <div class="col-sm-6 form-group mx-auto">
              <label for="name-f">Name</label>
              <input type="text" class="form-control" name="name" id="name-f" value="<?php echo ($name) ?>"  required>
              <label for="name-f">Desciption</label>
              <input type="text" class="form-control" name="description" id="name-f" value="<?php echo ($description) ?>"  required>
        
              <?php
               echo "<label for='categoryId'>Category</label>";
               $result = $con->query("select id, name from categories");
               echo "<select  name='categoryId' class='form-control'><option value=-1 selected>select</option>";
               $gid=!isset($row['categoryId']) ? 0 : $row['categoryId'];
               while ($row = $result->fetch_assoc()) {
                 $id = $row['id'];
                 $name = $row['name']; 
                 $slct=$gid==$id? "selected":"";
                 echo '<option value="'.htmlspecialchars($id).'"  '.htmlspecialchars($slct).'>'.htmlspecialchars($name).'</option>';
               }
               echo "</select>";
              ?>
              <label for="name-f">Stock</label>
              <input type="number" class="form-control" name="stock" id="name-f" value="<?php echo($stock) ?>"  required>
              <label for="name-f">Price</label>
              <input type="number" class="form-control" name="price" id="name-f" value="<?php echo($price) ?>"  required>
              <label class="form-label" for="customFile">Upload photo</label>
              <input type="file" name="photo" class="form-control" id="customFile">
              <div class="col-sm-6 form-group mt-3">
              <button class="btn btn-primary float-right">Save</button>
            </div>
          </div>
      
          </div>
        </form>
      </div>
      <p></p>
<?php 
include 'footer.php';
?>
<?php
 mysqli_close($con);
?>

