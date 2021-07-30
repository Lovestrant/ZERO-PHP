<?php 
    session_start();

    include_once('../db.php'); 

    if (isset($_POST['submitChat'])) {


        //getting session variables
     
        $text = mysqli_real_escape_string($con, $_POST['chatsInput']);
        $phonenumber = $_SESSION['phonenumber'];
        $fullname = $_SESSION['fullname'];
        
        $messageId = $_POST['hiddenid'];


  
        $sql = "SELECT * FROM chats where id='$messageId'";
        $data2= mysqli_query($con,$sql);
        $queryResults2= mysqli_num_rows($data2);
        
  
        
         if($queryResults2 >0) {
                   while($row = mysqli_fetch_assoc($data2)) {
                
                    $accountName = $row['accountName'];
                    $buyerPhonenumber = $row['buyerPhonenumber'];
                    
                    $sql = "INSERT INTO chats(buyerPhonenumber,fullname,sellerPhonenumber,accountName,message,additional) 
                    VALUES('$buyerPhonenumber','$fullname','$phonenumber','$accountName','$text','1');";

                    $res = mysqli_query($con,$sql);
                                        
                                    
                    if($res ==1){

                   
                    echo "<script>location.replace('../mainpages/chatbiz.php?messageId=$messageId');</script>";    
                        
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
<link rel="stylesheet" type="text/css" href="../css/chat.css">

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

<div class="container" id="chatbox">
<div class='col-sm-6' id='chatboxBody'>
    <?php  

          include_once('../db.php');    
              
        
        $phonenumber = $_SESSION['phonenumber'];
        $fullname = $_SESSION['fullname'];

        
        $messageId = $_GET['messageId'];
  
        $sql = "SELECT * FROM chats where id='$messageId'";
        $data2= mysqli_query($con,$sql);
        $queryResults2= mysqli_num_rows($data2);
        
  
        
         if($queryResults2 >0) {
                   while($row = mysqli_fetch_assoc($data2)) {

                //assign rows from database to variables
                 $buyerPhonenumber = $row['buyerPhonenumber'];
                    $accountName = $row['accountName'];
                    $sellerPhonenumber = $phonenumber;
                    $buyerfullname = $row['fullname'];

                    echo"
                    <div class='row'>
                    <div class='col-sm-12' id='chatboxHeader'>
                        <h3 id='h3top'>".$buyerfullname."</h3>
                        <p id='ptop'>Phone: ".$buyerPhonenumber."</p>
                    </div>
                   
                    ";

                    
                    $sql2 = "SELECT * FROM chats where buyerPhonenumber='$buyerPhonenumber' and accountName='$accountName'
                      and sellerPhonenumber='$phonenumber'";
                    
                     $result= mysqli_query($con,$sql2);
                     $queryResults= mysqli_num_rows($result);
                     
                     if($queryResults) {
                         while($row = mysqli_fetch_assoc($result)) {

                            
                            if($row['sellerPhonenumber']== $_SESSION['phonenumber'] && $row['additional']){
                               

                               
                                echo "
                                            
                                            
                                <div style='height: auto; width:auto; margin: 20px; padding: 10px;background-color: lightblue; margin-left:40%;
                                 border-radius: 10px;'>
                                 
                                
                                 ".$row['message']."</div>
                              
                            
                                ";
                            
                            }elseif(!$row['additional'] ==1){
                                echo "
                                            
                                            
                                <div style='height: auto; width:auto; margin-right: 40%; padding: 10px;background-color: lightgreen; 
                                 border-radius: 10px; border-radius: 10px;margin-bottom:10px; '>
                               
                                <div>".$row['message']."</div>
                              
                                </div> 
                                ";
                            
                            }else {

                            }


                        }     
                   }
                }
            }

    ?>

</div>
          
    
        </div>
    
    </div>

  
    <div class="row" id="createText">
                <form action="chatbiz.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name= "hiddenid" value=<?php $id= $_GET['messageId']; echo $id; ?>> <!-- Hidden input-->
                <p>
                <input id="chatinput" type="text" name="chatsInput" placeholder="Type message" required>
                <button name="submitChat" id="btnChat">Chat</button>
                </p>
                </form>
            </div>
  
</div>    

</body>
</html>