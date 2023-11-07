<?php
    include 'menu.php';
    include 'conexao.php';
    include 'bootstrap.php';
?>
<h1>listar pessoas</h1>
<form method="$_GET">
    <input type="text" name="buscar" placeholder="Pesquisar" class="form-control">
    <button type="submit" class="btn btn-success">Pesquisar</button>
</form>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Idade</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Sexo</th>
        <th scope="col">Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $consulta = $conexao->query("select id,nome,idade, email,DATE_FORMAT(nascimento,'%d/%m/%Y') AS nascimento,sexo  from pessoa");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
        <th scope="row"><?php echo $linha["id"]?></th>
        <td><?php echo $linha["nome"]?></td>
        <td><?php echo $linha["email"]?></td>
        <td><?php echo $linha["idade"]?></td>
        <td><?php echo $linha["nascimento"]?></td>
        <td>
            <?php if($linha['sexo']== 'm') echo 'Masculino'?>
            <?php if($linha['sexo']== 'f') echo 'Feminino'?>
        </td>
        <td>
            <a href="delete.php?id=<?php echo $linha["id"]?>" onclick="return confirm('Deseja realmente excluir?')"><button type="button" class="btn btn-danger">Excluir</button></a>
            <a href="edit.php?id=<?php echo $linha["id"]?>"> <button type="button" class="btn btn-dark">Editar</button></a>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>