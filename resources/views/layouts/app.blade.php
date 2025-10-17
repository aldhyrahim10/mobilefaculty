<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('img/logo_association.png')}}">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        .float-wa {
            position: fixed;
            z-index: 50;
            bottom: 20px;
            right: 20px;
            display: flex;
            justify-content: end;
            width: 120px;
            height: 120px;
        }

    </style>

</head>

<body class="bg-white font-sans antialiased overflow-x-hidden">

    <!--Navbar-->
    @include('includes.front.navbar')
    <!--End Navbar -->

    @yield('content')

    {{-- Footer --}}
    @include('includes.front.footer')
    <a href="https://wa.me/6287887829208" target="_blank">
        <div class="float-wa">
            <img class="" src="{{asset('img/whatsapp.png')}}" width="100%" alt="">
        </div>
    </a>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $("#btnMenu").click(function () {
                $("#mobileMenu").removeClass("hidden");
                $("#bgBlack").removeClass("hidden");
            });

            $("#bgBlack").click(function () {
                $("#mobileMenu").addClass("hidden");
                $("#bgBlack").addClass("hidden");
            });

            $(window).on("scroll", function () {
                if ($(this).scrollTop() > 50) {
                    $("#navs").addClass("bg-white").addClass("shadow-md");
                    $(".menu-item").removeClass("text-white").addClass("text-black");
                } else {
                    $("#navs").removeClass("bg-white").removeClass("shadow-md");
                    $(".menu-item").addClass("text-white").removeClass("text-black");
                }
            });
        });

    </script>

    @yield('scripts')

</body>

</html>
