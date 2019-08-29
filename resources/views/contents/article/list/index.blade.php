@extends('layouts.default')

@include('plugins.datatables')

@section('content')
<h3 class="heading_b uk-margin-bottom">Daftar Artikel</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair hasFilters uk-table-hover" id="collection-table">
            <thead>
            <tr>
                <th>#</th>
                <th style="width: 35%">Judul</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Diupload</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div>
</div>
@endsection