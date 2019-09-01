@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Kategori Artikel</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <button type="button" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light md-btn-icon" data-uk-modal="{target:'#category-create'}"><i class="uk-icon-plus"></i> Buat Kategori</button>
            </div>
        </div>
        <br>
        <table class="uk-table uk-table-align-vertical uk-table-nowrap uk-table-hover" id="category-table">
            <thead>
            <tr>
                <th>#</th>
                <th style="width: 35%">Nama</th>
                <th>Jumlah Artikel</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            
            </tbody>
        </table>
    </div>
</div>

<div class="uk-modal" id="category-create">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Formulir Kategori</h3>
        </div>
        
        <form action="{{ route('article.category.create.submit') }}" method="POST">
            @csrf
            <div class="uk-form-row">
                <label>Nama Kategori <span class="uk-text-danger">*</span></label>
                <input type="text" class="md-input" name="name" required />
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="md-btn md-btn-default uk-modal-close">Tutup</button>
                <button type="submit" class="md-btn md-btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<div class="uk-modal" id="category-update">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Formulir Ubah Kategori</h3>
        </div>
        
        <form action="{{ route('article.category.update.submit') }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id"/>
            <div class="uk-form-row">
                <label>Nama Kategori <span class="uk-text-danger">*</span></label>
                <input type="text" class="md-input label-fixed" name="name" required />
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
        var category_table;

        $(function () {
            category_table = $('#category-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('article.category.data') }}",
                    data: function (param) {
                        
                    }
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
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'articles_count',
                        name: 'articles_count'
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
        });

        function showUpdateForm(id) {
            var modal = UIkit.modal("#category-update");
            var form = $('#category-update form');

            var body = $("#category-update .uk-modal-dialog")

            modal.show();
            body.LoadingOverlay('show');
            $.get("{{ route('article.category.get') }}", {
                id: id
            }).done(function (result) {
                $.each(result, function (indexInArray, valueOfElement) { 
                     form.find('input[name='+indexInArray+']').val(valueOfElement);
                });

                body.LoadingOverlay('hide', true);
            });
        }

        function actionDelete(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Ingin menghapus kategori ini",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    $.post("{{ route('article.category.delete.submit') }}", {
                        _token: "{{ csrf_token() }}",
                        _method: 'DELETE',
                        id: id
                    }).done(function (result) {
                        Swal.fire(
                            'Berhasil!',
                            result,
                            'success'
                        )

                        category_table.draw(false)
                    })
                }
            })
        }
    </script>
@endpush