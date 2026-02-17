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

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"
            style="background: rgba(40, 167, 69, 0.2); color: #28a745; border: 1px solid rgba(40, 167, 69, 0.3); border-radius: 8px;">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                    {{-- <a href="#security-settings" class="list-group-item list-group-item-action"
                        style="background: transparent; color: var(--admin-text-base); border: none; border-radius: 8px; margin-bottom: 5px;">
                        <i class="bi bi-shield-lock me-2"></i>Sécurité
                    </a> --}}

                    <a href="#social-settings" class="list-group-item list-group-item-action"
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
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Site Settings -->
                <div class="admin-card" id="site-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Paramètres du Site</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Nom du Site *</label>
                        <input type="text" name="site_name" class="form-control admin-form-control"
                            value="{{ $settings['site_name'] ?? 'You-Soft Portfolio' }}" required>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Slogan</label>
                        <input type="text" name="site_slogan" class="form-control admin-form-control"
                            value="{{ $settings['site_slogan'] ?? 'Réinventons le futur ligne par ligne' }}">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Description du Site</label>
                        <textarea name="site_description" class="form-control admin-form-control"
                            rows="4">{{ $settings['site_description'] ?? "Portfolio professionnel de Youssouf Doumdje, développeur full-stack spécialisé en Laravel, Flutter et Spring Boot. Découvrez mes projets, compétences et services." }}</textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Email de Contact</label>
                            <input type="email" name="contact_email" class="form-control admin-form-control"
                                value="{{ $settings['contact_email'] ?? 'dydoumdje2004@gmail.com' }}">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Téléphone de Contact</label>
                            <input type="tel" name="contact_phone" class="form-control admin-form-control"
                                value="{{ $settings['contact_phone'] ?? '+225 07 89 68 16 13' }}">
                        </div>

                        <div class="col-md-12 mb-4">
                            <label class="admin-form-label">Adresse de Contact</label>
                            <input type="text" name="contact_address" class="form-control admin-form-control"
                                value="{{ $settings['contact_address'] ?? 'CI Yakro 220 logement' }}">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Logo du Site</label>
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <img src="{{ isset($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : 'https://ui-avatars.com/api/?name=You-Soft&background=dca73a&color=0a1128&size=80' }}"
                                style="width: 80px; height: 80px; border-radius: 10px; border: 2px solid var(--admin-border);"
                                id="logoPreview" alt="Logo">
                            <div>
                                <button type="button" class="btn btn-admin-secondary btn-sm mb-2"
                                    onclick="document.getElementById('logoInput').click()">
                                    <i class="bi bi-upload me-2"></i>Changer le Logo
                                </button>
                                <input type="file" name="logo" id="logoInput" accept="image/*" style="display: none;"
                                    onchange="previewLogo(event)">
                                <p style="color: var(--admin-text-base); font-size: 13px; margin: 0;">PNG, SVG recommandé
                                    (max 1MB)</p>
                            </div>
                        </div>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="maintenance_mode" id="maintenanceMode"
                            style="cursor: pointer;" value="1" {{ ($settings['maintenance_mode'] ?? '0') == '1' ? 'checked' : '' }}>
                        <label class="form-check-label admin-form-label" for="maintenanceMode" style="cursor: pointer;">
                            Mode Maintenance
                        </label>
                        <small style="display: block; color: var(--admin-text-base); margin-top: 5px;">
                            Activer pour mettre le site hors ligne temporairement
                        </small>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="admin-card" id="social-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Réseaux Sociaux</h5>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-github"></i>
                        </div>
                        <input type="url" name="social_github" class="form-control admin-form-control"
                            placeholder="https://github.com/username"
                            value="{{ old('social_github', $settings["social_github"]) }}">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-linkedin"></i>
                        </div>
                        <input type="url" name="social_linkedin" class="form-control admin-form-control"
                            placeholder="https://linkedin.com/in/username"
                            value="{{ old('social_linkedin', $settings["social_linkedin"]) }}">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-twitter"></i>
                        </div>
                        <input type="url" name="social_twitter" class="form-control admin-form-control"
                            placeholder="https://twitter.com/username"
                            value="{{ old('social_twitter', $settings["social_twitter"]) }}">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </div>
                        <input type="url" name="social_facebook" class="form-control admin-form-control"
                            placeholder="https://facebook.com/username"
                            value="{{ old('social_facebook', $settings["social_facebook"]) }}">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <input type="url" name="social_instagram" class="form-control admin-form-control"
                            placeholder="https://instagram.com/username"
                            value="{{ old('social_instagram', $settings["social_instagram"]) }}">
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="admin-card" id="seo-settings">
    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">
        Paramètres SEO Avancés
    </h5>

    {{-- ================= BASIC SEO ================= --}}
    <div class="mb-4">
        <label class="admin-form-label">Meta Title</label>
        <input type="text" name="meta_title" class="form-control admin-form-control"
            value="{{ $settings['meta_title'] ?? '' }}">
        <small>Recommandé : 50-60 caractères</small>
    </div>

    <div class="mb-4">
        <label class="admin-form-label">Meta Description</label>
        <textarea name="meta_description" class="form-control admin-form-control"
            rows="3">{{ $settings['meta_description'] ?? '' }}</textarea>
        <small>Recommandé : 150-160 caractères</small>
    </div>

    <div class="mb-4">
        <label class="admin-form-label">Mots-clés (séparés par virgule)</label>
        <input type="text" name="meta_keywords" class="form-control admin-form-control"
            value="{{ $settings['meta_keywords'] ?? '' }}">
    </div>

    <div class="mb-4">
        <label class="admin-form-label">URL Canonical</label>
        <input type="url" name="canonical_url" class="form-control admin-form-control"
            value="{{ $settings['canonical_url'] ?? '' }}">
    </div>

    <div class="mb-4">
        <label class="admin-form-label">Robots</label>
        <input type="text" name="robots_content" class="form-control admin-form-control"
            value="{{ $settings['robots_content'] ?? 'index, follow' }}">
    </div>

    {{-- ================= OPEN GRAPH ================= --}}
    <hr>

    <h6 style="margin-top:15px;">Open Graph (Facebook / LinkedIn)</h6>

    <div class="mb-4">
        <label class="admin-form-label">OG Title</label>
        <input type="text" name="og_title" class="form-control admin-form-control"
            value="{{ $settings['og_title'] ?? '' }}">
    </div>

    <div class="mb-4">
        <label class="admin-form-label">OG Description</label>
        <textarea name="og_description" class="form-control admin-form-control"
            rows="3">{{ $settings['og_description'] ?? '' }}</textarea>
    </div>

    <div class="mb-4">
        <label class="admin-form-label">OG Image</label>
        <input type="text" name="og_image" class="form-control admin-form-control"
            value="{{ $settings['og_image'] ?? '' }}">
        <small>Image recommandée : 1200x630</small>
    </div>

    {{-- ================= TWITTER ================= --}}
    <hr>

    <h6>Twitter Card</h6>

    <div class="mb-4">
        <label class="admin-form-label">Type de carte</label>
        <select name="twitter_card" class="form-control admin-form-control">
            <option value="summary"
                {{ ($settings['twitter_card'] ?? '') == 'summary' ? 'selected' : '' }}>
                Summary
            </option>
            <option value="summary_large_image"
                {{ ($settings['twitter_card'] ?? '') == 'summary_large_image' ? 'selected' : '' }}>
                Summary Large Image
            </option>
        </select>
    </div>

    <div class="mb-4">
        <label class="admin-form-label">Twitter @username</label>
        <input type="text" name="twitter_site" class="form-control admin-form-control"
            value="{{ $settings['twitter_site'] ?? '' }}">
    </div>

    {{-- ================= LOCAL SEO ================= --}}
    <hr>

    <h6>Local SEO</h6>

    <div class="mb-4">
        <label class="admin-form-label">Ville</label>
        <input type="text" name="contact_city" class="form-control admin-form-control"
            value="{{ $settings['contact_city'] ?? '' }}">
    </div>

    <div class="mb-4">
        <label class="admin-form-label">Pays</label>
        <input type="text" name="contact_country" class="form-control admin-form-control"
            value="{{ $settings['contact_country'] ?? '' }}">
    </div>

    <div class="mb-4">
        <label class="admin-form-label">Code Postal</label>
        <input type="text" name="contact_postal_code" class="form-control admin-form-control"
            value="{{ $settings['contact_postal_code'] ?? '' }}">
    </div>

    {{-- ================= GOOGLE ================= --}}
    <hr>

    <h6>Google</h6>

    <div class="mb-4">
        <label class="admin-form-label">Google Analytics ID</label>
        <input type="text" name="google_analytics_id" class="form-control admin-form-control"
            value="{{ $settings['google_analytics_id'] ?? '' }}"
            placeholder="G-XXXXXXXXXX">
    </div>

    <div class="mb-4">
        <label class="admin-form-label">Google Site Verification</label>
        <input type="text" name="google_site_verification"
            class="form-control admin-form-control"
            value="{{ $settings['google_site_verification'] ?? '' }}">
    </div>

    {{-- ================= INDEXATION ================= --}}
    <hr>

    <div class="form-check form-switch mb-3">
        <input class="form-check-input" type="checkbox"
            name="allow_indexing"
            id="indexing"
            value="1"
            {{ ($settings['allow_indexing'] ?? '1') == '1' ? 'checked' : '' }}>
        <label class="form-check-label admin-form-label" for="indexing">
            Autoriser l'indexation par les moteurs de recherche
        </label>
    </div>

</div>


                <!-- Email Settings -->
                <div class="admin-card" id="email-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Configuration Email (SMTP)</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Serveur SMTP</label>
                        <input type="text" name="smtp_host" class="form-control admin-form-control"
                            value="{{ $settings['smtp_host'] ?? '' }}" placeholder="smtp.gmail.com">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Port SMTP</label>
                            <input type="number" name="smtp_port" class="form-control admin-form-control"
                                value="{{ $settings['smtp_port'] ?? '' }}" placeholder="587">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Encryption</label>
                            <select name="smtp_encryption" class="form-select admin-form-control">
                                <option value="tls" {{ ($settings['smtp_encryption'] ?? 'tls') == 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ ($settings['smtp_encryption'] ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                <option value="none" {{ ($settings['smtp_encryption'] ?? '') == 'none' ? 'selected' : '' }}>Aucun</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Nom d'utilisateur SMTP</label>
                        <input type="email" name="smtp_username" class="form-control admin-form-control"
                            value="{{ $settings['smtp_username'] ?? '' }}" placeholder="votre-email@gmail.com">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Mot de passe SMTP</label>
                        <input type="password" name="smtp_password" class="form-control admin-form-control"
                            value="{{ $settings['smtp_password'] ?? '' }}" placeholder="••••••••">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Email d'expédition</label>
                        <input type="email" name="mail_from_address" class="form-control admin-form-control"
                            value="{{ $settings['mail_from_address'] ?? 'dydoumdje2004@gmail.com' }}">
                    </div>

                    <button type="button" class="btn btn-admin-secondary">
                        <i class="bi bi-send me-2"></i>Envoyer un Email de Test
                    </button>
                </div>

                <!-- Security Settings (Note: This might need a separate controller/logic if password change is involved) -->
                {{-- <div class="admin-card" id="security-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Sécurité</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Mot de Passe Actuel</label>
                        <input type="password" name="current_password" class="form-control admin-form-control" placeholder="••••••••">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Nouveau Mot de Passe</label>
                        <input type="password" name="new_password" class="form-control admin-form-control" placeholder="••••••••">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Confirmer le Nouveau Mot de Passe</label>
                        <input type="password" name="new_password_confirmation" class="form-control admin-form-control" placeholder="••••••••">
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="two_factor" id="twoFactor" value="1"
                            {{ ($settings['two_factor'] ?? '0') == '1' ? 'checked' : '' }} style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="twoFactor" style="cursor: pointer;">
                            Authentification à deux facteurs (2FA)
                        </label>
                    </div>

                    <button type="submit" name="action" value="update_password" class="btn btn-admin-primary">
                        <i class="bi bi-shield-check me-2"></i>Mettre à Jour le Mot de Passe
                    </button>
                </div> --}}

                <!-- Appearance Settings -->
                <div class="admin-card" id="appearance-settings">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Apparence</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Thème de l'Administration</label>
                        <select name="admin_theme" class="form-select admin-form-control">
                            <option value="dark" {{ ($settings['admin_theme'] ?? 'dark') == 'dark' ? 'selected' : '' }}>Sombre (Dark)</option>
                            <option value="light" {{ ($settings['admin_theme'] ?? '') == 'light' ? 'selected' : '' }}>Clair (Light)</option>
                            <option value="system" {{ ($settings['admin_theme'] ?? '') == 'system' ? 'selected' : '' }}>Auto (Système)</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Couleur d'Accent</label>
                        <div style="display: flex; gap: 10px; align-items: center;">
                            <input type="color" name="accent_color" class="form-control admin-form-control"
                                value="{{ $settings['accent_color'] ?? '#dca73a' }}"
                                style="width: 80px; height: 50px; padding: 5px;"
                                oninput="document.getElementById('accent_text').value = this.value">
                            <input type="text" id="accent_text" class="form-control admin-form-control"
                                value="{{ $settings['accent_color'] ?? '#dca73a' }}" readonly>
                        </div>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="enable_animations" id="animations" value="1"
                            {{ ($settings['enable_animations'] ?? '1') == '1' ? 'checked' : '' }} style="cursor: pointer;">
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
                    <a href="{{ route('admin.settings') }}" class="btn btn-admin-secondary ms-2">
                        <i class="bi bi-arrow-clockwise me-2"></i>Réinitialiser
                    </a>
                </div>
            </form>
        </div>
    </div>


    <style>
        .social-input-group {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--admin-lighter);
            color: var(--admin-accent);
            font-size: 18px;
        }
    </style>
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

