<?php
include 'conexao.php';

$id   = $_GET["id"];
$sql="delete from pessoa where id=".$id;
$stmt = $conexao->prepare($sql);
$stmt->execute();

header("location: index.php");
?>