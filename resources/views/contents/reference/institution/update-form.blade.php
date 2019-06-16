@csrf
@method('PATCH')
<input type="hidden" name="id" value="{{ $institution->id }}">
<div class="uk-form-row">
    <label>Nama Kategori <span class="uk-text-danger">*</span></label>
    <input type="text" class="md-input" name="name" value="{{ $institution->name }}" required />
</div>
<div class="uk-form-row">
    <label>Deskripsi</label>
    <textarea class="md-input autosized" name="description" cols="30" rows="4">{{ $institution->description }}</textarea>
</div>