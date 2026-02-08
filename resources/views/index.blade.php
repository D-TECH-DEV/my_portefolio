
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
                        <span class=""><h4>Salut, je suis</h4> </span>
                        <h2 class="text-warning"><b>D. Youssouf Doumdje</b></h2>
                        <h3>développeur full-stack</h3>
                        <p>Fondateur de You-Soft, je conçois des solutions digitales innovantes et performantes.
                            Réinventons le futur ligne par ligne.</p>
                        <div class="hero-btns">
                            <a href="contact.html" class="theme-btn">Me contacter <i class="far fa-angle-right"></i></a>
                            <a href="contact.html" class="read-more">Mon CV <i class="far fa-angle-right"></i></a>
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
                                        <span>Contactez-nous</span><br>
                                        <a href="mailto:dydoumdje2004@gmail.com">dydoumdje2004@gmail.com</a>
                                    </div>
                                </div>
                                <div class="info-box-item">
                                    <i class="far fa-phone"></i>
                                    <div class="content">
                                        <span>Appelez-nous</span><br>
                                        <a href="callto:+2250789681613">+225 07 89 68 16 13</a>
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
                            <div class="dot-shape">
                                <img src="assets/images/shape/about-dot.png" alt="Shape">
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
                <div class="col-lg-6">
                    <div class="service-item wow fadeInUp delay-0-2s">
                        <div class="number">01.</div>
                        <div class="content">
                            <h4>Programmation & Développement</h4>
                            <p>Sites vitrines pro, applications web sur mesure et systèmes de gestion adaptés.</p>
                        </div>
                        <a href="#" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item wow fadeInUp delay-0-4s">
                        <div class="number">02.</div>
                        <div class="content">
                            <h4>Maintenance Informatique</h4>
                            <p>Maintenance système et logicielle, dépannage, optimisation et sécurité assurée.</p>
                        </div>
                        <a href="#" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item wow fadeInUp delay-0-2s">
                        <div class="number">03.</div>
                        <div class="content">
                            <h4>Design & Identité Visuelle</h4>
                            <p>Design web moderne, supports digitaux et interfaces claires et impactantes.</p>
                        </div>
                        <a href="#" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item wow fadeInUp delay-0-4s">
                        <div class="number">04.</div>
                        <div class="content">
                            <h4>Automatisation & DevOps</h4>
                            <p>Automatisation des déploiements avec Git, GitHub et Docker pour une mise en production
                                fluide.</p>
                        </div>
                        <a href="#" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item wow fadeInUp delay-0-2s">
                        <div class="number">05.</div>
                        <div class="content">
                            <h4>Création d'API RESTful</h4>
                            <p>Développement d'interfaces robustes pour interconnecter vos services numériques.</p>
                        </div>
                        <a href="#" class="details-btn"><i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="service-item wow fadeInUp delay-0-4s">
                        <div class="number">06.</div>
                        <div class="content">
                            <h4>Conseil & Stratégie</h4>
                            <p>Accompagnement stratégique pour renforcer votre crédibilité et générer de vrais
                                résultats.</p>
                        </div>
                        <a href="#" class="details-btn"><i class="fas fa-arrow-right"></i></a>
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
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-2s">
                                        <img src="assets/images/skills/skill1.png" alt="Skill">
                                        <h5>Flutter</h5>
                                        <span class="percent">90%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-2s">
                                        <img src="assets/images/skills/skill1.png" alt="Skill">
                                        <h5>Flutter</h5>
                                        <span class="percent">90%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-2s">
                                        <img src="assets/images/skills/skill1.png" alt="Skill">
                                        <h5>Flutter</h5>
                                        <span class="percent">90%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-2s">
                                        <img src="assets/images/skills/skill1.png" alt="Skill">
                                        <h5>Flutter</h5>
                                        <span class="percent">90%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-2s">
                                        <img src="assets/images/skills/skill1.png" alt="Skill">
                                        <h5>Flutter</h5>
                                        <span class="percent">90%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-3s">
                                        <img src="assets/images/skills/skill2.png" alt="Skill">
                                        <h5>Laravel</h5>
                                        <span class="percent">95%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-4s">
                                        <img src="assets/images/skills/skill3.png" alt="Skill">
                                        <h5>Spring Boot</h5>
                                        <span class="percent">85%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-5s">
                                        <img src="assets/images/skills/skill4.png" alt="Skill">
                                        <h5>React JS</h5>
                                        <span class="percent">80%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-2s">
                                        <img src="assets/images/skills/skill5.png" alt="Skill">
                                        <h5>Figma</h5>
                                        <span class="percent">85%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-3s">
                                        <img src="assets/images/skills/skill6.png" alt="Skill">
                                        <h5>Docker</h5>
                                        <span class="percent">75%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-4s">
                                        <img src="assets/images/skills/skill7.png" alt="Skill">
                                        <h5>PostgreSQL</h5>
                                        <span class="percent">85%</span>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-3 col-sm-4 col-6">
                                    <div class="skill-item wow fadeInUp delay-0-5s">
                                        <img src="assets/images/skills/skill8.png" alt="Skill">
                                        <h5>Git / GitHub</h5>
                                        <span class="percent">95%</span>
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
            <div class="row align-items-center pb-25">
                <div class="col-lg-6">
                    <div class="project-image wow fadeInLeft delay-0-2s">
                        <img src="assets/images/projects/project1.jpg" alt="Project">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="project-content wow fadeInRight delay-0-2s">
                        <span class="sub-title">Développement Web</span>
                        <h2><a href="project-details.html">Projet DRH INP-HB</a></h2>
                        <p>Finalisation complète du projet de gestion des ressources humaines pour l'Institut
                            Polytechnique.</p>
                        <a href="project-details.html" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center pb-25">
                <div class="col-lg-6 order-lg-2">
                    <div class="project-image wow fadeInLeft delay-0-2s">
                        <img src="assets/images/projects/project2.jpg" alt="Project">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 ms-auto">
                    <div class="project-content wow fadeInRight delay-0-2s">
                        <span class="sub-title">Back-office Solution</span>
                        <h2><a href="project-details.html">Plateforme PSR</a></h2>
                        <p>Réalisation du back-office de la Plateforme Intelligente de suivi de la recherche ivoirienne.
                        </p>
                        <a href="project-details.html" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center pb-25">
                <div class="col-lg-6">
                    <div class="project-image wow fadeInLeft delay-0-2s">
                        <img src="assets/images/projects/project3.jpg" alt="Project">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="project-content wow fadeInRight delay-0-2s">
                        <span class="sub-title">Migration & Laravel</span>
                        <h2><a href="project-details.html">Concours BAC</a></h2>
                        <p>Migration reussie de la partie candidat d'un projet de gestion du concours BAC vers Laravel
                            12.</p>
                        <a href="project-details.html" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center pb-25">
                <div class="col-lg-6 order-lg-2">
                    <div class="project-image wow fadeInLeft delay-0-2s">
                        <img src="assets/images/projects/project4.jpg" alt="Project">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 ms-auto">
                    <div class="project-content wow fadeInRight delay-0-2s">
                        <span class="sub-title">Application Web</span>
                        <h2><a href="project-details.html">O'Otakus Crêperie</a></h2>
                        <p>Développement d'une solution numérique complète pour la gestion d'une enseigne de
                            restauration.</p>
                        <a href="project-details.html" class="details-btn"><i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="project-btn text-center wow fadeInUp delay-0-2s">
                <a href="projects.html" class="theme-btn">Voir plus de projects <i class="far fa-angle-right"></i></a>
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
                            <div class="testimonial-item wow fadeInUp delay-0-3s">
                                <div class="author">
                                    <img src="assets/images/testimonials/author1.png" alt="Author">
                                </div>
                                <div class="text">At vero eoset accusamus et iusto odio dignissimos ducimus quie
                                    blanditiis praesentium voluptatum deleniti atque corrupti dolores</div>
                                <div class="testi-des">
                                    <h5>Rodolfo E. Shannon</h5>
                                    <span>CEO & Founder</span>
                                </div>
                            </div>
                            <div class="testimonial-item wow fadeInUp delay-0-4s">
                                <div class="author">
                                    <img src="assets/images/testimonials/author2.png" alt="Author">
                                </div>
                                <div class="text">Nam libero tempore cumsoluta nobise est eligendi optio cumque nihil
                                    impedit quominus idquod maxime placeat facere possimus</div>
                                <div class="testi-des">
                                    <h5>Kenneth J. Dutton</h5>
                                    <span>Web Developer</span>
                                </div>
                            </div>
                            <div class="testimonial-item wow fadeInUp delay-0-2s">
                                <div class="author">
                                    <img src="assets/images/testimonials/author1.png" alt="Author">
                                </div>
                                <div class="text">At vero eoset accusamus et iusto odio dignissimos ducimus quie
                                    blanditiis praesentium voluptatum deleniti atque corrupti dolores</div>
                                <div class="testi-des">
                                    <h5>Rodolfo E. Shannon</h5>
                                    <span>CEO & Founder</span>
                                </div>
                            </div>
                            <div class="testimonial-item wow fadeInUp delay-0-2s">
                                <div class="author">
                                    <img src="assets/images/testimonials/author2.png" alt="Author">
                                </div>
                                <div class="text">Nam libero tempore cumsoluta nobise est eligendi optio cumque nihil
                                    impedit quominus idquod maxime placeat facere possimus</div>
                                <div class="testi-des">
                                    <h5>Kenneth J. Dutton</h5>
                                    <span>Web Developer</span>
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
                        <form id="contactForm" class="contactForm" name="contactForm"
                            action="https://noxfolio.starplatethemes.com/assets/php/form-process.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nom complet</label>
                                        <input type="text" id="name" name="name" class="form-control" value=""
                                            placeholder="Ex: Jean Dupont" required
                                            data-error="Veuillez entrer votre nom">
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
    <section class="blog-area rel z-1" id="blog">
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
    </section>
    <!-- Blog Area end -->

    <!-- Client Log start -->
    <div class="client-logo-area rel z-1 pt-130 rpt-100 pb-60">
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
    </div>
    <!-- Client Log end -->

@endsection