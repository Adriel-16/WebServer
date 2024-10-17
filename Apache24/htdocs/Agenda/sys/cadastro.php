<html lang="en">
<head>
    <link rel="stylesheet" href="css/cadastro.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
</head>
<body>

<div class="fundo">
    <div class="sair">
        <a href="../index.php" name="sair">
            <img src="css/img/logout.png" width="50px" alt="Sair">
        </a>
        <label for="sair">Sair</label>
    </div>
    
    <form action="cadastro.php" method="post">
        <div class="tabela">
            <div class="login">
                <h1>CADASTRO</h1>
            </div>
            <table>
                <tr>
                    <td><input type="text" id="nome" name="name" required placeholder="  Nome"></td>
                </tr>
                <tr>
                    <td><input type="password" id="senha" name="password" required placeholder="  Senha"></td>
                </tr>
                <tr>
                    <td><input type="email" id="email" name="email" required placeholder="  Email"></td>
                </tr>
                <tr>
                    <td><input type="text" id="telefone" name="celular" required placeholder="  Telefone"></td>
                </tr>
                <tr>
                    <td><input type="text" id="login" name="login" required placeholder="  Login"></td>
                </tr>
            </table>
        </div>
        <div class="botao">
            <table>
                <tr>
                    <td><button id="button" type="submit" name="cadastro">Cadastrar</button></td>
                </tr>
            </table>
        </div>
    </form>
</div>
</body>
</html>

<?php

if (isset($_POST["cadastro"])) {
    include_once("class/connect.php");
    $obj = new connect();
    $resultado = $obj->conectarBanco();

    // Sanitizando e extraindo valores
    $nomeUsuario = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $usuariocriptografado = md5($_POST["login"]);
    $senhacriptografada = md5($_POST["password"]);

    // Verificar se o login já existe
    $checkLoginSql = "SELECT COUNT(*) FROM usuario WHERE login = :login";
    $checkQuery = $resultado->prepare($checkLoginSql);
    $checkQuery->execute(['login' => $usuariocriptografado]);
    $loginExists = $checkQuery->fetchColumn();

    if ($loginExists) {
        echo '<script type="text/javascript">alert("O login já está em uso. Tente outro.");</script>';
    } else {
        // Inserir novo usuário
        $sql = "INSERT INTO usuario (nome, email, passwrd, login, ativo) VALUES (:nome, :email, :senha, :login, TRUE)";
        $query = $resultado->prepare($sql);
        $query->bindParam(':nome', $nomeUsuario);
        $query->bindParam(':email', $email);
        $query->bindParam(':senha', $senhacriptografada);
        $query->bindParam(':login', $usuariocriptografado);
        
        if ($query->execute()) {
            echo '<script type="text/javascript">alert("Cadastro realizado com sucesso!");</script>';
        } else {
            echo "Erro ao cadastrar, tente novamente!";
        }
    }
}
?>
