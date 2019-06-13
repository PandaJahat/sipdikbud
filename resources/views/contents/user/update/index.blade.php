@extends('layouts.default')

@include('plugins.inputmask')

@push('styles')
    <style>
        .icheck-inline {
            display: inline-block;
            margin: 6px 16px 0 0;
        }
    </style>
@endpush

@section('content')
<h3 class="heading_b uk-margin-bottom">Formulir Ubah Pengguna</h3>

<div class="uk-alert uk-alert-large" data-uk-alert="">
    <a href="#" class="uk-alert-close uk-close"></a>
    <h4 class="heading_b">Perhatian</h4>
    Isi password untuk mengubah password.
</div>

<div class="md-card uk-margin-medium-bottom">
    <div class="md-card-content">
        @if($errors->any())
            @foreach ($errors->all() as $error)
            <div class="uk-alert uk-alert-danger" data-uk-alert="">
                <a href="#" class="uk-alert-close uk-close"></a>
                <strong>Error!</strong> {{ $error }}
            </div>
            @endforeach
        @endif 
        <form action="{{ route('user.update.submit') }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $user->id }}">
            <div class="uk-grid">
                <div class="uk-width-1-2">
                    <div class="uk-form-row">
                        <label>Nama Lengkap <span class="uk-text-danger">*</span></label>
                        <input type="text" class="md-input" name="name" value="{{ $user->name }}" required />
                    </div>
                    <div class="uk-form-row">
                        <label>Lembaga/Bidang/Institusi <span class="uk-text-danger">*</span></label>
                        <input type="text" class="md-input" name="institute" value="{{ $user->profile->institute }}" required />
                    </div>
                    <div class="uk-form-row">
                        <label>E-Mail <span class="uk-text-danger">*</span></label>
                        <input type="text" class="md-input" name="email" value="{{ $user->email }}" required />
                    </div>
                    <div class="uk-form-row">
                        <label>Password</label>
                        <input type="password" class="md-input" name="password" />
                    </div>
                    <div class="uk-form-row">
                        <label>Password (ulangi)</label>
                        <input type="password" class="md-input" name="password_confirm" />
                    </div>
                    <div class="uk-form-row">
                        <select name="role_id" required>
                            <option value="">Pilih Peran</option>
                        </select>
                    </div>
                </div>
                <div class="uk-width-1-2">
                    <div class="uk-form-row">
                        <label>Jenis Kelamin <span class="uk-text-danger">*</span></label>
                        <br>
                        @foreach ($genders as $item)
                            <span class="icheck-inline">
                                <input type="radio" name="gender_id" id="gender_{{ $item->id }}" value="{{ $item->id }}" {{ $user->profile->gender_id == $item->id ? 'checked' : '' }} data-md-icheck required />
                                <label for="gender_{{ $item->id }}" class="inline-label">{{ $item->name }}</label>
                            </span>
                        @endforeach
                    </div>
                    <div class="uk-form-row">
                        <label>Tanggal Lahir (dd/mm/yyyy) <span class="uk-text-danger">*</span></label>
                        <input type="text" class="md-input masked_input date" name="date_of_birth" value="{{ \Carbon\Carbon::parse($user->date_of_birth)->format('d/m/Y') }}" data-inputmask="'alias': 'dd/mm/yyyy'" data-inputmask-showmaskonhover="false" autocomplete="false" required />
                    </div>
                    <div class="uk-form-row">
                        <label>Tempat Lahir</label>
                        <input type="text" class="md-input" name="place_of_birth" value="{{ $user->profile->place_of_birth }}" />
                    </div>
                    <div class="uk-form-row">
                        <select name="province_id">
                            <option value="">Pilih Provinsi</option>
                        </select>
                    </div>
                    <div class="uk-form-row">
                        <select name="district_id">
                            <option value="">Pilih Kabupaten</option>
                        </select>
                    </div>
                    <div class="uk-form-row">
                        <select name="subdistrict_id">
                            <option value="">Pilih Kecamatan</option>
                        </select>
                    </div>
                    <div class="uk-form-row">
                        <select name="village_id">
                            <option value="">Pilih Kelurahan</option>
                        </select>
                    </div>
                    <div class="uk-form-row">
                        <label>Alamat</label>
                        <textarea cols="30" rows="4" class="md-input" name="address">{{ $user->profile->address }}</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <button class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light" type="submit">Simpan</button>
            &nbsp;&nbsp;
            <a class="md-btn md-btn-default md-btn-wave-light waves-effect waves-button waves-light" href="{{ route('user.list') }}">Kembali</a>
        </form>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        var select_province = $('select[name=province_id]')
        var select_district = $('select[name=district_id]')
        var select_subdistrict = $('select[name=subdistrict_id]')
        var select_village = $('select[name=village_id]')

        var select_role = $('select[name=role_id]')

        var doOnce = true;

        $(document).ready(function () {
            $maskedInput = $(".masked_input"), $maskedInput.length && $maskedInput.inputmask()

            UIkit.datepicker($('.date'), {
                format: "DD/MM/YYYY"
            })

            select_province.selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                onChange: function (value) {
                    $.get("{{ route('user.create.get.districts') }}", {
                        province_id: value
                    }).done(function (result) {
                        select_district[0].selectize.clearOptions()
                        select_district[0].selectize.load(function (callback) {
                            callback(result)
                        })

                        if (doOnce) {
                            select_district[0].selectize.setValue("{{ $user->profile->district_id }}")
                        }
                    })
                }
            })

            select_district.selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                onChange: function (value) {
                    $.get("{{ route('user.create.get.subdistricts') }}", {
                        district_id: value
                    }).done(function (result) {
                        select_subdistrict[0].selectize.clearOptions()
                        select_subdistrict[0].selectize.load(function (callback) {
                            callback(result)
                        })

                        if (doOnce) {
                            select_subdistrict[0].selectize.setValue("{{ $user->profile->subdistrict_id }}")
                        }
                    })
                }
            })

            select_subdistrict.selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
                onChange: function (value) {
                    $.get("{{ route('user.create.get.villages') }}", {
                        subdistrict_id: value
                    }).done(function (result) {
                        select_village[0].selectize.clearOptions()
                        select_village[0].selectize.load(function (callback) {
                            callback(result)
                        })

                        if (doOnce) {
                            select_village[0].selectize.setValue("{{ $user->profile->village_id }}")
                            
                            doOnce = false
                        }
                    })
                }
            })

            select_village.selectize({
                valueField: "id",
                labelField: "name",
                searchField: "name",
            })

            select_role.selectize({
                valueField: "name",
                labelField: "display_name",
                searchField: "display_name",
            })

            $.get("{{ route('user.create.get.provinces') }}").done(function (result) {
                select_province[0].selectize.load(function (callback) {
                    callback(result)
                })

                if (doOnce) {
                    select_province[0].selectize.setValue("{{ $user->profile->province_id }}")
                }
            })

            $.get("{{ route('user.create.get.roles') }}").done(function (result) {
                select_role[0].selectize.load(function (callback) {
                    callback(result)
                })

                select_role[0].selectize.setValue("{{ $user->roles->first()->name }}")
            })
        });
    </script>
@endpush