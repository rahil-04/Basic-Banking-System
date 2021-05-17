<?php
    include_once 'database.php';

    //code for updating the database after a transaction
    
    if(isset($_POST['submit']))
    {
      //getting values from the SuperGlobals
      $from = $_GET['id'];
      $to = $_POST['to'];
      $amount = $_POST['amount'];

      //the neccessary sql commands
      
      //To get the details of the sender
      $sql = "SELECT * FROM users WHERE id=$from";
      $querry = mysqli_query($conn,$sql);
      $sender = mysqli_fetch_assoc($querry);

      //To get the details of the reciever
      $sql = "SELECT * FROM users WHERE id=$to";
      $querry = mysqli_query($conn,$sql);
      $reciever = mysqli_fetch_assoc($querry);

      //NECESSARRY ERROR HANDLING BEFORE TRANSACTION OCCURS

      //first to check if user entered '0' as amount
      if($amount==0)
      {
        echo "<script>";
        echo "alert('Sorry, zero value detected')";  
        echo "</script>";
      } 

      //second to check for negative values
      elseif($amount<0)
      {
        echo "<script>";
        echo "alert('Sorry, Negative number detected')";
        echo "</script>";
      }
      //last to check if sufficient balance is there
      elseif ($amount > $sender['balance']) 
      {
        echo "<script>";
        echo "alert('Sorry, Insufficient balance')";
        echo "</script>";
      }

      //Now updation can be done
      else
      {
        //deduct the amount from the sender
        $updatedBalance = $sender['balance'] - $amount;
        $sql="UPDATE users SET balance=$updatedBalance WHERE id=$from";
        mysqli_query($conn,$sql);

        //adding the amount in the reciever
        $updatedBalance = $reciever['balance'] + $amount;
        $sql = "UPDATE users SET balance = $updatedBalance WHERE id=$to";
        mysqli_query($conn,$sql);

        //now for transaction history
        $sender_transact = $sender['name'];
        $reciever_transact = $reciever['name'];
        $sql = "INSERT INTO history (`sender`,`receiver`,`balance`) VALUES ('$sender_transact','$reciever_transact','$amount')";
        $results = mysqli_query($conn,$sql);

        if($results)
        {
          echo "<script> alert('Transaction Successful');
                window.location='transactionhistory.php';
                </script>";
        }
        else
        {
          echo mysqli_error($conn);
        }

        $updatedBalance = 0;
        $amount = 0;
      }
    }
?>

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
        font-family :Arial, Helvetica, sans-serif;
	    
      }

     .backdrop
    {
       background-image: url(img/backdrop_white.jpg);
      background-repeat: no-repeat;
    }
    

  .logo-cls
      {
        width : 100px;
        height : 30px;
      }

  .my-button
      {
        background-color : black;
        color : white;
        padding : 5px 25px;
        text-decoration : none;
        border : none;
        text-align : center;
        display : inline-block;
        transition : 0.3s;
      }

  .my-button:hover
      {
        background-color : #eaeaea;
        color : black;
      }

  .my-wrapper
      {
        position: relative;
      }

  .my-footer
      {
        background-color : #d6d6d6;
        position: absolute;
        bottom : 0px;
        width : 100%;
      }

  </style>
</head>

<body>

<!-- Including Nav Bar --> 

<?php
  include "navbar.php";
?>

       <!--PHP required for displaying the user selected-->
       <?php
          $s_id =$_GET['id'];
          $sql = "SELECT * FROM users WHERE id=$s_id";
          $result = mysqli_query($conn,$sql);
            if(!$result)
              {echo "Error occured";}
          $row = mysqli_fetch_assoc($result);
       ?>
       
      <!--displaying the table-->
<div class="backdrop">

  <div class="my-wrapper">
  <div class="container">  
        <br><br><br><br>
       <h1 class="text-center">Transaction Page</h1>
       <br>
       <form method="post" name="credit">
    <table class="table table-bordered table-stripped table-condensed">
      <thead class="thead-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Balance</th>
      </tr>
      </thead>
      <tr>
        <th><?php echo $row['id'] ?></th>
        <th><?php echo $row['name'] ?></th>
        <th><?php echo $row['email'] ?></th>
        <th><?php echo $row['balance'] ?></th>
      </tr>
    </table>
  </div>


        <br><br>
        
      <div class="container"> 
      <label>Transfer to: </label>
      <br>
     <select name="to" class="form-control" required>
        <option value="" disabled selected>Choose</option>
         
        <!--php to view the available users-->

         <?php
            $s_id = $_GET['id'];
            $sql = "SELECT * FROM users WHERE id!=$s_id";
            $result = mysqli_query($conn,$sql);
            if(!$result)
            {
              echo "DATABASE ERROR";
            }
            while ($row=mysqli_fetch_assoc($result)){
          ?>

          <option class="table" value="<?php echo $row['id'] ?>">
              <?php echo $row['name'] ?> (Balance: <?php echo $row['balance']?>)
          </option>

          <?php
            }
          ?>
        
      </select>
          
          <br><br>
      <label>Amount: </label>
      <br>
      <input type="number" class="form-control" name="amount" required>
      <br><br>
         <div class="text-center">
         <button class="my-button" type="submit" name="submit">Transfer</button>
         </div>
      </div>

  </form>
  </div>
  <br><br><br><br>
  <footer class="text-center py-1 my-footer">
   <p>Developed by Rahil Das</p>
  </footer>

 </div>

  </body>
  </html>