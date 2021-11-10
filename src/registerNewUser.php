<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $name = isset($_POST["nome"])?$_POST["nome"]:null;
        $login = isset($_POST["loginField"])?$_POST["loginField"]:null;
        $pw = isset($_POST["pwField"])?$_POST["pwField"]:null;
        echo "$name $login $pw";
        //Com $name, $login e $pw, conectar à database e inserir novo usuário com estes dados. Mostrar mensagem de 'registrado com sucesso' e voltar à pagina de login.

    ?>
</body>
</html>