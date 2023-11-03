<?php
    include 'menu.php';
    include 'conexao.php';
    include 'bootstrap.php';
?>
<h1>listar pessoas</h1>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Ações</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $consulta = $conexao->query("select * from pessoa");
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
        <th scope="row"><?php echo $linha["id"]?></th>
        <td><?php echo $linha["nome"]?></td>
        <td><?php echo $linha["email"]?></td>
        <td>
            <button type="button" class="btn btn-danger">Excluir</button>
            <button type="button" class="btn btn-dark">Editar</button>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>