<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zero The market</title>

<!--Css link-->
<link rel="stylesheet" type="text/css" href="../css/bizacc.css">

     <!--bootstrap links-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>



</head>
<body>
<div class = "container-fluid">
    <div class = "row">
    
        <div class="col-sm-12">
        <?php include_once('header.php'); ?>
        </div>
            
    
    </div>

    <div class="col-sm-12">
       
<?php

  include_once('../db.php');
  $phonenumber = $_SESSION['phonenumber'];
  $fullname = $_SESSION['fullname'];


            $sql="SELECT * FROM chats where buyerPhonenumber= '$phonenumber' and fullname ='$fullname' group by sellerPhonenumber";
            
            $data2= mysqli_query($con,$sql);
            $queryResults2= mysqli_num_rows($data2);

        if($queryResults2 >0) {
           while($row = mysqli_fetch_assoc($data2)) {
               

            echo "
                    
            <div style='margin-bottom: 5%;text-align:centre;'>
           
            <div style='text-transform: uppercase;color: green;margin-left:10%; text-align:centre;
            margin-top: 4%;margin-bottom: 4%;'>
            <h4>".$row['fullname']."</h4>
            <p style='margin-top: -1%;'>".$row['sellerPhonenumber']."</p>
            <div>
           
                   
            </div>

            <div style='display:flex;margin-top: -1%;text-transform: none;margin-right: 10%;
            background-color: lightgreen; padding:0.5%;border-radius:10px;'>
            <a href='chatprofile.php?messageId=".$row['id']."'>
            <p>".$row['message']."</p>
            </a> 
                
               
               
            </div>
          
            
            </div>
            ";




           }
        }
      
                   

                

          
        

?>

    </div>


</div>




</body>
</html>