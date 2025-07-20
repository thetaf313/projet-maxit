<!-- <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard | Service Commercial</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }

    .card {
      background: linear-gradient(135deg, #374151 0%, #1f2937 100%);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
    }

    .btn-primary {
      background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    }

    .btn-secondary {
      background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
    }

    .status-success {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .navbar {
      background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    }

    .sidebar {
      background: linear-gradient(135deg, #111827 0%, #0f172a 100%);
    }
  </style>
</head> -->
<body class="bg-gray-900 text-white min-h-screen">

  <!-- Layout -->
  <div class="flex">

    <!-- Sidebar -->
    <aside class="sidebar w-64 min-h-screen p-6 hidden md:block">
      <h2 class="text-2xl font-bold mb-8">O'Store</h2>
      <nav class="space-y-4">
        <a href="#" class="block text-gray-300 hover:text-white">🔍 Rechercher un compte</a>
        <a href="#" class="block text-gray-300 hover:text-white">📄 Historique Transactions</a>
        <a href="dashboard.html" class="block text-gray-300 hover:text-white">🏠 Retour Dashboard</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <h1 class="text-2xl font-semibold mb-6">Service Commercial - Tableau de bord</h1>

      <!-- Recherche -->
      <div class="card p-6 rounded-2xl border border-gray-600 mb-6">
        <h2 class="text-lg font-medium mb-4">Rechercher un compte</h2>
        <form class="flex flex-col md:flex-row gap-4">
          <input type="text" placeholder="Entrer un numéro de compte..." class="w-full md:w-1/2 px-4 py-3 bg-gray-300 text-gray-800 rounded-lg focus:outline-none" />
          <button class="btn-primary px-6 py-3 rounded-lg font-medium">Rechercher</button>
        </form>
      </div>

      <!-- Résultats -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <!-- Solde du compte -->
        <div class="card p-6 rounded-2xl border border-gray-600">
          <h2 class="text-xl font-semibold mb-4">Solde du Compte</h2>
          <p class="text-gray-400 text-sm">Compte N° 0012458799312</p>
          <p class="text-3xl font-bold mt-2 text-green-400">1 250 000 FCFA</p>
        </div>

        <!-- Infos ou statistiques additionnelles -->
        <div class="card p-6 rounded-2xl border border-gray-600">
          <h2 class="text-xl font-semibold mb-4">Statistiques</h2>
          <p class="text-gray-400 text-sm">10 transactions ce mois-ci</p>
          <p class="text-gray-400 text-sm mt-1">Dernière activité : 12 juillet 2024</p>
        </div>
      </div>

      <!-- Dernières transactions -->
      <div class="card p-6 rounded-2xl border border-gray-600">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-xl font-semibold">10 dernières transactions</h2>
          <a href="transactions.html" class="text-blue-400 hover:underline text-sm">Voir plus →</a>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead>
              <tr class="border-b border-gray-600">
                <th class="text-left py-2 px-2 text-gray-300">Date</th>
                <th class="text-left py-2 px-2 text-gray-300">Description</th>
                <th class="text-left py-2 px-2 text-gray-300">Type</th>
                <th class="text-right py-2 px-2 text-gray-300">Montant</th>
                <th class="text-center py-2 px-2 text-gray-300">Statut</th>
              </tr>
            </thead>
            <tbody>
              <tr class="border-b border-gray-600">
                <td class="py-2 px-2 text-gray-300">2024-07-12</td>
                <td class="py-2 px-2 text-white">Achat Amazon</td>
                <td class="py-2 px-2 text-gray-300">Débit</td>
                <td class="py-2 px-2 text-right text-red-400 font-medium">-45 000 FCFA</td>
                <td class="py-2 px-2 text-center">
                  <span class="status-success px-3 py-1 rounded-full text-xs text-white">Confirmé</span>
                </td>
              </tr>
              <!-- Répéter ici pour les 10 transactions -->
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
<!-- </html> -->
