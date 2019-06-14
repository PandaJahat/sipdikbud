@csrf
@method('PATCH')
<input type="hidden" name="id" value="{{ $reason->id }}">
<div class="uk-form-row">
    <label>Urutan Ke</label>
    <input type="text" class="md-input" name="order" value="{{ $reason->order }}" />
</div>
<div class="uk-form-row">
    <label>Tujuan <span class="uk-text-danger">*</span></label>
    <input type="text" class="md-input" name="name" value="{{ $reason->name }}" required />
</div>