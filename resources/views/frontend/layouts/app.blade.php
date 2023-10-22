<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="monetization" content="$ilp.gatehub.net/315194256">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="og:image" content="https://napzone.games/napzone-og-image.png" />
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/frontend/img/favicon.png') }}">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/Bootstrap/css/bootstrap.min.css') }}">
    <!-- Slick Slider-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/vendors/slick-slider/css/slick.css') }}" />
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/font-awesome/css/all.min.css') }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap"
        rel="stylesheet">
    <!-- Default Styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}">
    <!-- Slick CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <!-- Toaster -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
    @yield('styles')
    @livewireStyles
    <!-- Title -->
    <title>NapZone Games - Enjoy Most Exciting Games.</title>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-PZRXW9C');
    </script>
    <!-- End Google Tag Manager -->
</head>

<body>

    <!-- ------------------------- Header Start ---------------------- -->
    @include('frontend.layouts.header')
    <!-- ------------------------- Header End ---------------------- -->

    @yield('content')


    <!-- ------------------------- Footer Start ------------------------>
    @include('frontend.layouts.footer')
    <!-- ------------------------- Footer End ------------------------>
    <!-------------------------- all popups------------------------------>
    <!-- --------------login popup--------- -->
    @livewire('frontend.login-popup')
    <!-- --------------login varification popup----------->
    @livewire('frontend.otp-verification-popup')
    <!-- --------------Subscription popup----------->
    @livewire('frontend.subscription-popup')
    @livewire('frontend.subscription-confirm-popup')
    @livewire('frontend.subscription-done-popup')
    @livewire('frontend.unsubscribe-popup')
    <!-- ---------------------------end all popups --------------------- -->

    @livewireScripts
    <!-- Bootstrap 4 Scripts-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/frontend/vendors/popper/popper.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendors/Bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Slick Slider -->
    <script type="text/javascript" src="{{ asset('assets/frontend/vendors/slick-slider/js/slick.min.js') }}"></script>
    <!-- Waypoint -->
    <script type="text/javascript" src="{{ asset('assets/frontend/vendors/waypoint/jquery.waypoints.min.js') }}"></script>
    <!-- Toaster JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <!-- Js -->
    <script src="{{ asset('assets/frontend/js/app.js') }}"></script>

    @yield('scripts')
    @if (@session('status'))
        <script>
            toastr.success("{!! @session('status') !!}");
        </script>
    @endif

    @if (@session('success'))
        <script>
            toastr.success("{!! @session('success') !!}");
        </script>
    @endif

    @if (@session('error'))
        <script>
            toastr.error("{!! @session('error') !!}");
        </script>
    @endif
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        window.livewire.on('confirm', () => {
            $('#login').modal('hide');
            Livewire.emit('refresh')
            $('#login2').modal('show');
        });
        window.livewire.on('saved', () => {
            let otp = document.getElementById('resend');
            let beforeResend = document.getElementById('beforeResend');
            setTimeout(function() {
                otp.style.display = 'block'
                beforeResend.style.display = 'none'
            }, 60000);
        });
        window.livewire.on('packageFinish', () => {
            $('#subscription').modal('hide');
            $('#packageDone').modal('show');
        });
        // window.livewire.on('packageFinish', () => {
        //     $('#subscriptionConfirm').modal('hide');
        //     $('#packageDone').modal('show');
        // });
    </script>

</body>

</html>
