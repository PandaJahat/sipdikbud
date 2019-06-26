@csrf
@method('PATCH')
<input type="hidden" name="id" value="{{ $genre->id }}">
<div class="uk-form-row">
    <label>Nama Genre <span class="uk-text-danger">*</span></label>
    <input type="text" class="md-input" name="name" value="{{ $genre->name }}" required />
</div>