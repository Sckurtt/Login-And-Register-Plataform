<?php
$conexao = mysqli_connect('localhost', 'admin', 'admin', 'usuarios') or die ('Não Foi possível conectar ao DB');
function clearInjection($user,  $password, $conexao){
    // include('conectdb.php');
    $user = mysqli_real_escape_string($conexao, $user);
    $password = mysqli_real_escape_string($conexao, $password);
    return "select * from usuario where usuario='{$user}' and senha=md5('{$password}')";
}
if(!empty($_POST['user']) && !empty($_POST['password'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
    $query = clearInjection($user, $password, $conexao);
    $result = mysqli_query($conexao, $query);
    $rows = mysqli_num_rows($result);
    if($rows == 1){
        echo 'Usuário válido';
    }else if($rows == 0){
        header('location: ../login.php');
        exit;
    }
}
// echo clearInjection('sckurtt', 'teste', $conexao);


?>