@extends('layouts.default')

@include('plugins.dropify')
@include('plugins.sweetalert2')
@include('plugins.datatables')

@section('content')
<h3 class="heading_b uk-margin-bottom">Pengaturan Slider Beranda</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <button type="button" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light md-btn-icon" data-uk-modal="{target:'#slider-create'}"><i class="uk-icon-plus"></i> Upload Gambar</button>
            </div>
        </div>
        <table class="uk-table uk-table-align-vertical uk-table-nowrap tablesorter tablesorter-altair hasFilters uk-table-hover" id="slider-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Thumbnail</th>
                <th>Nama File</th>
                <th>Diupload Oleh</th>
                <th style="width: 7%">Aksi</th>
            </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div>
</div>

<div class="uk-modal" id="slider-create">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Formulir Upload Gambar Slider</h3>
        </div>
        
        <form action="{{ route('home.setting.slider.create.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="uk-form-row">
                <label>Gambar <span class="uk-text-danger">*</span></label>
                <input type="file" name="image" class="dropify-id" accept="image/*" />
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="md-btn md-btn-default uk-modal-close">Tutup</button>
                <button type="submit" class="md-btn md-btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var slider_table

        $(function () {
            slider_table = $('#slider-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('home.setting.slider.data') }}"
                },
                columnDefs: [
                    {
                        targets: [0, 4],
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
                        data: 'thumbnail_file',
                        name: 'thumbnail_file'
                    },
                    {
                        data: 'image_file',
                        name: 'image_file'
                    },
                    {
                        data: 'user.name',
                        name: 'user.name'
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

        function deleteSlider(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Ingin menghapus gambar ini dari slider",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    $.post("{{ route('home.setting.slider.delete.submit') }}", {
                        _token: "{{ csrf_token() }}",
                        _method: 'DELETE',
                        id: id
                    }).done(function (result) {
                        Swal.fire(
                            'Berhasil!',
                            result,
                            'success'
                        )

                        slider_table.draw(false)
                    })
                }
            })
        }
    </script>
@endpush