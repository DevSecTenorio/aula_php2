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
<form method="post">
    <label>Qual é o seu nome?</label>
    <input type='text' name='nome' placeholder='Qual é o seu nome?'><br>
    <label>Qual é o seu e-mail?</label>
    <input type='email' name='email' placeholder='Qual é o seu e-mail?'>
    <input type='submit' value='salvar'>
</form>