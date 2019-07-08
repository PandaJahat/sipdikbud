<div class="uk-modal uk-modal-card-fullscreen" id="select-reviewer">
    <div class="uk-modal-dialog uk-modal-dialog-blank">
        <div class="md-card uk-height-viewport">
            <div class="md-card-toolbar">
                <span class="md-icon material-icons uk-modal-close">&#xE5C4;</span>
                <h3 class="md-card-toolbar-heading-text">
                    Pilih Reviewer
                </h3>
            </div>
            <div class="md-card-content">
                <table class="uk-table uk-table-hover" id="reviewer-table" style="width: 100%">
                    <thead>
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>Nama</th>
                        <th>Lembaga/Instansi</th>
                        <th>E-Mail</th>
                        <th>Nomor Telepon</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    </tbody>
                </table>
                <hr class="md-hr">
                <button type="button" class="md-btn md-btn-default uk-modal-close">Batalkan</button>
                &nbsp;&nbsp;
                <button type="button" class="md-btn md-btn-primary uk-modal-close select-reviewer">Pilih</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        var reviewer_table

        $(function () {
            reviewer_table = $('#reviewer-table').DataTable({
                language: defaultLang,
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('collection.mapping.reviewer.data') }}"
                },
                columnDefs: [
                    {
                        targets: [0],
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
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'profile.institute',
                        name: 'profile.institute',
                        defaultContent: '-'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'profile.phone_number',
                        name: 'profile.phone_number',
                        defaultContent: '-'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    }
                ],
                drawCallback: function () {
                    $('.select_reviewer').iCheck({
                        radioClass: "iradio_md",
                        // increaseArea: "20%"
                    })
                }
            })

            $('.select-reviewer').click(function (el) {
                var form = $('#select-reviewer-form')
                var selected_id = $('input[name=reviewer_id]:checked').val()
                var selected_name = $('#reviewer_name_'+selected_id).text()
                var selected_institute = $('#reviewer_institute_'+selected_id).text()

                form.find('input[name=user_id]').val(selected_id)
                form.find('input[name=name]').val(selected_name)
                form.find('input[name=institute]').val(selected_institute)
            })  
        })
    </script>
@endpush