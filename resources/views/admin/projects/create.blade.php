@extends('layouts.admin')

@section('title', 'Nouveau Projet')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/projects') }}">Projets</a></li>
    <li class="breadcrumb-item active">Nouveau Projet</li>
@endsection

@section('styles')
    <style>
        .image-upload-area {
            border: 2px dashed var(--admin-border);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            background: var(--admin-lighter);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .image-upload-area:hover {
            border-color: var(--admin-accent);
            background: rgba(220, 167, 58, 0.05);
        }

        .image-upload-area i {
            font-size: 48px;
            color: var(--admin-accent);
            margin-bottom: 15px;
        }

        .image-preview {
            max-width: 100%;
            max-height: 300px;
            border-radius: 15px;
            margin-top: 15px;
            display: none;
        }

        .remove-image {
            display: none;
            margin-top: 10px;
        }

        .tech-badge {
            display: inline-block;
            background: var(--admin-lighter);
            border: 1px solid var(--admin-border);
            padding: 8px 15px;
            border-radius: 20px;
            margin: 5px;
            color: var(--admin-text-heading);
            font-size: 14px;
        }

        .tech-badge i {
            margin-left: 8px;
            cursor: pointer;
            color: #dc3545;
        }

        .tech-badge i:hover {
            color: #ff0000;
        }
    </style>
@endsection

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h2 style="color: var(--admin-text-heading);">Créer un Nouveau Projet</h2>
            <p style="color: var(--admin-text-base);">Ajoutez un nouveau projet à votre portfolio</p>
        </div>
    </div>

    <form>
        <div class="row">
            <!-- Main Form -->
            <div class="col-lg-8">
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Informations du Projet</h5>

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="admin-form-label">Titre du Projet *</label>
                        <input type="text" class="form-control admin-form-control" placeholder="Ex: Projet DRH INP-HB"
                            required>
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="admin-form-label">Catégorie *</label>
                        <select class="form-select admin-form-control" required>
                            <option value="">Sélectionner une catégorie</option>
                            <option>Développement Web</option>
                            <option>Application Mobile</option>
                            <option>Back-office Solution</option>
                            <option>Migration & Laravel</option>
                            <option>Backend API</option>
                            <option>Design & UI/UX</option>
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="admin-form-label">Description *</label>
                        <textarea class="form-control admin-form-control" rows="6"
                            placeholder="Décrivez votre projet en détail..." required></textarea>
                        <small style="color: var(--admin-text-base);">
                            <i class="bi bi-info-circle me-1"></i>
                            Vous pouvez utiliser du HTML pour formater le texte
                        </small>
                    </div>

                    <!-- Technologies -->
                    <div class="mb-4">
                        <label class="admin-form-label">Technologies Utilisées</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control admin-form-control" id="techInput"
                                placeholder="Ex: Laravel, Vue.js, MySQL...">
                            <button class="btn btn-admin-primary" type="button" onclick="addTech()">
                                <i class="bi bi-plus"></i> Ajouter
                            </button>
                        </div>
                        <div id="techList"></div>
                    </div>

                    <!-- Project URL -->
                    <div class="mb-4">
                        <label class="admin-form-label">URL du Projet</label>
                        <input type="url" class="form-control admin-form-control" placeholder="https://example.com">
                        <small style="color: var(--admin-text-base);">
                            <i class="bi bi-info-circle me-1"></i>
                            Lien vers le projet en ligne (optionnel)
                        </small>
                    </div>

                    <!-- GitHub URL -->
                    <div class="mb-4">
                        <label class="admin-form-label">URL GitHub</label>
                        <input type="url" class="form-control admin-form-control"
                            placeholder="https://github.com/username/repo">
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Image Upload -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Image du Projet</h5>

                    <div class="image-upload-area" onclick="document.getElementById('imageInput').click()">
                        <i class="bi bi-cloud-upload"></i>
                        <p style="color: var(--admin-text-heading); margin: 0;">Cliquez pour télécharger</p>
                        <small style="color: var(--admin-text-base);">ou glissez-déposez une image</small>
                        <small style="display: block; margin-top: 10px; color: var(--admin-text-base);">
                            PNG, JPG jusqu'à 5MB
                        </small>
                    </div>
                    <input type="file" id="imageInput" accept="image/*" style="display: none;"
                        onchange="previewImage(event)">
                    <img id="imagePreview" class="image-preview" alt="Preview">
                    <button type="button" class="btn btn-danger btn-sm remove-image" id="removeImageBtn"
                        onclick="removeImage()">
                        <i class="bi bi-trash me-1"></i>Supprimer l'image
                    </button>
                </div>

                <!-- Status -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Statut de Publication</h5>

                    <div class="mb-3">
                        <label class="admin-form-label">Statut</label>
                        <select class="form-select admin-form-control">
                            <option value="draft">Brouillon</option>
                            <option value="published">Publié</option>
                            <option value="archived">Archivé</option>
                        </select>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" id="featuredSwitch" style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="featuredSwitch" style="cursor: pointer;">
                            Projet en vedette
                        </label>
                    </div>

                    <div class="mb-3">
                        <label class="admin-form-label">Date de Réalisation</label>
                        <input type="date" class="form-control admin-form-control" value="{{ date('Y-m-d') }}">
                    </div>
                </div>

                <!-- Actions -->
                <div class="admin-card">
                    <button type="submit" class="btn btn-admin-primary w-100 mb-2">
                        <i class="bi bi-check-circle me-2"></i>Créer le Projet
                    </button>
                    <a href="{{ url('/admin/projects') }}" class="btn btn-admin-secondary w-100">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        // Technologies management
        let technologies = [];

        function addTech() {
            const input = document.getElementById('techInput');
            const tech = input.value.trim();

            if (tech && !technologies.includes(tech)) {
                technologies.push(tech);
                updateTechList();
                input.value = '';
            }
        }

        function removeTech(tech) {
            technologies = technologies.filter(t => t !== tech);
            updateTechList();
        }

        function updateTechList() {
            const list = document.getElementById('techList');
            list.innerHTML = technologies.map(tech =>
                `<span class="tech-badge">
                    ${tech}
                    <i class="bi bi-x-circle" onclick="removeTech('${tech}')"></i>
                </span>`
            ).join('');
        }

        // Allow adding tech with Enter key
        document.getElementById('techInput').addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addTech();
            }
        });

        // Image preview
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById('imagePreview');
                    const removeBtn = document.getElementById('removeImageBtn');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    removeBtn.style.display = 'inline-block';
                }
                reader.readAsDataURL(file);
            }
        }

        function removeImage() {
            const preview = document.getElementById('imagePreview');
            const input = document.getElementById('imageInput');
            const removeBtn = document.getElementById('removeImageBtn');

            preview.src = '';
            preview.style.display = 'none';
            input.value = '';
            removeBtn.style.display = 'none';
        }
    </script>
@endsection