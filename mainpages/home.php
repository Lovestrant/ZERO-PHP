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

    <!--Jquery links-->
 
	
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 
    <script>
			//Jquery code to load 3 posts at a time

        $(document).ready(function(){
            var flag = 0;
            $.ajax({
                type: "GET",
                url: "loadhome.php",
                data: {
                    'offset': 0,
                    'limit': 3
                },
                success: function(data){
                    $('.homebody').append(data);
                    flag +=3;
                }
            });

            $(window).scroll(function(){
                if ($(window).scrollTop() >= $(document).height() - $(window).height()) {
                        $.ajax({
                        type: "GET",
                        url: "loadhome.php",
                        data: {
                            'offset': flag,
                            'limit': 3
                        },
                        success: function(data){
                            $('.homebody').append(data);
                            flag +=3;
                        }
                    });
                }
                
            });
            
        });

       
            
       
</script>

<!--Css link-->
<link rel="stylesheet" type="text/css" href="../css/home.css">

     <!--bootstrap links-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">




<style>
.zoom2{
    width:45%;
    height:auto;
    transition: transform ease-in-out 0.3s;
    }
.zoom2:hover{
    transform: scale(1.5);
    text-align: center;
    justify-content: center;
    }
    .zoom{
    width:45%;
    height:auto;
    transition: transform ease-in-out 0.3s;
    }
.zoom:hover{
    transform: scale(1.1);
    text-align: center;
    justify-content: center;
    
    }
</style>



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
    <div class="row">
        <div class="homebody">

        </div>
    </div>
   
       
</div>




</body>
</html>