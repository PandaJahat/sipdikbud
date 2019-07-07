@extends('layouts.default')

@section('content')
<h3 class="heading_b uk-margin-bottom">Pencarian Publikasi</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <form action="" method="get">
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    <div class="uk-form-row">
                        <label>Judul Publikasi</label>
                        <input type="text" class="md-input" name="title" value="{{ old('title') }}"/>
                    </div>
                    <div class="uk-form-row">
                        <label>Penulis</label>
                        <input type="text" class="md-input" name="author" value="{{ old('author') }}"/>
                    </div>
                    <div class="uk-form-row">
                        <label>Penerbit</label>
                        <input type="text" class="md-input" name="publisher" value="{{ old('publisher') }}"/>
                    </div>
                </div>
                <div class="uk-width-1-2">
                    <div class="uk-form-row">
                        <select name="category_id" id="categories">
                            <option value="">Kategori Publikasi</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <a href="{{ route('collection.search') }}" class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light">
                        Reset
                    </a>
                    &nbsp;&nbsp;
                    <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">
                        Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@if (!empty($collections))
    <div class="md-card">
        <div class="md-card-content">
            <p class="uk-text-small uk-text-muted">Menampilkan {{ $collections->firstItem() }} - {{ $collections->lastItem() }} dari {{ $collections->total() }} publikasi</p>
            <ul class="search_list">
                @foreach ($collections as $item)
                    <li>
                        <h3 class="search_list_heading"><a href="{{ route('collection.detail', ['id' => Crypt::encrypt($item->id), 'prev_url' => Crypt::encrypt(Request::fullUrl())]) }}">{{ $item->title }}</a></h3>
                        <span class="search_list_link uk-text-truncate">
                            {{ $item->categories()->exists() ? $item->category->name : '-' }}
                        </span>
                        <span>{!! empty($item->description) ? '<p>' : substr($item->description, 0, 190).' . . . ' !!}</span>
                        <div class="blog_list_footer_info">
                            <span class="uk-margin-right"><i class="material-icons"></i> <small>{{ $item->favorites_count }}</small></span>
                            <span><i class="material-icons"></i> <small>{{ $item->comments_count }}</small></span>
                            &nbsp;&nbsp;
                            <span><a href="{{ route('collection.detail', ['id' => Crypt::encrypt($item->id), 'prev_url' => Crypt::encrypt(Request::fullUrl())]) }}">Selengkapnya</a></span>
                        </div>
                    </li>
                @endforeach
            </ul>
            {{ $collections->appends(Request::capture()->except('page'))->links('vendor.pagination.default') }}
        </div>
    </div>
@endif

@endsection

@push('scripts')
    <script>
        var select_category = $('select[name=category_id]')

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
            })

            $.get("{{ route('collection.create.get.categories') }}").done(function (result) {
                select_category[0].selectize.load(function (callback) {
                    callback(result)
                })

                select_category[0].selectize.setValue("{{ old('category_id') }}")
            })
        })
    </script>
@endpush