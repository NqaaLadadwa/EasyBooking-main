<?php session_start();?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
</head>
<body>
    

    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Sign Up</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <?php if(isset($_SESSION['errors'])){
                            foreach($_SESSION['errors']as $error){?>
                                <div class="alert alert-danger" role="alert">
                                <?php echo  $error; ?>
                                </div>
                            <?php
                            }
                            unset($_SESSION['errors']);
                        } 
                        
                        if(isset($_SESSION['success'])){?>


                            <div class="alert alert-success" role="alert">
                            <?php echo $_SESSION['success']; ?>
                            </div>
                           
                           <?php unset($_SESSION['success']);
                        }
                      
                        ?>
                        <form action="handlers/insert-admin.php" method="POST">
                        <div class="form-group">
                              <label>Name</label>
                              <input type="text" name ="name" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Email</label>
                              <input type="email" name ="email" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group">
                              <label>Re-Password</label>
                              <input type="password" name="repassword" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Sign Up</button>
                            </div>
                            <div>
                            <a href="login.php">LOG IN?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>