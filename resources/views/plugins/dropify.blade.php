@push('links-first')
    <link rel="stylesheet" href="{{ asset('assets/skins/dropify/css/dropify.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/js/custom/dropify/dist/js/dropify.min.js') }}"></script>

    <script>
        $(function () {
            altair_form_file_dropify.init()
        }), altair_form_file_dropify = {
            init: function () {
                $(".dropify").dropify(), $(".dropify-id").dropify({
                    messages: {
                        default: "Seret file ke dalam kotak atau klik untuk memilih",
                        replace: "Seret file ke dalam kotak atau klik untuk mengganti",
                        remove: "Hapus",
                        error: "Maaf, file terlalu besar"
                    }
                })
            }
        };
    </script>
@endpush