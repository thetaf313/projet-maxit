<?php
$errors = $_SESSION['flash_errors'] ?? [];
$formData = $_SESSION['flash_formData'] ?? [];
unset($_SESSION['flash_errors'], $_SESSION['flash_formData']);
?>

<!-- <div class="relative flex size-full min-h-screen flex-col bg-[#262626] group/design-root overflow-x-hidden" style='font-family: Inter, "Noto Sans", sans-serif;'>
  <div class="layout-container flex h-full grow flex-col items-center mt-8">
    
          <div class="flex items-center gap-4 text-[#111418]">
            <div class="size-4">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M24 4H6V17.3333V30.6667H24V44H42V30.6667V17.3333H24V4Z" fill="currentColor"></path>
              </svg>
            </div>
            <h2 class="text-[#111418] text-lg font-bold leading-tight tracking-[-0.015em]">MAXITSA</h2>
          </div>
          
    <form action="/login" method="post">
      <div class="px-40 flex flex-1 justify-center py-5">
        <div class="layout-content-container flex flex-col w-[512px] max-w-[512px] py-5 max-w-[960px] flex-1">
          <h2 class="text-[#FFFFFF] tracking-light text-[28px] font-bold leading-tight px-4 text-center pb-3 pt-5">Connectez-vous à MAXITSA</h2>
          <?php if (!empty($errors['global'])): ?>
            <div class="mb-4 text-red-400 text-sm text-center">
              <?= htmlspecialchars($errors['global']) ?>
            </div>
          <?php endif; ?>

          <div class="flex max-w-[480px] flex-col px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1 mb-1">
              <p class="text-[#FFFFFF] text-base font-medium leading-normal pb-2">Numéro de téléphone</p>
              <input
                placeholder="Entrez votre numéro de téléphone"
                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#262626] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637588] p-4 text-base font-normal leading-normal"
                value="<?= htmlspecialchars($formData['login'] ?? '') ?>"
                name="login"
                autocomplete="off" />
            </label>
            <?php if (!empty($errors['login'])): ?>
              <div class="text-red-400 text-sm"><?= htmlspecialchars($errors['login']) ?></div>
              <?php endif; ?>
          </div>
          <div class="flex max-w-[480px] flex-col px-4 py-3">
            <label class="flex flex-col min-w-40 flex-1 mb-1">
              <p class="text-[#FFFFFF] text-base font-medium leading-normal pb-2">Mot de passe</p>
              <input
                type="password"
                placeholder="Entrez votre mot de passe"
                class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-[#262626] focus:outline-0 focus:ring-0 border-none bg-[#f0f2f4] focus:border-none h-14 placeholder:text-[#637588] p-4 text-base font-normal leading-normal"
                value=""
                name="password"
                autocomplete="new-password" />
            </label>
            <?php if (!empty($errors['password'])): ?>
                <div class="text-red-400 text-sm"><?= htmlspecialchars($errors['password']) ?></div>
            <?php endif; ?>
          </div>
          <p class="text-[#FFFFFF] text-xs text-right font-normal leading-normal pb-3 pt-1 px-4 underline cursor-pointer"><a href="#">Mot de passe oublié ?</a></p>
          <div class="flex px-4 py-3 justify-center">
            <button
              type="submit"
              class="flex min-w-[84px] max-w-[280px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-5 flex-1 bg-[#BEBEC0] text-[#262626] text-base font-bold leading-normal tracking-[0.015em]">
              <span class="truncate">Se connecter</span>
            </button>
          </div>
          <p class="text-[#637588] text-sm font-normal leading-normal pb-3 pt-1 px-4 text-center underline"><a href="/account/create"> n'avez pas de compte ? Créer un compte</a></p>
        </div>
      </div>
    </form>
  </div>
</div> -->

<!-- fdgfhkjklk;l;l -->

<body class="bg-gray-800 min-h-screen flex items-center justify-center px-4 py-8">
    <div class="w-full max-w-md">
        <div class="login-container p-8 rounded-2xl border border-gray-600">
            <!-- En-tête -->
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">MAX IT</h1>
                <p class="text-gray-400">Connectez-vous à votre compte</p>
            </div>

            <form id="loginForm" class="space-y-6" method="post" action="/login">
                <!-- Champ Téléphone -->
                <div>
                    <label for="identifier" class="block text-white text-sm font-medium mb-2">
                        Téléphone
                    </label>
                    <input
                        type="text"
                        id="identifier"
                        name="login"
                        class="w-full px-4 py-3 bg-gray-300 border-0 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 hover:input-focus"
                        placeholder="Entrez votre téléphone"
                        value="<?= htmlspecialchars($formData['login'] ?? '') ?>"
                        autocomplete="off"
                        aria-describedby="identifier-error">
                    <?php if (!empty($errors['login'])): ?>
                        <div class="text-red-400 text-xs mt-1" role="alert"><?= htmlspecialchars($errors['login']) ?></div>
                    <?php endif; ?>
                    <!-- <div id="identifier-error" class="text-red-400 text-xs mt-1 hidden" role="alert"></div> -->
                </div>

                <!-- Champ Mot de passe -->
                <div>
                    <label for="password" class="block text-white text-sm font-medium mb-2">
                        Mot de passe
                    </label>
                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="w-full px-4 py-3 bg-gray-300 border-0 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white transition-all duration-200 hover:input-focus pr-12"
                            placeholder="Entrez votre mot de passe"
                            autocomplete="current-password"
                            aria-describedby="password-error">
                        <button
                            type="button"
                            id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700 focus:outline-none"
                            aria-label="Afficher/masquer le mot de passe">
                            <svg id="eye-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            <svg id="eye-closed" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"></path>
                            </svg>
                        </button>
                    </div>
                    <?php if (!empty($errors['password'])): ?>
                        <div class="text-red-400 text-xs mt-1"><?= htmlspecialchars($errors['password']) ?></div>
                    <?php endif; ?>
                    <!-- <div id="password-error" class="text-red-400 text-xs mt-1 hidden" role="alert"></div> -->
                </div>

                <!-- Se souvenir de moi et Mot de passe oublié -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm text-gray-300">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            class="mr-2 w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                        Se souvenir de moi
                    </label>
                    <a href="#" class="text-sm text-blue-400 hover:text-blue-300 forgot-link transition-colors duration-200">
                        Mot de passe oublié ?
                    </a>
                </div>

                <!-- Bouton de connexion -->
                <button
                    type="submit"
                    class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 disabled:opacity-50 disabled:cursor-not-allowed hover:btn-hover">
                    Se connecter
                </button>

                <!-- Lien d'inscription -->
                <div class="text-center">
                    <p class="text-gray-400 text-sm">
                        Vous n'avez pas de compte ?
                        <a href="/account/create" class="text-blue-400 hover:text-blue-300 font-medium transition-colors duration-200">
                            Inscrivez-vous
                        </a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Message d'erreur global -->
        <!-- <div id="global-error" class="mt-4 p-4 text-white  text-center"> -->
            <!-- <p id="global-error-message"></p> -->
            <?php if (!empty($errors['global'])): ?>
                    <div class="m-4 text-red-400 text-sm text-center rounded-lg">
                        <?= htmlspecialchars($errors['global']) ?>
                    </div>
                <?php endif; ?>
        <!-- </div> -->

        <!-- Message de succès -->
        <div id="success-message" class="hidden mt-4 p-4 bg-green-600 text-white rounded-lg text-center">
            <p>Connexion réussie ! Redirection en cours...</p>
        </div>
    </div>

    <!-- <script>
        // Éléments du formulaire
        const form = document.getElementById('loginForm');
        const inputs = {
            identifier: document.getElementById('identifier'),
            password: document.getElementById('password')
        };
        
        const errors = {
            identifier: document.getElementById('identifier-error'),
            password: document.getElementById('password-error')
        };
        
        const globalError = document.getElementById('global-error');
        const globalErrorMessage = document.getElementById('global-error-message');
        const successMessage = document.getElementById('success-message');
        
        // Bouton d'affichage/masquage du mot de passe
        const togglePassword = document.getElementById('togglePassword');
        const eyeOpen = document.getElementById('eye-open');
        const eyeClosed = document.getElementById('eye-closed');
        
        togglePassword.addEventListener('click', () => {
            const type = inputs.password.getAttribute('type') === 'password' ? 'text' : 'password';
            inputs.password.setAttribute('type', type);
            
            if (type === 'password') {
                eyeOpen.classList.remove('hidden');
                eyeClosed.classList.add('hidden');
            } else {
                eyeOpen.classList.add('hidden');
                eyeClosed.classList.remove('hidden');
            }
        });

        // Fonctions de validation
        function validateIdentifier(value) {
            value = value.trim();
            if (!value) {
                return 'Le NIN ou téléphone est requis';
            }
            
            // Vérifier si c'est un NIN (13 chiffres) ou un téléphone
            const isNIN = /^\d{13}$/.test(value);
            const isPhone = /^[+]?[\d\s-()]{8,15}$/.test(value);
            
            if (!isNIN && !isPhone) {
                return 'Format invalide. Utilisez un NIN (13 chiffres) ou un numéro de téléphone valide';
            }
            
            return null;
        }

        function validatePassword(value) {
            if (!value) {
                return 'Le mot de passe est requis';
            }
            if (value.length < 3) {
                return 'Mot de passe trop court';
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

        function showGlobalError(message) {
            globalErrorMessage.textContent = message;
            globalError.classList.remove('hidden');
            successMessage.classList.add('hidden');
        }

        function hideGlobalError() {
            globalError.classList.add('hidden');
        }

        function showSuccess() {
            successMessage.classList.remove('hidden');
            globalError.classList.add('hidden');
        }

        // Validation d'un champ
        function validateField(input, errorElement, validationFn) {
            const error = validationFn(input.value);
            if (error) {
                showError(input, errorElement, error);
                return false;
            } else {
                hideError(input, errorElement);
                return true;
            }
        }

        // Événements de validation
        inputs.identifier.addEventListener('blur', () => {
            validateField(inputs.identifier, errors.identifier, validateIdentifier);
        });

        inputs.password.addEventListener('blur', () => {
            validateField(inputs.password, errors.password, validatePassword);
        });

        // Masquer les erreurs pendant la saisie
        Object.keys(inputs).forEach(key => {
            inputs[key].addEventListener('input', () => {
                if (inputs[key].classList.contains('ring-red-500')) {
                    hideError(inputs[key], errors[key]);
                }
                hideGlobalError();
            });
        });

        // Soumission du formulaire
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const validations = [
                validateField(inputs.identifier, errors.identifier, validateIdentifier),
                validateField(inputs.password, errors.password, validatePassword)
            ];
            
            const isValid = validations.every(v => v);
            
            if (isValid) {
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.textContent;
                
                submitBtn.textContent = 'Connexion...';
                submitBtn.disabled = true;
                
                // Simulation d'une vérification d'authentification
                setTimeout(() => {
                    const identifier = inputs.identifier.value.trim();
                    const password = inputs.password.value;
                    
                    // Simulation simple - dans un vrai projet, cela serait géré côté serveur
                    if (password === 'motdepasse123') {
                        showSuccess();
                        setTimeout(() => {
                            // Redirection simulée
                            alert('Redirection vers le tableau de bord...');
                        }, 2000);
                    } else {
                        showGlobalError('Identifiants incorrects. Veuillez réessayer.');
                        submitBtn.textContent = originalText;
                        submitBtn.disabled = false;
                    }
                }, 1500);
            }
        });

        // Gestion du lien "Mot de passe oublié"
        document.querySelector('.forgot-link').addEventListener('click', (e) => {
            e.preventDefault();
            alert('Fonctionnalité de récupération de mot de passe à implémenter');
        });

        // Gestion du lien d'inscription
        document.querySelector('a[href="#"]').addEventListener('click', (e) => {
            e.preventDefault();
            alert('Redirection vers la page d\'inscription...');
        });
    </script> -->
</body>