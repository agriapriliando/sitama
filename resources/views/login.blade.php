<!DOCTYPE html>
<html>

<head>
    <title>SITAMA - Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{ asset('fonts/linearicons/style.css') }}">

    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet"
        href="{{ asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css') }}">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<style>
    .carousel {
        /* margin-top: 50px; */
    }

    .carousel-inner {
        height: 330px;
    }

    .carousel-caption {
        color: black;
        top: 50%;
    }
</style>

<body class="body">
    <div class="container pt-2">
        <!-- formulir -->
        <form id="formcustom" action="{{ url('login') }}" method="POST" class="rounded-lg my-3" autocomplete="off">
            @csrf
            <div class="row p-4">
                <div class="col-md-6 col">
                    <div class="text-center">
                        <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="logo_iaknpky"
                            width="120px">
                    </div>
                    <p class="h3 text-dark text-center">Login</p>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                @if (session('status'))
                                <div id="alert-alert" class="alert alert-danger">
                                    {{ session('status') }}
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="" id="nim_username">Username</label>
                                <input name="username" type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input name="password" class="form-control" type="password">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="bi bi-eye-slash"
                                                aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" data-text="Login" class="buttoncustom btn btn-block mb-2">
                        <span>Login</span>
                    </button>
                    <a href="{{ url('') }}" class="buttoncustom btn" data-text="Beranda">
                        <span class="text-light">Beranda</span>
                    </a>
                    <label class="mt-2" style="display: none;">
                        <a href="#" class="text-muted">Lupa Password?</a>
                    </label>
                </div>
                {{-- front notice di login page --}}
                <x-frontnotice></x-frontnotice>
                {{-- front notice di login page --}}
            </div>
        </form>
        <!-- end formulir -->
        {{-- FAQ front login --}}
        <x-frontfaq></x-frontfaq>
        {{-- FAQ front login --}}
        <p class="text-center pt-2 text-light">SITAMA @ {{ date("Y") }}</p>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

    <script src="js/jquery-3.3.1.min.js"></script>

    <script>
        $(document).ready(function () {
            $("#show_hide_password span").on('click', function (event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash");
                    $('#show_hide_password i').removeClass("bi-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash");
                    $('#show_hide_password i').addClass("bi-eye");
                }
            });
        });
    </script>
    <script>
        var $slider = $(".slider"), $bullets = $(".bullets");
        function calculateHeight() {
            var height = $(".slide.active").outerHeight();
            $slider.height(height);
        }

        $(window).resize(function () {
            calculateHeight();
            clearTimeout($.data(this, 'resizeTimer'));
        });

        function resetSlides() {
            $(".slide.inactive").removeClass("inactiveRight").removeClass("inactiveLeft");
        }

        function gotoSlide($activeSlide, $slide, className) {
            $activeSlide.removeClass("active").addClass("inactive " + className);
            $slide.removeClass("inactive").addClass("active");
            calculateHeight();
            resetBullets();
            setTimeout(resetSlides, 300);
        }

        $(".next").on("click", function () {
            var $activeSlide = $(".slide.active"),
                $nextSlide = $activeSlide.next(".slide").length != 0 ? $activeSlide.next(".slide") : $(".slide:first-child");
            console.log($nextSlide);
            gotoSlide($activeSlide, $nextSlide, "inactiveLeft");
        });
        $(".previous").on("click", function () {
            var $activeSlide = $(".slide.active"),
                $prevSlide = $activeSlide.prev(".slide").length != 0 ? $activeSlide.prev(".slide") : $(".slide:last-child");

            gotoSlide($activeSlide, $prevSlide, "inactiveRight");
        });
        $(document).on("click", ".bullet", function () {
            if ($(this).hasClass("active")) {
                return;
            }
            var $activeSlide = $(".slide.active");
            var currentIndex = $activeSlide.index();
            var targetIndex = $(this).index();
            console.log(currentIndex, targetIndex);
            var $theSlide = $(".slide:nth-child(" + (targetIndex + 1) + ")");
            gotoSlide($activeSlide, $theSlide, currentIndex > targetIndex ? "inactiveRight" : "inactiveLeft");
        })
        function addBullets() {
            var total = $(".slide").length, index = $(".slide.active").index();
            for (var i = 0; i < total; i++) {
                var $bullet = $("<div>").addClass("bullet");
                if (i == index) {
                    $bullet.addClass("active");
                }
                $bullets.append($bullet);
            }
        }
        function resetBullets() {
            $(".bullet.active").removeClass("active");
            var index = $(".slide.active").index() + 1;
            console.log(index);
            $(".bullet:nth-child(" + index + ")").addClass("active");
        }
        addBullets();
        calculateHeight();
    </script>

    <!-- <script src="js/main.js"></script> -->
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>