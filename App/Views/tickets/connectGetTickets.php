
<!-- metodo para inserir na tabela com os tickets gerados -->
<?php

$motorista = $_POST['motorista'];     
$postocombustiveis  = $_POST['postocombustiveis']; 
$tipoCombustiveis  = $_POST['tiposCombustiveis'];
$valor  = $_POST['valor']; 
$veiculo = $_POST['veiculo'];
$dateEmissao  = $_POST['dateEmissao']; 
$dateValidade= $_POST['dateValidade']; 
//DATABASE connection
$conn = new mysqli('localhost','root','','scf_db');
if($conn->connect_error){
    die('Conexão falhou: '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into registration(motorista,postocombustiveis,tiposCombustiveis,valor,veiculo,dateEmissao,dateValidade)
    values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssidd",$motorista, $postocombustiveis, $tiposCombustiveis, $valor,$veiculo, $dateEmissao, $dateValidade);
    $stmt->execute();
    echo "registrado com sucesso...";
    $stmt->close();
    $conn->close();

}

?>

