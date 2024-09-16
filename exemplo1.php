<?php 

// Configurações do banco de dados

$host = 'localhost';
$dbname= 'livro';
$usarname = 'root';
$password = '';

// Cria conexão com o banco de dados usando PDO - PHP Data Objects

try{
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $usarname, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão realizada com sucesso! <br>";
}

catch(PDOException $e){

echo "falha na conexão:" .$e->getmessage();

}

//dados a serem inseridos

$nome= 'C.S. Lewis';
$nacionalidade = 'Inglaterra';
$datanascimento = '1892-01-03';

$sql = "INSERT INTO autores(nome,nacionalidade, datanascimento) VALUES (:nome,:nacionalidade,:datanascimento)";

//Prepara a conexão
$stmt= $conn -> prepare($sql);

//Associa os valores aos parametros de consulta

$stmt ->bindParam (':nome',$nome);
$stmt ->bindParam (':nacionalidade',$nacionalidade);
$stmt ->bindParam (':datanascimento',$datanascimento);

//Executa a consulta 

if($stmt-> execute ()){

echo"Dados inseridos com sucesso!";

}
else{

echo"Erro ao inserir os dados!";

}

//Fecha a conexão
$conn=null;
?>