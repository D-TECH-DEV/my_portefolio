@extends('layouts.admin')

@section('title', 'Modifier l\'article')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ url('/admin/blogs') }}">Blog</a></li>
    <li class="breadcrumb-item active">Modifier</li>
@endsection

@section('styles')
    <style>
        .form-label {
            color: var(--admin-text-base);
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control,
        .form-select {
            background-color: rgba(20, 40, 80, 0.6);
            border: 1px solid var(--admin-border);
            color: var(--admin-text-heading);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: rgba(20, 40, 80, 0.8);
            border-color: var(--admin-accent);
            box-shadow: 0 0 0 4px rgba(220, 167, 58, 0.1);
            color: var(--admin-text-heading);
        }

        .form-control::placeholder {
            color: rgba(170, 184, 197, 0.5);
        }

        .image-preview {
            width: 100%;
            height: 250px;
            border: 2px dashed var(--admin-border);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(20, 40, 80, 0.3);
            color: var(--admin-text-base);
            cursor: pointer;
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .image-preview:hover {
            border-color: var(--admin-accent);
            background-color: rgba(220, 167, 58, 0.05);
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            display: none;
        }

        .image-preview.has-image img {
            display: block;
        }

        .image-preview.has-image i,
        .image-preview.has-image span {
            display: none;
        }

        /* Editor Toolbar simulation */
        .editor-toolbar {
            background: rgba(20, 40, 80, 0.8);
            border: 1px solid var(--admin-border);
            border-bottom: none;
            border-radius: 8px 8px 0 0;
            padding: 10px;
            display: flex;
            gap: 10px;
        }

        .editor-btn {
            background: transparent;
            border: none;
            color: var(--admin-text-base);
            cursor: pointer;
            padding: 5px;
            border-radius: 4px;
        }

        .editor-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            color: var(--admin-accent);
        }

        textarea.rich-editor {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <h2 class="mb-4" style="color: var(--admin-text-heading);">Modifier l'article</h2>
        </div>
    </div>

    <!-- MOCK DATA: Action would be PUT /admin/blogs/{id} -->
    <form action="{{ url('/admin/blogs/1') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <!-- Left Column: Main Content -->
            <div class="col-lg-8">
                <div class="admin-card mb-4">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre de l'article</label>
                        <input type="text" class="form-control form-control-lg" id="title" name="title"
                            value="Tips For Conducting Usability Studies With Participants" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contenu</label>
                        <div class="editor-toolbar">
                            <button type="button" class="editor-btn"><i class="bi bi-type-bold"></i></button>
                            <button type="button" class="editor-btn"><i class="bi bi-type-italic"></i></button>
                            <button type="button" class="editor-btn"><i class="bi bi-type-underline"></i></button>
                            <div class="vr mx-2" style="color: var(--admin-border);"></div>
                            <button type="button" class="editor-btn"><i class="bi bi-list-ul"></i></button>
                            <button type="button" class="editor-btn"><i class="bi bi-list-ol"></i></button>
                            <div class="vr mx-2" style="color: var(--admin-border);"></div>
                            <button type="button" class="editor-btn"><i class="bi bi-link-45deg"></i></button>
                            <button type="button" class="editor-btn"><i class="bi bi-image"></i></button>
                        </div>
                        <textarea class="form-control rich-editor" id="content" name="content"
                            rows="15">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</textarea>
                    </div>
                </div>
            </div>

            <!-- Right Column: Meta Data -->
            <div class="col-lg-4">
                <!-- Publish Action -->
                <div class="admin-card mb-4">
                    <h5 class="mb-3" style="color: var(--admin-accent);">Publication</h5>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-admin-primary">
                            <i class="bi bi-save me-2"></i>Mettre à jour
                        </button>
                        <button type="button" class="btn btn-outline-light"
                            style="border-color: var(--admin-border); color: var(--admin-text-base);">
                            <i class="bi bi-eye me-2"></i>Prévisualiser
                        </button>
                    </div>
                </div>

                <!-- Category & Tags -->
                <div class="admin-card mb-4">
                    <h5 class="mb-3" style="color: var(--admin-text-heading);">Classement</h5>

                    <div class="mb-3">
                        <label for="category" class="form-label">Catégorie</label>
                        <select class="form-select" id="category" name="category" required>
                            <option>Choisir une catégorie...</option>
                            <option value="design" selected>Design</option>
                            <option value="development">Développement</option>
                            <option value="marketing">Marketing</option>
                            <option value="seo">SEO</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="tags" name="tags" value="Design, Figma, UI/UX"
                            placeholder="tag1, tag2">
                        <div class="form-text" style="color: rgba(170, 184, 197, 0.5);">Séparez les tags par des virgules
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="admin-card">
                    <h5 class="mb-3" style="color: var(--admin-text-heading);">Image de mise en avant</h5>
                    <!-- Simulate existing image loaded -->
                    <label for="image" class="image-preview has-image" id="imagePreview">
                        <div class="text-center">
                            <i class="bi bi-cloud-arrow-up display-4 mb-2 d-block text-muted"></i>
                            <span>Cliquez pour remplacer l'image</span>
                        </div>
                        <!-- Mock Image Source -->
                        <img src="https://via.placeholder.com/400x300" alt="Preview">
                    </label>
                    <input type="file" class="form-control d-none" id="image" name="image" accept="image/*">
                </div>
            </div>
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        // Simple Image Preview
        document.getElementById('image').addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const preview = document.getElementById('imagePreview');
                    const img = preview.querySelector('img');
                    img.src = e.target.result;
                    preview.classList.add('has-image');
                }
                reader.readAsDataURL(file);
            }
        });

        // Trigger file input when clicking preview div
        document.getElementById('imagePreview').addEventListener('click', function () {
            document.getElementById('image').click();
        });
    </script>
@endsection