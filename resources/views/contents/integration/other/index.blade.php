@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Integrasi Aplikasi Lainnya</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-overflow-container">
            <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair hasFilters uk-table-hover" id="integration-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Aplikasi</th>
                    <th>Lembaga</th>
                    <th>URL</th>
                    <th>Terakhir Integrasi</th>
                    <th style="width: 5%">Status</th>
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
        var integration_table
        $(function () {
            integration_table = $('#integration-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('integration.other.data') }}"
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'company_name',
                        name: 'company_name',
                        defaultContent: '-'
                    },
                    {
                        data: 'url',
                        name: 'url'
                    },
                    {
                        data: 'last_sync',
                        name: 'last_sync'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ]
            })
        });
    </script>
@endpush