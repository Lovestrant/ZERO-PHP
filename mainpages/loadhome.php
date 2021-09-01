<?php
session_start();


if(isset($_GET['offset']) && isset($_GET['limit'])){
    $limit = $_GET['limit'];
    $offset = $_GET['offset'];

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
                        if(!$row['picurl'] && !$row['picurl2']){
                           echo "  
                           <div>
                           <h2 style='color: red;'>".$row['accountName']."</h2>
                               <h3 style='color: green;'>".$row['adtitle']."</h3>
                               
                           </div>
      
                           <div style='margin-top: 1%; text-align:centre; margin-bottom: 5%;'>
                           
                           <p style='color: black;font-size:20px;margin-left:5%;margin-right:5%; '>".$row['description']."</p>  
                           <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                           <div>
      
                           <h4 style='color: red;'>Your own advert.</h4>
      
                           </div>
                           <hr>
                           </div>
      
                          
                         ";
                        }elseif($row['picurl'] && !$row['picurl2']){
                           echo "  
                           <div>
                           <h2 style='color: red;'>".$row['accountName']."</h2>
                               <h3 style='color: green;'>".$row['adtitle']."</h3>
                               
                           </div>
      
                           <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                           <img class='zoom' src='../files/adpics/adpics".$row['picurl']."' style = 'width: 80%; height:auto;'>
                           <p style='color: black;font-size:20px;margin-left:5%;margin-right:5%; '>".$row['description']."</p>  
                           <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                           <div>
      
                           <h4 style='color: red;'>Your own advert.</h4>
      
                           </div>
                           <hr>
                           </div>
      
                          
                         ";
                        }elseif(!$row['picurl'] && $row['picurl2']){
                           echo "  
                           <div>
                           <h2 style='color: red;'>".$row['accountName']."</h2>
                               <h3 style='color: green;'>".$row['adtitle']."</h3>
                               
                           </div>
      
                           <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                           <img class='zoom' src='../files/adpics/adpics".$row['picurl2']."' style = 'width: 80%; height:auto;'>
                           <p style='color: black;font-size:20px;margin-left:5%;margin-right:5%; '>".$row['description']."</p>  
                           <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                           <div>
      
                           <h4 style='color: red;'>Your own advert.</h4>
      
                           </div>
                           <hr>
                           </div>
      
                          
                         ";
                       }elseif($row['picurl'] && $row['picurl2']){
                           echo "  
                           <div>
                           <h2 style='color: red;'>".$row['accountName']."</h2>
                               <h3 style='color: green;'>".$row['adtitle']."</h3>
                               
                           </div>
      
                           <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                           <img class='zoom2' src='../files/adpics/adpics".$row['picurl']."'>
                           <img class='zoom2' src='../files/adpics/adpics".$row['picurl2']."'>
   
                           <p style='color: black;font-size:20px;margin-left:5%;margin-right:5%; '>".$row['description']."</p>  
                           <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                           <div>
      
                           <h4 style='color: red;'>Your own advert.</h4>
      
                           </div>
                           <hr>
                           </div>
      
                          
                         ";
                       }
                        
   
                    }elseif($row['phonenumber'] != $_SESSION['phonenumber']) {
                       if(!$row['picurl'] && !$row['picurl2']){
                           echo "  
                           <div>
                           <h2 style='color: red;'>".$row['accountName']."</h2>
                               <h3 style='color: green;'>".$row['adtitle']."</h3>
                               
                           </div>
      
                           <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                           
                           <p style='color: black;font-size:20px; margin-left:5%;margin-right:5%;'>".$row['description']."</p>  
                           <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                           <div>
                           <a href='chat.php?seller=".$row['id']."'><button style='color: grey;margin-right: 10%;'>Chat With Seller</button></a>
                           <a href='order.php?postId=".$row['id']."'><button style='color: purple;'>Order</button></a>
                           </div>
                           <hr>
                           </div>
      
                          
                         ";
      
   
                       }elseif($row['picurl'] && !$row['picurl2']){
                           echo "  
                           <div>
                           <h2 style='color: red;'>".$row['accountName']."</h2>
                               <h3 style='color: green;'>".$row['adtitle']."</h3>
                               
                           </div>
      
                           <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                           <img class='zoom' src='../files/adpics/adpics".$row['picurl']."' style = 'width: 80%; height:auto;'>
                           <p style='color: black;font-size:20px; margin-left:5%;margin-right:5%;'>".$row['description']."</p>  
                           <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                           <div>
                           <a href='chat.php?seller=".$row['id']."'><button style='color: grey;margin-right: 10%;'>Chat With Seller</button></a>
                           <a href='order.php?postId=".$row['id']."'><button style='color: purple;'>Order</button></a>
                           </div>
                           <hr>
                           </div>
      
                          
                         ";
      
   
                       }elseif(!$row['picurl'] && $row['picurl2']){
                           echo "  
                           <div>
                           <h2 style='color: red;'>".$row['accountName']."</h2>
                               <h3 style='color: green;'>".$row['adtitle']."</h3>
                               
                           </div>
      
                           <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                           <img class='zoom' src='../files/adpics/adpics".$row['picurl2']."' style = 'width: 80%; height:auto;'>
                           <p style='color: black;font-size:20px; margin-left:5%;margin-right:5%;'>".$row['description']."</p>  
                           <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                           <div>
                           <a href='chat.php?seller=".$row['id']."'><button style='color: grey;margin-right: 10%;'>Chat With Seller</button></a>
                           <a href='order.php?postId=".$row['id']."'><button style='color: purple;'>Order</button></a>
                           </div>
                           <hr>
                           </div>
      
                          
                         ";
      
   
                       }elseif($row['picurl'] && $row['picurl2']){
                           echo "  
                           <div>
                           <h2 style='color: red;'>".$row['accountName']."</h2>
                               <h3 style='color: green;'>".$row['adtitle']."</h3>
                               
                           </div>
      
                           <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                           <img class='zoom2' src='../files/adpics/adpics".$row['picurl']."' style = 'width: 45%; height:auto;'>
                           <img class='zoom2' src='../files/adpics/adpics".$row['picurl2']."' style = 'width: 45%; height:auto;'>
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
   
          
   
                   }
               } }else{
                   echo"<h3 style='color:purple;'>Follow sellers to see their adverts. Go to FindSellers now.</h3>";
                   $sql="SELECT * FROM adverts ORDER BY ID DESC";
   
   
                   $data2= mysqli_query($con,$sql);
                   $queryResults2= mysqli_num_rows($data2);
                   
               
                   
                    if($queryResults2 >0) {
                              while($row = mysqli_fetch_assoc($data2)) {
               
                                if($row['phonenumber'] === $_SESSION['phonenumber']) {
                          
                                  if(!$row['picurl'] && !$row['picurl2']){
                                   echo "  
                                   <div>
                                   <h2 style='color: red;'>".$row['accountName']."</h2>
                                       <h3 style='color: green;'>".$row['adtitle']."</h3>
                                       
                                   </div>
              
                                   <div style='margin-top: 1%; text-align:centre; margin-bottom: 5%;'>
                                   
                                   <p style='color: black;font-size:20px;margin-left:5%;margin-right:5%; '>".$row['description']."</p>  
                                   <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                                   <div>
              
                                   <h4 style='color: red;'>Your own advert.</h4>
              
                                   </div>
                                   <hr>
                                   </div>
              
                                  
                                 ";
                                }elseif($row['picurl'] && !$row['picurl2']){
                                   echo "  
                                   <div>
                                   <h2 style='color: red;'>".$row['accountName']."</h2>
                                       <h3 style='color: green;'>".$row['adtitle']."</h3>
                                       
                                   </div>
              
                                   <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                                   <img class='zoom' src='../files/adpics/adpics".$row['picurl']."' style = 'width: 80%; height:auto;'>
                                   <p style='color: black;font-size:20px;margin-left:5%;margin-right:5%; '>".$row['description']."</p>  
                                   <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                                   <div>
              
                                   <h4 style='color: red;'>Your own advert.</h4>
              
                                   </div>
                                   <hr>
                                   </div>
              
                                  
                                 ";
                                }elseif(!$row['picurl'] && $row['picurl2']){
                                   echo "  
                                   <div>
                                   <h2 style='color: red;'>".$row['accountName']."</h2>
                                       <h3 style='color: green;'>".$row['adtitle']."</h3>
                                       
                                   </div>
              
                                   <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                                   <img class='zoom' src='../files/adpics/adpics".$row['picurl2']."' style = 'width: 80%; height:auto;'>
                                   <p style='color: black;font-size:20px;margin-left:5%;margin-right:5%; '>".$row['description']."</p>  
                                   <p style='color: green;text-decoration:bold;font-size:20px; '>Price: ".$row['price']."</p>  
                                   <div>
              
                                   <h4 style='color: red;'>Your own advert.</h4>
              
                                   </div>
                                   <hr>
                                   </div>
              
                                  
                                 ";
                               }elseif($row['picurl'] && $row['picurl2']){
                                   echo "  
                                   <div>
                                   <h2 style='color: red;'>".$row['accountName']."</h2>
                                       <h3 style='color: green;'>".$row['adtitle']."</h3>
                                       
                                   </div>
              
                                   <div style='margin-top: 3%; text-align:centre; margin-bottom: 5%;'>
                                   <img class='zoom2' src='../files/adpics/adpics".$row['picurl']."'>
                                   <img class='zoom2' src='../files/adpics/adpics".$row['picurl2']."'>
           
                                   <p style='color: black;font-size:20px;margin-left:5%;margin-right:5%; '>".$row['description']."</p>  
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
           
             }
   
   
   
               }else{
                   echo "<script>alert('Your Session has expired.You need to login again')</script>";
                   echo "<script>location.replace('../index.php')</script>";
                }
                   



}
?>