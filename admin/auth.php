<?php 
    include_once 'config.php';

    session_start();


    if(!isset($_SESSION['admin_email'])){

        header('Location: login.php');
        
    }

    if(isset($_POST['logout'])){

        session_unset();
        session_destroy();
        header('Location: login.php');

    }

     if(isset($_POST['login'])){

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' LIMIT 1";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)>0){

            session_start();
            $_SESSION['admin_email'] = mysqli_fetch_assoc($result)['email'];
            header('Location: index.php');

        }
        else{

            header('Location: login.php?error=true');

        }

    }