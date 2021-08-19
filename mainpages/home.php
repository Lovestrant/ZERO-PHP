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
<link rel="stylesheet" type="text/css" href="../css/home.css">

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

    <div class="row">
<div class = "row" style="margin-left: 4%;">
    <p>Hello <?php $fullname = $_SESSION['fullname']; echo "<label style='color: red;font-size: 20px;'> $fullname</label>"; ?></p>

  <p style='color:purple;'>Recent adverts from you and your followers:</p>
    </div>

<div class="col-sm-12" id="homebody">
   <?php 


if($_SESSION['phonenumber']){

     include_once('../db.php');
  
     $phonenumber = $_SESSION['phonenumber'];

     $sql="SELECT * FROM followerstable WHERE phonenumber ='$phonenumber'";


     $data2= mysqli_query($con,$sql);
     $queryResults2= mysqli_num_rows($data2);
     

     
      if($queryResults2 >0) {
                while($row = mysqli_fetch_assoc($data2)) {
                    $accountbizName = $row['bizaccountName'];
                    if($queryResults2){
                        
    $sql="SELECT * FROM adverts ORDER BY ID DESC";


    $data2= mysqli_query($con,$sql);
    $queryResults2= mysqli_num_rows($data2);
    

    
     if($queryResults2 >0) {
               while($row = mysqli_fetch_assoc($data2)) {

                 if($row['phonenumber'] === $_SESSION['phonenumber']) {
                     echo "  
                     <div>
                     <h2 style='color: red;'>".$row['accountName']."</h2>
                         <h3 style='color: green;'>".$row['adtitle']."</h3>
                         
                     </div>

                     <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                     <img src='../files/adpics/adpics".$row['picurl']."' style = 'width: 80%; height:auto;'>
                     <p style='color: black;font-size:20px;margin-left:5%;margin-right:5%; '>".$row['description']."</p>  
                     <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                     <div>

                     <h4 style='color: red;'>Your own advert.</h4>

                     </div>
                     <hr>
                     </div>

                    
                   ";

                 }elseif($row['phonenumber'] != $_SESSION['phonenumber']) {
                     echo "  
                     <div>
                     <h2 style='color: red;'>".$row['accountName']."</h2>
                         <h3 style='color: green;'>".$row['adtitle']."</h3>
                         
                     </div>

                     <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                     <img src='../files/adpics/adpics".$row['picurl']."' style = 'width: 80%; height:auto;'>
                     <p style='color: black;font-size:20px; margin-left:5%;margin-right:5%;'>".$row['description']."</p>  
                     <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                     <div>
                     <a href='chat.php?seller=".$row['id']."'><button style='color: grey;margin-right: 10%;'>Chat With Seller</button></a>
                     <a href='order.php?postId=".$row['id']."'><button style='color: purple;'>Order</button></a>
                     </div>
                     <hr>
                     </div>

                    
                   ";

                 }
            

               
             }
         }

       

                }
            } }else{
                echo"<h3 style='color:purple;'>Follow sellers to see their adverts. Go to FindSellers now.</h3>";
                $sql="SELECT * FROM adverts ORDER BY ID DESC";


                $data2= mysqli_query($con,$sql);
                $queryResults2= mysqli_num_rows($data2);
                
            
                
                 if($queryResults2 >0) {
                           while($row = mysqli_fetch_assoc($data2)) {
            
                             if($row['phonenumber'] === $_SESSION['phonenumber']) {
                                 echo "  
                                 <div>
                                 <h2 style='color: red;'>".$row['accountName']."</h2>
                                     <h3 style='color: green;'>".$row['adtitle']."</h3>
                                     
                                 </div>
            
                                 <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                                 <img src='../files/adpics/adpics".$row['picurl']."' style = 'width: 80%; height:auto;'>
                                 <p style='color: black;font-size:20px; margin-left:5%;margin-right:5%;'>".$row['description']."</p>  
                                 <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                                 <div>
            
                                 <h4 style='color: red;'>Your own advert.</h4>
            
                                 </div>
                                 <hr>
                                 </div>
            
                                
                               ";
                             }
                            }
                            }
        
          }



            }else{
                echo "<script>alert('Your Session has expired.You need to login again')</script>";
                echo "<script>location.replace('../index.php')</script>";
             }
                      
     ?>
       
   </div>


  

    <div class= "row">
        <div class="col-sm-12">
        <?php include_once('footer.php'); ?>
        </div>
      
    </div>
    

</body>
</html>