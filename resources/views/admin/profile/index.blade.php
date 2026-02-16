@extends('layouts.admin')

@section('title', 'Mon Profil')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Mon Profil</li>
@endsection

@section('styles')
    <style>
        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--admin-accent);
        }

        .avatar-upload-btn {
            position: relative;
            margin-top: -40px;
            margin-left: 100px;
        }

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

@section('content')
    <div class="row mb-4">
        <div class="col-12">
            <h2 style="color: var(--admin-text-heading);">Mon Profil</h2>
            <p style="color: var(--admin-text-base);">Gérez vos informations personnelles et professionnelles</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"
            style="background: rgba(25, 135, 84, 0.1); border: 1px solid rgba(25, 135, 84, 0.2); color: #198754;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                style="filter: invert(1);"></button>
        </div>
    @endif

    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" id="profileUpdateForm">
        @csrf
        <div class="row">
            <!-- Main Form -->
            <div class="col-lg-8">
                <!-- Personal Information -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Informations Personnelles</h5>

                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label class="admin-form-label">Nom complet *</label>
                            <input type="text" name="name" class="form-control admin-form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Titre Professionnel *</label>
                        <input type="text" name="job_title" class="form-control admin-form-control @error('job_title') is-invalid @enderror"
                            value="{{ old('job_title', $user->job_title) }}" required>
                        @error('job_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Email *</label>
                        <input type="email" name="email" class="form-control admin-form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Téléphone</label>
                        <input type="tel" name="phone" class="form-control admin-form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Localisation</label>
                        <input type="text" name="location" class="form-control admin-form-control @error('location') is-invalid @enderror"
                            value="{{ old('location', $user->location) }}">
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Biographie</label>
                        <textarea name="bio" class="form-control admin-form-control @error('bio') is-invalid @enderror"
                            rows="5">{{ old('bio', $user->bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Réseaux Sociaux</h5>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-github"></i>
                        </div>
                        <input type="url" name="social_github" class="form-control admin-form-control"
                            placeholder="https://github.com/username"
                            value="{{ old('social_github', $user->social_github) }}">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-linkedin"></i>
                        </div>
                        <input type="url" name="social_linkedin" class="form-control admin-form-control"
                            placeholder="https://linkedin.com/in/username"
                            value="{{ old('social_linkedin', $user->social_linkedin) }}">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-twitter"></i>
                        </div>
                        <input type="url" name="social_twitter" class="form-control admin-form-control"
                            placeholder="https://twitter.com/username"
                            value="{{ old('social_twitter', $user->social_twitter) }}">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </div>
                        <input type="url" name="social_facebook" class="form-control admin-form-control"
                            placeholder="https://facebook.com/username"
                            value="{{ old('social_facebook', $user->social_facebook) }}">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <input type="url" name="social_instagram" class="form-control admin-form-control"
                            placeholder="https://instagram.com/username"
                            value="{{ old('social_instagram', $user->social_instagram) }}">
                    </div>
                </div>

                <!-- Professional Information -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Informations Professionnelles</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Nom de l'Entreprise</label>
                        <input type="text" name="company_name" class="form-control admin-form-control @error('company_name') is-invalid @enderror"
                            value="{{ old('company_name', $user->company_name) }}">
                        @error('company_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Site Web</label>
                        <input type="url" name="website" class="form-control admin-form-control @error('website') is-invalid @enderror"
                            value="{{ old('website', $user->website) }}">
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Années d'Expérience</label>
                            <input type="number" name="years_experience" class="form-control admin-form-control @error('years_experience') is-invalid @enderror"
                                value="{{ old('years_experience', $user->years_experience) }}" min="0">
                            @error('years_experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Projets Complétés</label>
                            <input type="number" name="completed_projects" class="form-control admin-form-control @error('completed_projects') is-invalid @enderror"
                                value="{{ old('completed_projects', $user->completed_projects) }}" min="0">
                            @error('completed_projects')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Disponibilité</label>
                        <select name="availability" class="form-select admin-form-control @error('availability') is-invalid @enderror">
                            <option value="Disponible pour de nouveaux projets" {{ old('availability', $user->availability) == 'Disponible pour de nouveaux projets' ? 'selected' : '' }}>Disponible
                                pour de nouveaux projets</option>
                            <option value="Partiellement disponible" {{ old('availability', $user->availability) == 'Partiellement disponible' ? 'selected' : '' }}>Partiellement
                                disponible</option>
                            <option value="Non disponible" {{ old('availability', $user->availability) == 'Non disponible' ? 'selected' : '' }}>Non disponible</option>
                        </select>
                        @error('availability')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Security Section -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Sécurité</h5>
                    <p style="color: var(--admin-text-base); font-size: 14px; margin-bottom: 20px;">Mettez à jour votre mot de passe pour sécuriser votre compte.</p>
                    
                    <form action="{{ route('admin.profile.password') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label class="admin-form-label">Mot de passe actuel</label>
                            <input type="password" name="current_password" class="form-control admin-form-control @error('current_password', 'updatePassword') is-invalid @enderror" required>
                            @error('current_password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="admin-form-label">Nouveau mot de passe</label>
                            <input type="password" name="password" class="form-control admin-form-control @error('password', 'updatePassword') is-invalid @enderror" required>
                            @error('password', 'updatePassword')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="admin-form-label">Confirmer le nouveau mot de passe</label>
                            <input type="password" name="password_confirmation" class="form-control admin-form-control" required>
                        </div>

                        <button type="submit" class="btn btn-admin-primary">
                            <i class="bi bi-shield-lock me-2"></i>Mettre à jour le mot de passe
                        </button>
                    </form>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Profile Photo -->
                <div class="admin-card text-center">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Photo de Profil</h5>

                    <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=dca73a&color=0a1128&size=150' }}"
                        class="profile-avatar" id="profileAvatar" alt="Profile">

                    <div class="avatar-upload-btn">
                        <button type="button" class="btn btn-admin-primary btn-sm"
                            onclick="document.getElementById('avatarInput').click()">
                            <i class="bi bi-camera"></i>
                        </button>
                        <input type="file" name="avatar" id="avatarInput" accept="image/*" style="display: none;"
                            onchange="previewAvatar(event)">
                    </div>

                    <div class="mt-3">
                        <p style="color: var(--admin-text-base); font-size: 13px; margin: 0;">
                            JPG, PNG ou GIF<br>
                            Maximum 2MB
                        </p>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Statistiques</h5>

                    <div
                        style="display: flex; justify-content: space-between; align-items: center; padding: 15px; background: var(--admin-lighter); border-radius: 10px; margin-bottom: 10px;">
                        <div>
                            <div style="color: var(--admin-text-base); font-size: 13px;">Projets</div>
                            <div style="color: var(--admin-accent); font-size: 24px; font-weight: 700;">
                                {{ $user->completed_projects }}</div>
                        </div>
                        <i class="bi bi-folder" style="font-size: 32px; color: var(--admin-accent); opacity: 0.3;"></i>
                    </div>

                    <div
                        style="display: flex; justify-content: space-between; align-items: center; padding: 15px; background: var(--admin-lighter); border-radius: 10px; margin-bottom: 10px;">
                        <div>
                            <div style="color: var(--admin-text-base); font-size: 13px;">Années Exp.</div>
                            <div style="color: var(--admin-accent); font-size: 24px; font-weight: 700;">
                                {{ $user->years_experience }}</div>
                        </div>
                        <i class="bi bi-calendar" style="font-size: 32px; color: var(--admin-accent); opacity: 0.3;"></i>
                    </div>
                </div>

                <!-- Actions -->
                <div class="admin-card">
                    <button type="submit" form="profileUpdateForm" class="btn btn-admin-primary w-100 mb-2">
                        <i class="bi bi-check-circle me-2"></i>Enregistrer les Informations
                    </button>
                    <a href="{{ url('/admin/dashboard') }}" class="btn btn-admin-secondary w-100">
                        <i class="bi bi-x-circle me-2"></i>Annuler
                    </a>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        function previewAvatar(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('profileAvatar').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection