@extends('layouts.admin')

@section('title', 'Modifier Service')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/services') }}">Services</a></li>
    <li class="breadcrumb-item active">Modifier Service</li>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h2 style="color: var(--admin-text-heading);">Modifier le Service</h2>
            <p style="color: var(--admin-text-base);">Modifiez les informations de votre service</p>
        </div>
    </div>

    <form>
        <div class="row">
            <!-- Main Form -->
            <div class="col-lg-8">
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Informations du Service</h5>

                    <!-- Service Number -->
                    <div class="mb-4">
                        <label class="admin-form-label">Numéro du Service *</label>
                        <input type="text" class="form-control admin-form-control" value="01" required>
                        <small style="color: var(--admin-text-base);">
                            <i class="bi bi-info-circle me-1"></i>
                            Numéro d'affichage du service (01-99)
                        </small>
                    </div>

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="admin-form-label">Titre du Service *</label>
                        <input type="text" class="form-control admin-form-control" value="Programmation & Développement"
                            required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="admin-form-label">Description *</label>
                        <textarea class="form-control admin-form-control" rows="5"
                            required>Sites vitrines pro, applications web sur mesure et systèmes de gestion adaptés.</textarea>
                    </div>

                    <!-- Icon Selection -->
                    <div class="mb-4">
                        <label class="admin-form-label">Icône Bootstrap Icons</label>
                        <div class="input-group">
                            <span class="input-group-text"
                                style="background: var(--admin-lighter); border-color: var(--admin-border); color: var(--admin-text-base);">
                                <i class="bi bi-code-slash" id="iconPreview"></i>
                            </span>
                            <input type="text" class="form-control admin-form-control" id="iconInput" value="code-slash"
                                onkeyup="updateIconPreview()">
                        </div>
                        <small style="color: var(--admin-text-base);">
                            <i class="bi bi-info-circle me-1"></i>
                            Nom de l'icône Bootstrap Icons (sans le préfixe "bi-").
                            <a href="https://icons.getbootstrap.com/" target="_blank"
                                style="color: var(--admin-accent);">Voir la liste</a>
                        </small>
                    </div>

                    <!-- Features List -->
                    <div class="mb-4">
                        <label class="admin-form-label">Points Clés (optionnel)</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control admin-form-control" id="featureInput"
                                placeholder="Ex: Sites vitrines professionnels">
                            <button class="btn btn-admin-primary" type="button" onclick="addFeature()">
                                <i class="bi bi-plus"></i> Ajouter
                            </button>
                        </div>
                        <div id="featuresList">
                            <div
                                style="background: var(--admin-lighter); border: 1px solid var(--admin-border); padding: 10px 15px; border-radius: 8px; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--admin-text-heading);">Sites vitrines professionnels</span>
                                <i class="bi bi-x-circle" style="color: #dc3545; cursor: pointer;"
                                    onclick="removeFeature('Sites vitrines professionnels')"></i>
                            </div>
                            <div
                                style="background: var(--admin-lighter); border: 1px solid var(--admin-border); padding: 10px 15px; border-radius: 8px; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
                                <span style="color: var(--admin-text-heading);">Applications web sur mesure</span>
                                <i class="bi bi-x-circle" style="color: #dc3545; cursor: pointer;"
                                    onclick="removeFeature('Applications web sur mesure')"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Status -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Options</h5>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="activeSwitch" checked style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="activeSwitch" style="cursor: pointer;">
                            Service actif
                        </label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="featuredSwitch" checked
                            style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="featuredSwitch" style="cursor: pointer;">
                            Afficher en vedette
                        </label>
                    </div>

                    <div class="mb-3">
                        <label class="admin-form-label">Ordre d'affichage</label>
                        <input type="number" class="form-control admin-form-control" value="1" min="0">
                        <small style="color: var(--admin-text-base);">Plus le nombre est petit, plus le service apparaît en
                            premier</small>
                    </div>
                </div>

                <!-- Preview Card -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Aperçu</h5>
                    <div
                        style="background: var(--admin-lighter); border: 1px solid var(--admin-border); border-radius: 12px; padding: 20px;">
                        <div style="font-size: 24px; color: var(--admin-accent); margin-bottom: 10px;">
                            <span id="previewNumber">01</span>.
                        </div>
                        <h6 style="color: var(--admin-text-heading); margin-bottom: 10px;" id="previewTitle">Programmation &
                            Développement</h6>
                        <p style="color: var(--admin-text-base); font-size: 14px; margin: 0;" id="previewDesc">Sites
                            vitrines pro, applications web sur mesure et systèmes de gestion adaptés.</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="admin-card">
                    <button type="submit" class="btn btn-admin-primary w-100 mb-2">
                        <i class="bi bi-check-circle me-2"></i>Enregistrer les Modifications
                    </button>
                    <a href="{{ url('/admin/services') }}" class="btn btn-admin-secondary w-100">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        // Pre-filled features
        let features = ['Sites vitrines professionnels', 'Applications web sur mesure'];

        function addFeature() {
            const input = document.getElementById('featureInput');
            const feature = input.value.trim();

            if (feature && !features.includes(feature)) {
                features.push(feature);
                updateFeaturesList();
                input.value = '';
            }
        }

        function removeFeature(feature) {
            features = features.filter(f => f !== feature);
            updateFeaturesList();
        }

        function updateFeaturesList() {
            const list = document.getElementById('featuresList');
            list.innerHTML = features.map(feature =>
                `<div style="background: var(--admin-lighter); border: 1px solid var(--admin-border); padding: 10px 15px; border-radius: 8px; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center;">
                    <span style="color: var(--admin-text-heading);">${feature}</span>
                    <i class="bi bi-x-circle" style="color: #dc3545; cursor: pointer;" onclick="removeFeature('${feature}')"></i>
                </div>`
            ).join('');
        }

        // Allow adding feature with Enter key
        document.getElementById('featureInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addFeature();
            }
        });

        // Icon preview update
        function updateIconPreview() {
            const iconName = document.getElementById('iconInput').value.trim();
            const preview = document.getElementById('iconPreview');
            preview.className = 'bi bi-' + (iconName || 'code-slash');
        }

        // Live preview updates
        document.addEventListener('DOMContentLoaded', function () {
            const numberInput = document.querySelector('input[value="01"]');
            const titleInput = document.querySelector('input[value*="Programmation"]');
            const descInput = document.querySelector('textarea');

            if (numberInput) {
                numberInput.addEventListener('input', function () {
                    document.getElementById('previewNumber').textContent = this.value || '01';
                });
            }

            if (titleInput) {
                titleInput.addEventListener('input', function () {
                    document.getElementById('previewTitle').textContent = this.value || 'Titre du Service';
                });
            }

            if (descInput) {
                descInput.addEventListener('input', function () {
                    document.getElementById('previewDesc').textContent = this.value || 'Description du service...';
                });
            }
        });
    </script>
@endsection