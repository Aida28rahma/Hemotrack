@extends('layouts.app')

@section('content')

<style>

/* ====================
<<<<<<< Updated upstream
NORMAL (HALAMAN PERTAMA)
==================== */

table{

width:100%;
border-collapse:collapse;

}


table th,
table td{

border:1px solid #ddd;
padding:14px;
font-size:15px;

}


table th{

background:#16b5aa;
color:white;
font-size:15px;
font-weight:600;

=======
PREVIEW (HALAMAN PERTAMA)
KECILKAN FONT
==================== */

table{
width:100%;
border-collapse:collapse;
}

table th,
table td{
border:1px solid #ddd;
padding:8px;
font-size:9px;
}

table th{
background:#16b5aa;
color:white;
font-size:9px;
font-weight:500;
>>>>>>> Stashed changes
}



/* ====================
KHUSUS PRINT
HALAMAN KEDUA
<<<<<<< Updated upstream
=======
JANGAN DIUBAH
>>>>>>> Stashed changes
==================== */

@media print{

aside,
nav,
header,
footer,
.sidebar,
.hide-print,
button{
<<<<<<< Updated upstream

display:none !important;

}


body *{

visibility:hidden;

}


.print-area,
.print-area *{

visibility:visible;

}


.print-area{

position:absolute;
top:0;
left:0;

width:100%;

padding:10px;

background:white;

zoom:75%; /* kecilkan khusus print */

}



/* kecilkan header */

.print-area h1{

font-size:24px !important;

}


.print-area h2{

font-size:18px !important;

}



/* kecilkan isi */

.print-area p,
.print-area td,
.print-area th{

font-size:11px !important;

}



/* logo */

.print-area img{

width:50px !important;
height:50px !important;

}



/* tabel */

.print-area table th,
.print-area table td{

padding:8px !important;

}


}




=======
display:none !important;
}

body *{
visibility:hidden;
}

.print-area,
.print-area *{
visibility:visible;
}

.print-area{
position:absolute;
top:0;
left:0;
width:100%;
padding:10px;
background:white;
zoom:75%;
}


/* ukuran print tetap */

.print-area h1{
font-size:24px !important;
}

.print-area h2{
font-size:18px !important;
}

.print-area p,
.print-area td,
.print-area th{
font-size:11px !important;
}

.print-area img{
width:50px !important;
height:50px !important;
}

.print-area table th,
.print-area table td{
padding:8px !important;
}

}

>>>>>>> Stashed changes
</style>




<div class="p-6">


<!-- FILTER -->

<div class="bg-white rounded-3xl shadow p-5 mb-5 hide-print">

<<<<<<< Updated upstream

<h1 class="text-3xl font-bold text-teal-700">
=======
<h1 class="text-2xl font-bold text-teal-700">
>>>>>>> Stashed changes

Cetak Laporan

</h1>


<<<<<<< Updated upstream
<p class="text-gray-500">
=======
<p class="text-gray-500 text-sm">
>>>>>>> Stashed changes

Pilih periode laporan

</p>



<div class="grid grid-cols-4 gap-4 mt-5">


<input
type="date"
class="border rounded p-2">


<input
type="date"
class="border rounded p-2">


<select class="border rounded p-2">

<option>Semua Golongan</option>

<option>A</option>
<option>B</option>
<option>AB</option>
<option>O</option>

</select>


<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
<select class="border rounded p-2">

<option>PRC</option>

</select>


</div>



<div class="flex justify-end mt-5">

<button
onclick="window.print()"
class="bg-teal-600 text-white px-5 py-2 rounded-xl">

🖨 Cetak

</button>

</div>

</div>






<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
<!-- LAPORAN -->

<div class="print-area bg-white rounded-[35px] shadow border p-8">


<h2 class="

<<<<<<< Updated upstream
text-2xl
font-bold
text-teal-700
mb-6
=======
text-lg
font-bold
text-teal-700
mb-5
>>>>>>> Stashed changes
hide-print

">

Preview Laporan

</h2>





<!-- HEADER -->

<<<<<<< Updated upstream
<div class="grid grid-cols-3 border-b pb-6">
=======
<div class="grid grid-cols-3 border-b pb-5">
>>>>>>> Stashed changes


<!-- kiri -->

<<<<<<< Updated upstream
<div class="flex gap-4">
=======
<div class="flex gap-3">
>>>>>>> Stashed changes


<img

src="{{ asset('logo.png') }}"

style="
<<<<<<< Updated upstream

width:70px;
height:70px;
object-fit:contain;

"

>


=======
width:45px;
height:45px;
object-fit:contain;
"


>



>>>>>>> Stashed changes
<div>


<h2 class="

font-bold
<<<<<<< Updated upstream
text-teal-700
text-[22px]
=======
text-teal-600
text-[13px]
>>>>>>> Stashed changes

">

UNIT BANK DARAH

</h2>


<<<<<<< Updated upstream
<p class="font-bold text-[16px]">
=======
<p class="font-bold text-[10px]">
>>>>>>> Stashed changes

RSUD KELOMPOK 4 KKPMT

</p>


<<<<<<< Updated upstream
<p class="text-[14px]">
=======
<p class="text-[9px]">
>>>>>>> Stashed changes

Jl.Regu Tulip no 666

</p>


<<<<<<< Updated upstream
<p class="text-[14px]">
=======
<p class="text-[9px]">
>>>>>>> Stashed changes

Kabupaten Jember

</p>


<<<<<<< Updated upstream
<p class="text-[14px]">
=======
<p class="text-[9px]">
>>>>>>> Stashed changes

Telp.0211234567

</p>


</div>

</div>






<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
<!-- tengah -->

<div class="text-center">


<h1 class="

font-bold
<<<<<<< Updated upstream
text-[34px]
=======
text-[18px]
>>>>>>> Stashed changes
leading-tight

">

LAPORAN UNIT

<br>

BANK DARAH


</h1>



<<<<<<< Updated upstream
<p class="text-[15px] mt-3">
=======
<p class="text-[10px] mt-2">
>>>>>>> Stashed changes

Periode :

1 Januari 2026

—

31 Januari 2026


</p>


</div>






<<<<<<< Updated upstream
<!-- kanan -->

<div class="text-right text-[14px]">
=======

<!-- kanan -->

<div class="text-right text-[9px]">
>>>>>>> Stashed changes


Tanggal Cetak:

20/02/2026


<br><br>


Waktu:

10:30


</div>


</div>








<<<<<<< Updated upstream
<!-- TABEL MASUK -->

<div class="mt-10">
=======

<!-- TABEL MASUK -->

<div class="mt-8">
>>>>>>> Stashed changes


<h2 class="

font-bold
<<<<<<< Updated upstream
text-[28px]
text-teal-700
mb-5
=======
text-[15px]
text-teal-700
mb-4
>>>>>>> Stashed changes

">

1. Rincian Kantung Darah Masuk


</h2>



<table class="text-center">


<thead>

<tr>

<th>No</th>
<th>Golongan</th>
<th>Rhesus</th>
<th>Jenis Komponen</th>
<th>Asal Darah</th>
<th>Jumlah</th>

</tr>

</thead>



<tbody>

@foreach([1,2,3,4] as $i)

<tr>

<td>{{$i}}</td>
<td>A</td>
<td>Negatif(-)</td>
<td>PRC</td>
<td>PMI</td>
<td>20</td>

</tr>

@endforeach


</tbody>

</table>

</div>









<!-- TABEL KELUAR -->

<div class="mt-10">


<h2 class="

font-bold
<<<<<<< Updated upstream
text-[28px]
text-teal-700
mb-5
=======
text-[15px]
text-teal-700
mb-4
>>>>>>> Stashed changes

">

2. Rincian Kantung Darah Keluar


</h2>



<table class="text-center">


<thead>

<tr>

<th>No</th>
<th>Golongan</th>
<th>Rhesus</th>
<th>Jenis Komponen</th>
<th>Poli</th>
<th>Jumlah</th>

</tr>

</thead>



<tbody>

@foreach([1,2,3,4] as $i)

<tr>

<td>{{$i}}</td>
<td>A</td>
<td>Negatif(-)</td>
<td>PRC</td>
<td>Bedah</td>
<td>13</td>

</tr>

@endforeach


</tbody>

</table>

</div>






<<<<<<< Updated upstream
=======


>>>>>>> Stashed changes
<div class="flex justify-end mt-8 hide-print">


<button

onclick="window.print()"

class="

bg-gray-100
border
px-6
py-3
rounded-xl

"

>

🖨 Cetak

</button>


</div>



</div>


</div>


@endsection