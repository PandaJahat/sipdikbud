@extends('layouts.default')

@include('plugins.dropify')
@include('plugins.ckeditor')

@section('content')
<h3 class="heading_b uk-margin-bottom">Buat Artikel</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <form action="{{ route('article.update.submit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ Crypt::encrypt($article->id) }}">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="uk-form-row">
                        <label>Judul</label>
                        <input type="text" class="md-input" name="title" value="{{ $article->title }}" required/>
                    </div>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    <div class="uk-form-row">
                        <select name="category_id" required>
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="uk-form-row">
                        <label>Konten</label>
                        <br>
                        <textarea cols="30" rows="4" class="md-input" name="content" id="wysiwyg_ckeditor" required>{!! $article->content !!}</textarea>
                    </div>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    <div class="uk-form-row">
                        <label>Gambar Thumbnail</label>
                        <input type="file" name="thumbnail" class="dropify-id" data-default-file="{{ URL::to('thumbnails/original/'.$article->thumbnail_file) }}"/>
                    </div>
                </div>
            </div>
            <hr>
            <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var select_category = $('select[name=category_id]');

        $(function () {
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
            });

            $.get("{{ route('article.create.get.categories') }}").done(function (result) {
                select_category[0].selectize.load(function (callback) {
                    callback(result)
                })

                select_category[0].selectize.setValue({{ $article->category_id }})
            });
        });

        $(function () {
            altair_wysiwyg._ckeditor()
        }), altair_wysiwyg = {
            _ckeditor: function () {
                var i = $("#wysiwyg_ckeditor");
                i.length && i.ckeditor(function () {}, {
                    height: 600
                }); 
            }
        };
    </script>
@endpush