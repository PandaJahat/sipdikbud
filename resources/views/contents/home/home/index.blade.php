<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="32x32" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/style.css') }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:300,400,600,700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/all.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/css/animate.css') }}">
    <title>SIPDIKBUD | Sistem Informasi Penelitian Kemendikbud</title>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom static-top shadow-sm navbar-border-bottom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img height="30" src="{{ asset('front/img/logo-white.svg') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">Beranda
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">Tentang SIPDIKBUD</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">Hubungi Kami</a>
                    </li>
                    <li class="nav-item">
                        @guest
                            <a href="{{ route('login') }}" type="link" class="btn btn-dark shadow"><i class="fas fa-user-circle"></i> Masuk</a>
                        @else
                            <a href="{{ route('dashboard') }}" type="link" class="btn btn-dark shadow"><i class="fas fa-user-circle"></i> {{ Auth::user()->name }}</a>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-none d-sm-block">
        <div class="image-home"></div>
    </div>
    <div class="d-block d-sm-none">
        <div class="image-home-mobile"></div>
    </div>
    <div class="card rounded-0 py-3">
        <form class="container">
            <div class="form-row align-items-center">
                <div class="col-lg-5 col-md-5 col-sm-12 py-2">
                    <input type="text" class="form-control shadow-blue  border border-primary" placeholder="Cari Hasil Penelitian">
                </div>
                <div class="col-lg-5 col-md-5 col-sm-12 py-2">
                    <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                    <select class="custom-select mr-sm-2 shadow-blue border border-primary" id="inlineFormCustomSelect">
                        <option selected>Semua Kategori</option>
                        <option value="1">Kategori 1</option>
                        <option value="2">Kategori 2</option>
                        <option value="3">Kategori 3</option>
                    </select>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-12">
                    <a href="{{ route('home.temp.results') }}" class="btn btn-primary btn-block shadow-blue">Cari Penelitian</a>
                </div>
            </div>
        </form>
        <div class="container pt-3">
            <span>Kata kunci populer :
                <span class="badge badge-primary">Pendidikan</span>
                <span class="badge badge-secondary">Model Belajar</span>
                <span class="badge badge-success">Penelitian</span>
                <span class="badge badge-danger">Sosial</span>
                <span class="badge badge-warning">High Order Thinking</span>
                <span class="badge badge-info">Pengembangan Diri</span>
                <span class="badge badge-light">Media</span>
                <span class="badge badge-dark">Efektifitas</span>
            </span>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="container top-content items-center flex">
                <h1>Mitra</h1>
                <a href="mitra.html">Selengkapnya <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div data-tilt class="card border-0 shadow my-2">
                            <div class="card-body text-center">
                                <img width="100" class="img-fluid" src="{{ asset('front/img/cap.svg') }}">
                                <h3 class="font-weight-bold pt-1">Institusi</h3>
                                <h3><span class="badge badge-pill badge-primary">2356</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div data-tilt class="card border-0 shadow my-2">
                            <div class="card-body text-center">
                                <img width="100" class="img-fluid" src="{{ asset('front/img/box.svg') }}">
                                <h3 class="font-weight-bold pt-1">Repositori</h3>
                                <h3><span class="badge badge-pill badge-primary">1356</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div data-tilt class="card border-0 shadow my-2">
                            <div class="card-body text-center">
                                <img width="100" class="img-fluid" src="{{ asset('front/img/library.svg') }}">
                                <h3 class="font-weight-bold pt-1">Jejaring</h3>
                                <h3><span class="badge badge-pill badge-primary">5356</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container top-content items-center flex">
                        <h1>Top Contributors</h1>
                        <a class="pt-2" href="#0">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                    <div class="jumbotron">
                        <div class="alert alert-light clearfix shadow" role="alert">
                            <div class="float-left">
                                <img class="img-fluid" width="40" src="{{ asset('front/img/unnes.jpg') }}"> <span class="pl-3">Universitas Negeri Semarang | UNNES</span>
                            </div>
                            <div class="float-right">
                                <h4><span class="badge badge-danger">1235</span></h4>
                            </div>
                        </div>
                        <div class="alert alert-light clearfix shadow" role="alert">
                            <div class="float-left">
                                <img class="img-fluid" width="40" src="{{ asset('front/img/ugm.jpg') }}"> <span class="pl-3">Universitas Gadjah Mada | UGM</span>
                            </div>
                            <div class="float-right">
                                <h4><span class="badge badge-success">1235</span></h4>
                            </div>
                        </div>
                        <div class="alert alert-light clearfix shadow" role="alert">
                            <div class="float-left">
                                <img class="img-fluid" width="40" src="{{ asset('front/img/undip.jpg') }}"> <span class="pl-3">Universitas Diponogoro | INDIP</span>
                            </div>
                            <div class="float-right">
                                <h4><span class="badge badge-warning">1235</span></h4>
                            </div>
                        </div>
                        <div class="alert alert-light clearfix shadow" role="alert">
                            <div class="float-left">
                                <img class="img-fluid" width="40" src="{{ asset('front/img/ui.jpg') }}"> <span class="pl-3">Universitas Indonesia | UI</span>
                            </div>
                            <div class="float-right">
                                <h4><span class="badge badge-info">1235</span></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container top-content-single">
                        <h1>Kategori</h1>
                    </div>
                    <div class="jumbotron">
                        <div class="list-group shadow">
                            <a href="page-list.html" class="list-group-item list-group-item-action text-primary">Conferences</a>
                            <a href="#" class="list-group-item list-group-item-action text-primary">Articles</a>
                            <a href="#" class="list-group-item list-group-item-action text-primary">Book</a>
                            <a href="#" class="list-group-item list-group-item-action text-primary">Thesis</a>
                            <a href="#" class="list-group-item list-group-item-action text-primary">Journal</a>
                            <a href="#" class="list-group-item list-group-item-action text-primary">File</a>
                            <a href="#" class="list-group-item list-group-item-action text-primary">Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-3">
        <div class="container">
            <span class="text-light">© 2019 Sistem Informasi Penelitian Kemendikbud | Puslitjakdikbud</span>
        </div>
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
</body>

</html>