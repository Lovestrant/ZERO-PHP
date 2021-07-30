<?php 
    session_start();

    //initializing values
    $accountname = $description = $price ="";

    include_once('../db.php');
    //initializing errors array
    $errors = array("error" => "", "success" => "");

    if (isset($_POST['createBiz'])) {


      //getting session variables
      $phonenumber = $_SESSION['phonenumber'];
      $description = mysqli_real_escape_string($con, $_POST['description']);
      $adtitle = mysqli_real_escape_string($con, $_POST['adtitle']);
      $price = mysqli_real_escape_string($con, $_POST['price']);
      $picurl = $_FILES['file']['name'];
      $accId = $_POST['hiddenid'];

      $sql = "SELECT * FROM bizaccounts where id='$accId'";
      $data2= mysqli_query($con,$sql);
      $queryResults2= mysqli_num_rows($data2);
      

      
       if($queryResults2 >0) {
                 while($row = mysqli_fetch_assoc($data2)) {
              
                  $accountName = $row['accountName'];
                  $Bizdescription = $row['description'];
                  $location = $row['location'];

        if(!empty($description) || !empty($description) || !empty($profileurl)) {



            $picurl = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmp,"../files/adpics/adpics".$picurl);

            $sql = "INSERT INTO adverts(phonenumber, accId, adtitle,description,picurl,price,accountName,Bizdescription,location) 
            values('$phonenumber', '$accId','$adtitle','$description','$picurl','$price','$accountName','$Bizdescription','$location');";
            $res = mysqli_query($con,$sql);
            
        
            if($res ==1){
        
             //$errors['success'] ="Ad Creation Success.";
             echo "<script>alert('Ad Creation Success.')</script>"; 
             echo "<script>location.replace('../mainpages/createadvert.php?acc_id=$accId');</script>"; 
         
             }
          
            }else{
                // $errors['error'] ="Fill all required fields and choose a ad picture.";
                 echo "<script>alert('Fill all required fields and choose a ad picture.')</script>"; 
                 echo "<script>location.replace('../mainpages/createadvert.php?acc_id=$accId');</script>"; 
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

    
        <div class="col-sm-12" id="bizaccform">
        
        <h4>Create advert:</h4>
            <form  action="createadvert.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name= "hiddenid" value=<?php $id= $_GET['acc_id']; echo $id; ?>> <!-- Hidden input-->

            <input class="passinput" type ="text" name="adtitle" placeholder="Enter advert name" value="<?php echo $accountname; ?>"><br><br>
            <input class="passinput" type="text" name="description" placeholder="Enter advert Description"  value="<?php echo $description;?>"> <br><br>
            <input class="passinput" type="text" name="price" placeholder="Enter Price  (optional)" value="<?php echo $price; ?>"><br><br>

          <label style="color: red;border: 3px solid pink;"> <input style="display: none;" type="file" name="file" accept="image/*" >Choose Ad Picture</label> <br><br>
            
                     <!--Error display-->
        <div><h5 style="color: red;"><?php echo $errors['error']; ?></h5></div>
        <div><h5 style="color: green;"><?php echo $errors['success']; ?></h5></div>

          <button name="createBiz">Create Advert</button>
        
            </form>
        </div>
    </div>
</div>




</body>
</html>