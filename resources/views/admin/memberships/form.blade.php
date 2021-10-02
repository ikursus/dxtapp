<div class="form-group">
    <label for="">NAMA</label>
    <input type="text" class="form-control" name="name" value="{{ $membership->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">DESCRIPTION</label>
    <textarea id="description" name="description" class="form-control">{{ $membership->description ?? old('description') }}</textarea>
</div>

<div class="form-group">
    <label for="">PRICE</label>
    <input type="number" class="form-control" name="price" min="0.01" step="0.01" value="{{ $membership->price ?? old('price') }}">
</div>

