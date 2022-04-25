<?php
define('Host', 'localhost');
define('User', 'admin');
define('Password', 'admin');
define('Database', 'usuarios');
$conexao = mysqli_connect(Host, User, Password, Database) or die ('Não Foi possível conectar ao DB');


?>