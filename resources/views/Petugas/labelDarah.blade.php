<!DOCTYPE html>
<html>
<head>
    <title>Label Darah</title>
</head>
<body onload="window.print()" style="font-family: Arial; text-align:center;">

    <h3>HEMOTRACK</h3>

    {!! QrCode::size(180)->generate(route('darah.scan', $darah->id)) !!}

    <p><b>Golongan:</b> {{ $darah->golongan }}{{ $darah->rhesus }}</p>
   <p><b>Komponen:</b> {{ $darah->jenis_komponen }}</p>
    <p><b>Asal:</b> {{ $darah->asal_darah }}</p>
    <p><b>Kedaluwarsa:</b> {{ $darah->tanggal_kedaluwarsa }}</p>

</body>
</html>