<!-- <!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Transfert | O'Store</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; }
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
<?php
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['errors']);
?>

<body class="bg-gray-900 text-white min-h-screen">
  <!-- Navbar -->
  <nav class="navbar p-4 mb-6">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold">MAXIT-SA</h1>
      <a href="/client/dashboard" class="btn-secondary px-4 py-2 rounded-lg font-medium">← Retour</a>
    </div>
  </nav>

  <!-- Contenu principal -->
  <div class="max-w-3xl mx-auto px-4">
    <div class="card p-6 rounded-2xl border border-gray-600">
      <h2 class="text-2xl font-semibold mb-6">Faire un Transfert</h2>

      <!-- Choix du type de transfert -->
      <form action="/client/account/transfer/store" method="post" class="space-y-6">
        <div>
          <label class="block mb-2 text-sm text-gray-300">Type de Transfert</label>
          <select id="transferType" name="transfer_to" class="w-full px-4 py-3 bg-gray-300 text-gray-800 rounded-lg focus:outline-none">
            <!-- <option value="">Sélectionner</option> -->
            <option value="vers_principal">Vers un autre compte principal</option>
            <option value="vers_secondaire">Vers un de mes comptes secondaires</option>
          </select>
        </div>

        <!-- Champ : Vers un autre compte principal -->
        <div id="destinataireAutre" class="block">
          <label class="block mb-2 text-sm text-gray-300">Numéro du compte destinataire</label>
          <input type="text" name="telephone" placeholder="Ex: 786660606" class="w-full px-4 py-3 bg-gray-300 text-gray-800 rounded-lg focus:outline-none" />
          <?php if (isset($errors['telephone'])): ?>
            <div class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['telephone'][0]) ?></div>
          <?php endif; ?>
        </div>

        <!-- Champ : Vers un compte secondaire -->
        <div id="destinataireSecondaire" class="hidden">
          <label class="block mb-2 text-sm text-gray-300">Choisir un de vos comptes secondaires</label>
          <select name="destinataire_compte" class="w-full px-4 py-3 bg-gray-300 text-gray-800 rounded-lg focus:outline-none">
            <option value="">Sélectionner un compte</option>
            <?php if (empty($comptesSecondaires)): ?>
              <option value="" disabled>Aucun compte secondaire disponible</option>
            <?php else: ?>
              <?php foreach ($comptesSecondaires as $compte): ?>
                <option value="<?= $compte['id'] ?>"><?= htmlspecialchars($compte['telephone']) ?> - Solde: <?= htmlspecialchars($compte['solde']) ?> FCFA</option>
              <?php endforeach; ?>
            <?php endif; ?>
            <!-- <option value="epargne">Compte Épargne</option>
            <option value="business">Compte Business</option>
            <option value="famille">Compte Famille</option> -->
          </select>
        </div>

        <!-- Montant -->
        <div>
          <label class="block mb-2 text-sm text-gray-300">Montant à transférer (FCFA)</label>
          <input type="number" name="montant" placeholder="Ex: 10000" class="w-full px-4 py-3 bg-gray-300 text-gray-800 rounded-lg focus:outline-none" />
          <?php if (isset($errors['montant'])): ?>
            <div class="text-red-500 text-sm mt-1"><?= htmlspecialchars($errors['montant'][0]) ?></div>
          <?php endif; ?>
        </div>

        <!-- Bouton valider -->
        <div class="flex justify-end">
          <button type="submit" class="btn-primary px-6 py-3 rounded-lg font-medium">Valider le Transfert</button>
        </div>
      </form>
    </div>
  </div>

  
<!-- </body>
</html> -->
