<head>
    <title>Slip Gaji</title>
</head>
@php
$harian = $karyawan->presensi->sum('worktime') * $karyawan->jabatan->worktime;
$lembur = $karyawan->presensi->sum('overtime') * $karyawan->jabatan->overtime;
$makan = $karyawan->presensi->sum('worktime') * $karyawan->jabatan->food;
$transport = $karyawan->presensi->sum('worktime') * $karyawan->jabatan->transport;
$total = $harian + $lembur + $makan + $transport;
@endphp
<table border="3" style="width: 100%; border-collapse: collapse;">
    <tbody>
        <tr>
            <td style="width: 100%;">
                <table border="0" style="height: 50px; width: 100%; border-collapse: collapse;">
                    <tbody>
                        <tr style="height: 50px;">
                            <td style="width: 33.3333%; height: 50px;">
                                <p><strong>Waroeng Super Sambal "SS"</strong></p>
                                <p style="font-size: 15px; margin-bottom: 0px">Jl. Kolonel Ahmad Syam, Jawa Barat</p>
                                <p style="font-size: 15px; margin-top: 0px; margin-bottom: 0px">Telp 08562575039</p>
                            </td>
                            <td style="width: 33.3333%; height: 50px; text-align: center;">
                                <h1><strong>SLIP GAJI</strong></h1>
                            </td>
                            <td style="width: 33.3333%; height: 50px;">
                                <p style="font-size: 15px; margin-top: 0px; margin-bottom: 0px">Tanggal&nbsp; &nbsp; &nbsp; &nbsp; : {{ date('d/m/Y', strtotime($tahun.'-'.$bulan.'-01')) }}</p>
                                @foreach ($karyawan->gaji as $kg)
                                <p style="font-size: 15px; margin-top: 3px; margin-bottom: 0px">ID Gaji&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $kg->id }}</p>
                                @endforeach
                                <p style="font-size: 15px; margin-top: 3px; margin-bottom: 0px">ID Pegawai &nbsp; : {{ $karyawan->id }}</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 33.3333%;" colspan="3">
                                <hr />
                                <table border="0" style="width: 100%; border-collapse: collapse;">
                                    <tbody>
                                        <tr>
                                            <td style="width: 50%;">
                                                <p style="margin-left: 20px">Nama&nbsp; &nbsp; &nbsp;: {{ $karyawan->name }}</p>
                                                <p style="margin-left: 20px">Jabatan&nbsp; : {{ $karyawan->jabatan->name }}</p>
                                            </td>
                                            <td style="width: 50%;">
                                                {{-- <p>Alamat&nbsp; &nbsp;:</p> --}}
                                                <p>Telepon&nbsp; : {{ $karyawan->phone }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%;" colspan="2">
                                                <hr />
                                                <table border="0" style="width: 100%; border-collapse: collapse; margin-left: auto; margin-right: auto;">
                                                    <tbody>
                                                        <tr style="height: 20px;">
                                                            <td style="width: 23.3476%; height: 20px; text-align: center;">NO</td>
                                                            <td style="width: 36.4716%; height: 20px; text-align: left;">KETERANGAN</td>
                                                            <td style="width: 40.1807%; height: 20px; text-align: left;">JUMLAH</td>
                                                        </tr>
                                                        <tr style="height: 188px;">
                                                            <td style="width: 99.9999%; text-align: center; height: 188px;" colspan="3">
                                                                <hr />
                                                                <table border="0" style="height: 60px; width: 100%; border-collapse: collapse;">
                                                                    <tbody>
                                                                        <tr style="height: 20px;">
                                                                            <td style="width: 23.5302%; height: 20px; text-align: center;">1</td>
                                                                            <td style="width: 36.1852%; height: 20px; text-align: left;">Gaji Harian</td>
                                                                            <td style="width: 40.2845%; height: 20px; text-align: left;">{{ "Rp " . number_format($harian,2,',','.') }}</td>
                                                                        </tr>
                                                                        <tr style="height: 20px;">
                                                                            <td style="width: 23.5302%; height: 20px; text-align: center;">2</td>
                                                                            <td style="width: 36.1852%; height: 20px; text-align: left;">Gaji Lembur</td>
                                                                            <td style="width: 40.2845%; height: 20px; text-align: left;">{{ "Rp " . number_format($lembur,2,',','.') }}</td>
                                                                        </tr>
                                                                        <tr style="height: 20px;">
                                                                            <td style="width: 23.5302%; height: 20px; text-align: center;">3</td>
                                                                            <td style="width: 36.1852%; height: 20px; text-align: left;">Tunjangan Makan</td>
                                                                            <td style="width: 40.2845%; height: 20px; text-align: left;">{{ "Rp " . number_format($makan,2,',','.') }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 23.5302%; text-align: center;">4</td>
                                                                            <td style="width: 36.1852%; text-align: left;">Tunjangan Transport</td>
                                                                            <td style="width: 40.2845%; text-align: left;">{{ "Rp " . number_format($transport,2,',','.') }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 23.5302%;"></td>
                                                                            <td style="width: 36.1852%;"></td>
                                                                            <td style="width: 40.2845%;">
                                                                                <hr />
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 23.5302%;"></td>
                                                                            <td style="width: 36.1852%;"></td>
                                                                            <td style="width: 40.2845%; text-align: left;">{{ "Rp " . number_format($total,2,',','.') }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 23.5302%;" colspan="3">
                                                                                <hr />
                                                                                <table border="0" style="width: 100%; border-collapse: collapse;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="width: 28.0563%; text-align: center">
                                                                                                <p style="margin-top: 80px">Penerima</p>
                                                                                                <p style="margin-top: 100px">{{ $karyawan->name }}</p>
                                                                                            </td>
                                                                                            <td style="width: 31.7501%;">
                                                                                                <p style="text-align: right;margin-bottom: 203px"><strong>TOTAL DITERIMA</strong></p>
                                                                                            </td>
                                                                                            <td style="width: 40.1935%;">
                                                                                                <p style="text-align: left;margin-bottom: 50px; margin-left: 25px">{{ "Rp " . number_format($total,2,',','.') }}</p>
                                                                                                <p style="text-align: center;margin-top: 50px">{{ date('d M Y', strtotime($tahun.'-'.$bulan.'-01')) }}</p>
                                                                                                <p style="text-align: center;margin-top: 100px">Waroeng Super Sambal "SS"</p>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td style="width: 99.9999%;" colspan="3"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </tbody>
</table>
