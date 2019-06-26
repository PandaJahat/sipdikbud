@extends('layouts.default')

@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Moderasi Koleksi</h3>
<div class="uk-grid" data-uk-grid-margin="">
    <div class="uk-width-large-7-10 uk-row-first">
        <div class="md-card">
            <div class="uk-sticky-placeholder" style="height: 130px; margin: 0px;"><div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }" style="margin: 0px;">
                <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <img src="https://i.ya-webdesign.com/images/flat-design-png-5.png" alt="user avatar">
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                    <div class="user_avatar_controls">
                        
                        <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i class="material-icons"></i></a>
                    </div>
                </div>
                <div class="user_heading_content">
                    <h2 class="heading_b">
                        <span class="uk-text-truncate">{{ $collection->title }}</span>
                        <span class="sub-heading">{{ $collection->author()->exists() ? $collection->author->name : '&nbsp;' }}</span>
                    </h2>
                </div>
                <div class="md-fab-wrapper">
                    <div class="md-fab md-fab-toolbar md-fab-small md-fab-accent">
                        <i class="material-icons"></i>
                        <div class="md-fab-toolbar-actions">
                            <button type="button" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Download"><i class="material-icons md-color-white"></i></button>
                            <button type="button" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}" title="Hapus"><i class="material-icons md-color-white"></i></button>
                        </div>
                    </div>
                </div>
            </div></div>
            <div class="user_content">
                <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#collection_detail', animation:'slide-horizontal'}">
                    <li class="uk-active"><a href="#">Informasi Koleksi</a></li>
                    <li><a href="#">Gambar Cover</a></li>
                </ul>
                <ul id="collection_detail" class="uk-switcher uk-margin">
                    <li class="uk-active">
                        <div class="uk-margin-top">
                            <h3 class="full_width_in_card heading_c">
                                Moderasi
                            </h3>
                            <form action="{{ route('collection.mapping.submit') }}" method="post">
                                <div class="uk-grid">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $collection->id }}">
                                    <div class="uk-width-1-1">
                                        <div class="uk-form-row">
                                            <select name="institutions[]" id="institutions" multiple>
                                                <option value="">Pilih Bidang</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light uk-align-right">Simpan</button>
                                    </div>
                                </div>
                            </form>
                            <h3 class="full_width_in_card heading_c">
                                Informasi Umum
                            </h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">  
                                    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin="">
                                        <div class="uk-grid-margin uk-row-first">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">info</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Judul</label>
                                                    <input type="text" class="md-input" value="{{ $collection->title }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">perm_contact_calendar</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Penulis</label>
                                                    <input type="text" class="md-input" value="{{ $collection->author()->exists() ? $collection->author->name : '-' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin uk-row-first">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">book</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Kategori</label>
                                                    <input type="text" class="md-input" value="{{ $collection->categories()->exists() ? $collection->category->name : '-' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">text_format</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Kata Kunci</label>
                                                    <input type="text" class="md-input" value="{{ $collection->keywords()->exists() ? implode(',', json_decode($collection->keywords->pluck('keyword'))) : '-' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin uk-row-first">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">date_range</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Tahun Terbit</label>
                                                    <input type="text" class="md-input" value="{{ !empty($collection->published_year) ? $collection->published_year : '-' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">domain</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Diterbitkan Oleh</label>
                                                    <input type="text" class="md-input" value="{{ !empty($collection->published_by) ? $collection->published_by : '-' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin uk-row-first">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">local_offer</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Genre</label>
                                                    <input type="text" class="md-input" value="{{ $collection->genres()->exists() ? implode(', ', json_decode($collection->genres->pluck('name'))) : '-' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">assignment</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Topik</label>
                                                    <input type="text" class="md-input" value="{{ $collection->topics()->exists() ? implode(',', json_decode($collection->topics->pluck('topic'))) : '-' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin uk-row-first">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">flag</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Bahasa</label>
                                                    <input type="text" class="md-input" value="{{ $collection->language()->exists() ? $collection->language->name : '-' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">widgets</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Sumber Data</label>
                                                    <input type="text" class="md-input" value="{{ $collection->source()->exists() ? $collection->source->name : 'SIPDIKBUD' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <label>Deskripsi</label>
                                    <textarea class="md-input autosized" cols="30" rows="4" readonly>{{ !empty($collection->description) ? $collection->description : '-' }}</textarea>
                                </div>
                            </div>
                            <h3 class="full_width_in_card heading_c">
                                Download
                            </h3>
                            <div class="uk-grid" data-uk-grid-margin="">
                                <div class="uk-width-1-1 uk-row-first">
                                    <ul class="md-list">
                                        @if (!empty($collection->abstract_file))
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="{{ route('collection.download.abstract.log', ['id' => Crypt::encrypt($collection->id)]) }}" target="_blank">Download Abstrak</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons"></i> <span class="uk-text-muted uk-text-small">{{ \Carbon\Carbon::parse($collection->updated_at)->formatLocalized('%d %B %Y') }}</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons"></i> <span class="uk-text-muted uk-text-small">{{ $collection->downloads()->where('category', 'abstract')->count() }}</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                        @if (!empty($collection->document_file))
                                            <li>
                                                <div class="md-list-content">
                                                    <span class="md-list-heading"><a href="javascript:;" onclick="downloadCollection({{ $collection->id }})">Download Dokumen PDF</a></span>
                                                    <div class="uk-margin-small-top">
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons"></i> <span class="uk-text-muted uk-text-small">{{ \Carbon\Carbon::parse($collection->updated_at)->formatLocalized('%d %B %Y') }}</span>
                                                    </span>
                                                    <span class="uk-margin-right">
                                                        <i class="material-icons"></i> <span class="uk-text-muted uk-text-small">{{ $collection->downloads()->where('category', 'document')->count() }}</span>
                                                    </span>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            @if ($collection->user()->exists())
                            <h3 class="full_width_in_card heading_c">
                                    Diupload Oleh
                            </h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2">
                                        <div class="uk-grid-margin uk-row-first">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">face</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Nama</label>
                                                    <input type="text" class="md-input" value="{{ $collection->user->name }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">email</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>E-Mail</label>
                                                    <input type="text" class="md-input" value="{{ $collection->user->email }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </li>
                    <li>
                        @if (!empty($collection->cover_file))
                        <img class="uk-responsive-width" src="{{ asset('covers/'.$collection->cover_file) }}" alt="cover">
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="uk-width-large-3-10">
        <div class="md-card">
            <div class="md-card-content">
                <h3 class="heading_c uk-margin-medium-bottom">Pengaturan Koleksi</h3>
                <div class="uk-form-row">
                    <input type="checkbox" data-switchery data-switchery-color="#1e88e5" checked />
                    <label for="user_edit_active" class="inline-label">Diterbitkan pada web</label>
                </div>
                <hr class="md-hr">
                <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('collection.mapping') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>

@include('contents.collection.download.reason')
@endsection

@push('scripts')
    <script>
        var select_institution = $('#institutions')

        $(function () {
            select_institution.selectize({
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

            $.get("{{ route('collection.mapping.get.institutions') }}").done(function (result) {
                select_institution[0].selectize.load(function (callback) {
                    callback(result)
                })

                @if($collection->institutions()->exists())
                    select_institution[0].selectize.setValue({{ $collection->institutions->pluck('pivot.institution_id') }})
                @endif
            })
        })
    </script>
@endpush