<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="estilo.css" />
    <script src="main.js"></script>
    <style>
        .color {
            color: white;
        }
    </style>
</head>
<body>
    <form action="" method='post'>
        <h1>Banco de dados</h1>

        RA...       <input type="text" name="ra" id="ra_id"/>
        Usuario:    <input type="text" name="user" id="user"/>
        Senha:      <input type="password" name="senha" id="senha"/>

        <input type="submit" value="Consultar" name="search"/>
        <input type="submit" value="Enviar" name="send"/>
        <input type="submit" value="Deletar" name="delete"/>
    </form>

    <?php
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'uninove';

        $conexao = mysqli_connect($host, $user, $password, $database);

        if (isset($_POST['send'])) {

            $ra = $_POST['ra'];
            $user = $_POST['user'];
            $password = $_POST['senha'];

            if ($ra == ''){

                $sql = "INSERT INTO usuarios(nome, senha) VALUES('{$user}', '{$password}')";
                mysqli_query($conexao, $sql);

            } else{

                $sql = "UPDATE usuarios SET nome='{$user}', senha='{$password}' WHERE id={$ra} ";
                mysqli_query($conexao, $sql);

            }
        } 
        
        elseif (isset($_POST['delete'])) {

            $ra = $_POST['ra'];
            $sql = "DELETE FROM usuarios WHERE id={$ra} ";
            mysqli_query($conexao, $sql);

        } 
        
        elseif(isset($_POST['search'])){

            $sql = 'SELECT * FROM usuarios';
            $resultado = mysqli_query($conexao, $sql);
            
            while ($row = mysqli_fetch_assoc($resultado)){
                echo '<p style="color: white;">' .$row['id'] . '-' . $row['nome'] . '-' . $row['id'] . '</p>' .'</br>' ;               
            }

        }

        mysqli_close($conexao);

    ?>

</body>
</html>