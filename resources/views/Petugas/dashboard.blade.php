@extends('layouts.app')

@section('content')

<div class="bg-gray-100 min-h-screen p-5">

<div class="
bg-[#f4f4f4]
rounded-[25px]
shadow-[0_8px_25px_rgba(0,0,0,0.18)]
p-5
w-full">


<!-- NOTIFIKASI -->

<div class="
bg-white
rounded-xl
shadow-[0_4px_12px_rgba(0,0,0,0.18)]
px-5
py-3
mb-5
flex
justify-between">

<span class="font-bold">
🔔 Notifikasi Stok
</span>

<span class="text-red-500 font-semibold">
*Stok O hampir habis
</span>

</div>



<!-- CARD -->

<div class="grid grid-cols-4 gap-4 mb-5">

@foreach([
['title'=>'Total Pendonor','value'=>80],
['title'=>'Distribusi Hari Ini','value'=>20],
['title'=>'Stok Darah','value'=>80],
['title'=>'Permintaan','value'=>10]
] as $card)

<div class="
bg-white
rounded-2xl
shadow-[0_6px_15px_rgba(0,0,0,0.2)]
p-4
flex
justify-between
items-center">

<div>

<p class="text-red-700 text-xl">
🩸
</p>

<p class="font-bold text-red-800 text-sm">
{{ $card['title'] }}
</p>

</div>


<div class="
bg-teal-800
text-white
px-3
py-1
rounded">

{{ $card['value'] }}

</div>

</div>

@endforeach

</div>






<!-- GRAFIK + KANAN -->

<div class="grid grid-cols-5 gap-5 items-stretch">



<!-- GRAFIK -->

<div class="
col-span-2
bg-white
rounded-2xl
shadow-[0_8px_20px_rgba(0,0,0,0.18)]
p-5
h-full">

<h2 class="
font-bold
text-2xl
mb-8">

Grafik Stok Darah

</h2>



<div class="
flex
items-end
justify-evenly
h-[420px]">


<div class="
bg-red-800
w-12
h-[220px]
rounded-sm">
</div>


<div class="
bg-red-800
w-12
h-[330px]
rounded-sm">
</div>


<div class="
bg-red-800
w-12
h-[260px]
rounded-sm">
</div>


<div class="
bg-red-800
w-12
h-[150px]
rounded-sm">
</div>


</div>




<div class="
flex
justify-evenly
mt-5">

<span>A</span>
<span>B</span>
<span>AB</span>
<span>O</span>

</div>

</div>








<!-- DISTRIBUSI + PERMINTAAN -->

<div class="
col-span-3
flex
flex-col
gap-5
h-full">



<!-- DISTRIBUSI -->

<div class="
bg-white
rounded-2xl
shadow-[0_8px_20px_rgba(0,0,0,0.18)]
p-5
flex-1">

<h2 class="
font-bold
text-2xl
mb-5">

Distribusi

</h2>


<div class="flex justify-between items-center">

<p>
dr. Fajri Alfahri - B+ - 3 Kantong
</p>

<span class="text-green-500 font-bold">

Diterima

</span>

</div>

<hr class="my-4">


<div class="flex justify-between items-center">

<p>
dr. Diska Fatiha - AB+ - 1 Kantong
</p>

<span class="text-red-500 font-bold">

Ditolak

</span>

</div>


<hr class="my-4">


<div class="flex justify-between items-center">

<p>
dr. Rizky Saputra - O+ - 2 Kantong
</p>

<span class="text-yellow-500 font-bold">

Diproses

</span>

</div>

</div>








<!-- PERMINTAAN -->

<div class="
bg-white
rounded-2xl
shadow-[0_8px_20px_rgba(0,0,0,0.18)]
p-5
flex-1">


<h2 class="
font-bold
text-2xl
mb-5">

Permintaan

</h2>



<div class="
flex
justify-between
items-center">

<p>

dr. Bayu Bimasena - A+ - 2 Kantong

</p>

<span class="
text-yellow-500
font-bold">

Diproses

</span>

</div>



<hr class="my-4">




<div class="
flex
justify-between
items-center">

<p>

dr. Budi Utomo - O− - 1 Kantong

</p>

<span class="
text-green-500
font-bold">

Diterima

</span>

</div>



<hr class="my-4">




<div class="
flex
justify-between
items-center">

<p>

dr. Andini Putri - AB+ - 4 Kantong

</p>

<span class="
text-red-500
font-bold">

Ditolak

</span>

</div>


</div>



</div>

</div>



</div>

@endsection