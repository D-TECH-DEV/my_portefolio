@extends('layouts.admin')

@section('title', 'Paramètres')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Paramètres</li>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h2 style="color: var(--admin-text-heading);">Paramètres</h2>
            <p style="color: var(--admin-text-base);">Configurez les paramètres de votre site et de votre compte</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <!-- Settings Navigation -->
            <div class="admin-card">
                <div class="list-group" style="background: transparent;">
                    <a href="#site-settings" class="list-group-item list-group-item-action active"
                        style="background: var(--admin-accent); color: var(--admin-bg-secondary); border: none; border-radius: 8px; margin-bottom: 5px;">
                        <i class="bi bi-globe me-2"></i>Site Web
                    </a>
                    <a href="#seo-settings" class="list-group-item list-group-item-action"
                        style="background: transparent; color: var(--admin-text-base); border: none; border-radius: 8px; margin-bottom: 5px;">
                        <i class="bi bi-search me-2"></i>SEO
                    </a>
                    <a href="#email-settings" class="list-group-item list-group-item-action"
                        style="background: transparent; color: var(--admin-text-base); border: none; border-radius: 8px; margin-bottom: 5px;">
                        <i class="bi bi-envelope me-2"></i>Email
                    </a>
                    <a href="#security-settings" class="list-group-item list-group-item-action"
                        style="background: transparent; color: var(--admin-text-base); border: none; border-radius: 8px; margin-bottom: 5px;">
                        <i class="bi bi-shield-lock me-2"></i>Sécurité
                    </a>
                    <a href="#appearance-settings" class="list-group-item list-group-item-action"
                        style="background: transparent; color: var(--admin-text-base); border: none; border-radius: 8px;">
                        <i class="bi bi-palette me-2"></i>Apparence
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <form>
                <!-- Site Settings -->
                <div class="admin-card" id="site-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Paramètres du Site</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Nom du Site *</label>
                        <input type="text" class="form-control admin-form-control" value="You-Soft Portfolio" required>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Slogan</label>
                        <input type="text" class="form-control admin-form-control"
                            value="Réinventons le futur ligne par ligne">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Description du Site</label>
                        <textarea class="form-control admin-form-control"
                            rows="4">Portfolio professionnel de Youssouf Doumdje, développeur full-stack spécialisé en Laravel, Flutter et Spring Boot. Découvrez mes projets, compétences et services.</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Email de Contact</label>
                            <input type="email" class="form-control admin-form-control" value="dydoumdje2004@gmail.com">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Téléphone de Contact</label>
                            <input type="tel" class="form-control admin-form-control" value="+225 07 89 68 16 13">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Logo du Site</label>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <img src="https://ui-avatars.com/api/?name=You-Soft&background=dca73a&color=0a1128&size=80"
                                style="width: 80px; height: 80px; border-radius: 10px; border: 2px solid var(--admin-border);"
                                id="logoPreview" alt="Logo">
                            <div>
                                <button type="button" class="btn btn-admin-secondary btn-sm mb-2"
                                    onclick="document.getElementById('logoInput').click()">
                                    <i class="bi bi-upload me-2"></i>Changer le Logo
                                </button>
                                <input type="file" id="logoInput" accept="image/*" style="display: none;"
                                    onchange="previewLogo(event)">
                                <p style="color: var(--admin-text-base); font-size: 13px; margin: 0;">PNG, SVG recommandé
                                    (max 1MB)</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="maintenanceMode" style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="maintenanceMode" style="cursor: pointer;">
                            Mode Maintenance
                        </label>
                        <small style="display: block; color: var(--admin-text-base); margin-top: 5px;">
                            Activer pour mettre le site hors ligne temporairement
                        </small>
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="admin-card" id="seo-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Paramètres SEO</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Meta Title</label>
                        <input type="text" class="form-control admin-form-control"
                            value="You-Soft | Développeur Full-Stack à Abidjan">
                        <small style="color: var(--admin-text-base);">Recommandé: 50-60 caractères</small>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Meta Description</label>
                        <textarea class="form-control admin-form-control"
                            rows="3">Portfolio de Youssouf Doumdje, développeur full-stack spécialisé en développement web et mobile. Services de programmation, design et maintenance informatique en Côte d'Ivoire.</textarea>
                        <small style="color: var(--admin-text-base);">Recommandé: 150-160 caractères</small>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Mots-clés (séparés par des virgules)</label>
                        <input type="text" class="form-control admin-form-control"
                            value="développeur web, Laravel, Flutter, Abidjan, Côte d'Ivoire, programmation">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Google Analytics ID</label>
                        <input type="text" class="form-control admin-form-control" placeholder="G-XXXXXXXXXX">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="indexing" checked style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="indexing" style="cursor: pointer;">
                            Autoriser l'indexation par les moteurs de recherche
                        </label>
                    </div>
                </div>

                <!-- Email Settings -->
                <div class="admin-card" id="email-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Configuration Email (SMTP)</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Serveur SMTP</label>
                        <input type="text" class="form-control admin-form-control" placeholder="smtp.gmail.com">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Port SMTP</label>
                            <input type="number" class="form-control admin-form-control" placeholder="587">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Encryption</label>
                            <select class="form-select admin-form-control">
                                <option>TLS</option>
                                <option>SSL</option>
                                <option>Aucun</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Nom d'utilisateur SMTP</label>
                        <input type="email" class="form-control admin-form-control" placeholder="votre-email@gmail.com">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Mot de passe SMTP</label>
                        <input type="password" class="form-control admin-form-control" placeholder="••••••••">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Email d'expédition</label>
                        <input type="email" class="form-control admin-form-control" value="dydoumdje2004@gmail.com">
                    </div>

                    <button type="button" class="btn btn-admin-secondary">
                        <i class="bi bi-send me-2"></i>Envoyer un Email de Test
                    </button>
                </div>

                <!-- Security Settings -->
                <div class="admin-card" id="security-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Sécurité</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Mot de Passe Actuel</label>
                        <input type="password" class="form-control admin-form-control" placeholder="••••••••">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Nouveau Mot de Passe</label>
                        <input type="password" class="form-control admin-form-control" placeholder="••••••••">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Confirmer le Nouveau Mot de Passe</label>
                        <input type="password" class="form-control admin-form-control" placeholder="••••••••">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="twoFactor" style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="twoFactor" style="cursor: pointer;">
                            Authentification à deux facteurs (2FA)
                        </label>
                    </div>

                    <button type="button" class="btn btn-admin-primary">
                        <i class="bi bi-shield-check me-2"></i>Mettre à Jour le Mot de Passe
                    </button>
                </div>

                <!-- Appearance Settings -->
                <div class="admin-card" id="appearance-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Apparence</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Thème de l'Administration</label>
                        <select class="form-select admin-form-control">
                            <option selected>Sombre (Dark)</option>
                            <option>Clair (Light)</option>
                            <option>Auto (Système)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Couleur d'Accent</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" class="form-control admin-form-control" value="#dca73a"
                                style="width: 80px; height: 50px; padding: 5px;">
                            <input type="text" class="form-control admin-form-control" value="#dca73a" readonly>
                        </div>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="animations" checked style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="animations" style="cursor: pointer;">
                            Activer les animations
                        </label>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="admin-card">
                    <button type="submit" class="btn btn-admin-primary">
                        <i class="bi bi-check-circle me-2"></i>Enregistrer Tous les Paramètres
                    </button>
                    <button type="button" class="btn btn-admin-secondary ms-2">
                        <i class="bi bi-arrow-clockwise me-2"></i>Réinitialiser
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function previewLogo(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('logoPreview').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        // Smooth scroll to sections
        document.querySelectorAll('.list-group-item').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault();
                const target = this.getAttribute('href');
                document.querySelector(target).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Update active state
                document.querySelectorAll('.list-group-item').forEach(i => {
                    i.style.background = 'transparent';
                    i.style.color = 'var(--admin-text-base)';
                });
                this.style.background = 'var(--admin-accent)';
                this.style.color = 'var(--admin-bg-secondary)';
            });
        });
    </script>
@endsection