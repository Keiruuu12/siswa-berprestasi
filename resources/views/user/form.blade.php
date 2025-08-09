@csrf
<div>
    <div class="row mb-3">
        <label for="name" class="col-sm-6 col-md-3 col-form-label text-md-end">Username</label>
        <div class="col-md-4">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $user->name ?? '' }}" autofocus>
            @error('name')
            <span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div>
    <div class="row mb-3">
        <label for="email" class="col-sm-6 col-md-3 col-form-label text-md-end">Email</label>
        <div class="col-md-4">
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $user->email ?? '' }}">
            @error('email')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div>
    <div class="row mb-3">
        <label for="password" class="col-sm-6 col-md-3 col-form-label text-md-end">Password</label>
        <div class="col-md-4">
            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') ?? $user->password ?? '' }}">
            @error('password')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div>
    <div class="row mb-3">
        <label for="role_id" class="col-sm-6 col-md-3 col-form-label text-md-end">Role</label>
        <div class="col-md-4">
            <select name="role_id" id="role" class="form-control @error('role_id') is-invalid @enderror">
                <option value="">Pilih Role</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                @endforeach
            </select>
            @error('role_id')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

@isset($user)
    <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous().'#row-'.$user->id }}">
@else
    <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous() }}">
@endisset

<div>
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
</div>