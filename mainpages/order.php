<?php 
    session_start();

    //initializing values
    $accountname = $description = $price ="";

    include_once('../db.php');
    //initializing errors array
    $errors = array("error" => "", "success" => "");

    if (isset($_POST['orderProduct'])) {


      //getting session variables
      $buyerPhone = $_SESSION['phonenumber'];
      $fullname = $_SESSION['fullname'];

      $postId = $_POST['hiddenid'];
      $address = $_POST['address'];

      include_once('../db.php');
          

    
  
          $sql="SELECT * FROM adverts where id = '$postId' LIMIT 1";


                 $data2= mysqli_query($con,$sql);
                 $queryResults2= mysqli_num_rows($data2);
                 
       
                 
                  if($queryResults2 >0) {
                            while($row = mysqli_fetch_assoc($data2)) {

                            $seller = $row['accountName'];
                            $price = $row['price'];
                            $adtitle = $row['adtitle'];


                            $sql = "INSERT INTO orders(buyerPhone, fullname, address,seller,price,adtitle) 
                            values('$buyerPhone', '$fullname','$address','$seller','$price','$adtitle');";
                            $res = mysqli_query($con,$sql);
                            
                        
                            if($res ==1){
                        
                             //$errors['success'] ="Ad Creation Success.";
                             echo "<script>alert('Order Success.')</script>"; 
                             echo "<script>location.replace('../mainpages/order.php?postId=$postId');</script>"; 
                         
                             }


                            }
                        }
        


            
 
        
             

        }


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

    <div class="row">
<div class = "row" style="margin-left: 5%;text-align: centre;">

<div class="container">
             <div class="row">
                 <div class="col-sm-12" >
                     <h2 style='color: red;'>To order this product click the order button below:</h2>
     <?php 




        include_once('../db.php');
          
        $phonenumber = $_SESSION['phonenumber'];
        $postId = $_GET['postId'];
      
    
            $sql="SELECT * FROM adverts where id = '$postId'";

 
                   $data2= mysqli_query($con,$sql);
                   $queryResults2= mysqli_num_rows($data2);
                   
         
                   
                    if($queryResults2 >0) {
                              while($row = mysqli_fetch_assoc($data2)) {
 
                                
                           
                                echo "  
                                <div>
                                    <h3 style='color: green;'>".$row['adtitle']."</h3>
                                    
                                </div>

                                <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                                <img src='../files/adpics/adpics".$row['picurl']."' style = 'width: 80%; height:auto;'>
                                <p style='color: black;font-size:20px; '>".$row['description']."</p>
                               
                                <p style='color: black;font-size:20px;color:red; '>Ad By: ".$row['accountName']."</p>
                                <p style='color: black;font-size:17px;margin-top: -1%; '>Business Description: ".$row['Bizdescription']."</p>  
                                <p style='color: black;font-size:15px;color:blue;margin-top: -1%;'>Location: ".$row['location']."</p>
                               
                                <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  

                                <hr>
                                </div>

                               
                              ";
                              
                            }
                        }
       

                              
    ?>
                    
                 </div>
             </div>
         </div>

         <div class="row" style="margin: 3%;">
 <div class="col-sm-12">
    <form action = "order.php" method="post">
    <input type="hidden" name= "hiddenid" value=<?php $id= $_GET['postId']; echo $id; ?>> <!-- Hidden input-->
    <input class="passinput" type ="text" name="address" placeholder="Enter Adress where Product will be delivered" required value="<?php echo $accountname; ?>"><br><br>
     <button name="orderProduct" style="background-color: green;color:white;">Order Product</button>
    </form>

    <div><h5 style="color: red;"><?php echo $errors['error']; ?></h5></div>
     <div><h5 style="color: green;"><?php echo $errors['success']; ?></h5></div>

 </div> 

 </div>

 </div>







</div>



</body>
</html>