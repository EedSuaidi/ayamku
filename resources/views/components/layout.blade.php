<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title == 'Dashboard' ? 'Ayamku | Dashboard' : 'Ayamku | Dashboard - ' . $title }}</title>

    <link rel="shortcut icon" href="{{ asset('/dist') }}/assets/compiled/svg/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('/dist') }}/assets/compiled/css/app.css">
    <link rel="stylesheet" href="{{ asset('/dist') }}/assets/compiled/css/app-dark.css">

    {{ $additionalStyle ?? '' }}

</head>

<body>

    <script src="{{ asset('/dist') }}/assets/static/js/initTheme.js"></script>

    <div id="app">

        <x-sidebar></x-sidebar>

        <div id="main">

            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            {{ $slot }}

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; Ayamku</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                            by <a href="https://eedsuaidi.com">Eed</a></p>
                    </div>
                </div>
            </footer>

        </div>

    </div>
    <script src="{{ asset('/dist') }}/assets/static/js/components/dark.js"></script>
    <script src="{{ asset('/dist') }}/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="{{ asset('/dist') }}/assets/compiled/js/app.js"></script>

    {{ $additionalScript ?? '' }}

</body>

</html>
