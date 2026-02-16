@extends("layouts.master")
@section("content")


<!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="https://noxfolio.starplatethemes.com/contact.html">
                        <div class="form-group">
                            <input type="text" name="text" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea placeholder="Message" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Submit now</button>
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
        <!--End Hidden Sidebar -->           <!-- header area end -->
     
    <!-- Page Banner Start -->
        <section class="page-banner-area pt-200 rpt-140 pb-100 rpb-60 rel z-1 text-center">
            <div class="container">
                <div class="banner-inner text-white">
                    <h1 class="page-title wow fadeInUp delay-0-2s">{{ $project->title }}</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center wow fadeInUp delay-0-4s">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                            <li class="breadcrumb-item active">Mobile Application Design</li>
                        </ol>
                    </nav>
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
        <!-- Page Banner End -->
        
        
        <!-- ProjectDetails Area start -->
        <section class="projects-details-area pt-40 pb-130 rpb-100 rel z-1">
            <div class="container">
                <div class="projects-details-image mb-50 wow fadeInUp delay-0-2s">
                    <img src="{{ asset($project->image) }}" alt="Project Details">
                </div>
                <div class="row gap-120">
                    <div class="col-lg-8">
                        <div class="project-details-content wow fadeInUp delay-0-2s">
                            <h4 class="mb-4">{{ $project->description }}</h4>
                            <h3 class="big-letter">dDétail</h3>
                            <p>{{ $project->content }}</p>

                            <h3 class="big-letter">tTechnologies</h3>

                            <ul class="list-style-one two-column mt-50 mb-40">
                                @foreach ($project->skills as $skill)
                                    <li>{{ $skill }}</li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                    <div class="col-lg-4 wow fadeInUp delay-0-4s">
                        <div class="project-details-info rmb-55" style="background-image: url(assets/images/projects/project-info-bg.png);">
                            <div class="pd-info-item">
                                <span>Categorie</span>
                                <h5>{{ $project->categorie }}</h5>
                            </div>
                            <div class="pd-info-item">
                                <span>Clients/Entreprises</span>
                                <h5>{{ $project->client }}</h5>
                            </div>
                            <div class="pd-info-item">
                                <span>Lien</span>
                                <h5>{{ $project->link ?? 'Accès privé' }}</h5>
                            </div>
                            <div class="pd-info-item">
                                <span>Published</span>
                                <h5>September 25, 2023</h5>
                            </div>
                        </div>
                    </div>
                </div>
               
               
                {{-- <div class="tag-share py-30 wow fadeInUp delay-0-2s">
                    <div class="item">
                        <b>Tags</b>
                        <div class="tag-coulds">
                            <a href="blog.html">Design</a>
                            <a href="blog.html">Figma</a>
                            <a href="blog.html">Apps</a>
                        </div>
                    </div>
                    <div class="item">
                        <b>Share</b>
                        <div class="social-style-one">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="bg-lines">
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
            </div>
        </section>
        <!-- Project Details Area end -->
        
        
      


    <!-- End Contenet Area -->

    <!-- Start Script Area -->
    <!-- theme preloader start -->
@endsection
