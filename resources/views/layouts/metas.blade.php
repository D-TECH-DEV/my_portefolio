<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Primary Meta Tags -->
<title>{{ $settings['meta_title'] ?? ($settings['site_name'] ?? 'You-Soft') }}</title>
<meta name="title" content="{{ $settings['meta_title'] ?? ($settings['site_name'] ?? 'You-Soft') }}">
<meta name="description" content="{{ $settings['meta_description'] ?? '' }}">
<meta name="keywords" content="{{ $settings['meta_keywords'] ?? '' }}">

@isset($settings['robots_content'])
    <meta name="robots" content="{{ $settings['robots_content'] }}">
@else
    <meta name="robots" content="index, follow">
@endisset

@isset($settings['canonical_url'])
    <link rel="canonical" href="{{ $settings['canonical_url'] }}">
@endisset

@isset($settings['google_site_verification'])
    <meta name="google-site-verification" content="{{ $settings['google_site_verification'] }}">
@endisset

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title"
    content="{{ $settings['og_title'] ?? ($settings['meta_title'] ?? ($settings['site_name'] ?? 'You-Soft')) }}">
<meta property="og:description" content="{{ $settings['og_description'] ?? ($settings['meta_description'] ?? '') }}">
<meta property="og:image"
    content="{{ $settings['og_image'] ?? (isset($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('assets/images/favicon.png')) }}">

<!-- Twitter -->
<meta property="twitter:card" content="{{ $settings['twitter_card'] ?? 'summary_large_image' }}">
<meta property="twitter:url" content="{{ url()->current() }}">
<meta property="twitter:title"
    content="{{ $settings['og_title'] ?? ($settings['meta_title'] ?? ($settings['site_name'] ?? 'You-Soft')) }}">
<meta property="twitter:description"
    content="{{ $settings['og_description'] ?? ($settings['meta_description'] ?? '') }}">
<meta property="twitter:image"
    content="{{ $settings['og_image'] ?? (isset($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('assets/images/favicon.png')) }}">
@isset($settings['twitter_site'])
    <meta name="twitter:site" content="{{ $settings['twitter_site'] }}">
@endisset

<!-- Favicon Icon -->
<link rel="shortcut icon"
    href="{{ isset($settings['site_logo']) ? asset('storage/' . $settings['site_logo']) : asset('assets/images/favicon.png') }}">