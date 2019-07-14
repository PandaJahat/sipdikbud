@extends('layouts.default')

@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Detail Publikasi</h3>
<div class="uk-grid" data-uk-grid-margin="">
    <div class="uk-width-large-7-10 uk-row-first">
        <div class="md-card">
            <div class="uk-sticky-placeholder" style="height: 130px; margin: 0px;">
                <div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }" style="margin: 0px;">
                    <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            <img src="https://i.ya-webdesign.com/images/flat-design-png-5.png" alt="user avatar">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div class="user_avatar_controls">

                            <a href="#" class="btn-file fileinput-exists" data-dismiss="fileinput"><i
                                    class="material-icons"></i></a>
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
                </div>
            </div>
            <div class="user_content">
                <ul id="user_edit_tabs" class="uk-tab" data-uk-tab="{connect:'#collection_detail', animation:'slide-horizontal'}">
                    <li class="uk-active"><a href="#">Informasi Publikasi</a></li>
                    <li><a href="#">Gambar Cover</a></li>
                    @if (Laratrust::hasRole('admin'))
                    <li><a href="#">Kebermanfaatan</a></li>
                    @endif
                </ul>
                <ul id="collection_detail" class="uk-switcher uk-margin">
                    <li class="uk-active">
                        <div class="uk-margin-top">
                            @if ($collection->reviewer()->exists())
                                @if ($collection->reviewer->results()->exists() && (Laratrust::hasRole(['reviewer', 'admin']) || Auth::user()->id == $collection->user_id))
                                <h3 class="full_width_in_card heading_c">
                                    Hasil Review
                                </h3>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-1" data-uk-grid-margin="">
                                            <div class="uk-grid-margin uk-row-first">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon">
                                                        <i class="md-list-addon-icon material-icons">gavel</i>
                                                    </span>
                                                    <div class="md-input-wrapper md-input-filled">
                                                        <label>Layak Diterbitkan</label>
                                                        <input type="text" class="md-input" value="{{ $collection->reviewer->results->last()->status ? 'Ya' : 'Tidak' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-1" data-uk-grid-margin="">
                                            <div class="uk-grid-margin uk-row-first">
                                                <div class="uk-input-group">
                                                    <span class="uk-input-group-addon">
                                                        <i class="md-list-addon-icon material-icons">notes</i>
                                                    </span>
                                                    <div class="md-input-wrapper md-input-filled">
                                                        <label>Catatan dari Reviewer</label>
                                                        <textarea class="md-input" readonly>{{ $collection->reviewer->results->last()->note }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif
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
                                            <span class="uk-text-small uk-text-muted">{!! !empty($collection->description) ? $collection->description : '-' !!}</span>
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
                                    <form action="{{ route('collection.detail.add.comment.submit') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $collection->id }}">
                                        <input type="hidden" name="prev_url" value="{{ Request::get('prev_url') }}">
                                        <textarea cols="30" rows="4" class="md-input" name="comment" placeholder="Berikan komentar..."></textarea>
                                        <button type="submit" class="md-btn md-btn-primary uk-margin-top">Kirim</button>
                                    </form>
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
                            <img class="uk-responsive-width" src="{{ $collection->source()->exists() ? $collection->source->thumbnail_path.$collection->cover_file : $collection->source }}" onerror="this.onerror=null;this.src='{{ asset('assets-front/img/nothing.png') }}';" alt="cover">
                        @else
                            <img class="uk-responsive-width" src="{{ asset('assets-front/img/nothing.png') }}" alt="cover">
                        @endif
                    </li>
                    @if (Laratrust::hasRole('admin'))
                        <li>
                            @include('contents.collection.detail.reason-table')
                        </li>
                    @endif
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
                {{-- <hr class="md-hr">
                    <h3 class="heading_c uk-margin-medium-bottom">Pengaturan Publikasi</h3>
                    <div class="uk-form-row">
                        <input type="checkbox" data-switchery data-switchery-color="#1e88e5" id="publish" name="active_status" value="1" {{ $collection->is_active ? 'checked' : '' }} />
                        <label for="publish" class="inline-label">Layak Diterbitkan</label>
                    </div> --}}
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
        var favorite_switch = $('input[name=favorite]')

        var status_switch = $('input[name=active_status]')
        $(function () {
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