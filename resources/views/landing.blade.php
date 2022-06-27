<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>SITAMA IAKNPKY</title>

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .bg-gradient {
        background: #8E2DE2;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #4A00E0, #8E2DE2);
        /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #4A00E0, #8E2DE2);
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }

    a.nav-link {
        padding-left: 6px !important;
    }

    a.nav-link:hover {
        background-color: #8000ff;
        color: white !important;
        border-radius: 5px;
    }
</style>

<body class="">
    <div class="">
        <div class="container">
            <!-- start navbar -->
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand bg-light rounded-lg pr-2" href="{{ url('') }}">
                    <img src="{{ asset('images/logo.png') }}" height="40" alt=""> <span class="text-dark"> IAKN Palangka Raya</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" data-toggle="modal"
                                data-target="#pendaftaran">Pendaftaran</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" data-toggle="modal"
                                data-target="#persyaratan">Persyaratan</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#" data-toggle="modal"
                                data-target="#narahubung">Narahubung</a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 ml-md-3">
                        <a href="{{ url('login') }}" class="buttoncustom btn" data-text="Login">
                            <span class="text-warning">LOGIN</span>
                        </a>
                    </form>
                </div>
            </nav>
            <!-- end navbar -->
        </div>
    </div>
    <div class="row mx-0">
        <div class="col mx-0">
            <!-- carousel -->
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/slide_(1).jpg') }}" class="d-block w-100" alt="..." style="object-fit: cover !important;">
                        <div class="carousel-caption d-md-block text-left">
                            <p class="h1 d-none d-md-block">Ayo Daftar Beasiswa sekarang juga</p>
                            <div class="row d-none d-md-block">
                                <a href="" class="btn btn-warning mr-2" data-toggle="modal"
                                data-target="#pendaftaran">
                                    <p class="h5">Pendaftaran</p>
                                </a>
                                <a href="" class="btn btn-warning" data-toggle="modal"
                                data-target="#persyaratan">
                                    <p class="h5">Persyaratan</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/slide_(2).jpg') }}" class="d-block w-100" alt="..." style="object-fit: cover !important;">
                        <div class="carousel-caption d-md-block text-left">
                            <p class="h1 d-none d-md-block">Ayo Daftar Beasiswa sekarang juga</p>
                            <div class="row d-none d-md-block">
                                <a href="" class="btn btn-warning mr-2" data-toggle="modal"
                                data-target="#pendaftaran">
                                    <p class="h5">Pendaftaran</p>
                                </a>
                                <a href="" class="btn btn-warning" data-toggle="modal"
                                data-target="#persyaratan">
                                    <p class="h5">Persyaratan</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/slide_(3).jpg') }}" class="d-block w-100" alt="..." style="object-fit: cover !important;">
                        <div class="carousel-caption d-md-block text-left">
                            <p class="h1 d-none d-md-block">Ayo Daftar Beasiswa sekarang juga</p>
                            <div class="row d-none d-md-block">
                                <a href="" class="btn btn-warning mr-2" data-toggle="modal"
                                data-target="#pendaftaran">
                                    <p class="h5">Pendaftaran</p>
                                </a>
                                <a href="" class="btn btn-warning" data-toggle="modal"
                                data-target="#persyaratan">
                                    <p class="h5">Persyaratan</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions"
                    data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions"
                    data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
            <!-- carousel -->
        </div>
    </div>
    {{-- faq  --}}
    <div class="container mt-1">
        <div class="row">
            <div class="col-12">
                <x-frontfaq></x-frontfaq>
            </div>
        </div>
    </div>
    {{-- end faq  --}}

    <div class="py-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <p class="text-dark text-center">SITAMA IAKN PALANGKA RAYA @2022</p>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal pendaftaran -->
    <div class="modal fade" id="pendaftaran" tabindex="-1" aria-labelledby="pendaftaranLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pendaftaranLabel">Informasi Pendaftaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! $pendaftaran->content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- Modal persyaratan -->
    <div class="modal fade" id="persyaratan" tabindex="-1" aria-labelledby="persyaratanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="persyaratanLabel">Informasi persyaratan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! $persyaratan->content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- Modal narahubung -->
    <div class="modal fade" id="narahubung" tabindex="-1" aria-labelledby="narahubungLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="narahubungLabel">Informasi Narahubung</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! $narahubung->content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
</body>

</html>