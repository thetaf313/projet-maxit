<body class="bg-gray-800 min-h-screen">
    <!-- Navigation -->
    <nav class="navbar p-4 mb-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-white text-xl font-bold">MAXIT-SA <span class="text-gray-400 font-normal text-sm"></span></div>
            <div class="flex items-center space-x-4">
                <span class="text-gray-300">Bonjour,
                    <?php if (isset($_SESSION['user'])): ?>
                        <span class="text-white font-medium"><?= htmlspecialchars($_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']) ?></span>
                    <?php else: ?>
                        <span class="text-white font-medium">Invité</span>
                    <?php endif; ?>
                </span>
                <form action="/logout" method="post">
                    <button type="submit" class="btn-secondary text-white px-4 py-2 rounded-lg font-medium">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="absolute bottom-5 right-5 w-80 h-16 bg-gradient-to-r from-gray-800 to-gray-600">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="max-w-7xl mx-auto text-center pt-16">
                <p class="text-white text-3xl font-bold mb-2"><?= htmlspecialchars($_SESSION['error']) ?></p>
            </div>
        <?php unset($_SESSION['error']);
        endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="max-w-7xl mx-auto text-center pt-16">
                <p class="text-white text-3xl font-bold mb-2"><?= htmlspecialchars($_SESSION['success']) ?></p>
            </div>
        <?php unset($_SESSION['success']);
        endif; ?>
    </div>

    <div class="max-w-7xl mx-auto py-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <!-- Gestion des Comptes -->
                <div class="card p-4 rounded-2xl border border-gray-600 mb-4">
                    <h2 class="text-white font-semibold text-lg mb-3">Gestion des Comptes</h2>
                    <form action="/client/change-account" method="post">
                        <div class="flex flex-col md:flex-row gap-4">
                            <select name="compte_id" class="account-selector px-4 py-2 rounded-lg text-white flex-1 border-gray-600 bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                <option class="bg-gray-700" value="">Selectionner un compte</option>
                                <?php foreach ($comptesSecondaires as $compte): ?>
                                    <option class="bg-gray-700" value="<?= htmlspecialchars($compte['id']) ?>"><?= htmlspecialchars($compte['telephone']) ?> - <?= htmlspecialchars($compte['type_compte']) ?></option>
                                <?php endforeach; ?>
                                <!-- <option value="epargne">Compte Épargne</option>
                        <option value="business">Compte Business</option>
                        <option value="famille">Compte Famille</option> -->
                            </select>
                            <div class="flex gap-2">
                                <button type="submit" class="bg-[#1f2937] border border-gray-300 px-4 py-2 text-white rounded-lg font-medium">Changer de Compte</button>
                                <a href="/client/account/add-secondary" class="btn-secondary px-4 py-2 text-white rounded-lg font-medium">+ Ajouter</a>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Infos + Solde -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div class="card p-4 rounded-2xl border border-gray-600">
                        <h2 class="text-white font-semibold text-lg mb-3">Informations Personnelles</h2>
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center">
                                <?php if (isset($_SESSION['user'])): ?>
                                    <span class="text-white font-bold"><?= htmlspecialchars($_SESSION['user']['prenom'][0] . '' . $_SESSION['user']['nom'][0]) ?></span>
                                <?php endif; ?>
                            </div>
                            <div>
                                <?php if (isset($_SESSION['user'])): ?>
                                    <span class="text-white font-medium"><?= htmlspecialchars($_SESSION['user']['prenom']) ?></span>
                                    <span class="text-white font-medium"><?= htmlspecialchars($_SESSION['user']['nom']) ?></span>
                                <?php endif; ?>
                                <p class="text-gray-400 text-sm">Compte Principal</p>
                            </div>
                        </div>
                        <div class="mt-3 border-t border-gray-600 pt-2">
                            <p class="text-gray-400 text-sm">Numéro</p>
                            <?php if (isset($comptePrincipal)): ?>
                                <p class="text-white"><?= htmlspecialchars($comptePrincipal['telephone']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="balance-card p-4 rounded-2xl border border-green-600">
                        <h2 class="text-white font-semibold text-lg mb-3">Solde du Compte</h2>
                        <p class="text-green-100 text-sm">Solde Disponible</p>
                        <?php if (isset($comptePrincipal)): ?>
                            <p class="text-white text-2xl font-bold"><?= htmlspecialchars($comptePrincipal['solde']) ?> F CFA</p>
                        <?php endif; ?>
                        <div class="flex justify-between mt-3 text-white">
                            <div>
                                <p class="text-green-100 text-xs">Depot</p>
                                <p class="font-medium">+15 500 FCFA</p>
                            </div>
                            <div>
                                <p class="text-green-100 text-xs">Retrait</p>
                                <p class="font-medium">-21 500 FCFA</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Services -->
                <div class="card p-4 rounded-2xl border border-gray-600 mb-4">
                    <h2 class="text-white font-semibold text-lg mb-3">Services Disponibles</h2>
                    <div class="grid grid-cols-2 gap-8">
                        <a href="/client/account/transfer" class="service-button bg-gray-500 text-white text-center px-4 py-8
                        rounded-lg hover:bg-gray-400 transition-colors">
                            <span class="icon">💳</span> Transfert
                        </a>
                        <button class="service-button bg-gray-500 text-white px-4 py-8
                        rounded-lg hover:bg-gray-400 transition-colors">
                            <span class="icon">🏦</span> Paiement
                        </button>
                    </div>
                </div>
            </div>

            <div>
                <!-- Transactions -->
                <div class="card p-4 rounded-2xl border border-gray-600">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-white font-semibold text-lg">Dernières Transactions</h2>
                        <a href="/client/account/list-transactions" class="text-blue-400 hover:text-blue-300 text-sm font-medium">Voir plus →</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-gray-600">
                                    <th class="text-left py-2 px-2 text-gray-300 font-medium">Date</th>
                                    <!-- <th class="text-left py-2 px-2 text-gray-300 font-medium">Description</th> -->
                                    <th class="text-left py-2 px-2 text-gray-300 font-medium">Type</th>
                                    <th class="text-right py-2 px-2 text-gray-300 font-medium">Montant</th>
                                    <th class="text-center py-2 px-2 text-gray-300 font-medium">Statut</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($lastTransactions) && count($lastTransactions) > 0): ?>
                                    <?php foreach ($lastTransactions as $transaction): ?>
                                        <tr class="transaction-row border-b border-gray-600">
                                            <td class="py-2 px-2 text-gray-300"><?= htmlspecialchars($transaction['date']) ?></td>

                                            <td class="py-2 px-2 text-gray-300"><?= htmlspecialchars($transaction['type_transaction']) ?></td>
                                            <td class="py-2 px-2 text-right <?= $transaction['type_transaction'] == 'Paiement' || $transaction['type_transaction'] == 'Retrait' ? 'text-red-400' : 'text-green-400' ?> font-medium">
                                                <?= htmlspecialchars(number_format($transaction['montant'], 0, ',', ' ') . ' FCFA') ?>
                                            </td>
                                            <td class="py-2 px-2 text-center">
                                                <span class="px-3 py-1 rounded-full text-xs text-white status-success">
                                                    <?= htmlspecialchars($transaction['statut_transaction']) ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr class="border-b border-gray-600">
                                        <td colspan="5" class="py-4 text-center text-gray-400">
                                            Aucune transaction récente.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <!-- <tr class="transaction-row border-b border-gray-600">
                                    <td class="py-2 px-2 text-gray-300">12/07/2024</td>
                                    <td class="py-2 px-2 text-white">Achat en ligne - Amazon</td>
                                    <td class="py-2 px-2 text-gray-300">Débit</td>
                                    <td class="py-2 px-2 text-right text-red-400 font-medium">-45 000 FCFA</td>
                                    <td class="py-2 px-2 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs text-white status-success">Confirmé</span>
                                    </td>
                                </tr>
                                <tr class="transaction-row border-b border-gray-600">
                                    <td class="py-2 px-2 text-gray-300">11/07/2024</td>
                                    <td class="py-2 px-2 text-white">Virement - Salaire</td>
                                    <td class="py-2 px-2 text-gray-300">Crédit</td>
                                    <td class="py-2 px-2 text-right text-green-400 font-medium">250 000 FCFA</td>
                                    <td class="py-2 px-2 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs text-white status-success">Confirmé</span>
                                    </td>
                                </tr>
                                <tr class="transaction-row border-b border-gray-600">
                                    <td class="py-2 px-2 text-gray-300">10/07/2024</td>
                                    <td class="py-2 px-2 text-white">Facture Électricité</td>
                                    <td class="py-2 px-2 text-gray-300">Débit</td>
                                    <td class="py-2 px-2 text-right text-red-400 font-medium">-35 000 FCFA</td>
                                    <td class="py-2 px-2 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs text-white status-success">Confirmé</span>
                                    </td>
                                </tr>
                                <tr class="transaction-row border-b border-gray-600">
                                    <td class="py-2 px-2 text-gray-300">09/07/2024</td>
                                    <td class="py-2 px-2 text-white">Achat - Supermarché</td>
                                    <td class="py-2 px-2 text-gray-300">Débit</td>
                                    <td class="py-2 px-2 text-right text-red-400 font-medium">-120 000 FCFA</td>
                                    <td class="py-2 px-2 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs text-white status-success">Confirmé</span>
                                    </td>
                                </tr>
                                <tr class="transaction-row border-b border-gray-600">
                                    <td class="py-2 px-2 text-gray-300">08/07/2024</td>
                                    <td class="py-2 px-2 text-white">Virement - Épargne</td>
                                    <td class="py-2 px-2 text-gray-300">Crédit</td>
                                    <td class="py-2 px-2 text-right text-green-400 font-medium">+50 000 FCFA</td>
                                    <td class="py-2 px-2 text-center">
                                        <span class="px-3 py-1 rounded-full text-xs text-white status-success">Confirmé</span>
                                    </td>
                                </tr> -->

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>