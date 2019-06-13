@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
@endpush

@if (Session::has('success'))
    @push('scripts')
        <script>
            $(function () {
                Swal.fire(
                    'Berhasil!',
                    "{{ Session::get('success') }}",
                    'success'
                );
            });
        </script>
    @endpush
@endif

@if (Session::has('error'))
    @push('scripts')
        <script>
            $(function () {
                Swal.fire(
                    'Error!',
                    "{{ Session::get('error') }}",
                    'error'
                );
            });
        </script>
    @endpush
@endif