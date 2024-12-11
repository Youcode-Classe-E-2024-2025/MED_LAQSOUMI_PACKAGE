<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des Packages Dashboard</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
</head>

<body class="bg-gray-100 font-sans">
  <!-- Navbar -->
  <header class="bg-gray-900 text-gray-200 px-4 py-3 flex items-center justify-between md:hidden">
    <h1 class="text-lg font-bold material-symbols-outlined">Dashboard</h1>
    <button id="toggleMenu" class="material-symbols-outlined text-gray-400 focus:outline-none">
      menu
    </button>
  </header>

  <!-- Dropdown Menu (hidden by default) -->
  <nav id="dropdownMenu" class="bg-gray-800 text-gray-200 hidden absolute top-12 left-0 w-full shadow-md transition-transform duration-300 transform -translate-y-full">
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
    <aside class="bg-gray-800 text-gray-200 w-64 hidden md:flex flex-col h-full">
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
    <div class="flex-1 p-6 flex gap-6 flex-col">
      <!-- Header -->
      <header class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">DASHBOARD</h2>
        <button  id="addModal" class="flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
          <span  class="material-symbols-outlined">add</span>
        </button>
      </header>
    
      <!-- Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">
        <div class="bg-white p-4 rounded-lg shadow">
          <h3 class="text-lg font-medium text-gray-800">Packages</h3>
          <p class="text-2xl font-bold text-gray-900">15</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <h3 class="text-lg font-medium text-gray-800">Authors</h3>
          <p class="text-2xl font-bold text-gray-900">8</p>
        </div>
      </div>
      <div class="bg-white p-4 rounded-lg shadow gap-4 flex flex-col">
          <h3 class="text-lg font-medium text-gray-800">LIST: </h3>
          <table class="border-collapse border border-gray-400 w-full text-left">
          <thead>
            <tr>
              <th class="border border-gray-400 px-4 py-2">ID</th>
              <th class="border border-gray-400 px-4 py-2">Name</th>
              <th class="border border-gray-400 px-4 py-2">Email</th>
              <th class="border border-gray-400 px-4 py-2">Role</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="border border-gray-400 px-4 py-2">1</td>
              <td class="border border-gray-400 px-4 py-2">John Doe</td>
              <td class="border border-gray-400 px-4 py-2">johndoe@example.com</td>
              <td class="border border-gray-400 px-4 py-2">Admin</td>
            </tr>
            <tr>
              <td class="border border-gray-400 px-4 py-2">2</td>
              <td class="border border-gray-400 px-4 py-2">Jane Smith</td>
              <td class="border border-gray-400 px-4 py-2">janesmith@example.com</td>
              <td class="border border-gray-400 px-4 py-2">Editor</td>
            </tr>
            <tr>
              <td class="border border-gray-400 px-4 py-2">3</td>
              <td class="border border-gray-400 px-4 py-2">Michael Brown</td>
              <td class="border border-gray-400 px-4 py-2">michaelbrown@example.com</td>
              <td class="border border-gray-400 px-4 py-2">Viewer</td>
            </tr>
          </tbody>
        </table>

        </div>
      <!-- Modal -->
      <div id="modal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm">
        <div class="bg-white rounded-lg shadow-lg  max-w-md p-6 relative">
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
    </main>
  </div>
  <script src="./assets/js/script.js"></script>
</body>

</html>
