<?php
$errors = $_SESSION['flash_errors'] ?? [];
$formData = $_SESSION['flash_formData'] ?? [];
// var_dump($role);
unset($_SESSION['flash_errors'], $_SESSION['flash_formData']);
?>

<body class="bg-gray-800 min-h-screen">
  <div class="min-h-screen flex items-center justify-center px-4 py-4">
    <div class="w-full max-w-6xl">
      <h1 class="text-3xl font-bold text-white mb-4 text-center">Inscription</h1>
      <form action="/register" method="post" enctype="multipart/form-data" id="signupForm" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Colonne Gauche -->
        <div class="bg-gray-700 px-8 py-6 rounded-2xl border border-gray-600 max-w-[30rem]">
          <div class="space-y-4">
            <!-- Prénom -->
            <div>
              <label for="prenom" class="block text-white text-sm font-medium mb-2">
                Prénom
              </label>
              <input
                type="text"
                id="prenom"
                name="prenom"
                class="w-full px-4 py-3 bg-gray-300 border-0 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                placeholder="Entrez votre prénom"
                value="<?= htmlspecialchars($formData['prenom'] ?? '') ?>"
                autocomplete="given-name"
                aria-describedby="prenom-error">
              <?php if (!empty($errors['prenom'])): ?>
                <div class="text-red-400 text-xs mt-1" role="alert"><?= htmlspecialchars($errors['nom'][0]) ?></div>
              <?php endif; ?>
            </div>

            <!-- Nom -->
            <div>
              <label for="nom" class="block text-white text-sm font-medium mb-2">
                Nom
              </label>
              <input
                type="text"
                id="nom"
                name="nom"
                class="w-full px-4 py-3 bg-gray-300 border-0 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                placeholder="Entrez votre nom"
                value="<?= htmlspecialchars($formData['nom'] ?? '') ?>"
                autocomplete="family-name"
                aria-describedby="nom-error">
              <?php if (!empty($errors['nom'])): ?>
                <div class="text-red-400 text-xs mt-1" role="alert"><?= htmlspecialchars($errors['nom'][0]) ?></div>
              <?php endif; ?>
              <div id="nom-error" class="text-red-400 text-xs mt-1 hidden" role="alert"></div>
            </div>

            <!-- Adresse -->
            <div>
              <label for="adresse" class="block text-white text-sm font-medium mb-2">
                Adresse
              </label>
              <input
                type="text"
                id="adresse"
                name="adresse"
                class="w-full px-4 py-3 bg-gray-300 border-0 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                placeholder="Entrez votre adresse"
                value="<?= htmlspecialchars($formData['adresse'] ?? '') ?>"
                autocomplete="street-address"
                aria-describedby="adresse-error">
              <?php if (!empty($errors['adresse'])): ?>
                <div class="text-red-400 text-xs mt-1" role="alert"><?= htmlspecialchars($errors['adresse'][0]) ?></div>
              <?php endif; ?>
            </div>

            <!-- Téléphone -->
            <div>
              <label for="telephone" class="block text-white text-sm font-medium mb-2">
                Téléphone
              </label>
              <input
                type="tel"
                id="telephone"
                name="telephone"
                class="w-full px-4 py-3 bg-gray-300 border-0 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                placeholder="Entrez votre numéro de téléphone"
                value="<?= htmlspecialchars($formData['telephone'] ?? '') ?>"
                autocomplete="tel"
                aria-describedby="telephone-error">
              <?php if (!empty($errors['telephone'])): ?>
                <div class="text-red-400 text-xs mt-1" role="alert"><?= htmlspecialchars($errors['telephone'][0]) ?></div>
              <?php endif; ?>
            </div>

            <!-- Mot de passe -->
            <div>
              <label for="password" class="block text-white text-sm font-medium mb-2">
                Mot de passe
              </label>
              <input
                type="password"
                id="password"
                name="password"
                class="w-full px-4 py-3 bg-gray-300 border-0 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                placeholder="Créez un mot de passe"
                autocomplete="new-password"
                aria-describedby="password-error">
              <?php if (!empty($errors['password'])): ?>
                <div class="text-red-400 text-xs mt-1" role="alert"><?= htmlspecialchars($errors['password'][0]) ?></div>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <!-- Colonne Droite -->
        <div class="bg-gray-700 p-8 rounded-2xl border border-gray-600 max-w-[30rem]">
          <div class="space-y-4">
            <!-- NIN -->
            <div>
              <label for="nin" class="block text-white text-sm font-medium mb-2">
                NIN
              </label>
              <input
                type="text"
                id="nin"
                name="nin"
                class="w-full px-4 py-3 bg-gray-300 border-0 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200"
                placeholder="Numéro d'identification national"
                value="<?= htmlspecialchars($formData['nin'] ?? '') ?>"
                aria-describedby="nin-error">
              <?php if (!empty($errors['nin'])): ?>
                <div class="text-red-400 text-xs mt-1" role="alert"><?= htmlspecialchars($errors['nin'][0]) ?></div>
              <?php endif; ?>
            </div>

            <div>
              <input type="hidden" name="role" value="<?= $role['id'] ?? '' ?>">
            </div>

            <!-- Zone Upload Photo recto -->
            <div>
              <label class="block text-white text-sm font-medium mb-2">
                Photo recto CIN
              </label>
              <div class="upload-area bg-gray-600 rounded-lg p-4 text-center cursor-pointer"
                id="upload-recto"
                onclick="document.getElementById('photo-recto').click()">
                <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
                <p class="text-gray-400 text-sm">Photo recto CIN</p>
                <input type="file" id="photo-recto" name="photo_recto" accept="image/*" class="hidden" aria-describedby="photo-recto-error">
              </div>
              <?php if (!empty($errors['photo_recto'])): ?>
                <div class="text-red-400 text-xs mt-1">
                  <?= $errors['photo_recto'][0] ?>
                  <?php if (isset($_FILES['photo_recto'])): ?>
                    (Type reçu: <?= $_FILES['photo_recto']['type'] ?>)
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>

            <!-- Zone Upload Photo verso -->
            <div>
              <label class="block text-white text-sm font-medium mb-2">
                Photo verso CIN
              </label>
              <div class="upload-area bg-gray-600 rounded-lg p-4 text-center cursor-pointer"
                id="upload-verso"
                onclick="document.getElementById('photo-verso').click()">
                <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
                <p class="text-gray-400 text-sm">Photo verso CIN</p>
                <input type="file" id="photo-verso" name="photo_verso" accept="image/*" class="hidden" aria-describedby="photo-verso-error">
              </div>
              <?php if (!empty($errors['photo_verso'])): ?>
                <div class="text-red-400 text-xs mt-1" role="alert"><?= htmlspecialchars($errors['photo_verso'][0]) ?></div>
              <?php endif; ?>
            </div>

            <!-- Boutons -->
            <div class="lg:col-span-2 flex justify-center space-x-4 mt-8">
              <button
                type="button"
                id="cancelBtn"
                class="px-8 py-3 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                Annuler
              </button>
              <button
                type="submit"
                class="px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed">
                Valider
              </button>
            </div>

            <?php if (!empty($errors['global'])): ?>
              <div class="text-red-400 text-center text-xs mt-2" role="alert"><?= htmlspecialchars($errors['global']) ?></div>
            <?php endif; ?>

          </div>
        </div>


      </form>
    </div>
  </div>

  <!-- <script>
    // Éléments du formulaire
    const form = document.getElementById('signupForm');
    const inputs = {
      prenom: document.getElementById('prenom'),
      nom: document.getElementById('nom'),
      adresse: document.getElementById('adresse'),
      nin: document.getElementById('nin'),
      telephone: document.getElementById('telephone'),
      password: document.getElementById('password'),
      photoRecto: document.getElementById('photo-recto'),
      photoVerso: document.getElementById('photo-verso')
    };

    const errors = {
      prenom: document.getElementById('prenom-error'),
      nom: document.getElementById('nom-error'),
      adresse: document.getElementById('adresse-error'),
      nin: document.getElementById('nin-error'),
      telephone: document.getElementById('telephone-error'),
      password: document.getElementById('password-error'),
      photoRecto: document.getElementById('photo-recto-error'),
      photoVerso: document.getElementById('photo-verso-error')
    };

    // Fonctions de validation
    function validateText(value, fieldName) {
      value = value.trim();
      if (!value) {
        return `Le ${fieldName} est requis`;
      }
      if (value.length < 2) {
        return `Le ${fieldName} doit contenir au moins 2 caractères`;
      }
      return null;
    }

    function validateNIN(value) {
      value = value.trim();
      if (!value) {
        return 'Le NIN est requis';
      }
      if (!/^\d{13}$/.test(value)) {
        return 'Le NIN doit contenir exactement 13 chiffres';
      }
      return null;
    }

    function validatePhone(value) {
      value = value.trim();
      if (!value) {
        return 'Le numéro de téléphone est requis';
      }
      if (!/^[+]?[\d\s-()]{8,15}$/.test(value)) {
        return 'Format de téléphone invalide';
      }
      return null;
    }

    function validatePassword(value) {
      if (!value) {
        return 'Le mot de passe est requis';
      }
      if (value.length < 8) {
        return 'Le mot de passe doit contenir au moins 8 caractères';
      }
      if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(value)) {
        return 'Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre';
      }
      return null;
    }

    function validateFile(file, fieldName) {
      if (!file) {
        return `La ${fieldName} est requise`;
      }
      if (!file.type.startsWith('image/')) {
        return 'Le fichier doit être une image';
      }
      if (file.size > 5 * 1024 * 1024) {
        return 'La taille du fichier ne doit pas dépasser 5 Mo';
      }
      return null;
    }

    // Afficher/masquer les erreurs
    function showError(input, errorElement, message) {
      input.classList.add('ring-2', 'ring-red-500', 'bg-red-50');
      input.classList.remove('focus:ring-blue-500');
      errorElement.textContent = message;
      errorElement.classList.remove('hidden');
    }

    function hideError(input, errorElement) {
      input.classList.remove('ring-2', 'ring-red-500', 'bg-red-50');
      input.classList.add('focus:ring-blue-500');
      errorElement.classList.add('hidden');
    }

    // Validation d'un champ
    function validateField(input, errorElement, validationFn) {
      const error = validationFn(input.value || input.files?.[0]);
      if (error) {
        showError(input, errorElement, error);
        return false;
      } else {
        hideError(input, errorElement);
        return true;
      }
    }

    // Événements de validation pour les champs texte
    Object.keys(inputs).forEach(key => {
      if (key === 'photoRecto' || key === 'photoVerso') return;

      inputs[key].addEventListener('blur', () => {
        let validationFn;
        switch (key) {
          case 'prenom':
            validationFn = (value) => validateText(value, 'prénom');
            break;
          case 'nom':
            validationFn = (value) => validateText(value, 'nom');
            break;
          case 'adresse':
            validationFn = (value) => validateText(value, 'adresse');
            break;
          case 'nin':
            validationFn = validateNIN;
            break;
          case 'telephone':
            validationFn = validatePhone;
            break;
          case 'password':
            validationFn = validatePassword;
            break;
        }
        validateField(inputs[key], errors[key], validationFn);
      });

      // Masquer les erreurs pendant la saisie
      inputs[key].addEventListener('input', () => {
        if (inputs[key].classList.contains('ring-red-500')) {
          hideError(inputs[key], errors[key]);
        }
      });
    });

    // Gestion des uploads de fichiers
    function handleFileUpload(input, uploadArea, errorElement) {
      input.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
          const error = validateFile(file, 'photo');
          if (error) {
            showError(input, errorElement, error);
            uploadArea.innerHTML = `
                            <svg class="w-12 h-12 mx-auto mb-2 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <p class="text-red-400 text-sm">Erreur de fichier</p>
                        `;
          } else {
            hideError(input, errorElement);
            uploadArea.innerHTML = `
                            <svg class="w-12 h-12 mx-auto mb-2 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <p class="text-green-400 text-sm">${file.name}</p>
                        `;
          }
        }
      });
    }

    handleFileUpload(inputs.photoRecto, document.getElementById('upload-recto'), errors.photoRecto);
    handleFileUpload(inputs.photoVerso, document.getElementById('upload-verso'), errors.photoVerso);

    // Soumission du formulaire
    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const validations = [
        validateField(inputs.prenom, errors.prenom, (value) => validateText(value, 'prénom')),
        validateField(inputs.nom, errors.nom, (value) => validateText(value, 'nom')),
        validateField(inputs.adresse, errors.adresse, (value) => validateText(value, 'adresse')),
        validateField(inputs.nin, errors.nin, validateNIN),
        validateField(inputs.telephone, errors.telephone, validatePhone),
        validateField(inputs.password, errors.password, validatePassword),
        validateField(inputs.photoRecto, errors.photoRecto, (file) => validateFile(file, 'photo recto')),
        validateField(inputs.photoVerso, errors.photoVerso, (file) => validateFile(file, 'photo verso'))
      ];

      const isValid = validations.every(v => v);

      if (isValid) {
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;

        submitBtn.textContent = 'Inscription...';
        submitBtn.disabled = true;

        setTimeout(() => {
          alert('Inscription réussie !');
          submitBtn.textContent = originalText;
          submitBtn.disabled = false;
        }, 2000);
      }
    });

    // Bouton Annuler
    document.getElementById('cancelBtn').addEventListener('click', () => {
      if (confirm('Êtes-vous sûr de vouloir annuler l\'inscription ?')) {
        form.reset();
        // Réinitialiser les zones d'upload
        document.getElementById('upload-recto').innerHTML = `
                    <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <p class="text-gray-400 text-sm">Photo recto CIN</p>
                `;
        document.getElementById('upload-verso').innerHTML = `
                    <svg class="w-12 h-12 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                    </svg>
                    <p class="text-gray-400 text-sm">Photo verso CIN</p>
                `;
      }
    });
  </script> -->
</body>