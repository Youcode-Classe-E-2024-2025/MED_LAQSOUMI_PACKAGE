<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Packages Dashboard</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="shortcut icon" href="./assets/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>

<body class="bg-gray-100 font-Rubik">
  <!-- Navbar -->
  <header class="bg-gray-900 text-gray-200 px-4 py-3 flex items-center justify-between md:hidden">
    <h1 class="text-lg font-bold material-symbols-outlined">Dashboard</h1>
    <button id="toggleMenu" class="material-symbols-outlined text-gray-400 focus:outline-none">
      menu
    </button>
  </header>

  <!-- Dropdown Menu (hidden by default) -->
  <nav id="dropdownMenu" class="bg-gray-800 text-gray-200 hidden absolute top-12 left-0 w-screen shadow-md transition-transform duration-300 transform -translate-y-full">
    <ul class="flex flex-col space-y-2 p-4">
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 hover:bg-gray-700 hover:text-white rounded transition">
          <span class="material-symbols-outlined">signature</span>
          <span>Authors</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 hover:bg-gray-700 hover:text-white rounded transition">
          <span class="material-symbols-outlined">package</span>
          <span>Packages</span>
        </a>
      </li>
      <li>
        <a href="#" class="flex items-center space-x-2 py-2 px-4 hover:bg-gray-700 hover:text-white rounded transition">
          <span class="material-symbols-outlined">highlight</span>
          <span>Versions</span>
        </a>
      </li>
    </ul>
  </nav>
  <div class="flex h-screen">
    <!-- Sidebar (fixed for larger screens) -->
    <aside id="asideBar" class="bg-gray-800 text-gray-200 w-64 hidden flex-col h-full">
      
      
      <!-- Sidebar Header -->
      <div class="flex items-center justify-between px-6 py-4 bg-gray-900">
        <h1 class="text-lg font-bold material-symbols-outlined">Dashboard</h1>
      </div>

      <!-- Navigation Links -->
      <nav class="flex-1 overflow-y-auto">
        <ul class="space-y-2 p-4">
          <li>
            <a href="#" class="flex items-center space-x-2 py-2 px-4 hover:bg-gray-700 hover:text-white rounded transition">
              <span class="material-symbols-outlined">signature</span>
              <span>Authors</span>
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center space-x-2 py-2 px-4 hover:bg-gray-700 hover:text-white rounded transition">
              <span class="material-symbols-outlined">package</span>
              <span>Packages</span>
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center space-x-2 py-2 px-4 hover:bg-gray-700 hover:text-white rounded transition">
              <span class="material-symbols-outlined">highlight</span>
              <span>Versions</span>
            </a>
          </li>
        </ul>
      </nav>
    </aside>
    <!-- Main Content -->
    <button id="asideBtn" class="material-symbols-outlined text-gray-900 h-fit relative top-8 left-2 hidden">arrow_forward</button>
    <div class="flex-1 p-6 flex gap-6 flex-col w-[50%] h-screen">
      <!-- Header -->
      <header class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">DASHBOARD</h2>
        <button  id="addModal" class="flex items-center bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-[#04BF7B]">
          <span  class="material-symbols-outlined">add</span>
        </button>
      </header>
    
      <!-- Cards -->
      <div class="flex justify-around items-center">
        <div class="grid grid-cols-1 md:grid-cols-3 m-1 lg:grid-cols-3 gap-6 w-[400px] justify-between text-white">
          <button id="authorBtn" class="bg-[#6A1E55] hover:bg-[#A64D79] p-4 rounded-lg shadow">
          <h3 class="text-lg font-medium">Authors</h3>
          <p class="text-2xl font-bold"></p>
          </button>
          <button id="packageBtn" class="bg-[#6A1E55] hover:bg-[#A64D79] p-4 rounded-lg shadow">
          <h3 class="text-lg font-medium">Packages</h3>
          <p class="text-2xl font-bold"></p>
          </button>
          <button id="VersionBtn" class="bg-[#6A1E55] hover:bg-[#A64D79] p-4 rounded-lg shadow">
          <h3 class="text-lg font-medium">Versions</h3>
          <p class="text-2xl font-bold"></p>
          </button>
      </div>
      </div>
      <!-- Modal -->
      <div id="modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
        <div class="bg-[#F3F4F6] rounded-lg shadow-lg  max-w-md p-6 relative">
          <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <span class="material-symbols-outlined">close</span>
          </button>
          <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Add New Package</h2>
          <form id="packageAuthorForm" class="space-y-4">
            <div>
              <label for="packageName" class="block text-sm font-medium text-gray-600">Package Name</label>
              <input type="text" id="packageName" name="packageName" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter package name" required />
            </div>
            <div>
              <label for="authorName" class="block text-sm font-medium text-gray-600">Author Name</label>
              <input type="text" id="authorName" name="authorName" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter author name" required />
            </div>
            <div>
              <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
              <textarea id="description" name="description" rows="4" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter a brief description" required></textarea>
            </div>
            <div class="flex justify-end space-x-4">
              <button type="button" id="cancelModal" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">Cancel</button>
              <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Submit</button>
            </div>
          </form>
        </div>
      </div>
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
        <section id="dataTable" class="bg-gray-900 text-white w-[100%] h-full flex flex-col items-center relative p-6 overflow-x-scroll lg:overflow-auto rounded-lg shadow-lg">
        <h1>Liste des Packages: </h1>
            <table class="border-collapse border-2 border-gray-400 w-auto text-white text-sm text-center p-6 m-5">
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
                          <button class='text-[#f2bb05] hover:text-yellow-600 hover:scale-125 material-symbols-outlined rounded shadow text-xs px-2 py-1'>edit</button>
                        <button class='text-[#BF0404] hover:text-red-500 hover:scale-125 material-symbols-outlined rounded shadow text-xs px-2 py-1'>delete</button>
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
    </main>
  </div>
  <script src="./assets/js/script.js"></script>
</body>
</html>
