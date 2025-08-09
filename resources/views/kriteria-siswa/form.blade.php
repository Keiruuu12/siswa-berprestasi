@csrf
<div>
    <div class="row mb-3">
        <label for="siswa_id" class="col-md-3 col-form-label text-md-end">Nama Siswa</label>
        <div class="col-md-4">
            @if ($tombol=='Update')
            <div class="col-md-12">
                <input type="text" value="{{ $kriteriaSiswa->siswa->nis  }} ({{ $kriteriaSiswa->siswa->nama }})" class="form-control" disabled>
                <small><i>Tidak Bisa Diubah Di Form Ini</i></small>
            </div>
            <input type="hidden" name="siswa_id" id="siswa_id" value="{{ $kriteriaSiswa->siswa_id }}">
            
            @else
            <select name="siswa_id" id="siswa_id" class="form-control @error('siswa_id') is-invalid @enderror">
                @foreach ($siswas as $siswa)
                @if ($siswa->id == (old('siswa_id') ?? $kriteriaSiswa->siswa_id ?? ''))
                <option value="{{ $siswa->id }}" selected>{{ $siswa->nis }} ({{ $siswa->nama }})</option>
                @else
                <option value="{{ $siswa->id }}">{{ $siswa->nis }} ({{ $siswa->nama }})</option>
                @endif
                @endforeach
            </select>
            @error('siswa_id')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @endif
        </div>
    </div>
</div>

<div>
    <div class="row mb-3">
        <label for="olimpiade" class="col-sm-6 col-md-3 col-form-label text-md-end">Olimpiade</label>
        <div class="col-md-4">
            <input type="number" id="olimpiade" name="olimpiade" class="form-control @error('olimpiade') is-invalid @enderror" value="{{ old('olimpiade') ?? $kriteriaSiswa->olimpiade ?? '' }}">
            @error('olimpiade')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div>
    <div class="row mb-3">
        <label for="nilai_rata" class="col-sm-6 col-md-3 col-form-label text-md-end">Nilai Rata-rata</label>
        <div class="col-md-4">
            <input type="number" id="nilai_rata" name="nilai_rata" class="form-control @error('nilai_rata') is-invalid @enderror" value="{{ old('nilai_rata') ?? $kriteriaSiswa->nilai_rata ?? '' }}" min="0" max="100">
            @error('nilai_rata')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div>
    <div class="row mb-3">
        <label for="sikap" class="col-sm-6 col-md-3 col-form-label text-md-end">Sikap</label>
        <div class="col-md-4">
            <select name="sikap" id="sikap" class="form-select @error('sikap') is-invalid @enderror">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
            @error('sikap')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

<div>
    <div class="row mb-3">
        <label for="kehadiran" class="col-sm-6 col-md-3 col-form-label text-md-end">Kehadiran</label>
        <div class="col-md-4">
            <input type="number" id="kehadiran" name="kehadiran" class="form-control @error('kehadiran') is-invalid @enderror" value="{{ old('kehadiran') ?? $kriteriaSiswa->kehadiran ?? '' }}" min="0" max="100">
            @error('kehadiran')
                <span>
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

@isset($kriteriaSiswa)
    <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous() }}">
@else
    <input type="hidden" name="url_asal" value="{{ old('url_asal') ?? url()->previous() }}">
@endisset

<div >
    <div class="col-md-6 offset-md-3">
        <button type="submit" class="btn btn-primary" >{{ $tombol }}</button>
    </div>
</div>