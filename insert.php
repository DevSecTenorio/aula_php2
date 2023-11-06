<?php
    include 'conexao.php';
    include 'bootstrap.php';
    if($_POST){

        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $sql="insert into pessoa (nome,email)  values ('$nome','$email')";
        //echo 'salvar pessoa, o nome é '.$nome .' seu email é ' .$email;
        //echo $sql;
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        header("location: index.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Pessoa</title>
    <link rel="icon" href="https://www.w3schools.com/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Adicionar Pessoa</h1>
        <form method="post">
            <div class="mb-3">
                <label class="form-label">Qual é o seu nome?</label>
                <input type='text' class="form-control" name='nome' placeholder='Qual é o seu nome?'>
            </div>    
            <div class="mb-3">
                <label class="form-label">Qual é o seu e-mail?</label>
                <input type='text' class="form-control" name='email' placeholder='Qual é o seu email?'>
            </div>
            <input type='submit' value='salvar'>
        </form>
    </div>
</body>
</html>