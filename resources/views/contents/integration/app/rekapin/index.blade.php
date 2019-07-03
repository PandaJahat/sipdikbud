@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Integrasi REKAPIN</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
       <div class="uk-grid">
           <div class="uk-width-1-2">
            <ul class="md-list">
                <li>
                    <div class="md-list-content">
                        <span class="md-list-heading">Nama Aplikasi</span>
                        <span class="uk-text-small uk-text-muted">{{ $source->name }}</span>
                    </div>
                </li>
                <li>
                    <div class="md-list-content">
                        <span class="md-list-heading">Lembaga</span>
                        <span class="uk-text-small uk-text-muted">{{ $source->company_name }}</span>
                    </div>
                </li>
                <li>
                    <div class="md-list-content">
                        <span class="md-list-heading">Tipe</span>
                        <span class="uk-text-small uk-text-muted">Aplikasi Lainnya</span>
                    </div>
                </li>
            </ul>
           </div>
           <div class="uk-width-1-2">
            <ul class="md-list">
                <li>
                    <div class="md-list-content">
                        <span class="md-list-heading">URL</span>
                        <span class="uk-text-small uk-text-muted"><a href="{{ $source->url }}" target="_blank">{{ $source->url }}</a></span>
                    </div>
                </li>
                <li>
                    <div class="md-list-content">
                        <span class="md-list-heading">Deskripsi</span>
                        <span class="uk-text-small uk-text-muted">{{ $source->description }}</span>
                    </div>
                </li>
            </ul>
           </div>
       </div>
       <br>
       <button type="button" class="md-btn md-btn-success md-btn-wave-light waves-effect waves-button waves-light" onclick="SyncNow({{ Auth::user()->id }})">Integrasi Data</button>
       <br>
       <div class="uk-grid">
           <div class="uk-width-1-1">
               <div class="uk-overflow-container">
                    <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair hasFilters uk-table-hover" id="collection-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 40%">Judul</th>
                            <th>Penulis</th>
                            <th>Tahun</th>
                            <th>Kategori</th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        </tbody>
                    </table>
                </div>
           </div>
       </div>
       <br>
       <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('integration.other') }}">Kembali</a>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        var collection_table

        $(function () {
            collection_table = $('#collection-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('integration.app.rekapin.data') }}"
                },
                columnDefs: [
                    {
                        targets: [0],
                        searchable: false,
                        orderable: false
                    },
                    {
                        targets: [5],
                        visible: false
                    }
                ],
                order: [
                    [5, 'desc']
                ], 
                columns: [{
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'title_id',
                        name: 'title_id'
                    },
                    {
                        data: 'author',
                        name: 'author'
                    },
                    {
                        data: 'published_date',
                        name: 'published_date'
                    },
                    {
                        data: 'category.title_id',
                        name: 'category.title_id'
                    },
                    {
                        data: 'created_date',
                        name: 'created_date'
                    }
                ]
            })  

        })

        function SyncNow(user_id) {
            $.LoadingOverlay('show')
            $.get("{{ route('integration.app.rekapin.sync') }}", {
                user_id: user_id
            }).done(function (result) {
                $.LoadingOverlay('hide', true)

                Swal.fire(
                    'Berhasil!',
                    'Sistem dalam proses integrasi!',
                    'success'
                )
            })
        }
    </script>
@endpush