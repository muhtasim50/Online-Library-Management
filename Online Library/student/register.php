<?php





require_once '../db.php';

if(isset($_POST['student_register'])){
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $RegNo = $_POST['RegNo'];
    $Username = $_POST['Username'];
    $Password = $_POST['Password'];
    $Phone = $_POST['Phone'];
    $Department = $_POST['Department'];
    $Session = $_POST['Session'];



    $input_errors = array();

    if(empty($Name)){
        $input_errors['Name'] = "Name is required!";
    }
    if(empty($Email)){
        $input_errors['Email'] = "Email is required!";
    }
    if(empty($RegNo)){
        $input_errors['RegNo'] = "Reg. No. is required!";
    }
    if(empty($Username)){
        $input_errors['Username'] = "Username is required!";
    }
    if(empty($Password)){
        $input_errors['Password'] = "Password is required!";
    }
    if(empty($Phone)){
        $input_errors['Phone'] = "Phone no. is required!";
    }
    if(empty($Department)){
        $input_errors['Department'] = "Department is required!";
    }
    if(empty($Session)){
        $input_errors['Session'] = "Session is required!";
    }

    if(count($input_errors) == 0){
        $password_hash = password_hash($Password, PASSWORD_DEFAULT);
        $result = mysqli_query($connect, "INSERT INTO `students`(`Name`, `Email`, `RegNo`, `Username`, `Password`, `Phone`, `Department`, `Session`) VALUES ('$Name','$Email','$RegNo','$Username','$password_hash','$Phone','$Department','$Session')");

        if($result){
            $success = "Your registration has been completed successfully.";
        }else{
            $error = "Complete the form correctly!";
        }

    }

    //$result = mysqli_query($connect, "INSERT INTO `students`(`Name`, `Email`, `RegNo`, `Username`, `Password`, `Phone`, `Department`, `Session`) VALUES ('$Name','$Email','$RegNo','$Username','$password_hash','$Phone','$Department','$Session')");



}

?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Online Library</title>
        <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="back">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="form-wrapper">
            <h1 class="text-center">Student Registration Form</h1>

            <?php
            if (isset($success)){
                ?>
                <div class="alert alert-success" role="alert">
                    <?= $success ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            <?php
            }
            ?>

            <?php
            if (isset($error)){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <?php
            }
            ?>

        </div>
        <div class="box">
            <form class="form-wrapper">

            </form>
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" class="form-wrapper" action="<?= $_SERVER['PHP_SELF'] ?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Name" name="Name">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if(isset($input_errors['Name'])){
                                echo '<span class="input-error">'.$input_errors['Name']. '</span>';
                            }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" placeholder="Email" name="Email">
                                <i class="fa fa-envelope"></i>
                            </span>

                            <?php
                            if(isset($input_errors['Email'])){
                                echo '<span class="input-error">'.$input_errors['Email']. '</span>';
                            }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="int" class="form-control" placeholder="RegNo" name="RegNo">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if(isset($input_errors['RegNo'])){
                                echo '<span class="input-error">'.$input_errors['RegNo']. '</span>';
                            }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Username" name="Username">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if(isset($input_errors['Username'])){
                                echo '<span class="input-error">'.$input_errors['Username']. '</span>';
                            }
                            ?>

                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" placeholder="Password" name="Password">
                                <i class="fa fa-key"></i>
                            </span>

                            <?php
                            if(isset($input_errors['Password'])){
                                echo '<span class="input-error">'.$input_errors['Password']. '</span>';
                            }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="01*********" name="Phone">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if(isset($input_errors['Phone'])){
                                echo '<span class="input-error">'.$input_errors['Phone']. '</span>';
                            }
                            ?>

                        </div>

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Department" name="Department">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if(isset($input_errors['Department'])){
                                echo '<span class="input-error">'.$input_errors['Department']. '</span>';
                            }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" placeholder="Session" name="Session">
                                <i class="fa fa-user"></i>
                            </span>

                            <?php
                            if(isset($input_errors['Session'])){
                                echo '<span class="input-error">'.$input_errors['Session']. '</span>';
                            }
                            ?>

                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="student_register" value="SIGN UP">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>

<style>

    body {
        background-image: url('../assets/images/bg.jpg');
    }
</style>


<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>
