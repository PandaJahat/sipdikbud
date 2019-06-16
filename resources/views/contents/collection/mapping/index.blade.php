@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Moderasi Penelitian</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-overflow-container">
            <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair hasFilters uk-table-hover" id="collection-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>Judul</th>
                    <th>Peneliti</th>
                    <th>Bidang</th>
                    <th>Tahun</th>
                    <th>Diupload</th>
                    <th style="width: 5%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
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
                    url: "{{ route('collection.mapping.data') }}"
                },
                columnDefs: [
                    {
                        targets: [0, 4, 7],
                        searchable: false,
                        orderable: false
                    },
                    {
                        targets: [8],
                        visible: false
                    }
                ],
                order: [
                    [8, 'desc']
                ], 
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'institutions_count',
                        name: 'institutions_count',
                        searchable: false,
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
                        data: 'category',
                        name: 'category'
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