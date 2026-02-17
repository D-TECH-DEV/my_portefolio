<!-- footer area start -->
<footer class="main-footer rel z-1">
    <div class="footer-top-wrap bgc-black pt-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-12">
                    <div class="footer-widget widget_logo wow fadeInUp delay-0-2s">
                        <div class="footer-logo">
                            <a href="{{ route('index') }}"><img
                                    src="{{ isset($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('assets/images/logos/logo3.png') }}"
                                    alt="Logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7">
                    <div class="footer-widget widget_nav_menu wow fadeInUp delay-0-4s">
                        <h6 class="footer-title">Liens Rapides</h6>
                        <ul>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#projects">Projets</a></li>
                            <li><a href="#about">À propos</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    {{-- <div class="footer-widget widget_newsletter wow fadeInUp delay-0-4s">
                        <form action="#">
                            <label for="email-address"><i class="far fa-envelope"></i></label>
                            <input id="email-address" type="email" placeholder="Adresse Email" required>
                            <button>S'inscrire <i class="far fa-angle-right"></i></button>
                        </form>
                    </div> --}}
                </div>
                <div class="col-lg-3 col-md-5">
                    <div class="footer-widget widget_contact_info wow fadeInUp delay-0-6s">
                        <h6 class="footer-title">Adresse</h6>
                        <ul>
                            @if(isset($settings['contact_address']))
                                <li><i class="far fa-map-marker-alt"></i> {{ $settings['contact_address'] }}</li>
                            @endif
                            @if(isset($settings['contact_email']))
                                <li><i class="far fa-envelope"></i> <a
                                        href="mailto:{{ $settings['contact_email'] }}">{{ $settings['contact_email'] }}</a>
                                </li>
                            @endif
                            @if(isset($settings['contact_phone']))
                                <li><i class="far fa-phone"></i> <a
                                        href="callto:{{ str_replace(' ', '', $settings['contact_phone']) }}">{{ $settings['contact_phone'] }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-20 pb-5 rpt-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2026, <a
                                href="{{ route('index') }}">{{ $settings['site_name'] ?? 'You-Soft' }}</a> Tous droits
                            réservés</p>
                    </div>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <ul class="footer-bottom-nav">
                        @if (isset($settings['social_facebook']))
                            <li><a href="{{ $settings['social_facebook'] }}" target="_blank">Facebook</a></li>
                        @endif
                        @if (isset($settings['social_twitter']))
                            <li><a href="{{ $settings['social_twitter'] }}" target="_blank">Twitter</a></li>
                        @endif
                        @if (isset($settings['social_instagram']))
                            <li><a href="{{ $settings['social_instagram'] }}" target="_blank">Instagram</a></li>
                        @endif
                        @if (isset($settings['social_linkedin']))
                            <li><a href="{{ $settings['social_linkedin'] }}" target="_blank">LinkedIn</a></li>
                        @endif
                        @if (isset($settings['social_github']))
                            <li><a href="{{ $settings['social_github'] }}" target="_blank">GitHub</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- Scroll Top Button -->
            <button class="scroll-top scroll-to-target" data-target="html"><span
                    class="fas fa-angle-double-up"></span></button>
        </div>
        <div class="bg-lines">
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
            <span></span><span></span>
        </div>
    </div>
</footer>
<!-- footer area end -->