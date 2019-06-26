@extends('layouts.default')

@include('plugins.dropify')
@include('plugins.autocomplete')

@section('content')
<h3 class="heading_b uk-margin-bottom">Ubah Koleksi</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <form action="{{ route('collection.update.submit') }}" method="post" enctype="multipart/form-data" id="form-update">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $collection->id }}">
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    <div class="uk-form-row">
                        <label>Judul Koleksi <span class="uk-text-danger">*</span></label>
                        <input type="text" class="md-input" name="title" value="{{ $collection->title }}" required />
                    </div>
                    <div class="uk-form-row">
                        <label>Nama Penulis <span class="uk-text-danger">*</span></label>
                        <input type="text" class="md-input" name="author" value="{{ $collection->author->name }}" required />
                    </div>
                    <div class="uk-form-row">
                        <label>Tahun Terbit</label>
                        <input type="text" class="md-input" name="published_year" value="{{ $collection->published_year }}" />
                    </div>
                    <div class="uk-form-row">
                        <label>Diterbitkan Oleh</label>
                        <input type="text" class="md-input" name="published_by" value="{{ $collection->published_by }}" />
                    </div>
                    <div class="uk-form-row">
                        <label>Deskripsi</label>
                        <textarea cols="30" rows="4" class="md-input" name="description">{{ $collection->description }}</textarea>
                    </div>
                    @if (!empty($collection->cover_file))
                    <div class="uk-form-row">
                        <label>Gambar Cover Sebelumnya</label>
                        <img class="uk-responsive-width" src="{{ asset('covers/'.$collection->cover_file) }}" alt="cover">
                    </div>
                    @endif
                    <div class="uk-form-row">
                        <label>Gambar Cover (pilih file untuk mengganti cover sebelumnya)</label>
                        <input type="file" name="cover" class="dropify-id" accept="image/*" />
                    </div>
                    {{-- @if (!empty($collection->abstract_file))
                    <div class="uk-form-row">
                        <label>Abstract Sebelumnya: </label>
                        <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light md-btn-icon waves-effect waves-button waves-light" href="{{ route('collection.download.abstract', ['id' => Crypt::encrypt($collection->id)]) }}" target="_blank"><i class="uk-icon-download"></i> Download</a>
                    </div>
                    @endif
                    <div class="uk-form-row">
                        <label>Abstrak (pilih file untuk mengganti dokumen sebelumnya)</label>
                        <input type="file" name="abstract" class="dropify-id"/>
                    </div> --}}
                    <div class="uk-form-row">
                        <label>File Dokumen Sebelumnya: </label>
                        <a class="md-btn md-btn-primary md-btn-mini md-btn-wave-light md-btn-icon waves-effect waves-button waves-light" href="{{ route('collection.download', ['id' => Crypt::encrypt($collection->id)]) }}" target="_blank"><i class="uk-icon-download"></i> Download</a>
                    </div>
                    <div class="uk-form-row">
                        <label>File Dokumen (pilih file untuk mengganti dokumen sebelumnya)</label>
                        <input type="file" name="document" class="dropify-id"/>
                    </div>
                </div>
                <div class="uk-width-1-2">
                    <div class="uk-form-row">
                        <select name="category_id" id="categories" required>
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div>
                    <div class="uk-form-row">
                        <select name="genres[]" id="genre" multiple>
                            <option value="">Pilih Genre</option>
                        </select>
                    </div>
                    <div class="uk-form-row">
                        <select name="language_id" required>
                            <option value="">Pilih Bahasa</option>
                        </select>
                    </div>
                    <div class="uk-form-row">
                        <label>Kata Kunci (pisahkan dengan koma)</label>
                        <input type="text" class="md-input" name="keywords" value="{{ $keywords }}" />
                    </div>
                    <div class="uk-form-row">
                        <label>Topik (pisahkan dengan koma)</label>
                        <input type="text" class="md-input" name="topics" value="{{ $topics }}" />
                    </div>
                </div>
            </div>
            <hr>
            <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('collection.list') }}">Kembali</a>
            &nbsp;&nbsp;
            <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var select_language = $('select[name=language_id]')
        var select_category = $('#categories')
        var select_genre = $('#genre')

        $(function () {
            select_language.selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                onDropdownOpen: function (t) {
                    t.hide().velocity("slideDown", {
                        begin: function () {
                            t.css({
                                "margin-top": "0"
                            })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
                },
            })

            select_category.selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                plugins: {
                    remove_button: {
                        label: ""
                    }
                },
                onDropdownOpen: function (t) {
                    t.hide().velocity("slideDown", {
                        begin: function () {
                            t.css({
                                "margin-top": "0"
                            })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
                },
                onDropdownClose: function (t) {
                    t.show().velocity("slideUp", {
                        complete: function () {
                            t.css({
                                "margin-top": ""
                            })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
                }
            })

            $.get("{{ route('collection.create.get.languages') }}").done(function (result) {
                select_language[0].selectize.load(function (callback) {
                    callback(result)
                })

                select_language[0].selectize.setValue("{{ $collection->language_id }}")
            })

            $.get("{{ route('collection.create.get.categories') }}").done(function (result) {
                select_category[0].selectize.load(function (callback) {
                    callback(result)
                })

                select_category[0].selectize.setValue({{ $categories }})
            })
            
            $.get("{{ route('collection.create.get.authors') }}").done(function (result) {
                $("input[name=author]").autoComplete({
                    minChars: 2,
                    source: function (term, suggest) {
                        term = term.toLowerCase();
                        var choices = result;
                        var matches = [];
                        for (i = 0; i < choices.length; i++)
                            if (~choices[i].toLowerCase().indexOf(term)) matches.push(choices[i]);
                        suggest(matches);
                    }
                })
            })

            select_genre.selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                plugins: {
                    remove_button: {
                        label: ""
                    }
                },
                onDropdownOpen: function (t) {
                    t.hide().velocity("slideDown", {
                        begin: function () {
                            t.css({
                                "margin-top": "0"
                            })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
                },
                onDropdownClose: function (t) {
                    t.show().velocity("slideUp", {
                        complete: function () {
                            t.css({
                                "margin-top": ""
                            })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
                }
            })

            $.get("{{ route('collection.create.get.genres') }}").done(function (result) {
                select_genre[0].selectize.load(function (callback) {
                    callback(result)
                })

                select_genre[0].selectize.setValue({{ $collection->genres->pluck('pivot.genre_id') }})
            })
            
        })

        $('#form-update').on('keyup keypress', function (e) {
            var keyCode = e.keyCode || e.which
            if (keyCode === 13) {
                e.preventDefault()
                return false
            }
        })
    </script>    
@endpush