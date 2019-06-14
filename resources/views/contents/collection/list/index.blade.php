@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Daftar Penelitian</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        {{-- <div class="uk-overflow-container"> --}}
            <table class="uk-table uk-table-hover" id="collection-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th style="width: 40%">Judul</th>
                    <th>Peneliti</th>
                    <th>Tahun</th>
                    <th>Diupload</th>
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

@push('scripts')
    <script>
        var collection_table 

        $(function () {
            collection_table = $('#collection-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('collection.list.data') }}"
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
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'author.name',
                        name: 'author.name'
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

        function deleteCollection(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Ingin menghapus penelitian ini",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    $.post("{{ route('collection.list.delete.submit') }}", {
                        _token: "{{ csrf_token() }}",
                        _method: 'DELETE',
                        id: id
                    }).done(function (result) {
                        Swal.fire(
                            'Berhasil!',
                            result,
                            'success'
                        )

                        collection_table.draw(false)
                    })
                }
            })
        }
    </script>
@endpush