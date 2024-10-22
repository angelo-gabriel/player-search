<?php
require_once 'conecta_bd.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premier League Player Stats</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Premier League Player Stats</h1>

    <form action="index.php" method="get">
        <label for="name">Player name: </label>
        <input name="name" id="name" type="text">
        
        <button type="submit">Search</button>
    </form>

    <?php

    $playerName = $_GET['name'];

    if(!empty($playerName)) {

        include 'conecta_bd.php';

        try {
            

            $query = "SELECT name, goals FROM player_data WHERE LOWER(name) LIKE LOWER(:playerName)";
            $stmt = $pdo->prepare($query);

            $search = "%" . $playerName . "%";
            $stmt->bindValue(':playerName', $search, PDO::PARAM_STR);

            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($results) {
                echo "<h2>Resultados da busca:</h2>";
                echo "<ul>";

                foreach($results as $player) {
                    echo "<li>Player: " . htmlspecialchars($player['name']) . "</li>";
                    echo "<li>Goals: " . htmlspecialchars($player['goals']) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "Nenhum jogador encontrado.";
            }

        } catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    } else {
        echo "Por favor, insira um nome para a busca.";
    }

    ?>
</body>
</html>