@csrf
<div>
    <div class="row mb-3">
        <label for="nama" class="col-sm-6 col-md-3 col-form-label text-md-end">Nama Siswa</label>
        <div class="col-md-4">
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') ?? $siswa->nama ?? '' }}" autofocus>
            @error('nama')
            <span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div>
    <div class="row mb-3">
        <label for="nis" class="col-sm-6 col-md-3 col-form-label text-md-end">Nomor Induk Siswa</label>
        <div class="col-md-4">
            <input type="text" class="form-control @error('nis') is-invalid @enderror" id="nis" name="nis" value="{{ old('nis') ?? $siswa->nis ?? '' }}">
            @error('nis')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div>
    <div class="row mb-3">
        <label for="kelas" class="col-sm-6 col-md-3 col-form-label text-md-end">Kelas</label>
        <div class="col-md-4">
            <select name="kelas" id="kelas" class="form-control @error('kelas') is-invalid @enderror">
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            @error('kelas')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

@isset($siswa)
    <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous().'#row-'.$siswa->id }}">
@else
    <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous() }}">
@endisset

<div>
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    </div>
</div>