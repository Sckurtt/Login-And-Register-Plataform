<?php
session_start();
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

if(empty($_POST['firstName']) || strlen($_POST['firstName']) > 30){
    $_SESSION['firstNameError'] = 'Preencha o campo corretamente!';
    header('location: ../register.html');
    exit;
}
if(empty($_POST['user']) || strlen($_POST['user']) > 20){
    $_SESSION['userError'] = 'Preencha o campo corretamente!';
    header('location: ../register.html');
    exit;
}
if(empty($_POST['email'])){
    $_SESSION['emailError'] = 'Preencha o campo corretamente!';
    header('location: ../register.html');
    exit;
}
if(empty($_POST['password'])){
    $_SESSION['passwordError'] = 'Preencha o campo corretamente!';
    header('location: ../register.html');
    exit;
}

class Inputs{
    private $firstName;
    private $user;
    private $email;
    private $password;
    public function __construct($firstName, $user, $email, $password)
    {
        include('conectdb.php');
        $this->firstName = mysqli_real_escape_string($conexao, $firstName);
        $this->user = mysqli_real_escape_string($conexao, $user);
        $this->email = mysqli_real_escape_string($conexao, $email);
        $this->password = mysqli_real_escape_string($conexao, $password);
    }
    public function getFirstName(){
        echo $this->firstName;
    }
    public function getUser(){
        echo $this->user;
    }
    public function getEmail(){
        echo $this->email;
    }
    public function getPassword(){
        echo $this->password;
    }
}
if($emptyPost == false){
    $inputsNew = new Inputs($firstName, $user, $email, $password);


}






?>