@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Daftar Artikel</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <a href="{{ route('article.list.sync') }}" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light md-btn-icon">
                    <i class="uk-icon-refresh"></i> Singkronisasi Artikel
                </a>
            </div>
        </div>
        <br>
        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair hasFilters uk-table-hover" id="article-table">
            <thead>
            <tr>
                <th>#</th>
                <th style="width: 35%">Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var article_table
        $(function () {
            article_table = $('#article-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('article.list.data') }}",
                    data: function (param) {
                        param.user_id = "{{ Auth::user()->id }}"
                    }
                },
                columnDefs: [
                    {
                        targets: [0, 5],
                        searchable: false,
                        orderable: false
                    },
                    {
                        targets: [6],
                        visible: false
                    }
                ],
                order: [
                    [6, 'desc']
                ], 
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'author',
                        name: 'author'
                    },
                    {
                        data: 'category.name',
                        name: 'category.name',
                        defaultContent: '-'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'actions',
                        name: 'actions'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ]
            })  

        })
    </script>
@endpush