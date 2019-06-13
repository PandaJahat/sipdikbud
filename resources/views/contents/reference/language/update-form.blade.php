@csrf
@method('PATCH')
<input type="hidden" name="id" value="{{ $language->id }}">
<div class="uk-form-row">
    <label>Kode Bahasa</label>
    <input type="text" class="md-input" name="code" value="{{ $language->code }}" />
</div>
<div class="uk-form-row">
    <label>Nama Bahasa <span class="uk-text-danger">*</span></label>
    <input type="text" class="md-input" name="name" value="{{ $language->name }}" required />
</div>
