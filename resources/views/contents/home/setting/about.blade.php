@extends('layouts.default')

@include('plugins.ckeditor')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Pengaturan Halaman Tentang</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <form action="{{ route('home.setting.about.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea id="wysiwyg_ckeditor" cols="30" rows="20" name="about">{!! option_exists('about') ? option('about') : '' !!}</textarea>
            <hr>
            <button type="submit" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $("#wysiwyg_ckeditor").ckeditor(function () {}, {
                customConfig: "{{ asset('assets/js/custom/ckeditor_config.js') }}"
            })  
        })
    </script>
@endpush