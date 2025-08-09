<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $kOlimpiade }}</h1>
    <h1>{{ $kNilaiRata }}</h1>
    <h1>{{ $kSikap }}</h1>
    <h1>{{ $kKehadiran }}</h1>
    <h1>total = {{ $kOlimpiade + $kNilaiRata + $kSikap + $kKehadiran }}</h1>

    <table>
        <tr>
            <th>Nama</th>
            <th>Olimpiade</th>
            <th>Nilai Rata</th>
            <th>Sikap</th>
            <th>Kehadiran</th>
        </tr>
        @foreach ($kriteriaSiswas as $kriteriaSiswa)
        <tr>
            <td>{{ $kriteriaSiswa->siswa->nama }}</td>
            <td>{{ $kriteriaSiswa->olimpiade }}</td>
            <td>{{ $kriteriaSiswa->nilai_rata }}</td>
            <td>{{ $kriteriaSiswa->sikap }}</td>
            <td>{{ $kriteriaSiswa->kehadiran }}</td>
        </tr>
        @endforeach
    </table>

    {{-- <small>
        <strong>{{ dd($maxSikap) }}</strong>
    </small> --}}

    <table>
        @foreach ($sikaps as $sikap) 
        <tr>
            <th>{{ $sikap }}</th>
        </tr>
        @endforeach
        @foreach ($nilaiRatas as $nilaiRata) 
        <tr>
            <th>{{ $nilaiRata }}</th>
        </tr>
        @endforeach
        @foreach ($olimpiades as $olimpiade) 
        <tr>
            <th>{{ $olimpiade }}</th>
        </tr>
        @endforeach
    </table>
    <h1>Normalisasi</h1>
    <table>
        <tr>
            <th>Siswa</th>
            <th>Olimpiade</th>
            <th>Nilai Rata</th>
            <th>Sikap</th>
            <th>Kehadiran</th>
        </tr>
        @for ($i=0; $i < count($nSiswas); $i++)
        <tr>
            <td>{{ $hSiswas[$i] }}</td>
            <td>{{ $nOlimpiades[$i] }}</td>
            <td>{{ $nNilaiRatas[$i] }}</td>
            <td>{{ $nSikaps[$i] }}</td>
            <td>{{ $nKehadirans[$i] }}</td>
        </tr>    
        @endfor
    </table>
    
        <h1>{{ dd($hasilAkhir) }}</h1>
</body>
</html>