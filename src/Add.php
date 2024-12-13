<?php
require './database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $packageName = $_POST['packageName'] ?? '';
    $description = $_POST['description'] ?? '';
    $dateCreation = $_POST['dateCreation'] ?? '';
    $authorName = $_POST['authorName'] ?? '';
    $authorEmail = $_POST['authorEmail'] ?? '';
    $versionNumber = $_POST['versionNumber'] ?? '';

    // Validate input
    if (empty($packageName) || empty($description) || empty($dateCreation) || empty($authorName) || empty($authorEmail) || empty($versionNumber)) {
        echo "All fields are required.";
        exit;
    }

    // Prepare the SQL statement
    $stmtP = $conn->prepare("INSERT INTO Packages (Nom, Description, DateCreation) VALUES (?, ?, ?)");
    $stmtA = $conn->prepare("INSERT INTO auteurs (NOM,Email) VALUES (?, ?)");
    $stmtV = $conn->prepare("INSERT INTO versions (NumeroVersion) VALUES (?)");
    $stmtP->bind_param('sss', $packageName, $description, $dateCreation);
    $stmtA->bind_param('ss', $authorName, $authorEmail);
    $stmtV->bind_param('s',  $versionNumber);

    // Execute and handle the result
    if ($stmtP->execute() && $stmtA->execute() && $stmtV->execute()) {
        // Redirect to index.php after successful insertion
        header('Location: ../index.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
