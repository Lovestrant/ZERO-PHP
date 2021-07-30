<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zero The market</title>

<!--Css link-->
<link rel="stylesheet" type="text/css" href="../css/header.css">

     <!--bootstrap links-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<!-- google icons link-->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

    <script>
        function toProfile() {
            location.replace("profile.php");
        }

        function toFindSellers() {
            location.replace("findsellers.php");
        }

        function toHome() {
            location.replace("home.php");
        }


    </script>

</head>
<body>
<div class = "container" id="headerbody">
<div class = "row">
    <div class ="col-sm-4">
    <h2 class="institution">Zero The Online Market</h2>

    </div>
    <div class="col-sm-4">
    <h3 class="motto">Shop and advertise</h3>

    </div>
    <div class="col-sm-4">
    <h3 class="elearningLabel">Let's talk business.</h3>

    
  
    </div>

  <div class="col-sm-12" style="text-align: right; margin-right: 2%; margin-top: -2%;">
  <button onClick = "toProfile()">Profile</button>
  <button onClick = "toHome()">Home</button>
  <button onClick = "toFindSellers()">FindSellers</button>
  </div>
  

</div>
</div>
    


    
</body>
</html>