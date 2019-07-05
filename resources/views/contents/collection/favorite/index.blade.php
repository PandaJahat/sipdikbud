@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Daftar Publikasi Favorit</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair hasFilters uk-table-hover" id="collection-table">
            <thead>
            <tr>
                <th>#</th>
                <th style="width: 40%">Judul</th>
                <th>Penulis</th>
                <th>Tahun</th>
                <th>Diupload</th>
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
        var collection_table

        $(function () {
            collection_table = $('#collection-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('collection.favorite.data') }}",
                    data: function (param) {
                        param.user_id = "{{ Auth::user()->id }}"
                        param.prev_url = "{{ Crypt::encrypt(Request::fullUrl()) }}"
                    }
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
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'author.name',
                        name: 'author.name'
                    },
                    {
                        data: 'published_year',
                        name: 'published_year',
                        defaultContent: '-'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
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