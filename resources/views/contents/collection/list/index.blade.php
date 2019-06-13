@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Daftar Penelitian</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        {{-- <div class="uk-overflow-container"> --}}
            <table class="uk-table uk-table-hover" id="user-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th style="width: 40%">Judul</th>
                    <th>Peneliti</th>
                    <th>Diupload</th>
                    <th>Dipublis</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        {{-- </div> --}}
    </div>
</div>
@endsection