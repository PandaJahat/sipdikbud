@extends('layouts.default')

@include('plugins.sweetalert2')

@section('content')
<div class="md-card">
    <div class="uk-sticky-placeholder" style="height: 130px; margin: 0px;"><div class="user_heading" data-uk-sticky="{ top: 48, media: 960 }" style="margin: 0px;">
        <div class="user_heading_avatar fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail">
                <img src="{{ asset('img/user.png') }}" alt="user avatar">
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail"></div>
        </div>
        <div class="user_heading_content">
            <h2 class="heading_b"><span class="uk-text-truncate" id="user_edit_uname">{{ $user->name }}</span><span class="sub-heading" id="user_edit_position">{{ $user->roles->first()->display_name }}</span></h2>
        </div>
    </div></div>
    <div class="user_content">
        <div class="uk-margin-top">
            <h3 class="full_width_in_card heading_c">
                Informasi Biodata
            </h3>
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-2 uk-row-first">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Nama Lengkap</label>
                        <input class="md-input" type="text" name="name" value="{{ $user->name }}" readonly>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Jenis Kelamin</label>
                        <input class="md-input" type="text" name="gender" value="{{ $user->profile->gender->name }}" readonly>
                    </div>          
                </div>
                <div class="uk-width-medium-1-2 uk-row-first">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Tanggal Lahir</label>
                        <input class="md-input" type="text" name="date_of_birth" value="{{ \Carbon\Carbon::parse($user->profile->date_of_birth)->formatLocalized('%d %B %Y') }}" readonly>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Tempat Lahir</label>
                        <input class="md-input" type="text" name="place_of_birth" value="{{ $user->profile->place_of_birth }}" readonly>
                    </div>          
                </div>
                <div class="uk-width-medium-1-1 uk-row-first">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Lembaga/Institusi</label>
                        <input class="md-input" type="text" name="institute" value="{{ $user->profile->institute }}" readonly>
                    </div>
                </div>
                <div class="uk-width-medium-1-2 uk-row-first">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Provinsi</label>
                        <input class="md-input" type="text" name="province" value="{{ $user->profile->province()->exists() ? $user->profile->province->name : '-' }}" readonly>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Kabupaten</label>
                        <input class="md-input" type="text" name="district" value="{{ $user->profile->district()->exists() ? $user->profile->district->name : '-' }}" readonly>
                    </div>          
                </div>
                <div class="uk-width-medium-1-2 uk-row-first">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Kecamatan</label>
                        <input class="md-input" type="text" name="subdistrict" value="{{ $user->profile->subdistrict()->exists() ? $user->profile->subdistrict->name : '-' }}" readonly>
                    </div>
                </div>
                <div class="uk-width-medium-1-2">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Kelurahan</label>
                        <input class="md-input" type="text" name="village" value="{{ $user->profile->village()->exists() ? $user->profile->village->name : '-' }}" readonly>
                    </div>          
                </div>
                <div class="uk-width-medium-1-1 uk-row-first">
                    <div class="md-input-wrapper md-input-filled">
                        <label>Alamat</label>
                        <input class="md-input" type="text" name="address" value="{{ $user->profile->address }}" readonly>
                    </div>
                </div>
            </div>
            <h3 class="full_width_in_card heading_c">
                Informasi Kontak
            </h3>
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <div class="uk-grid uk-grid-width-1-1 uk-grid-width-large-1-2" data-uk-grid-margin="">
                        <div class="uk-row-first">
                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <i class="md-list-addon-icon material-icons"></i>
                                </span>
                                <div class="md-input-wrapper md-input-filled">
                                    <label>Email</label>
                                    <input type="text" class="md-input" name="email" value="{{ $user->email }}" readonly>
                                </div> 
                            </div>
                        </div>
                        <div class="">
                            <div class="uk-input-group">
                                <span class="uk-input-group-addon">
                                    <i class="md-list-addon-icon material-icons"></i>
                                </span>
                                <div class="md-input-wrapper md-input-filled">
                                    <label>Telepon</label>
                                    <input type="text" class="md-input" name="email" value="{{ $user->profile->phone_number }}" readonly>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <hr>
            <a href="{{ route('user.update', ['id' => Crypt::encrypt($user->id), 'prev_route' => 'profile']) }}" class="md-btn md-btn-primary md-btn-wave-light waves-effect waves-button waves-light">Ubah Profil</a>
        </div>
    </div>
</div>
@endsection