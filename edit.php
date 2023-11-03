<?php
    include 'conexao.php';
    include 'bootstrap.php';
    if($_POST){

        $id=$_POST['id'];
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $sql="update pessoa set nome='$nome',email='$email' where id=".$id;
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        header("location: index.php");
    }
    $id   = $_GET["id"];

$consulta = $conexao->query("SELECT * FROM pessoa where id=".$id);
$linha = $consulta->fetch(PDO::FETCH_ASSOC);
?>
<form method="post">
    <input type="hidden" name="id" value="<?php echo $linha["id"];?>" />
        <label>Qual é o seu nome?</label>
    <input type='text' name='nome' placeholder='Qual é o seu nome?' value="<?php echo $linha["nome"];?>"><br>
        <label>Qual é o seu e-mail?</label>
    <input type='email' name='email' placeholder='Qual é o seu e-mail?' value="<?php echo $linha["email"];?>">
        <input type='submit' value='salvar'>
</form>