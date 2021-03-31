<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><!-- Optional theme -->
    
  </head>
 <body>
 <?php require_once 'process.php';?>
 


<?php
            if(isset($_SESSION['message'])):?>


            <div class="alert alert-<?=$_SESSION['msg_type']?>">
            <?php 
                 echo  $_SESSION['message'];
                 unset($_SESSION['message']);
           ?>

</div>
          
          
<?php endif ?>




 
<div class="container">
<?php $mysqli = new mysqli('localhost', 'root','', 'crud') or die(mysqli_error($mysqli)); 
        $result = $mysqli-> query ("SELECT * FROM data ") or die ($mysqli->error);  
 ?>
<div class="row justify-content-center">

    <table class="table">
    
          <thead>

                    <tr> 
                        <th> name </th>
                        <th>location</th>
                        <th coldspan="2"> action </th>
                    </tr>
          </thead>
    
<?php        while($row = $result->fetch_assoc()): ?>

        <tr>
            <td><?php echo $row['name'];     ?></td>
            <td><?php echo $row['location']; ?></td>
            <td>  

                      <a href="index.php?edit=<?php echo $row['id'];?>"  class="btn btn-info"> Edit</a>

                      <a href="process.php?delete=<?php echo $row['id'];?>"  class="btn btn-danger"> Delete</a>
                     
                     </td>
                    </tr>  

           <?php endwhile; ?>           
    </table>
</div>
<div class="row justify-content-center">
<form action="process.php" method="POST">
<div class="form-group">
<label>Name</label>

<input type="hidden" name="id"  class="form-control" 
          value="<?php echo $id;?>">
<input type="text" name="name"  class="form-control" 
          value="<?php echo $name;?>" placeholder="">
</div>
<div class="form-group">
<label>Localtion</label>
<input type="text" name="location"  class="form-control"
          value="<?php echo $location;?>" placeholder="">
</div>
<div class="form-group">
<button type="submit" name="save">Save</button>
</div>
</form>
</div>
</div>
</body>















    


  </body>
</html>