@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Moderasi Publikasi</h3>
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
                @if (Laratrust::hasRole('admin'))
                    <div class="md-fab-wrapper">
                        <div class="md-fab md-fab-toolbar md-fab-small md-fab-accent">
                            <i class="material-icons"></i>
                            <div class="md-fab-toolbar-actions">
                                <button type="button" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}"
                                    title="Download"><i class="material-icons md-color-white"></i></button>
                                <button type="button" data-uk-tooltip="{cls:'uk-tooltip-small',pos:'bottom'}"
                                    title="Hapus"><i class="material-icons md-color-white"></i></button>
                            </div>
                        </div>
                    </div>
                @endif
            </div></div>
            <div class="user_content">
                <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#collection_detail', animation:'slide-horizontal'}">
                    <li class="uk-active"><a href="#">Informasi Publikasi</a></li>
                    <li><a href="#">Gambar Cover</a></li>
                </ul>
                <ul id="collection_detail" class="uk-switcher uk-margin">
                    <li class="uk-active">
                        <div class="uk-margin-top">
                            @if (Laratrust::hasRole('admin') && !$collection->source()->exists() && !$collection->reviewer()->exists())
                            <h3 class="full_width_in_card heading_c">
                                Pilih Reviewer
                            </h3>
                            <form action="{{ route('collection.mapping.reviewer.submit') }}" method="POST" id="select-reviewer-form">
                                <div class="uk-grid">
                                    <div class="uk-width-1-10"></div>
                                    <div class="uk-width-8-10">
                                        @csrf
                                        <input type="hidden" name="collection_id" value="{{ $collection->id }}">
                                        <input type="hidden" name="user_id">
                                        <div class="uk-form-row">
                                            <div class="uk-input-group">
                                                <label>Nama Reviewer</label>
                                                <input type="text" class="md-input label-fixed readonly" name="name" required />
                                                <span class="uk-input-group-addon"><button class="md-btn" type="button" data-uk-modal="{target:'#select-reviewer'}">Pilih</button></span>
                                            </div>
                                        </div>
                                        <div class="uk-form-row">
                                            <label>Lembaga/Bidang</label>
                                            <input type="text" class="md-input label-fixed readonly" name="institute" />
                                        </div>
                                        <div class="uk-form-row">
                                            <label>Catatan (opsional)</label>
                                            <textarea cols="30" rows="4" class="md-input" name="note"></textarea>
                                        </div>
                                        <br>
                                        <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light uk-align-right">Simpan</button>
                                    </div>
                                    <div class="uk-width-1-10"></div>
                                </div>
                            </form>
                            @include('contents.collection.mapping.select-reviewer')
                            @endif
                            <h3 class="full_width_in_card heading_c">
                                Moderasi
                            </h3>
                            <form action="{{ route('collection.mapping.submit') }}" method="post">
                                <div class="uk-grid">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $collection->id }}">
                                    <div class="uk-width-1-10"></div>
                                    <div class="uk-width-8-10">
                                        <div class="uk-form-row">
                                            <label for="institutions">Bidang Terkait</label>
                                            <select name="institutions[]" id="institutions" multiple>
                                                <option value="">Pilih Bidang</option>
                                            </select>
                                        </div>
                                        <div class="uk-form-row">
                                            <label for="related_collections">Publikasi Terkait</label>
                                            <select name="related_collections[]" id="related_collections" multiple>
                                                <option value="">Pilih Publikasi</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light uk-align-right">Simpan</button>
                                    </div>
                                    <div class="uk-width-1-10"></div>
                                </div>
                            </form>
                            <h3 class="full_width_in_card heading_c">
                                Informasi Umum
                            </h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">  
                                    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-1" data-uk-grid-margin="">
                                        <div class="uk-grid-margin uk-row-first">
                                            <div class="uk-input-group">
                                                <span class="uk-input-group-addon">
                                                    <i class="md-list-addon-icon material-icons">info</i>
                                                </span>
                                                <div class="md-input-wrapper md-input-filled">
                                                    <label>Judul</label>
                                                    <textarea class="md-input" readonly>{{ $collection->title }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin="">
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
                                    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-1" data-uk-grid-margin="">
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
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <ul class="md-list">
                                        <li>
                                            <div class="md-list-content">
                                            <span class="md-list-heading">Deskripsi</span>
                                            <span class="uk-text-small uk-text-muted">{{ !empty($collection->description) ? $collection->description : '-' }}</span>
                                            </div>
                                        </li>
                                    </ul>
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
                                                    <span class="md-list-heading">
                                                        @if (Laratrust::hasRole(['admin', 'reviewer']) || Auth::user()->id == $collection->user_id)
                                                        <a href="{{ route('collection.download.abstract', ['id' => Crypt::encrypt($collection->id)]) }}" target="_blank">Download Abstrak</a>                                                        
                                                        @else
                                                        <a href="{{ route('collection.download.abstract.log', ['id' => Crypt::encrypt($collection->id)]) }}" target="_blank">Download Abstrak</a>
                                                        @endif
                                                    </span>
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
                                                    <span class="md-list-heading">
                                                        @if (Laratrust::hasRole(['admin', 'reviewer']) || Auth::user()->id == $collection->user_id)
                                                        <a href="{{ route('collection.download', ['id' => Crypt::encrypt($collection->id)]) }}" target="_blank">Download Dokumen PDF</a>
                                                        @else
                                                        <a href="javascript:;" onclick="downloadCollection({{ $collection->id }})">Download Dokumen PDF</a>
                                                        @endif
                                                    </span>
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
                            <h3 class="full_width_in_card heading_c">
                                Diskusi
                            </h3>
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <ul class="uk-comment-list">
                                        @foreach ($collection->comments->sortByDesc('created_at') as $item)
                                            <li>
                                                <article class="uk-comment">
                                                    <header class="uk-comment-header">
                                                        <img class="md-user-image uk-comment-avatar" src="{{ asset('img/user.png') }}" alt="">
                                                        <h4 class="uk-comment-title">{{ $item->user->name }}</h4>
                                                        <div class="uk-comment-meta">{{ \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %B %Y') }}, {{ \Carbon\Carbon::parse($item->created_at)->format('H:i') }}</div>
                                                    </header>
                                                    <div class="uk-comment-body">
                                                        <p>{{ $item->text }}</p>
                                                    </div>
                                                </article>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
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
                <h2 class="heading_c uk-margin-small-bottom">Diunggah Oleh</h2>
                <ul class="md-list md-list-addon">
                    <li>
                        <div class="md-list-addon-element">
                            <img class="md-user-image md-list-addon-avatar" src="{{ asset('img/user.png') }}" alt="">
                        </div>
                        <div class="md-list-content">
                            <span class="md-list-heading">{{ $collection->user->name }}</span>
                            <span class="uk-text-small uk-text-muted">{{ $collection->user->roles->last()->display_name }}</span>
                        </div>
                    </li>
                    <li>
                        <div class="md-list-addon-element">
                            <i class="md-list-addon-icon material-icons"></i>
                        </div>
                        <div class="md-list-content">
                            <span class="md-list-heading">{{ \Carbon\Carbon::parse($collection->created_at)->formatLocalized('%d %B %Y - %H:%M') }}</span>
                            <span class="uk-text-small uk-text-muted">Diunggah</span>
                        </div>
                    </li>
                    <li>
                        <div class="md-list-addon-element">
                            <i class="md-list-addon-icon material-icons"></i>
                        </div>
                        <div class="md-list-content">
                            <span class="md-list-heading">{{ $collection->created_at == $collection->updated_at ? '-' : \Carbon\Carbon::parse($collection->updated_at)->formatLocalized('%d %B %Y - %H:%M') }}</span>
                            <span class="uk-text-small uk-text-muted">Diperbaharuai</span>
                        </div>
                    </li>
                </ul>
                <hr class="md-hr">
                <h3 class="heading_c uk-margin-medium-bottom">Status Publikasi</h3>
                <div class="uk-margin-medium-bottom">
                    <p>
                        Status:
                        @if ($collection->source()->exists())
                            <span class="uk-badge uk-badge-success uk-text-upper uk-margin-small-left">Layak</span>
                        @else
                            @if (!$collection->reviewer()->exists())
                                <span class="uk-badge uk-badge-danger uk-text-upper uk-margin-small-left">Belum Ada Reviewer</span>
                            @else
                                @if (!$collection->reviewer->results()->exists())
                                    <span class="uk-badge uk-badge-warning uk-text-upper uk-margin-small-left">Menunggu Review</span>
                                @else 
                                    @if ($collection->is_active)
                                        <span class="uk-badge uk-badge-success uk-text-upper uk-margin-small-left">Layak</span> 
                                    @else
                                        <span class="uk-badge uk-badge-danger uk-text-upper uk-margin-small-left">Tidak Layak</span>                                        
                                    @endif
                                @endif
                            @endif
                        @endif
                    </p>
                    <p>
                        Reviewer: <span class="uk-badge uk-badge-outline uk-text-upper uk-margin-small-left">{{ $collection->reviewer()->exists() ? $collection->reviewer->user->name : '-' }}</span> 
                    </p>
                </div>
                @if (Laratrust::hasRole('reviewer'))
                <hr class="md-hr">
                    <h3 class="heading_c uk-margin-medium-bottom">Pengaturan Publikasi</h3>
                    <div class="uk-form-row">
                        <input type="checkbox" data-switchery data-switchery-color="#1e88e5" id="publish" name="active_status" value="1" {{ $collection->is_active ? 'checked' : '' }} />
                        <label for="publish" class="inline-label">Layak Diterbitkan</label>
                    </div>
                @endif
                @if (Laratrust::hasRole(['public', 'researcher', 'reviewer']))
                <hr class="md-hr">
                    <h3 class="heading_c uk-margin-medium-bottom">Pengaturan Publikasi</h3>
                    <div class="uk-form-row">
                        <input type="checkbox" data-switchery data-switchery-color="#1e88e5" name="favorite" value="1" {{ $collection->favorites()->wherePivot('user_id', Auth::user()->id)->exists() ? 'checked' : '' }} id="favorite" />
                        <label for="favorite" class="inline-label">Jadikan publikasi favorit</label>
                    </div>
                @endif
                <hr class="md-hr">
                <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light" href="{{ !empty($prev_url) ? $prev_url : route('collection.list') }}">Kembali</a>
            </div>
        </div>
    </div>
</div>

@include('contents.collection.download.reason')
@endsection

@push('scripts')
    <script>
        var select_institution = $('#institutions')
        var select_related = $('#related_collections')

        var favorite_switch = $('input[name=favorite]')
        var status_switch = $('input[name=active_status]')

        $(function () {
            $(".readonly").keydown(function(e){
                e.preventDefault();
            })

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

            select_related.selectize({
                valueField: "id",
                labelField: "title",
                searchField: "title",
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

            $.get("{{ route('collection.mapping.get.collections') }}").done(function (result) {
                select_related[0].selectize.load(function (callback) {
                    callback(result)
                })

                @if($collection->related_collections()->exists())
                    select_related[0].selectize.setValue({{ $collection->related_collections->pluck('pivot.second_collection_id') }})
                @endif
            })

            favorite_switch.on('change', function (el) {
                $.post("{{ route('collection.detail.add.favorite.submit') }}", {
                    _token: "{{ csrf_token() }}",
                    id: "{{ $collection->id }}",
                    user_id: "{{ Auth::user()->id }}",
                    is_favorite: (this.checked ? 1 : 0)
                }).done(function (result) {
                    Swal.fire(
                        'Berhasil!',
                        (result == 'add' ? "Ditambahkan ke favorit!" : "Dihapus dari favorit!"),
                        'success'
                    )
                })
            })

            status_switch.on('change', function (el) {
                $.post("{{ route('collection.detail.change.status.submit') }}", {
                    _token: "{{ csrf_token() }}",
                    id: "{{ $collection->id }}",
                    user_id: "{{ Auth::user()->id }}",
                    is_active: (this.checked ? 1 : 0)
                }).done(function (result) {
                    Swal.fire(
                        'Berhasil!',
                        (result == 'active' ? "Publikasi diterbikan!" : "Publikasi tidak diterbikan!"),
                        'success'
                    )
                })
            })
        })
    </script>
@endpush