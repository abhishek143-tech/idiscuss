<?php
$showError = "false";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $email = $_POST['loginemail'];
    $pass = $_POST['loginpass'];

    $sql = "SELECT * FROM `users` WHERE `user_email`='$email'";
    $result = mysqli_query($conn,$sql);
    $numrows = mysqli_num_rows($result);
    
    if($numrows == 1){
        $row = mysqli_fetch_assoc($result);
            if(password_verify($pass,$row['user_pass'])){
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['useremail'] = $email;
                echo "logged in ". $email;
                header("location:/forum/index.php");
                exit();
            }
            
                header("location:/forum/index.php");
            
        }
        header("location:/forum/index.php");
}
?>