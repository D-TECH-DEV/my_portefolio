<!DOCTYPE html>
<html lang="fr">
<head>
   @include("layouts.metas")
   @include("layouts.css")
</head>
<body>
    
    @include("layouts.loader")

    @include("layouts.header")

    <main>
        @yield("content")
    </main>

    @include("layouts.footter")

    @include("layouts.js")

    @stack("js")
</body>
</html>