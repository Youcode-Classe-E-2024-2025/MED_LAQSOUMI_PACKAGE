<?php
require './database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $packageId = $_POST['packageId'];

    try {
        $conn->begin_transaction();

        // Delete from `versions`
        $sqlDeleteVersion = "DELETE FROM versions WHERE PackageID = ?";
        $stmtDeleteVersion = $conn->prepare($sqlDeleteVersion);
        $stmtDeleteVersion->bind_param("i", $packageId);
        $stmtDeleteVersion->execute();

        // Delete from `collaborations`
        $sqlDeleteCollaboration = "DELETE FROM collaborations WHERE PackageID = ?";
        $stmtDeleteCollaboration = $conn->prepare($sqlDeleteCollaboration);
        $stmtDeleteCollaboration->bind_param("i", $packageId);
        $stmtDeleteCollaboration->execute();

        // Delete from `packages`
        $sqlDeletePackage = "DELETE FROM packages WHERE PackageID = ?";
        $stmtDeletePackage = $conn->prepare($sqlDeletePackage);
        $stmtDeletePackage->bind_param("i", $packageId);
        $stmtDeletePackage->execute();

        $conn->commit();
        header('location: ../index.php');
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}
?>
