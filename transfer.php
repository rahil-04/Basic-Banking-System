<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <title>Transaction Page</title>
  <style>
  *{
	     padding: 0;
	    margin: 0;
	    box-sizing: border-box;
      
    }

    .my-wrapper
    {
      background-image: url(img/backdrop_white.jpg);
      background-repeat: no-repeat;
    }
  
  .logo-cls
      {
        width : 100px;
        height : 30px;
      }

  .my-container
  {
   position : relative;    
  }

  .my-footer
    {
      background-color : #d6d6d6;
      position: absolute;
      bottom : 0px; 
      width : 100%;
    }

  .my-button
    {
      background-color : black;
      color : white;
      text-decoration : none;
      padding : 5px 10px;
      border : none;
      text-align : center;
      display : inline-block;
      transition : 0.3s
    }

    .my-button:hover
    {
      background-color : #eaeaea;
      color : black;
    }


  </style>
</head>

<body>

<!-- Including Nav Bar -->

<?php
include "navbar.php";
?>


<?php
  include_once 'database.php';
  $sql = "SELECT * FROM users";
  $result = mysqli_query($conn,$sql);
?>

<div class="my-wrapper">
  <div class="container text-center my-container">
      <br><br><br><br>
      <h1 style="font-family: Arial, Helvetica, sans-serif;"> User Details </h1>
       <br>
      <div class="row my-row">
        <div class="col my-col">
          <div class="table-responsive-sm">
            <table class = "table table-sm table-hover table-bordered table-striped">
              <thead class="thead-dark">
                  <tr>
                      <th class="text-center py-2">Id</th>
                      <th class="text-center py-2">Name</th>
                      <th class="text-center py-2">Mail</th>
                      <th class="text-center py-2">Balance</th>
                      <th class="text-center py-2">Operation</th>
                  </tr>
              </thead>

              <tbody>
               <?php
                  while($row = mysqli_fetch_assoc($result)){
               ?>
              
                <tr>
                    <td class="text-center py-1"><?php echo $row['id'] ?></td>
                    <td class="text-center py-1"><?php echo $row['name'] ?></td>
                    <td class="text-center py-1"><?php echo $row['email'] ?></td>
                    <td class="text-center py-1"><?php echo $row['balance'] ?></td>
                    <td class="text-center py-1"><a href="selectedUserDetail.php?id=<?php echo $row['id']?>"><button class="my-button" type="button">Transact</button></a></td>
                </tr>

                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>           
      </div>                 
  </div>
   <br><br>
  <footer class="text-center py-1 my-footer">
   <p>Developed by Rahil Das</p>
  </footer>
  </div>



 <!--
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
-->


</body>
</html>