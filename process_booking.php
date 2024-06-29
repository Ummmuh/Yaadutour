<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reservation";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];

    $sql = "INSERT INTO bookings (name, email, phone, destination, date) VALUES ('$name', '$email', '$phone', '$destination', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "Réservation réussie!";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>