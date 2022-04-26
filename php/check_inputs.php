<?php
session_start();

if(empty($_POST['firstName'])){
    $_SESSION['firstNameError'] = true;
    header('location: ../register.php');    
    exit;
}
if(empty($_POST['user']) || strlen($_POST['user']) > 20){
    $_SESSION['userError'] = true;
    header('location: ../register.php');
    exit;
}
if(empty($_POST['email'])){
    $_SESSION['emailError'] = true;
    header('location: ../register.php');
    exit;
}
if(empty($_POST['password'])){
    $_SESSION['passwordError'] = true;
    header('location: ../register.php');
    exit;
}

if(
!empty($_POST['firstName']) &&
!empty($_POST['user']) &&
!empty($_POST['email']) &&
!empty($_POST['password'])
){
    $firstName = $_POST['firstName'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $emptyPost = false;
}

class Inputs{
    private $firstName;
    private $user;
    private $email;
    private $password;
    public function __construct($firstName, $user, $email, $password, $conect)
    {
        include($conect);
        $this->firstName = mysqli_real_escape_string($conexao, $firstName);
        $this->user = mysqli_real_escape_string($conexao, $user);
        $this->email = mysqli_real_escape_string($conexao, $email);
        $this->password = mysqli_real_escape_string($conexao, $password);
    }
    public function getFirstName(){
        return $this->firstName;
    }
    public function getUser(){
        return $this->user;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }
    public function errorDataRegister(){
        $_SESSION['errorMensage'] = "Não Foi possível criar a conta!";
        header('Location: ../register.php');
        exit;
    }
    public function saveData($a, $b, $c, $d){
        // include('conectdb.php');
        define('Host2', 'localhost');
        define('User2', 'admin');
        define('Password2', 'admin');
        define('Database2', 'usuarios');
        $conexao2 = mysqli_connect(Host2, User2, Password2, Database2) or die ('Não Foi possível conectar ao DB');
        $queryRegister = "INSERT INTO usuario VALUES (DEFAULT, '{$a}', '{$b}', '{$c}' , md5('{$d}'))";
        mysqli_query($conexao2, $queryRegister) or die ($this->errorDataRegister());
        header('location: ../login.php');
        exit;
    }
}
if($emptyPost == false){
    $inputsNew = new Inputs($firstName, $user, $email, $password, 'conectdb.php');
    $createRegister = [
        $inputsNew->getFirstName(),
        $inputsNew->getUser(),
        $inputsNew->getEmail(),
        $inputsNew->getPassword()
];

if($_SESSION['userValid']){
    // echo 'valid';
    // echo $queryRegister;
    $inputsNew->saveData($createRegister[0],$createRegister[1],$createRegister[2],$createRegister[3]);
}else{
    // echo 'invavalid';
    $_SESSION['userError'] = true;
    header('location: ../register.php');
    exit;
};
}

?>