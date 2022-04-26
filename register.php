<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/register.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   
    
    <title>Register</title>
</head>
<body>
    <main class="main-site">
        <section class="login">
            <h1>Register Account</h1>
        <div class="user-result">
            <span class="result"></span>
            <span class="valid">The Best Login is Here</span>
        </div>
            <form action="php/check_inputs.php" method="POST" class="formRegister">
                <input type="text" name="firstName" placeholder="First Name" maxlength="20" minlength="3" pattern="([A-z])+">
                <?php
                if(!empty($_SESSION['firstNameError'])){
                    echo '<span class="alertError">Informe o nome corretamente</span>';
                    unset($_SESSION['firstNameError']);
                }
                ?>
                <input type="text" name="user" placeholder="@user" class="userInput"  maxlength="20" minlength="3">
                <?php
                if(!empty($_SESSION['userError'])){
                    echo '<span class="alertError">Informe o usuário corretamente</span>';
                    unset($_SESSION['userError']);
                }
                ?>
                <input type="text" name="email" placeholder="E-mail">
                <?php
                if(!empty($_SESSION['emailError'])){
                    echo '<span class="alertError">Informe o e-mail corretamente</span>';
                    unset($_SESSION['emailError']);
                }
                ?>
                <input type="password" name="password" placeholder="Password">
                <?php
                if(!empty($_SESSION['passwordError'])){
                    echo '<span class="alertError">Informe a senha desejada</span>';
                    unset($_SESSION['passwordError']);
                }
                ?>
                <input type="submit" value="Login">
            </form>
            
        </section>

    </main>
    <script src="js/checkuser.js"></script>
</body>
</html>