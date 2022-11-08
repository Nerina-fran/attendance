<?php 
    $title = 'User Login';

    require_once 'includes/header.php'; 
    require_once 'db/conn.php';
     
    // If data was submitted via a from POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
        $new_password = md5($password.$username);

        $result = $User->getUser($username,$new_password);
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please Enter Correct Password. </div>';
        }else{
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $result ['id'];
            header("Location: viewrecords.php");
        }
    }
?>

<h1 class = "text-center"><?php echo $title ?> </h1>
    <!--
    -->
    <from action="<?php echo htmlentities($_SEVER['PHP_SELF']); ?>" method="post">
        <table class="table table-sm">
            <tr>
                <td>
                    <lable for="username">Username: * </lable></td>
                <td><input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">

                <?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>$username_error</p>"; ?>
                </td>
            </tr>
            <tr>
                <td><lable for="password">Password: * </lable></td>
                <td><input type="password" name="password" class="form-control" id="password">
                <?php if (empty($password) && isset($password_error)) echo "<p class='text-danger'>$password_error</p>"; ?>
                </td>
            </tr>
        </table><br/><br/><br/>
        <div class="d-grid gap-2">
        <button type="submit" name="Login" class="btn btn-primary btn-block">Login</button>   
        </div>
        <br/><br/><br/>
        <a href="#"> Forget Password </a>

    </from><br/><br/><br/>

<?php include_once 'includes/footer.php'?>    