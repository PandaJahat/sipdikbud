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
                    <th>Jenis Data</th>
                    <th>Terakhir Integrasi</th>
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
        var integration_table
        $(function () {
            integration_table = $('#integration-table').DataTable({
                language: defaultLang,
            })
        });
    </script>
@endpush