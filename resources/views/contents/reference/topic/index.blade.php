@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Topik Koleksi</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-overflow-container">
            <table class="uk-table uk-table-hover" id="topic-table">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Topik</th>
                    <th>Jumlah Koleksi</th>
                    <th>Dibuat pada</th>
                    <th style="width: 12%">Aksi</th>
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
        var topic_table

        $(function () {
            topic_table = $('#topic-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('reference.topic.data') }}"
                },
                columnDefs: [
                    {
                        targets: [0, 2, 4],
                        searchable: false,
                        orderable: false
                    },
                    {
                        targets: [5, 4],
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
                        data: 'topic',
                        name: 'topic'
                    },
                    {
                        data: 'collections_count',
                        name: 'collections_count'
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