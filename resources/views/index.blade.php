@extends("layouts.master")
@section("content")

    <!--Form Back Drop-->
    <div class="form-back-drop"></div>

    <!-- Hidden Sidebar -->
    <section class="hidden-bar">
        <div class="inner-box text-center">
            <div class="cross-icon"><span class="fa fa-times"></span></div>
            <div class="title">
                <h4>Prendre Rendez-vous</h4>
            </div>

            <!--Appointment Form-->
            <div class="appointment-form">
                <form method="post" action="https://noxfolio.starplatethemes.com/contact.html">
                    <div class="form-group">
                        <input type="text" name="text" value="" placeholder="Nom complet" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="" placeholder="Adresse Email" required>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Votre message" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="theme-btn">Envoyer maintenant</button>
                    </div>
                </form>
            </div>

            <!--Social Icons-->
            <div class="social-style-one">
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest-p"></i></a>
            </div>
        </div>
    </section>
    <!--End Hidden Sidebar --> <!-- header area end -->





    <!-- Hero Section Start -->
    <section class="main-hero-area pt-150 pb-80 rel z-1">
        <div class="container container-fluid px-lg-5">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="hero-content rmb-55 wow fadeInUp delay-0-2s">
                        <span class="">
                            <h4>Salut, je suis</h4>
                        </span>
                        <h2 class="text-warning"><b>D. Youssouf Doumdje</b></h2>
                        <h3>développeur full-stack</h3>
                        <p>Fondateur de You-Soft, je conçois des solutions digitales innovantes et performantes.
                            Réinventons le futur ligne par ligne.</p>
                        <div class="hero-btns">
                            <a href="mailto:{{ $settings['contact_email'] ?? '' }}" class="theme-btn">Me contacter <i class="far fa-angle-right"></i></a>
                            <a href="{{ asset('storage/' . $settings['cv_pdf']) }}" 
                                class="read-more" 
                                download>
                                Mon CV <i class="far fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="author-image-part wow fadeIn delay-0-3s">
                        <div class="bg-circle"></div>
                        <img src="assets/images/hero/me.png" alt="Author">
                        <div class="progress-shape">
                            <img src="assets/images/hero/progress-shape.png" alt="Progress">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- About Area start -->
    <section class="about-area rel z-1" id="about">
        <div class="for-bgc-black py-130 rpy-100">
            <div class="container">
                <div class="row gap-100 align-items-center">
                    <div class="col-lg-7">
                        <div class="about-content-part rel z-2 rmb-55">
                            <div class="section-title mb-35 wow fadeInUp delay-0-2s">
                                <span class="sub-title mb-15">À propos de moi</span>
                                <h2>Créer des <span>solutions digitales</span> fiables et sur mesure</h2>
                                <p>Chez You-Soft, nous combinons programmation, maintenance informatique et design
                                    numérique pour concevoir des outils performants qui travaillent pour votre activité
                                    24h/24. Notre objectif : réinventer le futur ligne par ligne.</p>
                            </div>
                            <ul class="list-style-one two-column wow fadeInUp delay-0-2s">
                                <li>Design & Identité Visuelle</li>
                                <li>Solutions Digitales</li>
                                <li>Développement Web & Mobile</li>
                                <li>Interface & Expérience Utilisateur</li>
                            </ul>
                            <div class="about-info-box mt-25 wow fadeInUp delay-0-2s">
                                <div class="info-box-item">
                                    <i class="far fa-envelope"></i>
                                    <div class="content">
                                        <span>Me contacter</span><br>
                                        <a href="mailto:{{ $settings['contact_email'] ?? '' }}">
                                            {{ $settings['contact_email'] ?? '' }}
                                        </a>                                    
                                    </div>
                                </div>
                                <div class="info-box-item">
                                    <i class="far fa-phone"></i>
                                    <div class="content">
                                        <span>Appelez-moi</span><br>
                                        <a href="callto:{{ $settings['contact_phone'] ?? '' }}">{{ $settings['contact_phone'] ?? '' }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="about-image-part wow fadeInUp delay-0-3s">
                            <img src="assets/images/about/about.png" alt="About Me">
                            <!-- <div class="about-btn btn-one wow fadeInRight delay-0-4s">
                                            <img src="assets/images/about/btn-image1.png" alt="Image">
                                            <h6>Experience Designer</h6>
                                            <i class="fas fa-arrow-right"></i>
                                        </div> -->
                            <!-- <div class="about-btn btn-two wow fadeInRight delay-0-5s">
                                            <img src="assets/images/about/btn-image2.png" alt="Image">
                                            <h6>Mark J. Collins</h6>
                                            <i class="fas fa-arrow-right"></i>
                                        </div> -->
                            {{-- <div class="dot-shape">
                                <img src="assets/images/shape/about-dot.png" alt="Shape">
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- About Area end -->


    <!-- Resume Area start -->
    <section class="resume-area pt-130 rpt-100 rel z-1">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-3">
                                <div class="big-icon mt-85 rmt-0 rmb-55 wow fadeInUp delay-0-2s">
                                    <img src="assets/images/logos/logo3.png" alt="">
                                </div>
                            </div> -->
                <div class="col-lg-12">
                    <div class="row ">
                        <div class="col-xl-8 col-lg-9">
                            <div class="section-title mb-60 wow fadeInUp delay-0-2s">
                                <span class="sub-title mb-15">Mon Parcours</span>
                                <h2>Une expertise solide <span>au service</span> de vos projets</h2>
                            </div>
                        </div>
                    </div>
                    <div class="resume-items-wrap">
                        <div class="row justify-content-between">
                            <div class="col-xl-5 col-md-6">
                                <div class="resume-item wow fadeInUp delay-0-3s">
                                    <div class="icon">
                                        <i class="far fa-arrow-right"></i>
                                    </div>
                                    <div class="content">
                                        <span class="years">Fév 2025 - Nov 2025</span>
                                        <h4>Stage Développeur Full-Stack</h4>
                                        <span class="company">Institut Polytechnique Phelix H. Boigny</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-6">
                                <div class="resume-item wow fadeInUp delay-0-4s">
                                    <div class="icon">
                                        <i class="far fa-arrow-right"></i>
                                    </div>
                                    <div class="content">
                                        <span class="years">2024 - Présent</span>
                                        <h4>Licence 3 Réseaux et Génie Logiciel</h4>
                                        <span class="company">Pigier Côte d’Ivoire</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-6">
                                <div class="resume-item wow fadeInUp delay-0-2s">
                                    <div class="icon">
                                        <i class="far fa-arrow-right"></i>
                                    </div>
                                    <div class="content">
                                        <span class="years">2024</span>
                                        <h4>BTS Informatique-Développeur d'application</h4>
                                        <span class="company">Pigier Côte d’Ivoire</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-md-6">
                                <div class="resume-item wow fadeInUp delay-0-4s">
                                    <div class="icon">
                                        <i class="far fa-arrow-right"></i>
                                    </div>
                                    <div class="content">
                                        <span class="years">2022</span>
                                        <h4>Baccalauréat série D</h4>
                                        <span class="company">Walter Ganz Tchad</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Resume Area end -->


    <!-- Services Area start -->
    <section class="services-area pt-130 rpt-100 pb-100 rpb-70 rel z-1" id="services">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="section-title text-center mb-60 wow fadeInUp delay-0-2s">
                        <span class="sub-title mb-15">Nos Services</span>
                        <h2>Des solutions <span>polyvalentes</span> pour votre écosystème digital</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($services as $service)


                    <div class="col-lg-6">
                        <div class="service-item wow fadeInUp delay-0-2s">
                            <div class="number">{{ "$service->order." }}</div>
                            <div class="content">
                                <h4>{{ $service->title }}</h4>
                                <p>{{ $service->description }}</p>
                            </div>
                            {{-- <a href="#" class="details-btn"><i class="fas fa-arrow-right"></i></a> --}}
                        </div>
                    </div>

                @empty
                    <div class="text-center">
                        <span>Aucun service disponible</span>
                    </div>
                @endforelse

            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Services Area end -->


    <!-- Skill Area start -->
    <section class="skill-area rel z-1" id="skills">
        <div class="for-bgc-black pt-130 rpt-100 pb-100 rpb-70">
            <div class="container">
                <div class="row gap-100">
                    <div class="col-lg-5">
                        <div class="skill-content-part rel z-2 rmb-55 wow fadeInUp delay-0-2s">
                            <div class="section-title mb-40">
                                <span class="sub-title mb-15">Mes Compétences</span>
                                <h2>Un stack <span>technologique</span> moderne et polyvalent</h2>
                                <p>Je maîtrise les outils et langages les plus performants du marché pour garantir la
                                    robustesse et la scalabilité de vos solutions digitales.</p>
                            </div>
                            <a href="about.html" class="theme-btn">Mon CV <i class="far fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="skill-items-wrap">
                            <div class="row">
                                @forelse ($skills as $skill)
                                    <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                        <div class="skill-item wow fadeInUp delay-0-2s">
                                            <img src="{{ asset($skill->image) }}" alt="Skill">
                                            <h5>{{ $skill->name }}</h5>
                                            <span class="percent">{{ "$skill->proficiency%" }}</span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center">
                                        <span>Aucune compétence disponible</span>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Skill Area end -->


    <!-- Projects Area start -->
    <section class="projects-area pt-130 rpt-100 pb-100 rpb-70 rel z-1" id="projets">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-title text-center mb-60 wow fadeInUp delay-0-2s">
                        <span class="sub-title mb-15">Dernières Réalisations</span>
                        <h2>Découvrez mes <span>projets récents</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($projects as $project)
                    <div class="col-lg-4 col-md-6 mb-30">
                        <a href="{{ route('project.detail', ['slug' => $project->slug]) }}" class="project-card-link">
                            <div class="project-item style-three wow fadeInUp delay-0-2s">
                                <div class="project-image">
                                    <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" class="project-grid-image">
                                </div>
                                <div class="project-content">
                                    <span class="sub-title category-badge">
                                        <i class="fas fa-folder-open"></i> {{ $project->category->name ?? 'Projet' }}
                                    </span>
                                    <h4>
                                        {{ $project->title }}
                                    </h4>
                                    <span class="project-btn">
                                        <i class="far fa-arrow-right"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center">Aucun projet disponible</div>
                @endforelse
            </div>


            <div class="project-btn text-center wow fadeInUp delay-0-2s">
                <a href="{{ route('portfolio') }}" class="theme-btn">Voir plus de projects <i
                        class="far fa-angle-right"></i></a>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Projects Area end -->


    <!-- Testimonial Area start -->
    <section class="testimonials-area rel z-1">
        <div class="for-bgc-black py-130 rpy-100">
            <div class="container">
                <div class="row gap-90">
                    <div class="col-lg-4">
                        <div class="testimonials-content-part rel z-2 rmb-55 wow fadeInUp delay-0-2s">
                            <div class="section-title mb-40">
                                <span class="sub-title mb-15">Témoignages Clients</span>
                                <h2>Ce que mes <span>partenaires</span> disent</h2>
                                <p>Découvrez les retours d'expérience de ceux qui m'ont fait confiance pour leurs
                                    projets.</p>
                            </div>
                            <div class="slider-arrows">
                                <button class="testimonial-prev"><i class="fal fa-arrow-left"></i></button>
                                <button class="testimonial-next"><i class="fal fa-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="testimonials-wrap">
                            @forelse ($testimonials as $testimonial)
                                <div class="testimonial-item wow fadeInUp delay-0-3s">
                                    @php
                                        $parts = explode(' ', $testimonial->name);
                                        $initials = strtoupper(
                                            substr($parts[0], 0, 1) .
                                            (isset($parts[1]) ? substr($parts[1], 0, 1) : '')
                                        );
                                    @endphp

                                    <div class="text-center">
                                        <div class="avatar-initial">{{ $initials }}</div>
                                    </div>
                                    <div class="text">{{ $testimonial->message }}</div>
                                    <div class="testi-des">
                                        <h5>{{ $testimonial->name }}</h5>
                                        <span>{{ $testimonial->profession }}</span>
                                    </div>
                                </div>
                            @empty

                                <div class="text-center">
                                    <span>Aucun commentaire disponible</span>
                                </div>

                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Testimonial Area end -->




    <!-- Contact Area start -->
    <section class="contact-area pt-95 pb-130 rpt-70 rpb-100 rel z-1" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-content-part pt-5 rpt-0 rmb-55 wow fadeInUp delay-0-2s">
                        <div class="section-title mb-40">
                            <span class="sub-title mb-15">Contactez-moi</span>
                            <h2>Discutons de votre <span>prochain projet</span></h2>
                            <p>Prêt à transformer vos idées en réalité ? Je suis disponible pour toute nouvelle
                                opportunité ou collaboration.</p>
                        </div>
                        <ul class="list-style-two">
                            <li>Solutions adaptées à votre budget</li>
                            <li>Communication claire et professionnelle</li>
                            <li>Outils évolutifs pour votre croissance</li>
                            <li>Support technique personnalisé</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-form contact-form-wrap form-style-one wow fadeInUp delay-0-4s">
                        <div id="contactErrors" class="alert alert-danger d-none alert-dismissible fade show" role="alert"
                            style="background: rgba(220, 53, 69, 0.1); border: 1px solid rgba(220, 53, 69, 0.2); color: #dc3545;">
                            <ul class="mb-0" id="errorList"></ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                                style="filter: invert(1);"></button>
                        </div>

                        <form id="contactFormLaravel" class="contactForm" name="contactFormLaravel"
                            action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nom complet</label>
                                        <input type="text" id="name" name="name" class="form-control" value=""
                                            placeholder="Ex: Jean Dupont" required data-error="Veuillez entrer votre nom">
                                        <label for="name" class="for-icon"><i class="far fa-user"></i></label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Adresse Email</label>
                                        <input type="email" id="email" name="email" class="form-control" value=""
                                            placeholder="support@gmail.com" required
                                            data-error="Veuillez entrer votre email">
                                        <label for="email" class="for-icon"><i class="far fa-envelope"></i></label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone_number">Numéro de téléphone</label>
                                        <input type="text" id="phone_number" name="phone_number" class="form-control"
                                            value="" placeholder="+225 07 89 68 16 13" required
                                            data-error="Veuillez entrer votre numéro">
                                        <label for="phone_number" class="for-icon"><i class="far fa-phone"></i></label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject">Sujet</label>
                                        <input type="text" id="subject" name="subject" class="form-control" value=""
                                            placeholder="Ex: Projet Web" required data-error="Veuillez entrer le sujet">
                                        <label for="subject" class="for-icon"><i class="far fa-text"></i></label>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="4"
                                            placeholder="Écrivez votre message ici..." required
                                            data-error="Veuillez entrer votre message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="theme-btn">Envoyer le message <i
                                                class="far fa-angle-right"></i></button>
                                        <div id="msgSubmit" class="hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section>
    <!-- Contact Area end -->


    <!-- Blog Area start -->
    {{-- <section class="blog-area rel z-1" id="blog">
        <div class="for-bgc-black pt-130 pb-100 rpt-100 rpb-70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="section-title text-center mb-60 wow fadeInUp delay-0-2s">
                            <span class="sub-title mb-15">Actualités & Blog</span>
                            <h2>Mes derniers <span>articles</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="blog-item wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="assets/images/blog/blog1.png" alt="Blog">
                            </div>
                            <div class="content">
                                <div class="blog-meta mb-35">
                                    <a class="tag" href="blog.html">Design</a>
                                    <a class="tag" href="blog.html">Figma</a>
                                </div>
                                <h5><a href="blog-details.html">Tips For Conductin See Usability Studies</a></h5>
                                <hr>
                                <div class="blog-meta mt-35">
                                    <a class="date" href="#"><i class="far fa-calendar-alt"></i> September 25, 2023</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="blog-item wow fadeInUp delay-0-2s">
                            <div class="image">
                                <img src="assets/images/blog/blog2.png" alt="Blog">
                            </div>
                            <div class="content">
                                <div class="blog-meta mb-35">
                                    <a class="tag" href="blog.html">Design</a>
                                    <a class="tag" href="blog.html">Figma</a>
                                </div>
                                <h5><a href="blog-details.html">Keyboard-Only Suppor Assistive Technology</a></h5>
                                <hr>
                                <div class="blog-meta mt-35">
                                    <a class="date" href="#"><i class="far fa-calendar-alt"></i> September 25, 2023</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center ">
                        <a href="about.html" class="theme-btn">Mon CV <i class="far fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </section> --}}
    <!-- Blog Area end -->

    <!-- Client Log start -->
    {{-- <div class="client-logo-area rel z-1 pt-130 rpt-100 pb-60">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-title text-center pt-5 mb-65 wow fadeInUp delay-0-2s">
                        <h6>Ils nous font confiance pour leur <span>transformation digitale</span> & projets innovants
                        </h6>
                    </div>
                </div>
            </div>
            <div class="client-logo-wrap">
                <a class="client-logo-item wow fadeInUp delay-0-2s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo1.png" alt="Client Logo">
                </a>
                <a class="client-logo-item wow fadeInUp delay-0-3s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo2.png" alt="Client Logo">
                </a>
                <a class="client-logo-item wow fadeInUp delay-0-4s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo3.png" alt="Client Logo">
                </a>
                <a class="client-logo-item wow fadeInUp delay-0-5s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo4.png" alt="Client Logo">
                </a>
                <a class="client-logo-item wow fadeInUp delay-0-6s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo5.png" alt="Client Logo">
                </a>
                <a class="client-logo-item wow fadeInUp delay-0-2s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo6.png" alt="Client Logo">
                </a>
                <a class="client-logo-item wow fadeInUp delay-0-3s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo7.png" alt="Client Logo">
                </a>
                <a class="client-logo-item wow fadeInUp delay-0-4s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo8.png" alt="Client Logo">
                </a>
                <a class="client-logo-item wow fadeInUp delay-0-5s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo9.png" alt="Client Logo">
                </a>
                <a class="client-logo-item wow fadeInUp delay-0-6s" href="contact.html">
                    <img src="assets/images/client-logos/client-logo10.png" alt="Client Logo">
                </a>
            </div>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </div> --}}
    <!-- Client Log end -->

    <!-- Contact Feedback Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"
                style="background: #111827; border: 1px solid #333; border-radius: 20px; color: #fff;">
                <div class="modal-body text-center p-5">
                    <div id="modalIconContainer" class="mb-4">
                        <!-- Icon will be injected here -->
                    </div>
                    <h3 id="modalTitle" class="mb-3"></h3>
                    <p id="modalMessage" class="text-light opacity-75 mb-4"></p>
                    <button type="button" class="theme-btn w-100" data-bs-dismiss="modal"
                        style="background: #dca73a; border: none; border-radius: 12px; padding: 12px; font-weight: 600;">Fermer</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push("js")
    <script>
$(document).ready(function() {
    $('#contactFormLaravel').on('submit', function(e) {
        e.preventDefault();
        
        let form = $(this);
        let submitBtn = form.find('button[type="submit"]');
        let originalBtnText = submitBtn.html();
        
        // Disable button and show loading
        submitBtn.prop('disabled', true).html('Envoi en cours... <i class="fas fa-spinner fa-spin ms-2"></i>');
        
        // Clear previous error display if any
        $('#contactErrors').addClass('d-none');
        $('#errorList').empty();

        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: form.serialize(),
            success: function(response) {
                if(response.success) {
                    // Update Modal for SUCCESS
                    $('#modalIconContainer').html('<i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>');
                    $('#modalTitle').text('Message Envoyé !').css('color', '#dca73a');
                    $('#modalMessage').text(response.message);
                    
                    let contactModal = new bootstrap.Modal(document.getElementById('contactModal'));
                    contactModal.show();
                    
                    // Reset form
                    form[0].reset();
                }
            },
            error: function(xhr) {
                if(xhr.status === 422) {
                    // Handle validation errors (show in inline div)
                    let errors = xhr.responseJSON.errors;
                    $('#contactErrors').removeClass('d-none');
                    $.each(errors, function(key, value) {
                        $('#errorList').append('<li>' + value[0] + '</li>');
                    });
                    
                    // Also show a general error modal
                    $('#modalIconContainer').html('<i class="fas fa-exclamation-circle text-danger" style="font-size: 4rem;"></i>');
                    $('#modalTitle').text('Erreur de saisie').css('color', '#dc3545');
                    $('#modalMessage').text('Veuillez vérifier les informations saisies dans le formulaire.');
                    
                    let contactModal = new bootstrap.Modal(document.getElementById('contactModal'));
                    contactModal.show();
                } else {
                    // General system error
                    $('#modalIconContainer').html('<i class="fas fa-times-circle text-danger" style="font-size: 4rem;"></i>');
                    $('#modalTitle').text('Erreur d\'envoi').css('color', '#dc3545');
                    $('#modalMessage').text('Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer plus tard.');
                    
                    let contactModal = new bootstrap.Modal(document.getElementById('contactModal'));
                    contactModal.show();
                }
            },
            complete: function() {
                // Restore button state
                submitBtn.prop('disabled', false).html(originalBtnText);
            }
        });
    });
});
</script>
@endpush