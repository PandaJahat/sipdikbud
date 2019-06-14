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

<div class="uk-modal" id="collection-download">
    <div class="uk-modal-dialog">
        <div class="uk-modal-header">
            <h3 class="uk-modal-title">Tujuan Mengunduh Penelitian</h3>
        </div>
        
        <form action="{{ route('collection.download.reason.submit') }}" method="POST">
            @csrf
            <input type="hidden" name="collection_id">
            <input type="hidden" name="previous_url" value="{{ Request::fullUrl() }}">
            <div class="uk-form-row">
                <select name="reason_id" required>
                    <option value="">Pilih Tujuan Mengunduh</option>
                </select>
            </div>
            <div class="uk-form-row" style="display: none" id="reason_text">
                <label>Jelaskan Tujuan</label>
                <textarea cols="30" rows="4" class="md-input" name="reason_text"></textarea>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button type="button" class="md-btn md-btn-default uk-modal-close">Batalkan</button>
                <button type="submit" class="md-btn md-btn-primary">Download</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var collection_table 
        var select_reason = $('select[name=reason_id]')

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

            select_reason.selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                plugins: {
                    remove_button: {
                        label: ""
                    }
                },
                onDropdownOpen: function (t) {
                    t.hide().velocity("slideDown", {
                        begin: function () {
                            t.css({
                                "margin-top": "0"
                            })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
                },
                onDropdownClose: function (t) {
                    t.show().velocity("slideUp", {
                        complete: function () {
                            t.css({
                                "margin-top": ""
                            })
                        },
                        duration: 200,
                        easing: easing_swiftOut
                    })
                },
                onChange: function (value) {
                    var reason_text = $('#reason_text')
                    if (value === 'other') {
                        reason_text.fadeIn('slow')
                    } else {
                        reason_text.fadeOut('slow')
                    }
                }
            })

            $.get("{{ route('collection.download.get.reasons') }}").done(function (result) {
                select_reason[0].selectize.load(function (callback) {
                    callback(result)
                })
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

        function downloadCollection(id) {
            $('#collection-download').find('input[name=collection_id]').val(id)
            UIkit.modal('#collection-download').show();
        }
    </script>
@endpush