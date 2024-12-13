<?php
        include("./src/database.php");

        // SQL queries to fetch counts
        $sql_total_packages = "SELECT COUNT(*) as total_packages FROM packages";
        $sql_total_authors = "SELECT COUNT(*) as total_authors FROM Auteurs";
        $sql_total_versions = "SELECT COUNT(*) as total_versions FROM Versions";

        // Execute queries
        $result_packages = mysqli_query($conn, $sql_total_packages);
        $result_authors = mysqli_query($conn, $sql_total_authors);
        $result_versions = mysqli_query($conn, $sql_total_versions);

        // Initialize totals
        $total_packages = 0;
        $total_authors = 0;
        $total_versions = 0;

        // Fetch results and assign to variables
        if ($result_packages) {
            $row = mysqli_fetch_assoc($result_packages);
            $total_packages = $row['total_packages'];
        }

        if ($result_authors) {
            $row = mysqli_fetch_assoc($result_authors);
            $total_authors = $row['total_authors'];
        }

        if ($result_versions) {
            $row = mysqli_fetch_assoc($result_versions);
            $total_versions = $row['total_versions'];
        }
        ?>