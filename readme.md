# API de Gestion des Magasins

Cette API permet de gérer une liste de magasins en utilisant des requêtes HTTP. Les opérations possibles sont la récupération, l'ajout, la mise à jour et la suppression de magasins.


Configuration

    Assurez-vous d'avoir un serveur web (comme Apache) installé et configuré pour exécuter des fichiers PHP.

    Configurez votre base de données :
        Importez le fichier SQL fourni dans le dossier pour créer la table stores.
        Mettez à jour les informations de connexion à la base de données dans le fichier db_connection.php.

Utilisation

    Endpoint : /stores (GET)
        Description : Récupère la liste de tous les magasins.
        Méthode : GET
        Réponse : Liste des magasins au format JSON.

    Endpoint : /stores (POST)
        Description : Ajoute un nouveau magasin.
        Méthode : POST
        Corps de la requête : JSON contenant les détails du magasin (nom, adresse, téléphone, catégorie).
        Réponse : Message de succès ou d'erreur au format JSON.

    Endpoint : /stores/{id} (PUT)
        Description : Met à jour les informations d'un magasin existant.
        Méthode : PUT
        Paramètre de l'URL : ID du magasin à mettre à jour.
        Corps de la requête : JSON contenant les nouvelles informations du magasin.
        Réponse : Message de succès ou d'erreur au format JSON.

    Endpoint : /stores/{id} (DELETE)
        Description : Supprime un magasin.
        Méthode : DELETE
        Paramètre de l'URL : ID du magasin à supprimer.
        Réponse : Message de succès ou d'erreur au format JSON.

Vous pouvez utiliser un outil comme postman afin de tester les Endpoints

Exemples
Récupérer la liste des magasins

bash

GET /stores

Réponse :

json

[
{
"id": 1,
"nom": "Magasin A",
"adresse": "123 Rue Principale",
"telephone": "555-1234",
"categorie": "Alimentation"
},
{
"id": 2,
"nom": "Magasin B",
"adresse": "456 Rue Secondaire",
"telephone": "555-5678",
"categorie": "Vêtements"
}
]

Ajouter un nouveau magasin

bash

POST /stores
Corps de la requête :
{
"nom": "Nouveau Magasin",
"adresse": "789 Rue Nouvelle",
"telephone": "555-7890",
"categorie": "Électronique"
}

Réponse :

json

{
"message": "Magasin ajouté avec succès"
}

Mettre à jour un magasin existant

bash

PUT /stores/1
Corps de la requête :
{
"nom": "Magasin Modifié",
"adresse": "123 Rue Modifiée",
"telephone": "555-9999",
"categorie": "Autre"
}

Réponse :

json

{
"message": "Magasin mis à jour avec succès"
}

Supprimer un magasin

bash

DELETE /stores/2

Réponse :

json

{
"message": "Magasin supprimé avec succès"
}
