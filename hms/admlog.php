<?php
    include("include/connection.php");

    if(isset($_POST['login'])){
        $username = $_POST['uname'];
        $password = $_POST['pass'];

        $error = array();

        if(empty($username)){
            $error['admin'] = "Enter Username";
        }
        else if(empty($password)){
            $error['password'] = "Enter Password";
        }

        if(count($error)==0){

            $query = "SELECT * FROM admin where username = '$username' AND password='$password'";
            $result = mysqli_query($connect, $query);

            if($result){
                echo "<script>alert('Logged in Succesfully')</script>";

                $_SESSION['admin'] = $username;

                //header("Location:");

            }
            else{
                echo "<script>alert('Invalid Username or Password')</script>";
            }
        }

    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>


</head>


<body style="background-image: url(imag/hosp.jpeg); background-size: 100%;">
    <?php
    include("include/header.php");
    ?>


    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-center">Admin Login</h4>
                    </div>
                    <div class="card-body">
                        <form method="post">

                            <div class="alert alert-danger">
                                <?php

                                    if(isset($error['admin'])){
                                        $show = $error['admin'];
                                        echo $show;
                                    }
                                    else{
                                        $show = "";
                                    }

                                    echo $show;
                                ?>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter your username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100" value="Login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>