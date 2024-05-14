<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Hello ini File view laravel pertama</h1>
    {{-- <img src="{{ asset('images/foto3.jpg') }}" alt="Foto"> --}}
    
    @php
       $nama ='Budi';
       $nilai =59.00;
    @endphp

    {{--Struktur Kendali IF--}}

    @if($nilai >= 76)
    @php $ket ='lulus';@endphp
    @else
    @php $ket ='tidak lulus';@endphp
    @endif
    <p>Nama : {{$nama}} </p>
    <p>Nilai : {{$nilai}} </p>
    <p>Keterangan : {{$ket}} </p>


</body>
</html>