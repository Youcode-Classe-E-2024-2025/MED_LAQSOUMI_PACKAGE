<?php
require("./src/stats.php");
require("./src/database.php");
// require("./src/Add.php");
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Packages Dashboard</title>
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
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
    <button id="asideBtn" class="material-symbols-outlined text-gray-900 h-fit relative top-8 left-2 hidden md:flex lg:flex">arrow_forward</button>
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
          <p class="text-2xl font-bold"><?php echo $total_authors ?></p>
          </button>
          <button id="packageBtn" class="bg-[#6A1E55] hover:bg-[#A64D79] p-4 rounded-lg shadow">
          <h3 class="text-lg font-medium">Packages</h3>
          <p class="text-2xl font-bold"><?php echo $total_packages ?></p>
          </button>
          <button id="VersionBtn" class="bg-[#6A1E55] hover:bg-[#A64D79] p-4 rounded-lg shadow">
          <h3 class="text-lg font-medium">Versions</h3>
          <p class="text-2xl font-bold"><?php echo $total_versions ?></p>
          </button>
      </div>
      </div>
      <!-- Modal -->
      <div id="modal" class="hidden fixed inset-0 z-50  items-center justify-center bg-opacity-50 backdrop-blur-sm">
        <div class="bg-[#F3F4F6] rounded-lg shadow-lg  w-4/5 md:w-[500px]  p-6 relative">
          <button id="closeModal" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
            <span class="material-symbols-outlined">close</span>
          </button>
          <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Add New Package</h2>
          <form id="packageForm" class="space-y-2" action="./src/Add.php" method="POST">
            <div>
                <label for="packageName" class="block text-sm font-medium text-gray-600">Package Name</label>
                <input type="text" id="packageName" name="packageName" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter package name" required />
            </div>
            <div>
                <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter a brief description" required></textarea>
            </div>
            <div class="w-full flex flex-col gap-6">
                <!-- Date Creation -->
                <div>
                    <label for="dateCreation" class="block text-sm font-medium text-gray-600">Date Creation</label>
                    <input type="date" id="dateCreation" name="dateCreation" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required />
                </div>

                <!-- Author Name (Selector) -->
                <div>
                    <label for="authorName" class="block text-sm font-medium text-gray-600">Author Name</label>
                    <select id="authorName" name="authorName" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required>
                        <option value="">Select an author</option>
                        <?php
                        $result = $conn->query("SELECT AuteurID, NOM FROM auteurs");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['AuteurID']}'>{$row['NOM']}</option>";
                        }
                        ?>
                    </select>
                </div>
                      
                <!-- Version Number -->
                <div>
                    <label for="versionNumber" class="block text-sm font-medium text-gray-600">Version Number</label>
                    <input type="text" id="versionNumber" name="versionNumber" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" placeholder="Enter version number" required />
                </div>
                      
                <!-- Publication Date -->
                <div>
                    <label for="publicationDate" class="block text-sm font-medium text-gray-600">Publication Date</label>
                    <input type="date" id="publicationDate" name="publicationDate" class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-500" required />
                </div>
            </div>
            <div class="flex justify-between space-x-6 items-center">
                <button type="button" id="cancelModal" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-500 transition">Submit</button>
            </div>
        </form>
        </div>
      </div>
    </main>
    <?php require("./src/display.php"); ?>
  </div>
  <script src="./assets/js/script.js"></script>
</body>
</html>
