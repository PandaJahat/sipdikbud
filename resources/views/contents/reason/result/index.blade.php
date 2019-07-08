@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Rekap Kebermanfaatan Publikasi</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-overflow-container">
            <table class="uk-table uk-table-hover" id="result-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Kategori</th>
                    <th>Catatan</th>
                    <th>Oleh</th>
                    <th>Pada</th>
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
        var result_table

        $(function () {
            result_table = $('#result-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('reason.result.data') }}",
                    data: function (params) {
                        params.prev_url = "{{ Crypt::encrypt(Request::fullUrl()) }}"
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
                        data: 'category',
                        name: 'reason_id'
                    },
                    {
                        data: 'reason_text',
                        name: 'reason_text'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'action',
                        name: 'action'
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