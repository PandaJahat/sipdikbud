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
    <!-- Data Table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css" />
    <title>SIPDIKBUD</title>
</head>

<body>
    <div class="login-6">
        <div class="container">
            <div class="col-md-12 pad-0">
                <div class="row login-box-6 shadow">
                    <div class="col-lg-5 col-md-12 col-sm-12 col-pad-0 bg-img align-self-center none-992 shadow-blue">
                        <a href="#">
                            <img class="img-fluid pb-4" src="{{ asset('front/img/logo-white.svg') }}" class="logo" alt="logo">
                        </a>
                        <p>Sistem Informasi Penelitian Kemendikbud</p>
                        <a href="{{ route('home') }}" class="btn-outline shadow">BERANDA</a>
                    </div>
                    <div class="col-lg-7 col-md-12 col-sm-12 col-pad-0 align-self-center">
                        <div class="login-inner-form">
                            <div class="details">
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                                        {{ $error }}
                                    </div>
                                    @endforeach
                                @endif 
                                <h3>Silahkan Masukan Data Diri Anda</h3>
                                <form action="{{ route('home.register.create.submit') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="name" class="input-text" value="{{ old('name') }}" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="gender_id" class="form-control">
                                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                            @foreach ($genders as $item)
                                                <option value="{{ $item->id }}" {{ old('gender_id') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="institute" class="input-text" value="{{ old('institute') }}" placeholder="Asal Lembaga" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone_number" class="input-text" value="{{ old('phone_number') }}" placeholder="Nomor telepon Aktif" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="input-text" value="{{ old('email') }}" placeholder="Alamat Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="input-text" placeholder="Kata Sandi" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password_confirm" class="input-text" placeholder="Kata Sandi (ulangi)" required>
                                    </div>
                                    <div class="checkbox clearfix">
                                        <div class="form-check checkbox-theme">
                                            <input class="form-check-input" type="checkbox" value="" id="rememberMe" name="agree" {{ old('agree') ? 'checked' : '' }} value="1" required>
                                            <label class="form-check-label" for="rememberMe">
                                                Saya Bertanggung Jawab Dengan Data Ini
                                            </label>
                                        </div>
                                        {{-- <a href="forgot-password-6.html">Lupa Password</a> --}}
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn-md btn-theme btn-block shadow-blue">Daftar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>