@extends('layouts.admin')

@section('title', 'Modifier Compétence')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/skills') }}">Compétences</a></li>
    <li class="breadcrumb-item active">Modifier Compétence</li>
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
            <h2 style="color: var(--admin-text-heading);">Modifier la Compétence</h2>
            <p style="color: var(--admin-text-base);">Modifiez les informations de votre compétence</p>
        </div>
    </div>

    <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Main Form -->
            <div class="col-lg-8">
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Informations de la Compétence</h5>

                    <!-- Skill Name -->
                    <div class="mb-4">
                        <label class="admin-form-label">Nom de la Compétence *</label>
                        <input type="text" name="name" class="form-control admin-form-control"
                            value="{{ old('name', $skill->name) }}" required>
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label class="admin-form-label">Catégorie *</label>
                        <select name="category" class="form-select admin-form-control" required>
                            <option value="">Sélectionner une catégorie</option>
                            @foreach(['Frontend', 'Backend', 'Mobile', 'Base de données', 'DevOps', 'Design', 'Autre'] as $cat)
                                <option value="{{ $cat }}" {{ old('category', $skill->category) == $cat ? 'selected' : '' }}>
                                    {{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="admin-form-label">Description (optionnel)</label>
                        <textarea name="description" class="form-control admin-form-control"
                            rows="4">{{ old('description', $skill->description ?? '') }}</textarea>
                    </div>

                    <!-- Skill Level -->
                    <div class="mb-4">
                        <label class="admin-form-label">Niveau de Maîtrise *</label>
                        <div class="level-slider-container">
                            <div class="level-value-display" id="levelDisplay">
                                {{ old('proficiency', $skill->proficiency) }}%</div>
                            <input type="range" name="proficiency" class="level-slider" id="levelSlider" min="0" max="100"
                                value="{{ old('proficiency', $skill->proficiency) }}" oninput="updateLevel(this.value)">
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
                        <input type="number" name="years_of_experience" class="form-control admin-form-control"
                            value="{{ old('years_of_experience', $skill->years_of_experience ?? 0) }}" min="0" max="50">
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
                        <p style="color: var(--admin-text-heading); margin: 10px 0 5px;">Cliquez pour changer</p>
                        <small style="color: var(--admin-text-base);">PNG, SVG, JPG jusqu'à 2MB</small>
                    </div>
                    <input type="file" name="image" id="iconInput" accept="image/*" style="display: none;"
                        onchange="previewIcon(event)">
                    <img id="iconPreview" class="icon-preview"
                        src="{{ $skill->image ? asset($skill->image) : 'https://via.placeholder.com/100/142850/aab8c5?text=No+Icon' }}"
                        style="{{ $skill->image ? 'display:block;' : 'display:none;' }}" alt="Preview">
                    <button type="button" class="btn btn-danger btn-sm w-100 mt-2" id="removeIconBtn" onclick="removeIcon()"
                        style="{{ $skill->image ? 'display:block;' : 'display:none;' }}">
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
                        <input class="form-check-input" type="checkbox" name="is_active" id="activeSwitch" {{ old('is_active', $skill->is_active ?? true) ? 'checked' : '' }} style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="activeSwitch" style="cursor: pointer;">
                            Compétence active
                        </label>
                    </div>

                    <div class="form-check form-switch mb-3">
                        <input class="form-check-input" type="checkbox" name="is_featured" id="featuredSwitch" {{ old('is_featured', $skill->is_featured ?? false) ? 'checked' : '' }} style="cursor: pointer;">
                        <label class="form-check-label admin-form-label" for="featuredSwitch" style="cursor: pointer;">
                            Afficher en vedette
                        </label>
                    </div>

                    <div class="mb-3">
                        <label class="admin-form-label">Ordre d'affichage</label>
                        <input type="number" name="order" class="form-control admin-form-control"
                            value="{{ old('order', $skill->order ?? 0) }}" min="0">
                        <small style="color: var(--admin-text-base);">Plus le nombre est petit, plus la compétence apparaît
                            en premier</small>
                    </div>
                </div>

                <!-- Actions -->
                <div class="admin-card">
                    <button type="submit" class="btn btn-admin-primary w-100 mb-2">
                        <i class="bi bi-check-circle me-2"></i>Enregistrer les Modifications
                    </button>
                    <a href="{{ route('admin.skills') }}" class="btn btn-admin-secondary w-100">
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
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        function removeIcon() {
            const preview = document.getElementById('iconPreview');
            const input = document.getElementById('iconInput');

            preview.src = 'https://via.placeholder.com/100/142850/aab8c5?text=No+Icon';
            input.value = '';
        }
    </script>
@endsection