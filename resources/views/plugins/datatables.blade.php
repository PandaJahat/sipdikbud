@push('scripts')
    <!-- datatables -->
    <script src="{{ asset('assets/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <!-- datatables buttons-->
    <script src="{{ asset('assets/bower_components/datatables-buttons/js/dataTables.buttons.js') }}"></script>
    <script src="{{ asset('assets/js/custom/datatables/buttons.uikit.js') }}"></script>
    <script src="{{ asset('assets/bower_components/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/bower_components/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables-buttons/js/buttons.colVis.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables-buttons/js/buttons.html5.js') }}"></script>
    <script src="{{ asset('assets/bower_components/datatables-buttons/js/buttons.print.js') }}"></script>
    
    <!-- datatables custom integration -->
    <script src="{{ asset('assets/js/custom/datatables/datatables.uikit.min.js') }}"></script>

    <!--  datatables functions -->
    <script src="{{ asset('assets/js/pages/plugins_datatables.min.js') }}"></script>

    <script>
        var defaultLang = {
            processing: '<img src="https://loading.io/spinners/balls/index.circle-slack-loading-icon.gif"> Sedang memuat data',
            paginate: {
                next: 'Selanjutnya',
                previous: 'Sebelumnya'
            },
            lengthMenu: "Menampilkan _MENU_ baris",
            search: 'Cari:',
            info: 'Menampikan _START_ ke _END_ dari _TOTAL_ baris',
            infoEmpty: 'Kosong',
            emptyTable: 'Tidak ada data'
        };
    </script>
@endpush