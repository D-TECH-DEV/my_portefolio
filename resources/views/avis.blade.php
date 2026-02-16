<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laissez un avis | You-Soft</title>

    <link rel="shortcut icon" href="{{ asset("assets/images/favicon.png") }}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="assets/css/fontawesome-5.14.0.min.css">

    <!-- Custom Premium Style -->
    <style>
        body {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }

        .hero-section {
            padding: 120px 0 60px;
            text-align: center;
        }

        h3 span {
            color: #dca73a;
        }

        .review-card {
            max-width: 650px;
            margin: auto;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            padding: 40px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #fff;
            border-radius: 12px;
        }

        .form-control:focus {
            border-color: #dca73a;
            box-shadow: none;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
        }

        .rating-stars i {
            font-size: 1.6rem;
            cursor: pointer;
            color: #444;
            transition: 0.3s;
        }

        .rating-stars i.active {
            color: #facc15;
        }

        .btn-submit {
            background: #dca73a;
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            transition: 0.3s;
        }

        .footer a {
            color: #dca73a
        }

        .btn-submit:hover {
            background: #c28d2c;
        }

        .success-modal .modal-content {
            background: #111827;
            border-radius: 20px;
            color: #fff;
        }
    </style>
</head>

<body>

   
    <section class="pb-5">
        <div class="container">
            <div class="review-card mt-5">
                <h3 class="display-5 fw-bold tex-center">
                     <span>Avis</span>
                </h3>
                <p class="text-light opacity-75 mt-3">
                    Votre avis est précieux pour améliorer notre service.
                </p>
                <form id="avisForm" action="{{ route('avis.store') }}" method="post">
                    @csrf

                    <div class="mb-4">
                        <label>Nom complet *</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-4">
                        <label>Profession / Entreprise</label>
                        <input type="text" name="profession" class="form-control">
                    </div>

                    {{-- <div class="mb-4">
                        <label>Votre note</label>
                        <div class="rating-stars mt-2">
                            <i class="fas fa-star" data-value="1"></i>
                            <i class="fas fa-star" data-value="2"></i>
                            <i class="fas fa-star" data-value="3"></i>
                            <i class="fas fa-star" data-value="4"></i>
                            <i class="fas fa-star" data-value="5"></i>
                        </div>
                        <input type="hidden" name="rating" id="rating">
                    </div> --}}

                    <div class="mb-4">
                        <label>Votre témoignage *</label>
                        <textarea name="message" rows="4" class="form-control" required></textarea>
                    </div>

                    <button type="submit" class="btn-submit w-100">
                        Envoyer mon avis
                    </button>

                    <div class="text-muted text-center mt-3 footer">
                        Tout droit reservés | <a href="{{ route("index") }}" class">You-soft</a>
                    </div>

                </form>

            </div>
        </div>
    </section>

    <!-- SUCCESS MODAL -->
    <div class="modal fade success-modal" id="successModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-5 text-center">
                <i class="fas fa-check-circle text-success mb-4" style="font-size: 4rem;"></i>
                <h3>Témoignage reçu !</h3>
                <p class="text-light opacity-75">
                    Merci pour votre avis. Il sera publié après validation.
                </p>
                <button class="btn-submit mt-3" data-bs-dismiss="modal">
                    Fermer
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script>
        // Gestion étoiles
        $('.rating-stars i').click(function () {
            let value = $(this).data('value');
            $('#rating').val(value);

            $('.rating-stars i').removeClass('active');

            $('.rating-stars i').each(function () {
                if ($(this).data('value') <= value) {
                    $(this).addClass('active');
                }
            });
        });

        // AJAX submit
        $('#avisForm').on('submit', function (e) {
            e.preventDefault();

            let form = $(this);
            let btn = form.find('button');
            btn.prop('disabled', true).text('Envoi en cours...');

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: form.serialize(),
                success: function (response) {
                    let modal = new bootstrap.Modal(document.getElementById('successModal'));
                    modal.show();
                    form[0].reset();
                    $('.rating-stars i').removeClass('active');
                },
                complete: function () {
                    btn.prop('disabled', false).text('Envoyer mon avis');
                }
            });
        });
    </script>

</body>
</html>
