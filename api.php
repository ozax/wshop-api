<?php
header("Content-Type: application/json");

require_once("db_connection.php"); // Inclure la connexion à la base de données

// Endpoint : /stores (GET)
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $query = "SELECT * FROM stores";
        $stmt = $pdo->query($query);
        $magasins = $stmt->fetchAll(PDO::FETCH_ASSOC);
        var_dump($magasins);
        die;
        echo json_encode($magasins);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Une erreur s\'est produite lors de la récupération des magasins']);
    }
}

// Endpoint : /stores (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $data = json_decode(file_get_contents('php://input'), true);
        $nom = $data['nom'];
        $adresse = $data['adresse'];
        $telephone = $data['telephone'];
        $categorie = $data['categorie'];

        $query = "INSERT INTO stores (nom, adresse, telephone, categorie) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$nom, $adresse, $telephone, $categorie]);

        echo json_encode(['message' => 'Magasin ajouté avec succès']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Une erreur s\'est produite lors de l\'ajout du magasin']);
    }
}

// Endpoint : /stores/{id} (PUT)
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    try {
        $id = $_GET['id'];
        $data = json_decode(file_get_contents('php://input'), true);
        $nom = $data['nom'];
        $adresse = $data['adresse'];
        $telephone = $data['telephone'];
        $categorie = $data['categorie'];

        $query = "UPDATE stores SET nom=?, adresse=?, telephone=?, categorie=? WHERE id=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$nom, $adresse, $telephone, $categorie, $id]);

        echo json_encode(['message' => 'Magasin mis à jour avec succès']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Une erreur s\'est produite lors de la mise à jour du magasin']);
    }
}

// Endpoint : /stores/{id} (DELETE)
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    try {
        $id = $_GET['id'];

        $query = "DELETE FROM stores WHERE id=?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);

        echo json_encode(['message' => 'Magasin supprimé avec succès']);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Une erreur s\'est produite lors de la suppression du magasin']);
    }
}
?>
