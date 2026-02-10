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

    <form>
        <div class="row">
            <!-- Main Form -->
            <div class="col-lg-8">
                <!-- Personal Information -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Informations Personnelles</h5>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Prénom *</label>
                            <input type="text" class="form-control admin-form-control" value="Youssouf" required>
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Nom *</label>
                            <input type="text" class="form-control admin-form-control" value="Doumdje" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Titre Professionnel *</label>
                        <input type="text" class="form-control admin-form-control" value="Développeur Full-Stack" required>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Email *</label>
                        <input type="email" class="form-control admin-form-control" value="dydoumdje2004@gmail.com"
                            required>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Téléphone *</label>
                        <input type="tel" class="form-control admin-form-control" value="+225 07 89 68 16 13" required>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Localisation</label>
                        <input type="text" class="form-control admin-form-control" value="Abidjan, Côte d'Ivoire">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Biographie</label>
                        <textarea class="form-control admin-form-control"
                            rows="5">Fondateur de You-Soft, je conçois des solutions digitales innovantes et performantes. Passionné par le développement web et mobile, je combine programmation, maintenance informatique et design numérique pour créer des outils qui travaillent pour votre activité 24h/24.</textarea>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Réseaux Sociaux</h5>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-github"></i>
                        </div>
                        <input type="url" class="form-control admin-form-control" placeholder="https://github.com/username"
                            value="https://github.com/yousoft">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-linkedin"></i>
                        </div>
                        <input type="url" class="form-control admin-form-control"
                            placeholder="https://linkedin.com/in/username" value="https://linkedin.com/in/youssouf-doumdje">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-twitter"></i>
                        </div>
                        <input type="url" class="form-control admin-form-control"
                            placeholder="https://twitter.com/username">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </div>
                        <input type="url" class="form-control admin-form-control"
                            placeholder="https://facebook.com/username">
                    </div>

                    <div class="social-input-group">
                        <div class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <input type="url" class="form-control admin-form-control"
                            placeholder="https://instagram.com/username">
                    </div>
                </div>

                <!-- Professional Information -->
                <div class="admin-card">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Informations Professionnelles</h5>

                    <div class="mb-4">
                        <label class="admin-form-label">Nom de l'Entreprise</label>
                        <input type="text" class="form-control admin-form-control" value="You-Soft">
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Site Web</label>
                        <input type="url" class="form-control admin-form-control" value="https://you-soft.ci">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Années d'Expérience</label>
                            <input type="number" class="form-control admin-form-control" value="4" min="0">
                        </div>

                        <div class="col-md-6 mb-4">
                            <label class="admin-form-label">Projets Complétés</label>
                            <input type="number" class="form-control admin-form-control" value="12" min="0">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="admin-form-label">Disponibilité</label>
                        <select class="form-select admin-form-control">
                            <option selected>Disponible pour de nouveaux projets</option>
                            <option>Partiellement disponible</option>
                            <option>Non disponible</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Profile Photo -->
                <div class="admin-card text-center">
                    <h5 style="color: var(--admin-text-heading); margin-bottom: 20px;">Photo de Profil</h5>

                    <img src="https://ui-avatars.com/api/?name=Youssouf+Doumdje&background=dca73a&color=0a1128&size=150"
                        class="profile-avatar" id="profileAvatar" alt="Profile">

                    <div class="avatar-upload-btn">
                        <button type="button" class="btn btn-admin-primary btn-sm"
                            onclick="document.getElementById('avatarInput').click()">
                            <i class="bi bi-camera"></i>
                        </button>
                        <input type="file" id="avatarInput" accept="image/*" style="display: none;"
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
                            <div style="color: var(--admin-accent); font-size: 24px; font-weight: 700;">12</div>
                        </div>
                        <i class="bi bi-folder" style="font-size: 32px; color: var(--admin-accent); opacity: 0.3;"></i>
                    </div>

                    <div
                        style="display: flex; justify-content: space-between; align-items: center; padding: 15px; background: var(--admin-lighter); border-radius: 10px; margin-bottom: 10px;">
                        <div>
                            <div style="color: var(--admin-text-base); font-size: 13px;">Compétences</div>
                            <div style="color: var(--admin-accent); font-size: 24px; font-weight: 700;">18</div>
                        </div>
                        <i class="bi bi-star" style="font-size: 32px; color: var(--admin-accent); opacity: 0.3;"></i>
                    </div>

                    <div
                        style="display: flex; justify-content: space-between; align-items: center; padding: 15px; background: var(--admin-lighter); border-radius: 10px;">
                        <div>
                            <div style="color: var(--admin-text-base); font-size: 13px;">Messages</div>
                            <div style="color: var(--admin-accent); font-size: 24px; font-weight: 700;">24</div>
                        </div>
                        <i class="bi bi-envelope" style="font-size: 32px; color: var(--admin-accent); opacity: 0.3;"></i>
                    </div>
                </div>

                <!-- Actions -->
                <div class="admin-card">
                    <button type="submit" class="btn btn-admin-primary w-100 mb-2">
                        <i class="bi bi-check-circle me-2"></i>Enregistrer les Modifications
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