<?php
    include("banco_conexao.php");

    if(!empty($_GET['search'])){
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuario WHERE id LIKE '%$data%' OR nome LIKE '%$data%' OR cep LIKE '%$data%' OR bairro LIKE '%$data%' OR cidade LIKE '%$data%' OR estado LIKE '%$data%' ORDER BY id DESC";
    }
    else{
        $sql ="SELECT * FROM usuario ORDER BY id DESC";
    }
    
    $result = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css"></style>
    <title>Consulta</title>
</head>
<body>
    <div class="divBusca">
        <input type="search" id="inputBusca" autocomplete="off" placeholder="Pesquisar">
        <button onclick="searchData()" id="btnBusca">Buscar</button>
    </div>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>CEP</th>
        <th>Rua</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Número</th>
        <th>Complemento</th>
    </tr>
    <?php
        while($user_data = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>" .$user_data['id']. "</td>";
            echo "<td>" .$user_data['nome']. "</td>";
            echo "<td>" .$user_data['cep']. "</td>";
            echo "<td>" .$user_data['rua']. "</td>";
            echo "<td>" .$user_data['bairro']. "</td>";
            echo "<td>" .$user_data['cidade']. "</td>";
            echo "<td>" .$user_data['estado']. "</td>";
            echo "<td>" .$user_data['num']. "</td>";
            echo "<td>" .$user_data['complemento']. "</td>";
            echo 
            "<td>
                <a class='btnTrash' href='delete_dados.php?id=$user_data[id]'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                    </svg>
                </a>
            </td>";
            echo "</tr>";
        }   
    ?>
</table><br>
<button class="btn" onclick="location.href='formulario.html'">Retornar</button>
</body>
<script>
    var search = document.getElementById('inputBusca');

    search.addEventListener("keydown", function(event){
        if(event.key === "Enter"){
            searchData();
        }
    });

    function searchData(){
        window.location = 'consulta_dados.php?search='+search.value;
    }
</script>
</html>

