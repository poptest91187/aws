<?php
$servername = "formation.cl60weu0oejc.us-east-1.rds.amazonaws.com";
$username = "root";
$password = "KOmplexesPW*";
$dbname = "formation";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $code = $_POST['code'];
    $libelle = $_POST['libelle'];

    // Préparer et exécuter la requête SQL
    $sql = "INSERT INTO article (code_article, libelle_article) VALUES ('$code', '$libelle')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvel article ajouté avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
