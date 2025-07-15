<!-- <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transactions | O'Store</title>
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

    .navbar {
      background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
    }

    .status-success {
      background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .status-pending {
      background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .status-failed {
      background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }
  </style>
</head> -->
<body class="bg-gray-800 min-h-screen text-white">
  <!-- Navbar -->
  <nav class="navbar p-4 mb-6">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold">MAXIT-SA</h1>
      <a href="/client/dashboard" class="btn-secondary px-4 py-2 rounded-lg font-medium">← Retour</a>
    </div>
  </nav>

  <!-- Contenu -->
  <div class="max-w-7xl mx-auto px-4">
    <div class="card p-6 rounded-2xl border border-gray-600 mb-6">
      <h2 class="text-2xl font-semibold mb-4">Historique des Transactions</h2>

      <!-- Filtres -->
      <form class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div>
          <label class="block mb-2 text-sm text-gray-300">Du</label>
          <input type="date" name="dateStart" class="w-full px-4 py-2 rounded-lg bg-gray-300 text-gray-800 focus:outline-none">
        </div>
        <div>
          <label class="block mb-2 text-sm text-gray-300">Au</label>
          <input type="date" name="dateEnd" class="w-full px-4 py-2 rounded-lg bg-gray-300 text-gray-800 focus:outline-none">
        </div>
        <div>
          <label class="block mb-2 text-sm text-gray-300">Type de transaction</label>
          <select name="type" class="w-full px-4 py-2 rounded-lg bg-gray-300 text-gray-800 focus:outline-none">
            <option value="">Tous</option>
            <option value="credit">Paiement</option>
            <option value="debit">Depot</option>
            <option value="debit">Retrait</option>
          </select>
        </div>
      </form>

      <!-- Tableau -->
      <div class="overflow-x-auto">
        <table class="w-full text-sm">
          <thead>
            <tr class="border-b border-gray-600">
              <th class="text-left py-3 px-2 text-gray-300 font-medium">Date</th>
              <th class="text-left py-3 px-2 text-gray-300 font-medium">Description</th>
              <th class="text-left py-3 px-2 text-gray-300 font-medium">Type</th>
              <th class="text-right py-3 px-2 text-gray-300 font-medium">Montant</th>
              <th class="text-center py-3 px-2 text-gray-300 font-medium">Statut</th>
            </tr>
          </thead>
          <tbody>
            <tr class="border-b border-gray-600">
              <td class="py-3 px-2 text-gray-300">2024-07-12</td>
              <td class="py-3 px-2 text-white">Achat Amazon</td>
              <td class="py-3 px-2 text-gray-300">Paiement</td>
              <td class="py-3 px-2 text-right text-red-400 font-medium">-45 000 FCFA</td>
              <td class="py-3 px-2 text-center">
                <span class="status-success px-3 py-1 rounded-full text-xs text-white">Confirmé</span>
              </td>
            </tr>
            <tr class="border-b border-gray-600">
              <td class="py-3 px-2 text-gray-300">2024-07-11</td>
              <td class="py-3 px-2 text-white">Salaire</td>
              <td class="py-3 px-2 text-gray-300">Retrait</td>
              <td class="py-3 px-2 text-right text-green-400 font-medium">250 000 FCFA</td>
              <td class="py-3 px-2 text-center">
                <span class="status-success px-3 py-1 rounded-full text-xs text-white">Confirmé</span>
              </td>
            </tr>
            <!-- Ajoute ici d'autres lignes si nécessaire -->
          </tbody>
        </table>
      </div>

      <!-- Pagination -->
      <div class="flex justify-between items-center mt-6">
        <p class="text-sm text-gray-400">Page 1 sur 3</p>
        <div class="flex gap-2">
          <button class="btn-secondary px-4 py-2 rounded-lg text-sm font-medium">← Précédent</button>
          <button class="btn-primary px-4 py-2 rounded-lg text-sm font-medium">Suivant →</button>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- </html> -->
