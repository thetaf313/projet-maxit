<!-- <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ajouter un Compte | O'Store</title>
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
  </style>
</head> -->
<body class="bg-gray-800 min-h-screen text-white overflow-hidden">
  <!-- Navigation -->
  <nav class="navbar p-4 mb-6">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold text-white">MAXIT-SA</h1>
      <a href="/client/dashboard" class="btn-secondary text-white px-4 py-2 rounded-lg font-medium">Retour au Dashboard</a>
    </div>
  </nav>

  <!-- Contenu principal -->
  <div class="max-w-6xl mx-auto px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 items-start">
      <!-- Formulaire -->
      <div class="card p-6 rounded-2xl border border-gray-600">
        <h2 class="text-2xl font-semibold mb-6">Ajouter un Compte Secondaire</h2>
        <form action="#" method="POST">
          <div class="space-y-4">
            <div>
              <label class="block mb-2 text-sm font-medium">Nom du Compte</label>
              <input type="text" name="accountName" required placeholder="Ex : Compte Épargne"
                     class="w-full px-4 py-3 bg-gray-300 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div>
              <label class="block mb-2 text-sm font-medium">Numéro de Compte</label>
              <input type="text" name="accountNumber" required placeholder="Ex : 0012458799312"
                     class="w-full px-4 py-3 bg-gray-300 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
            <div>
              <label class="block mb-2 text-sm font-medium">Solde Initial (optionnel)</label>
              <input type="number" name="initialBalance" min="0" placeholder="Ex : 10000"
                     class="w-full px-4 py-3 bg-gray-300 text-gray-900 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>
          </div>

          <div class="flex gap-4 mt-6">
            <a href="dashboard.html" class="btn-secondary px-6 py-3 rounded-lg font-medium text-center block w-1/2 text-white">
              Annuler
            </a>
            <button type="submit" class="btn-primary px-6 py-3 rounded-lg font-medium w-1/2">
              Ajouter le Compte
            </button>
          </div>
        </form>
      </div>

      <!-- Infos additionnelles -->
      <div class="card p-6 rounded-2xl border border-gray-600">
        <h3 class="text-xl font-semibold mb-4">Pourquoi ajouter un compte secondaire ?</h3>
        <ul class="list-disc pl-5 space-y-3 text-gray-300 text-sm">
          <li>Organisez vos finances par objectifs (Épargne, Business, Famille…)</li>
          <li>Suivez séparément vos transactions selon le type de compte</li>
          <li>Accédez rapidement à chaque compte via le tableau de bord</li>
          <li>Définissez un solde initial pour démarrer facilement</li>
        </ul>
        <div class="mt-6 text-sm text-gray-400">
          Astuce : le nom du compte s'affichera dans vos transactions, pensez à choisir un nom clair.
        </div>
      </div>
    </div>
  </div>
</body>
<!-- </html> -->
