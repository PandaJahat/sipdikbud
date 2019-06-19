@extends('layouts.home')

@section('content')
<div>
    <img src="{{ asset('front/img/header.png') }}" class="img-fluid">
    <div class="bg-light shadow-sm clearfix">
        <nav class="container" aria-label="breadcrumb">
            <ol style="background-color: transparent; margin-bottom: 0;" class="breadcrumb  float-left">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}"><i class="fas fa-arrow-left"></i> Kembali</a></li>
            </ol>
            <ol style="background-color: transparent; margin-bottom: 0;" class="breadcrumb  float-right">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('home') }}">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Hasil Pencarian</li>
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
                                Bidang Penelitian
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                @foreach ($categories as $item)
                                <li class="list-group-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                        <label class="custom-control-label" for="customCheck">{{ $item->name }}</label>
                                    </div>
                                </li>
                                @endforeach
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
                                @foreach ($institutes as $item)
                                <li class="list-group-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                        <label class="custom-control-label" for="customCheck">{{ $item->name }}</label>
                                    </div>
                                </li>
                                @endforeach
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
                                @foreach ($years->sortByDesc('published_year') as $item)
                                <li class="list-group-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck" name="example1">
                                        <label class="custom-control-label" for="customCheck">{{ $item->published_year }}</label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="top-content-single pt-5">
                <p>Menampilkan {{ $collections->firstItem() }} - {{ $collections->lastItem() }} dari {{ $collections->total() }} untuk pencarian: "{{ $request->search }}".</p>
            </div>
            
            @foreach ($collections as $item)
            <div class="row mb-5">
                <div class="col-md-4"><img class="img-fluid book-frame" src="{{ asset('front/img/book.jpg') }}">
                </div>
                <div class="col-md-8">
                    <h5><a class="text-decoration-none" href="javascript:;">{{ $item->title }}</a></h5>
                    @foreach ($item->keywords as $keyword)
                        <span class="badge badge-primary">{{ $keyword->keyword }}</span>
                    @endforeach
                    @if (!$item->keywords()->exists())
                        &nbsp;
                    @endif
                    <table class="table table-borderless table-sm">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 150px;">Peneliti :</th>
                                <td>{{ $item->author->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tahun Terbit :</th>
                                <td>{{ $item->published_year }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Bidang Penelitian :</th>
                                <td>{{ $item->categories()->exists() ? $item->category->name : '-' }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Institusi :</th>
                                <td>{{ $item->source()->exists() ? $item->source->name : '-' }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="list-detail.html" type="link" class="btn btn-sm btn-primary">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
            
            <nav aria-label="Page navigation example">
                {{ $collections->appends(Request::capture()->except('page'))->links() }}
            </nav>
        </div>
    </div>
</div>
@endsection