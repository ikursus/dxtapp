<div class="form-group">
    <label for="">NAMA</label>
    <input type="text" class="form-control" name="name" value="{{ $user->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">USERNAME</label>
    <input type="text" class="form-control" name="username" value="{{ $user->username ?? old('username') }}">
</div>

<div class="form-group">
    <label for="">EMAIL</label>
    <input type="email" class="form-control" name="email" value="{{ $user->email ?? old('email') }}">
</div>

<div class="form-group">
    <label for="">PASSWORD</label>
    <input type="password" class="form-control" name="password">
</div>

<div class="form-group">
    <label for="">STATUS</label>
    <select name="status" class="form-control">
        <option value="">--PILIH STATUS--</option>
        @if (isset($user))
        <option value="active" {{ $user->status=='active' ? 'selected="selected"' : null }}>ACTIVE</option>
        <option value="pending" {{ $user->status=='pending' ? 'selected="selected"' : null }}>PENDING</option>
        <option value="banned" {{ $user->status=='banned' ? 'selected="selected"' : null }}>BANNED</option>
        @else
        <option value="active">ACTIVE</option>
        <option value="pending">PENDING</option>
        <option value="banned">BANNED</option>
        @endif

    </select>
</div>
