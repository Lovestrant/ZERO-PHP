<?php 
    session_start();


//unfollow code
    if(isset($_POST['deleteOrder'])){

        //include database connection
        include_once('../db.php');

        $id = $_POST['hiddenid'];
        $accountName = $_POST['hiddenaccName'];
        

        $sql="DELETE FROM orders where id = '$id'";



    $res = mysqli_query($con,$sql);

    if($res ==1){
        
 
    echo "<script>location.replace('../mainpages/vieworders.php?accountName=$accountName');</script>"; 

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
    
 

    <div class="col-sm-12" style="text-align:center;">
    
    <?php 
    $account = $_SESSION['acc_id'];
    echo"<button style='margin: 10px; color: red;'><a style='margin: 10px; color: red;' href = 'intobizacc.php?acc_id=$account'>This Account's Profile</a></button>";
    ?>

    
        <h4 id="h4">Orders From <label style='color:red;'><?php $account = $_GET['accountName']; echo "$account"; ?></label> Account:</h4>
<?php

  include_once('../db.php');
  $accountName = $_GET['accountName'];

  $sql2="SELECT * FROM orders where seller = '$accountName'";
  
  $data2= mysqli_query($con,$sql2);
  $queryResults2= mysqli_num_rows($data2);




        if($queryResults2 >0) {
           while($row = mysqli_fetch_assoc($data2)) {
           
            
                echo "
                    
                <div style='margin-bottom: 5%;text-align:centre;'>
               
                <div style='text-transform: uppercase;color: green;margin-left:10%; text-align:centre;
                margin-top: 4%;margin-bottom: 4%;'>
                <h2 style='text-decoration: underline;'>".$row['adtitle']."</h2>
                <div>
               

                    
                   
                    <p>Buyer Name: <label style='color:red;'>".$row['fullname']."</label></p>
                    <p>Buyer Phone: <label style='color: red;'>".$row['buyerPhone']."</label></p>
                    <p>Buyer Phone: <label style='color: red;'>".$row['price']."</label></p>

                    <form action = 'vieworders.php' method='post'>
                    <input type='hidden' name= 'hiddenid' value=".$row['id']."> 
                    <input type='hidden' name= 'hiddenaccName' value='$accountName'> 
                
                     <button name='deleteOrder' style='background-color: red;color:white;'>Delete Order</button>
                    </form>
                 
                 </div>
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