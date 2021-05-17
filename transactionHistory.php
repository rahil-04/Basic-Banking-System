<?php
  include_once 'database.php';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <title>Transaction Page</title>
  <style>
  .logo-cls
      {
        width : 100px;
        height : 30px;
      }

      .my-footer
      {
        background-color : #d6d6d6;
        width : 100%;
        
      }  
    
    .my-wrapper
    {
      
      background-image: url(img/backdrop_white.jpg);
      background-repeat: no-repeat;
    
    
    }

  </style>
  
</head>
<body>
  <!--navbar-->

    <?php
      include "navbar.php";
    ?>

      <?php
          $sql = "SELECT * from history";
          $querry = mysqli_query($conn,$sql);
      ?>

      

      <!--Displaying the transaction table-->
  <div class="my-wrapper">
    <br><br><br><br>  
      <div class="container my-container">
        <h1 class="text-center">Transaction History </h2>
        <br>
        <div class="table-responsive-sm">
          <table class="table table-bordered table-striped table-condensed">
            <thead class="thead-dark">
              <tr>
                <th>Sl No</th>
                <th>Sender</th>
                <th>Reciever</th>
                <th>Time</th>
              </tr>
            </thead>

            <tbody>
              <?php while($row=mysqli_fetch_assoc($querry)){ ?>
                <tr>
                  <td><?php echo $row['sno']; ?></td>
                  <td><?php echo $row['sender']; ?></td>
                  <td><?php echo $row['receiver']; ?></td>
                  <td><?php echo $row['datetime']; ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
         <br><br>
    <footer class="text-center py-1 my-footer"><p>Developed by Rahil Das</p></footer>
  </div>
</body>
</html>