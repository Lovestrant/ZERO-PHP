<?php 
    session_start();

    //initializing values
    $accountname = $description = $price ="";

    include_once('../db.php');
    //initializing errors array
    $errors = array("error" => "", "success" => "");

    if (isset($_POST['editbtn'])) {


      //getting session variables
      $phonenumber = $_SESSION['phonenumber'];
      $description = mysqli_real_escape_string($con, $_POST['description']);
      $adtitle = mysqli_real_escape_string($con, $_POST['adtitle']);
      $price = mysqli_real_escape_string($con, $_POST['price']);
      $picurl = $_FILES['file']['name'];
      $postid = $_POST['hiddenid'];

        if(!empty($adtitle) && !empty($description) && !empty($price)) {

            

            $picurl = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
            move_uploaded_file($tmp,"../files/adpics/adpics".$picurl);
            //upload second picture
            
            $picurl2 = $_FILES['file2']['name'];
            $tmp = $_FILES['file2']['tmp_name'];
            move_uploaded_file($tmp,"../files/adpics/adpics".$picurl2);

            $sql = "UPDATE adverts set adtitle = '$adtitle', description='$description',price='$price',picurl='$picurl',picurl2='$picurl2' where phonenumber= '$phonenumber' and id='$postid'";
        
            $res = mysqli_query($con,$sql);
            
        
            if($res ==1){
        
             //$errors['success'] ="Ad Creation Success.";
             echo "<script>alert('Adit Success.')</script>"; 
             echo "<script>location.replace('../mainpages/editpage.php?postId=$postid');</script>"; 
         
            }
         
        }else{
           // $errors['error'] ="Fill all required fields and choose a ad picture.";
            echo "<script>alert('Fill all required fields and choose a ad picture.')</script>"; 
            echo "<script>location.replace('../mainpages/editpage.php?postId=$postid');</script>"; 
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
                     <h2 style='color: blue;'>Croll down to get the Edit form:</h2>
     <?php 




        include_once('../db.php');
          
        $phonenumber = $_SESSION['phonenumber'];
        $postId = $_GET['postId'];
      
    
            $sql="SELECT * FROM adverts where phonenumber='$phonenumber' and id = '$postId'";

 
                   $data2= mysqli_query($con,$sql);
                   $queryResults2= mysqli_num_rows($data2);
                   
         
                   
                    if($queryResults2 >0) {
                              while($row = mysqli_fetch_assoc($data2)) {
                                if(!$row['picurl'] && !$row['picurl2']){
                                    echo "  
                                    <div>
                                        <h3 style='color: green;'>".$row['adtitle']."</h3>
                                        
                                    </div>
    
                                    <div style='margin-top: 1%; text-align:centre; margin-bottom: 5%;'>
                                    
                                    <p style='color: black;font-size:20px; '>".$row['description']."</p>  
                                    <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
    
                                    <hr>
                                    </div>
    
                                   
                                  ";

                                } elseif(!$row['picurl'] && $row['picurl2']){
                                    echo "  
                                    <div>
                                        <h3 style='color: green;'>".$row['adtitle']."</h3>
                                        
                                    </div>
    
                                    <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                                    <img src='../files/adpics/adpics".$row['picurl2']."' style = 'width: 80%; height:auto;'>
                                    <p style='color: black;font-size:20px; '>".$row['description']."</p>  
                                    <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
    
                                    <hr>
                                    </div>
    
                                   
                                  ";

                                } elseif($row['picurl'] && !$row['picurl2']){
                                    echo "  
                                    <div>
                                        <h3 style='color: green;'>".$row['adtitle']."</h3>
                                        
                                    </div>
    
                                    <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                                    <img src='../files/adpics/adpics".$row['picurl']."' style = 'width: 80%; height:auto;'>
                                    <p style='color: black;font-size:20px; '>".$row['description']."</p>  
                                    <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
    
                                    <hr>
                                    </div>
    
                                   
                                  ";

                                } elseif($row['picurl'] && $row['picurl2']){
                                    echo "  
                                    <div>
                                        <h3 style='color: green;'>".$row['adtitle']."</h3>
                                        
                                    </div>
    
                                    <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                                    <img src='../files/adpics/adpics".$row['picurl']."' style = 'width: 40%; height:auto;'>
                                    <img src='../files/adpics/adpics".$row['picurl2']."' style = 'width: 40%; height:auto;'>
                                    <p style='color: black;font-size:20px; '>".$row['description']."</p>  
                                    <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
    
                                    <hr>
                                    </div>
    
                                   
                                  ";

                                }
                           
                               
                              
                            }
                        }
       

                              
    ?>
                    
                 </div>
             </div>
         </div>

<div class="row" style="margin: 3%;">
 <div class="col-sm-12">
     <h3>Fill the form to edit; Change where necessary</h3>
    <form action = "editpage.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name= "hiddenid" value=<?php $id= $_GET['postId']; echo $id; ?>> <!-- Hidden input-->
 
    <input class="passinput" type ="text" name="adtitle" placeholder="Enter advert name" value="<?php echo $accountname; ?>"><br><br>
            <input class="passinput" type="text" name="description" placeholder="Enter advert Description"  value="<?php echo $description;?>"> <br><br>
            <input class="passinput" type="text" name="price" placeholder="Enter Price  (optional)" value="<?php echo $price; ?>"><br><br>

    <input type="file" name="file" accept="image/*" ><br><br>
    <input type="file" name="file2" accept="image/*" ><br><br>

    <button name="editbtn" style="background-color: red;color:white;">Edit Post</button>
    </form>
    <br><br>
    <div class="row">
    <div class="col-sm-12">
        <p>This will change this ad's cordinates to the current location; Cordinates determines your radius and who sees your ad. </p>
        <form action="editpage.php" method="post">
        <input type="hidden" name= "hiddenid" value=<?php $id= $_GET['postId']; echo $id; ?>> <!-- Hidden input-->
            <input type="hidden" name='lat' value="<?php $lat = $_SESSION['latitude']; echo $lat;?>">
            <input type="hidden" name='long' value="<?php $long = $_SESSION['longitude']; echo $long;?>">
            <button type="submit" name="changeLocation">Change Cordinates to this Ad</button>
        </form>
    </div>
    </div>

    <div><h5 style="color: red;"><?php echo $errors['error']; ?></h5></div>
     <div><h5 style="color: green;"><?php echo $errors['success']; ?></h5></div>

 </div> 

 </div>

 </div>







</div>



</body>
</html>

<?php
include_once('../db.php');
    
    if (isset($_POST['changeLocation'])) {


        //getting session variables
      
        $lat = mysqli_real_escape_string($con, $_POST['lat']);
        $long = mysqli_real_escape_string($con, $_POST['long']);
      
     
        $postid = $_POST['hiddenid'];
  
  
              $sql = "UPDATE adverts set latitude = '$lat', longitude='$long' where id='$postid'";
          
              $res = mysqli_query($con,$sql);
              
          
              if($res ==1){
          
               //$errors['success'] ="Ad Creation Success.";
               echo "<script>alert('Ad Cordinates changed success.')</script>"; 
               echo "<script>location.replace('../mainpages/editpage.php?postId=$postid');</script>"; 
           
              }
           
            }

?>