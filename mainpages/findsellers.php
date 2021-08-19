<?php 
    session_start();


//unfollow code
    if(isset($_POST['unfollow'])){

        //include database connection
        include_once('../db.php');

        //get session variables
        $fullname= $_SESSION['fullname'];
        $phonenumber = $_SESSION['phonenumber'];
        //get form variables

        $bizaccountName = $_POST['hiddenName'];
        $accountId = mysqli_real_escape_string($con, $_POST['hiddenid']);

        $sql="DELETE FROM followerstable where phonenumber = '$phonenumber' 
        and bizaccountName = '$bizaccountName' and accountId = '$accountId'";



    $res = mysqli_query($con,$sql);

    if($res ==1){
        
 
    echo "<script>location.replace('../mainpages/findsellers.php');</script>"; 

    }



    }

    //follow code
    if(isset($_POST['follow'])){

        //include database connection
        include_once('../db.php');

        //get session variables
        $fullname= $_SESSION['fullname'];
        $phonenumber = $_SESSION['phonenumber'];
        //get form variables

        $bizaccountName = $_POST['hiddenName'];
        $accountId = mysqli_real_escape_string($con, $_POST['hiddenid']);

        $sql= "INSERT INTO followerstable(fullname,phonenumber,bizaccountName,accountId)
         VALUES('$fullname','$phonenumber','$bizaccountName','$accountId')";

    $res = mysqli_query($con,$sql);

    if($res ==1){
        
 
    echo "<script>location.replace('../mainpages/findsellers.php');</script>"; 

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

    <div class="col-sm-12" style="text-align:center;justify-content:centre;">
        <h4 id="h4">Follow to see their newest adverts</h4>
        </div>
<div class="col-sm-12" style="text-align:center;justify-content:centre;">
<?php

  include_once('../db.php');




  $phonenumber = $_SESSION['phonenumber'];

  $sql2="SELECT * FROM bizaccounts where phonenumber != '$phonenumber'";
  
  $data2= mysqli_query($con,$sql2);
  $queryResults2= mysqli_num_rows($data2);




        if($queryResults2 >0) {
           while($row = mysqli_fetch_assoc($data2)) {

            $bizaccountName = $row['accountName'];
            $accountId = $row['id'];
            $phonenumber = $_SESSION['phonenumber'];

            //get number of followers
        $sql= "SELECT * FROM followersTable WHERE bizaccountName = '$bizaccountName' and accountId = '$accountId'";
        $data = mysqli_query($con, $sql);
        $queryResults2 = mysqli_num_rows($data);
        if($queryResults2 || !$queryResults2) { 

        $sql= "SELECT * FROM followersTable WHERE bizaccountName = '$bizaccountName' and accountId = '$accountId' and phonenumber = '$phonenumber'";
        $data = mysqli_query($con, $sql);
        $queryResults = mysqli_num_rows($data);

        if($queryResults >0){
            echo "
            
        <div style='margin-bottom: 5%;text-align:centre;'>
       
        <div style='text-transform: uppercase;color: green;margin-left:0%; text-align:centre;
        margin-top: 4%;margin-bottom: 4%;'>
        <h2 style='text-decoration: underline;'>".$row['accountName']."</h2>
        <div>
        <img src='../files/bizprofiles/bizprofiles".$row['profileurl']."' style = 'width: 20%;border-radius:100%; height:auto;'>
               

       

            <p>".$row['description']."</p>
            <p><label style='color: red;'>$queryResults2  Followers</label></p>

            <form action ='findsellers.php' method='post'>
            <input type='hidden' name= 'hiddenName' value='".$row['accountName']."'> 
            <input type='hidden' name= 'hiddenid' value=".$row['id']."> 
            <button style='margin-left: 5%;margin-top:19px; color:blue;' name='unfollow'>UnFollow</button>
            </form>
         </div>
        </div>
        
        </div>
        ";


      }else{
        echo "
            
            <div style='margin-bottom: 5%;text-align:centre;'>
           
            <div style='text-transform: uppercase;color: green;margin-left:0%; text-align:centre;
            margin-top: 4%;margin-bottom: 4%;'>
            <h2 style='text-decoration: underline;'>".$row['accountName']."</h2>
            <div>
            <img src='../files/bizprofiles/bizprofiles".$row['profileurl']."' style = 'width: 20%;border-radius:100%; height:auto;'>
                   
 
           

                <p>".$row['description']."</p>

                <p><label style='color: red;'>$queryResults2  Followers</label></p>
                <form action ='findsellers.php' method='post'>
                <input type='hidden' name= 'hiddenName' value='".$row['accountName']."'> 
                <input type='hidden' name= 'hiddenid' value=".$row['id']."> 
                <button style='margin-left: 5%;margin-top:19px; color:red;' name='follow'>Follow</button>
                </form>
             </div>
            </div>
            
            </div>
            ";

    


        }

 }

           
            }
                
                   
            
               

     }
    

?>
    </div>
    </div>


    </div>
    

</body>
</html>