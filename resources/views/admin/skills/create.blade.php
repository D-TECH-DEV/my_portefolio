@extends('layouts.admin')

@section('title', 'Nouvelle Compétence')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/skills') }}">Compétences</a></li>
    <li class="breadcrumb-item active">Nouvelle Compétence</li>
@endsection

@section('styles')
    <style>
        .icon-upload-area {
            border: 2px dashed var(--admin-border);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            background: var(--admin-lighter);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .icon-upload-area:hover {
            border-color: var(--admin-accent);
            background: rgba(220, 167, 58, 0.05);
        }

        .icon-preview {
            max-width: 100px;
            max-height: 100px;
            margin: 15px auto;
            display: none;
        }

        .level-slider-container {
            padding: 20px 0;
        }

        .level-value-display {
            font-size: 48px;
            font-weight: 700;
            color: var(--admin-accent);
            text-align: center;
            margin-bottom: 20px;
        }

        .level-slider {
            width: 100%;
            height: 10px;
            border-radius: 5px;
            background: var(--admin-lighter);
            outline: none;
            -webkit-appearance: none;
        }

        .level-slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: var(--admin-accent);
            cursor: pointer;
            box-shadow: 0 2px 10px rgba(220, 167, 58, 0.5);
        }

        .level-slider::-moz-range-thumb {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: var(--admin-accent);
            cursor: pointer;
            border: none;
            box-shadow: 0 2px 10px rgba(220, 167, 58, 0.5);
        }

        .level-labels {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            color: var(--admin-text-base);
            font-size: 12px;
        }
    </style>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h2 style="color: var(--admin-text-heading);">Ajouter une Nouvelle Compétence</h2>
            <p style="color: var(--admin-text-base);">Ajoutez une compétence technique à votre portfolio</p>
        </div>
    </div>

    <form>
        <div class="row">
            <!-- Main Form -->
            <div class="col-lg-8">
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Informations de la Compétence</h5>

                    <!-- Skill Name -->
                    <div class="mb-4">
                        <label class="admin-form-label">Nom de la Compétence *</label>
                        <input type="text" class="form-control admin-form-control"
                            placeholder="Ex: Laravel, React, Docker..." required>
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="admin-form-label">Catégorie *</label>
                        <select class="form-select admin-form-control" required>
                            <option value="">Sélectionner une catégorie</option>
                            <option>Frontend</option>
                            <option>Backend</option>
                            <option>Mobile</option>
                            <option>Base de données</option>
                            <option>DevOps</option>
                            <option>Design</option>
                            <option>Autre</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="admin-form-label">Description (optionnel)</label>
                        <textarea class="form-control admin-form-control" rows="4"
                            placeholder="Décrivez votre niveau d'expertise et vos réalisations avec cette technologie..."></textarea>
                    </div>

                    <!-- Skill Level -->
                    <div class="mb-4">
                        <label class="admin-form-label">Niveau de Maîtrise *</label>
                        <div class="level-slider-container">
                            <div class="level-value-display" id="levelDisplay">50%</div>
                            <input type="range" class="level-slider" id="levelSlider" min="0" max="100" value="50"
                                oninput="updateLevel(this.value)">
                            <div class="level-labels">
                                <span>Débutant</span>
                                <span>Intermédiaire</span>
                                <span>Avancé</span>
                                <span>Expert</span>
                            </div>
                        </div>
                    </div>

                    <!-- Years of Experience -->
                    <div class="mb-4">
                        <label class="admin-form-label">Années d'Expérience</label>
                        <input type="number" class="form-control admin-form-control" placeholder="Ex: 3" min="0" max="50">
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Icon Upload -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Icône / Logo</h5>

                    <div class="icon-upload-area" onclick="document.getElementById('iconInput').click()">
                        <i class="bi bi-image" style="font-size: 40px; color: var(--admin-accent);"></i>
                        <p style="color: var(--admin-text-heading); margin: 10px 0 5px;">Cliquez pour télécharger</p>
                        <small style="color: var(--admin-text-base);">PNG, SVG, JPG jusqu'à 2MB</small>
                    </div>
                    <input type="file" id="iconInput" accept="image/*" style="display: none;" onchange="previewIcon(event)">
                    <img id="iconPreview" class="icon-preview" alt="Preview">
                    <button type="button" class="btn btn-danger btn-sm w-100 mt-2" id="removeIconBtn" style="display: none;"
                        onclick="removeIcon()">
                        <i class="bi bi-trash me-1"></i>Supprimer l'icône
                    </button>

                    <div class="mt-3" style="padding: 15px; background: var(--admin-lighter); border-radius: 10px;">
                        <small style="color: var(--admin-text-base);">
                            <i class="bi bi-info-circle me-1"></i>
                            <strong>Astuce:</strong> Utilisez des icônes SVG pour une meilleure qualité. Vous pouvez trouver
                            des icônes gratuites sur
                            <a href="https://devicon.dev" target="_blank" style="color: var(--admin-accent);">Devicon</a>.
                        </small>
                    </div>
                </div>

                <!-- Status -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Options</h5>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="activeSwitch" checked style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="activeSwitch" style="cursor: pointer;">
                            Compétence active
                        </label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="featuredSwitch" style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="featuredSwitch" style="cursor: pointer;">
                            Afficher en vedette
                        </label>
                    </div>

                    <div class="mb-3">
                        <label class="admin-form-label">Ordre d'affichage</label>
                        <input type="number" class="form-control admin-form-control" value="0" min="0">
                        <small style="color: var(--admin-text-base);">Plus le nombre est petit, plus la compétence apparaît
                            en premier</small>
                    </div>
                </div>

                <!-- Actions -->
                <div class="admin-card">
                    <button type="submit" class="btn btn-admin-primary w-100 mb-2">
                        <i class="bi bi-check-circle me-2"></i>Créer la Compétence
                    </button>
                    <a href="{{ url('/admin/skills') }}" class="btn btn-admin-secondary w-100">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        // Update level display
        function updateLevel(value) {
            document.getElementById('levelDisplay').textContent = value + '%';
        }

        // Icon preview
        function previewIcon(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById('iconPreview');
                    const removeBtn = document.getElementById('removeIconBtn');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    removeBtn.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        function removeIcon() {
            const preview = document.getElementById('iconPreview');
            const input = document.getElementById('iconInput');
            const removeBtn = document.getElementById('removeIconBtn');

            preview.src = '';
            preview.style.display = 'none';
            input.value = '';
            removeBtn.style.display = 'none';
        }
    </script>
@endsection