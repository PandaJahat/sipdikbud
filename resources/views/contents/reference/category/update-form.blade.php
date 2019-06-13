@csrf
@method('PATCH')
<input type="hidden" name="id" value="{{ $category->id }}">
<div class="uk-form-row">
    <label>Nama Kategori <span class="uk-text-danger">*</span></label>
    <input type="text" class="md-input" name="name" value="{{ $category->name }}" required />
</div>