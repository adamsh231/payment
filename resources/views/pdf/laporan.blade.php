<head>
    <title>Laporan Gaji</title>
    <style>
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<h1 style="text-align: center">LAPORAN GAJI</h1>
<p>Waroeng Spesial Sambal "SS"</p>
<p style="text-align: right">Periode:  {{ $periode }}</p>

@php
    $divider = 20;
    $jml_data = count($gaji);
@endphp
@for ($i = 0; $i < ($jml_data/$divider); $i++)
<table @if($i < (($jml_data/$divider)-1)) class="page-break" @endif border="1" style="border-collapse: collapse; width: 100%;">
    <tbody>
        <tr style="height: 20px;">
            <th style="width: 3%; text-align: center; height: 20px;">No</th>
            <th style="width: 13%; text-align: center; height: 20px;">ID Karyawan</th>
            <th style="width: 30%; text-align: center; height: 20px;">Nama Karyawan</th>
            <th style="width: 15%; text-align: center; height: 20px;">Jabatan</th>
            <th style="width: 12%; text-align: center; height: 20px;">Periode</th>
            <th style="width: 15%; text-align: center; height: 20px;">Jumlah</th>
        </tr>
        @for ($j = ($i*$divider); $j < ($i*$divider+$divider); $j++)
        @if ($j >= count($gaji))
            @break
        @endif
        <tr style="height: 20px;">
            <td style="text-align: center; height: 20px;">{{ ($j+1) }}</td>
            <td style="text-align: center; height: 20px;">{{ $gaji[$j]->karyawan->id }}</td>
            <td style="height: 20px;">{{ $gaji[$j]->karyawan->name }}</td>
            <td style="height: 20px;">{{ $gaji[$j]->karyawan->jabatan->name }}</td>
            <td style="text-align: center; height: 20px;">{{ date('M Y', strtotime($gaji[$j]->period)) }}</td>
            <td style="text-align: right; height: 20px;">{{ "Rp " . number_format($gaji[$j]->total,2,',','.') }}</td>
        </tr>
        @endfor
    </tbody>
</table>
@endfor

<p style="text-align: right">Total :&nbsp;&nbsp;&nbsp;<b>{{ "Rp " . number_format($gaji->sum('total'),2,',','.') }}</b></p>

<p></p>
<table border="0" style="width: 100%; border-collapse: collapse;">
    <tbody>
        <tr>
            <td style="width: 50%;">
                <p style="text-align: center;margin-top: 50px">Petugas</p>
                <p style="text-align: center;margin-top: 100px">(........................)</p>
            </td>
            <td style="width: 50%;">
                <p style="text-align: center;">{{ date('d M Y') }}</p>
                <p style="text-align: center;">Owner</p>
                <p style="text-align: center;margin-top: 100px">(........................)</p>
            </td>
        </tr>
    </tbody>
</table>
