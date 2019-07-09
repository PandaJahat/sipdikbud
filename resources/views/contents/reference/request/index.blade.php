@extends('layouts.default')

@include('plugins.datatables')
@include('plugins.sweetalert2')

@section('content')
<h3 class="heading_b uk-margin-bottom">Permohonan Data Referensi</h3>
<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        @if (Laratrust::hasRole(['researcher', 'reviewer']))
        <div class="uk-grid">
            <div class="uk-width-1-1">
                <button type="button" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light md-btn-icon" data-uk-modal="{target:'#request-create'}"><i class="uk-icon-plus"></i> Buat Permohonan</button>
            </div>
        </div>
        <br>
        @endif
        <div class="uk-overflow-container">
            <table class="uk-table uk-table-hover" id="request-table">
                <thead>
                <tr>
                    <th style="width: 5%">#</th>
                    <th>Status</th>
                    <th>Kategori</th>
                    <th>Data</th>
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

@if (Laratrust::hasRole(['researcher', 'reviewer']))
    <div class="uk-modal" id="request-create">
        <div class="uk-modal-dialog">
            <div class="uk-modal-header">
                <h3 class="uk-modal-title">Formulir Permohonan</h3>
            </div>
            
            <form action="{{ route('reference.request.create.submit') }}" method="POST">
                @csrf
                <div class="uk-form-row">
                    <select  class="md-input" name="category" data-uk-tooltip="{pos:'top'}" title="Pilih Kategori Referesi" required>
                        <option value="" disabled selected hidden>Pilih Kategori Referesi</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->code }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="uk-form-row">
                    <label>Data <span class="uk-text-danger">*</span></label>
                    <input type="text" class="md-input" name="data" required />
                </div>
                <div class="uk-form-row" style="display: none">
                    <label>Kode <span class="uk-text-danger">*</span></label>
                    <input type="text" class="md-input" name="additional_data" />
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-default uk-modal-close">Tutup</button>
                    <button type="submit" class="md-btn md-btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endif
@endsection

@if (Laratrust::hasRole(['researcher', 'reviewer']))
    @push('scripts')
        <script>
            $(function () {
                $('select[name=category]').change(function (element) {
                    var additional_field = $('input[name=additional_data]')
                    
                    if (this.value == 'language') {
                        additional_field.prop('required',true)
                        additional_field.parent().parent().fadeIn('slow')
                    } else {
                        additional_field.prop('required',false)
                        additional_field.parent().parent().fadeOut('slow')
                    }
                })
            })
        </script>
    @endpush
@endif

@push('scripts')
    <script>
        var request_table

        $(function () {
            request_table = $('#request-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('reference.request.data') }}"
                },
                columnDefs: [
                    {
                        targets: [0, 3, 5],
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
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'category.name',
                        name: 'category.name'
                    },
                    {
                        data: 'data',
                        name: 'data'
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

        function deleteRequest(id) {
            Swal.fire({
                title: 'Anda yakin?',
                text: "Ingin menghapus permohonan referensi ini",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.value) {
                    $.post("{{ route('reference.request.delete.submit') }}", {
                        _token: "{{ csrf_token() }}",
                        _method: 'DELETE',
                        id: id
                    }).done(function (result) {
                        Swal.fire(
                            'Berhasil!',
                            result,
                            'success'
                        )

                        request_table.draw(false)
                    })
                }
            })
        }
    </script>
@endpush


