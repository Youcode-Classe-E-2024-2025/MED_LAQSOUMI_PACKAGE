<?php
        include("src/database.php");

        // Join the tables to retrieve all necessary data in one query
        $query = "
            SELECT 
                Packages.PackageID,
                Packages.Nom AS PackageName,
                Packages.Description AS PackageDescription,
                Packages.DateCreation,
                Auteurs.Nom AS AuthorName,
                Auteurs.Email AS AuthorEmail,
                Versions.NumeroVersion
            FROM 
                collaborations 
            LEFT JOIN packages  ON Packages.PackageID = Collaborations.PackageID
            LEFT JOIN Auteurs ON Collaborations.AuteurID = Auteurs.AuteurID
            LEFT JOIN Versions ON Packages.PackageID = Versions.PackageID
        ";



        $result = $conn->query($query);

        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        
        // Start the table
        echo '
        <section id="dataTable" class="bg-[#313946] text-white w-[100%] flex flex-col overflow-x-auto lg:overflow-auto shadow-lg rounded-full gap-4 p-6">
        <h1 class="self-center"><strong>Liste des Packages: </strong></h1>
            <table class="border-collapse border-2 border-gray-400 lg:w-[100px] text-sm lg:self-center text-center">
                <thead>
                    <tr>
                        <th class="border border-gray-400 px-2 py-1">#ID</th>
                        <th class="border border-gray-400 px-2 py-1">Package_Name</th>
                        <th class="border border-gray-400 px-2 py-1">Package_Description</th>
                        <th class="border border-gray-400 px-2 py-1">Date_Creation</th>
                        <th class="border border-gray-400 px-2 py-1">Autheur_Name</th>
                        <th class="border border-gray-400 px-2 py-1">Autheur_Email</th>
                        <th class="border border-gray-400 px-2 py-1">Version_Number</th>
                        <th class="border border-gray-400 px-2 py-1">Actions</th>
                    </tr>
                </thead>
                <tbody>
        ';

        // Loop through the result set
        while ($row = $result->fetch_assoc()) {
            // Escape the output to avoid XSS
            $id = htmlspecialchars($row['PackageID']);
            $name = htmlspecialchars($row['PackageName']);
            $description = htmlspecialchars($row['PackageDescription']);
            $dateCreation = htmlspecialchars($row['DateCreation']);
            $authorName = htmlspecialchars($row['AuthorName']);
            $authorEmail = htmlspecialchars($row['AuthorEmail']);
            $version = htmlspecialchars($row['NumeroVersion']);
        
            echo "
                <tr>
                    <td class='border border-gray-400 px-2 py-1'>{$id}</td>
                    <td class='border border-gray-400 px-2 py-1'>{$name}</td>
                    <td class='border border-gray-400 px-2 py-1'>{$description}</td>
                    <td class='border border-gray-400 px-2 py-1'>{$dateCreation}</td>
                    <td class='border border-gray-400 px-2 py-1'>{$authorName}</td>
                    <td class='border border-gray-400 px-2 py-1'>{$authorEmail}</td>
                    <td class='border border-gray-400 px-2 py-1'>{$version}</td>
                    <td class='border border-gray-400 px-2 py-1'>
                        <div class='flex justify-around items-center'>
                          <button class='text-[#f2bb05] hover:text-yellow-600 hover:scale-125 material-symbols-outlined text-[20px] '>edit</button>
                        <button class='text-[#BF0404] hover:text-red-500 hover:scale-125 material-symbols-outlined text-[20px]'>delete</button>
                        </div>
                    </td>
                </tr>
            ";
        }

        // Close the table and section
        echo '
                </tbody>
            </table>
        </section>
        ';
        ?>