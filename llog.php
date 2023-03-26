<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 m-auto py-3">
                <div class="card mt-4 ">
                    <div class="card-title ">
                        <h3 class="bg-success text-white text-center py-3">LOGIN FORM</h3>
                    </div>
                    <div class="card-body">
                    <form class="user" method="post" action="logS.php">
                                        <div class="form-group">
                                            <input type="text" name="username" required class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter username...">
                                                <?php if(isset($_SESSION['user'])){echo $_SESSION['user'];} ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="password" required class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                
                                            </div>
                                        </div>
                                        
                                        <button type="submit" name="save" class="btn btn-primary btn-user btn-block">LOGIN</button>
                                        <hr>
                                        
                                        
                                    </form>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>