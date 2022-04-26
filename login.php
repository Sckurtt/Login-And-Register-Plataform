<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <main class="main-site">
        <section class="login">
            <h1>Welcome To System</h1>
            <p>The best login</p>
            <form action="php/login.php" method="post">
                <input type="text" name="user" placeholder="@user">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" value="Login">
            </form>
            <p class="new-account"><a href="register.php">Criar uma conta</a></p>
        </section>

    </main>
</body>
</html>