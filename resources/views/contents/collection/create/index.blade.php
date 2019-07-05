@extends('layouts.default')

@include('plugins.dropify')
@include('plugins.autocomplete')

@section('content')
<h3 class="heading_b uk-margin-bottom">Upload Publikasi</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <form action="{{ route('collection.create.submit') }}" method="post" enctype="multipart/form-data" id="form-create">
            @csrf
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    <div class="uk-form-row">
                        <label>Judul <span class="uk-text-danger">*</span></label>
                        <input type="text" class="md-input" name="title" value="{{ old('title') }}" required />
                    </div>
                    <div class="uk-form-row">
                        <label>Nama Penulis <span class="uk-text-danger">*</span></label>
                        <input type="text" class="md-input" name="author" value="{{ old('author') }}" required />
                    </div>
                    <div class="uk-form-row">
                        <label>Tahun Terbit</label>
                        <input type="text" class="md-input" name="published_year" value="{{ old('published_year') }}" />
                    </div>
                    <div class="uk-form-row">
                        <label>Diterbitkan Oleh</label>
                        <input type="text" class="md-input" name="published_by" value="{{ old('published_by') }}" />
                    </div>
                    <div class="uk-form-row">
                        <label>Deskripsi</label>
                        <textarea cols="30" rows="4" class="md-input" name="description">{{ old('description') }}</textarea>
                    </div>
                    <div class="uk-form-row">
                        <label>Gambar Cover</label>
                        <input type="file" name="cover" class="dropify-id" accept="image/*" />
                    </div>
                    {{-- <div class="uk-form-row">
                        <label>Abstrak</label>
                        <input type="file" name="abstract" class="dropify-id"/>
                    </div> --}}
                    <div class="uk-form-row">
                        <label>File Dokumen <span class="uk-text-danger">*</span></label>
                        <input type="file" name="document" class="dropify-id" required/>
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
                        <input type="text" class="md-input" name="keywords" value="{{ old('keywords') }}" />
                    </div>
                    <div class="uk-form-row">
                        <label>Topik (pisahkan dengan koma)</label>
                        <input type="text" class="md-input" name="topics" value="{{ old('topics') }}" />
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Upload</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var select_language = $('select[name=language_id]')
        var select_category = $('select[name=category_id]')
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

                select_language[0].selectize.setValue("{{ old('language_id') }}")
            })

            $.get("{{ route('collection.create.get.categories') }}").done(function (result) {
                select_category[0].selectize.load(function (callback) {
                    callback(result)
                })

                select_category[0].selectize.setValue("{{ old('category_id') }}")
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

                select_genre[0].selectize.setValue({{ old('genres') }})
            })
            
        })

        $('#form-create').on('keyup keypress', function (e) {
            var keyCode = e.keyCode || e.which
            if (keyCode === 13) {
                e.preventDefault()
                return false
            }
        })
    </script>    
@endpush