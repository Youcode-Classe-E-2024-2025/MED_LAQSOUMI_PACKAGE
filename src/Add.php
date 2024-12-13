<?php
require './database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $packageName = $_POST['packageName'];
    $description = $_POST['description'];
    $dateCreation = $_POST['dateCreation'];
    $authorId = $_POST['authorName'];
    $versionNumber = $_POST['versionNumber'];
    $publicationDate = $_POST['publicationDate'];

    try {
        // Validate if the Author exists
        $sqlCheckAuthor = "SELECT COUNT(*) AS count FROM auteurs WHERE AuteurID = ?";
        $stmtCheckAuthor = $conn->prepare($sqlCheckAuthor);
        $stmtCheckAuthor->bind_param("i", $authorId);
        $stmtCheckAuthor->execute();
        $result = $stmtCheckAuthor->get_result();
        $row = $result->fetch_assoc();

        if ($row['count'] == 0) {
            die("Error: Author does not exist.");
        }

        // Start transaction
        $conn->begin_transaction();

        // Insert into `packages`
        $sqlPackage = "INSERT INTO packages (Nom, Description, DateCreation) VALUES (?, ?, ?)";
        $stmtPackage = $conn->prepare($sqlPackage);
        $stmtPackage->bind_param("sss", $packageName, $description, $dateCreation);
        $stmtPackage->execute();

        $packageId = $conn->insert_id;

        // Insert into `collaborations`
        $sqlCollaboration = "INSERT INTO collaborations (AuteurID, PackageID) VALUES (?, ?)";
        $stmtCollaboration = $conn->prepare($sqlCollaboration);
        $stmtCollaboration->bind_param("ii", $authorId, $packageId);
        $stmtCollaboration->execute();

        // Insert into `versions`
        $sqlVersion = "INSERT INTO versions (NumeroVersion, DatePublication, PackageID) VALUES (?, ?, ?)";
        $stmtVersion = $conn->prepare($sqlVersion);
        $stmtVersion->bind_param("ssi", $versionNumber, $publicationDate, $packageId);
        $stmtVersion->execute();

        $conn->commit();
        header('location: ../index.php');
        // echo "Data added successfully!";
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
