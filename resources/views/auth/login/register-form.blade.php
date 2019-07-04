<form method="POST" action="{{ route('home.register.create.submit') }}" enctype="multipart/form-data">
    <div class="row">
        <div class="col p-1">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                <div class="uk-alert uk-alert-danger" data-uk-alert="">
                    <a href="#" class="uk-alert-close uk-close"></a>
                    <strong>Error!</strong> {{ $error }}
                </div>
                @endforeach

                @push('scripts')
                    <script>
                        $(function () {
                            $('#minimal-process-tab').click()
                        });
                    </script>
                @endpush
            @endif 
        </div>
    </div>
    @csrf
    <div class="row">
        <div class="col p-1">
            <input type="text" name="name" value="{{ old('name') }}" class="form-control bg-light-5 rounded border-0 text-1" placeholder="Nama Lengkap" required>
        </div>
    </div>
    <div class="row">
        <div class="col p-1">
            <input type="text" name="date_of_birth" value="{{ old('date_of_birth') }}" class="form-control bg-light-5 rounded border-0 text-1 datepicker" placeholder="Tanggal Lahir" readonly>
        </div>
        <div class="col p-1">
            <select name="gender_id" class="form-control bg-light-5 rounded border-0 text-1" required>
                <option selected disabled>Jenis Kelamin</option>
                @foreach ($genders as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col p-1">
            <input type="text" name="institute" value="{{ old('institute') }}" class="form-control bg-light-5 rounded border-0 text-1" placeholder="Lembaga/Instansi" required>
        </div>
    </div>
    <div class="row">
        <div class="col p-1">
            <input type="email" name="email" value="{{ old('email') }}" class="form-control bg-light-5 rounded border-0 text-1" placeholder="Email" required>
        </div>
            <div class="col p-1">
            <input type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control bg-light-5 rounded border-0 text-1" placeholder="Nomor Telepon" required>
        </div>
    </div>
    <div class="row">
        <div class="col p-1">
            <input type="password" name="password" class="form-control bg-light-5 rounded border-0 text-1" placeholder="Password" required>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col p-1">
            <select class="form-control bg-light-5 rounded border-0 text-1">
                <option>Pilih Provinsi (Opsional)</option>
                <option>1</option>
                <option>2</option>
            </select>
        </div>
        <div class="col p-1">
            <select class="form-control bg-light-5 rounded border-0 text-1">
                <option>Pilih Kabupaten (Opsional)</option>
                <option>1</option>
                <option>2</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col p-1">
            <select class="form-control bg-light-5 rounded border-0 text-1">
                <option>Pilih Kecamatan (Opsional)</option>
                <option>1</option>
                <option>2</option>
            </select>
        </div>
        <div class="col p-1">
            <select class="form-control bg-light-5 rounded border-0 text-1">
                <option>Pilih Kelurahan (Opsional)</option>
                <option>1</option>
                <option>2</option>
            </select>
        </div>
    </div> --}}
    <div class="row align-items-center pt-4">
        <div class="col text-right">
            <button type="submit" class="btn text-light shadow bg-primary-4 btn-rounded btn-v-3 btn-h-3 font-weight-bold">DAFTAR</button>
        </div>
    </div>
</form>

@push('scripts')
    <script>
        $(function () {
            $('.datepicker').datepicker({
                startView: 2,
                format: 'dd/mm/yyyy'
            });
        });
    </script>
@endpush