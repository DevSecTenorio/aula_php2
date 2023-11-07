<?php
    include 'conexao.php';
    include 'bootstrap.php';
    if($_POST){

        $id=$_POST['id'];
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $idade=$_POST['idade'];
        $nascimento=$_POST['nascimento'];
        $sexo=$_POST['sexo'];
        $nascimento = explode("/",$nascimento);
        $dia = ($nascimento[0]);
        $mes = ($nascimento[1]);
        $ano = ($nascimento[2]);
        $nascimento = $ano.'-'.$mes.'-'.$dia;
        $sql="update pessoa set nome='$nome',email='$email',idade='$idade',nascimento='$nascimento',sexo='$sexo' where id=".$id;
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        header("location: index.php");
    }
    $id   = $_GET["id"];

$consulta = $conexao->query("select id,nome,email, idade, DATE_FORMAT(nascimento,'%d/%m/%Y') AS nascimento, sexo  from pessoa where id=".$id);
$linha = $consulta->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alterar Pessoa</title>
    <link rel="icon" href="https://www.w3schools.com/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Alterar Pessoa</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $linha["id"];?>" />
            <div class="mb-3">
                <label class="form-label">Qual é o seu nome?</label>
                <input type='text' name='nome' placeholder='Qual é o seu nome?' class="form-control" value="<?php echo $linha["nome"];?>"><br>
            </div>
            <div class="mb-3">
                <label class="form-label">Qual é o seu e-mail?</label>
                <input type='email' name='email' placeholder='Qual é o seu e-mail?' class="form-control" value="<?php echo $linha["email"];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Qual a sua idade?</label>
                <input type='text' name='idade' placeholder='Qual a sua idade?' class="form-control" value="<?php echo $linha["idade"];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Qual a sua Data de Nascimento?</label>
                <input type='text' name='nascimento' placeholder='Qual a sua data de nascimento?' class="form-control" value="<?php echo $linha["nascimento"];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Selecione o seu sexo!</label>
                <select name="sexo" required>
                    <option value=""></option>
                    <option value="m" <?php if($linha["sexo"]=="m") echo 'selected';?>>Masculino</option>
                    <option value="f" <?php if($linha["sexo"]=="f") echo 'selected';?>>Feminino</option>
                </select>
            </div>
            <input type='submit' class="btn btn-primary" value='salvar'>
        </form>
    </div>
</body>
</html>