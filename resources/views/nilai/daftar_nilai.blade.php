<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ini adalah File Kedua</h1>
    @php
    $no =1;
    $s1 = ['nama'=> 'Fawaz', 'nilai' =>70];
    $s2 =['nama'=> 'Muhammad', 'nilai' => 95];
    $s3 =['nama'=> 'andi', 'nilai' => 75];
    $s4 =['nama'=> 'michi', 'nilai' => 85];
    $s5 =['nama'=> 'mica', 'nilai' => 80];
    $judul = ['No','Nama','Nilai','Keterangan'];

    $siswa = [$s1,$s2,$s3,$s4,$s5]
    
    @endphp
    {{-- <table border="1" cellpadding="10" align="center">
        <tr>
            @foreach ($judul as $j)
                <th>{{$j}}</th>
            @endforeach
        </tr>
        @foreach($siswa as $d)
        <tr>
            <td>{{$no++}}</td>
            <td>{{$d['nama']}}</td>
            <td>{{$d['nilai']}}</td>
            @if ($d['nilai']>=85)
                <td>Lulus</td>    
            @else
                <td>Tidak Lulus</td>    
            @endif
            
        </tr>  
        @endforeach
        
    </table> --}}
    <table border="1" cellpadding="10" align="center">

        <thead>
            <tr>
                @foreach ($judul as $j)
                    <th>{{$j}}</th>
                @endforeach
            </tr>
        </thead>
        <tbody">
            @foreach($siswa as $d)
            @php
            $ket =($d['nilai']>=60 ? 'Lulus'  : 'Tidak Lulus');
            $warna = ($no % 2==1) ? 'Green' :  'Red';
            @endphp
            <tr style="background-color: {{$warna}}; font-weight: bold;">
                <td>{{$no++}}</td>
                <td>{{$d['nama']}}</td>
                <td>: {{$d['nilai']}}</td>
                <td>: {{$ket}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>