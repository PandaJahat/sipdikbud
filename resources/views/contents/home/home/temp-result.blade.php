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
    <div>
        <img src="{{ asset('front/img/header.png') }}" class="img-fluid">
        <div class="bg-light shadow-sm clearfix">
            <nav class="container" aria-label="breadcrumb">
                <ol style="background-color: transparent; margin-bottom: 0;" class="breadcrumb  float-left">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Kembali</a></li>
                </ol>
                <ol style="background-color: transparent; margin-bottom: 0;" class="breadcrumb  float-right">
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-decoration-none" href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="top-content-single pt-5">
                    <h3>Persempit Pencarian</h3>
                </div>
                <div class="accordion" id="accordionExample">
                    <div class="card hasil-pencarian">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Kategori
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                            <label class="custom-control-label" for="customCheck">Custom checkbox</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                                            <label class="custom-control-label" for="customCheck1">Custom checkbox</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="example1">
                                            <label class="custom-control-label" for="customCheck2">Custom checkbox</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="example1">
                                            <label class="custom-control-label" for="customCheck4">Custom checkbox</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card hasil-pencarian">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    institusi
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                            <label class="custom-control-label" for="customCheck">Custom checkbox</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                                            <label class="custom-control-label" for="customCheck1">Custom checkbox</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="example1">
                                            <label class="custom-control-label" for="customCheck2">Custom checkbox</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="example1">
                                            <label class="custom-control-label" for="customCheck4">Custom checkbox</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card hasil-pencarian">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Tahun
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                            <label class="custom-control-label" for="customCheck">Custom checkbox</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="example1">
                                            <label class="custom-control-label" for="customCheck1">Custom checkbox</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="example1">
                                            <label class="custom-control-label" for="customCheck2">Custom checkbox</label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="example1">
                                            <label class="custom-control-label" for="customCheck4">Custom checkbox</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="top-content-single pt-5">
                    <p>Menampilkan 1 - 20 of 7,333,470 untuk pencarian: "belajar", lama mencari: 4.09s</p>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4"><img class="img-fluid book-frame" src="{{ asset('front/img/book.jpg') }}">
                    </div>
                    <div class="col-md-8">
                        <h5><a class="text-decoration-none" href="#"> Lorem ipsum dolor sit amet, consectetur adipisicing</a></h5>
                        <span class="badge badge-info">Kategori</span>
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 100px;">Terbitan :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <th scope="row">Institusi :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <th scope="row">Repository :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lokasi :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="list-detail.html" type="link" class="btn btn-sm btn-primary">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4"><img class="img-fluid book-frame" src="{{ asset('front/img/book.jpg') }}">
                    </div>
                    <div class="col-md-8">
                        <h5><a class="text-decoration-none" href="#"> Lorem ipsum dolor sit amet, consectetur adipisicing</a></h5>
                        <span class="badge badge-info">Kategori</span>
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 100px;">Terbitan :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <th scope="row">Institusi :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <th scope="row">Repository :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lokasi :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-sm btn-primary">Selengkapnya <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4"><img class="img-fluid book-frame" src="{{ asset('front/img/book.jpg') }}">
                    </div>
                    <div class="col-md-8">
                        <h5><a class="text-decoration-none" href="#"> Lorem ipsum dolor sit amet, consectetur adipisicing</a></h5>
                        <span class="badge badge-info">Kategori</span>
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <th scope="row" style="width: 100px;">Terbitan :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <th scope="row">Institusi :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <th scope="row">Repository :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                                <tr>
                                    <th scope="row">Lokasi :</th>
                                    <td>Lorem ipsum</td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-sm btn-primary">Selengkapnya <i class="fas fa-arrow-right"></i></button>
                    </div>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                        <li class="page-item"><a class="page-link" href="#">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
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