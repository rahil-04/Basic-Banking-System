<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <title>bank</title>
  <style>
    *{
	    padding: 0;
	    margin: 0;
	    box-sizing: border-box;
      
	    
    }

    .backdrop
    {
      background-color: #c697ce;
    }
    
     .my-container{
      
      height: 50%;
         
       
     }

     .my-row{
       
      height: 100%;
       
     }


     .my-img
     {
       height: 270px;
       
     }

     .my-img2
     {
       height: 155px;
       width: 135px;
       border-radius: 60%;
       
     }
     .my-button
     {
       background-color : #4CAF50;
       text-align : center;
       text-decoration : none;
       border : none;
       padding : 15px 32px;
       display : inline-block;
       transition-duration : 0.3s;
       font-weight : 500;
      }

      .my-button:hover
      {
        background-color : grey;
        color : white;
      }

      .my-footer
      {
        background-color : #d6d6d6;
        
    
      }

      .logo-cls
      {
        width : 100px;
        height : 30px;
      }

  </style>
</head>
<body>

  <!-- including the navbar -->
  <?php
    include "navbar.php";
  ?>       

  <!-- the first row -->
  <div class="backdrop">
    <br><br><br><br>
  <div class="container-fluid my-container">

    <div class="row my-row">
      <div style="font-family: Arial, Helvetica, sans-serif;" class="col text-center my-col pt-5">
          <h1><br>Welcome to</h1>
          <h2>DATABANK</h2>
          <h4>Banking made simplified</h4>
      </div>
      <div class="col text-center my-col">
        <img src="img/dbank.png" class="img-fluid my-img py-2">    
      </div>
    </div>
  </div>

  <!-- the second row -->
  <div class="container-fluid my-container">

    <div class="row my-row">
      <div class="col-6 text-center my-col">
      <img src="img/trlog.png" class="img-fluid my-img2">  
          <br><br>
          <a href="transfer.php"><button class="my-button">Pay</button></a>
      </div>
      <div class="col-6 text-center my-col">    
         <img src="img/history.png" class="img-fluid my-img2">
         <br><br>
         <a href="transactionHistory.php"><button class="my-button">Transaction History</button></a>
      </div>
    </div>
  </div>
 </div>

  <!-- Footer Section -->
  <footer class="text-center py-1 my-footer">
   <p>Developed by Rahil Das</p>
  </footer>

  <!--
  <a href="transfer.php"><button>Make Transaction</button></a>
  -->

</body>
</html>