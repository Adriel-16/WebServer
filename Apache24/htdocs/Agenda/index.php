<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<form action="index.php" method="post">

    <div class="container">
        <div class="login">
            <div class="login2">
                <h1>LOGIN</h1>
            </div>
            <table>
                <tr>
                    <td><input type="text" name="name" placeholder="  Nome:"></td>
                </tr>
                <tr>
                    <td><input type="password" name="passwrd" placeholder="  Senha:"></td>
                </tr>
            </table>
            <div class="botoes">
                <table>
                    <tr>
                        <td><button class="login2" name="btnLogin" type="submit">Login</button></td>
                    </tr>
                </table>
                <div class="cadastro">
                    <a href="sys/cadastro.php"><button type="button" class="cadastro" name="cad">Cadastre-se</button></a>
                </div>
            </div>
        </div>
    </div>

</form>
</body>
</html>

<?php

    extract($_POST);

    if(isset($_POST["btnLogin"])){

        include_once("sys/class/connect.php");
        $obj = new connect();
        $resultado = $obj->conectarBanco();

        $nomeUsuario = md5($_POST["name"]);
        $usuariocriptografado = md5($_POST["passwrd"]);


        $sql = "SELECT * FROM Usuario WHERE login = '".$nomeUsuario."' AND passwrd = '".$usuariocriptografado."';";

        $query = $resultado->prepare($sql);
		$indice = 0;
		if($query->execute())
        {
            while($linha = $query->fetch(PDO::FETCH_ASSOC))
			{
				$linhas[$indice] = $linha;
                $indice++;  
            }

            if ($indice == 1)
            {
                $_SESSION["logado"] = TRUE;
                header("Location: sys/navegar.php");
            }

           
        }

    }
    
?>