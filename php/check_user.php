<?php
include('conectdb.php');
if(isset($_POST['user'])){
    $user = $_POST['user'];
    echo $user;
}
if(isset($_GET['user'])){
    $user = htmlspecialchars($_GET['user']);
    // $user = preg_replace('/[^[:alpha:]_]/', '',$_GET['user']);
    $user = mysqli_real_escape_string($conexao, $user);
    $query = "select usuario from usuario where usuario='{$user}'";
    $consulta = mysqli_query($conexao, $query);
    $rows_returned = mysqli_num_rows($consulta);
    // echo $rows_returned;
    if($rows_returned == 0){
        echo 'Usuário disponível';
    }else if($rows_returned >= 1){
        echo 'Usuário Indisponível';
    }


}
?>