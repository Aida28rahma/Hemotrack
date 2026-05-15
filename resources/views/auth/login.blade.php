<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Login Hemotrack</title>

@vite('resources/css/app.css')

<link
href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700;800&display=swap"
rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<style>

body{
font-family:'Poppins',sans-serif;
}


/* ===================
ANIMASI LOGO + HEMOTRACK
=================== */

@keyframes floating{

0%{
transform:
translateY(0px);
}

50%{
transform:
translateY(-10px);
}

100%{
transform:
translateY(0px);
}

}


.group-animation{

animation:
floating 2.5s ease-in-out infinite;

}

</style>

</head>



<body class="
min-h-screen
flex
justify-center
items-center

bg-gradient-to-br

from-[#005f5f]

via-[#147d77]

to-[#3ba6a1]
">



<div class="
bg-[#f5f5f5]
w-[500px]
rounded-3xl
shadow-2xl
p-10
">



<!-- LOGO + HEMOTRACK -->

<div class="group-animation">


<div class="flex justify-center">

<div class="
bg-white
rounded-full
p-4
border-[6px]
border-teal-700
shadow-xl">

<img
src="/logo.png"

class="w-24 h-24">

</div>

</div>




<div class="text-center mt-6">

<h1 class="
text-5xl
font-extrabold
bg-gradient-to-r
from-[#006d68]
via-[#11938d]
to-[#43bdb6]
bg-clip-text
text-transparent
tracking-wide">

HEMOTRACK

</h1>

</div>

</div>



<!-- TULISAN DIAM -->

<p class="
text-gray-700
text-sm
font-medium
mt-3
text-center">

Sistem Informasi Pengelolaan
Stok Darah Rumah Sakit

</p>






<form
method="POST"
action="{{ route('login') }}"
class="mt-10">

@csrf




<!-- EMAIL -->

<label class="
font-semibold
text-teal-900">

Email :

</label>



<div class="
flex
items-center
border-2
border-teal-700
rounded-xl
px-4
py-4
mt-2
bg-white">

<i class="
fa fa-user
text-gray-500
mr-4">

</i>


<input

type="email"

name="email"

placeholder="Nama@gmail.com"

class="
w-full
outline-none
border-none
focus:ring-0
bg-transparent">

</div>







<!-- PASSWORD -->

<label class="
font-semibold
text-teal-900
mt-6
block">

Password :

</label>



<div class="
flex
items-center
border-2
border-teal-700
rounded-xl
px-4
py-4
mt-2
bg-white">

<i class="
fa fa-lock
text-gray-500
mr-4">

</i>



<input

id="password"

type="password"

name="password"

placeholder="Masukkan Password"

class="
w-full
outline-none
border-none
focus:ring-0
bg-transparent">


<!-- ICON MATA -->

<i

id="togglePassword"

class="
fa fa-eye
cursor-pointer
text-gray-500
hover:text-teal-700">

</i>


</div>








<!-- BUTTON -->

<button

type="submit"

class="
w-full

bg-[#065f5b]

hover:bg-[#044946]

transition-all

duration-300


text-white

py-4

rounded-xl

mt-10

text-xl

font-semibold

shadow-lg

hover:scale-105">

Mulai

</button>



</form>



</div>





<!-- SCRIPT SHOW/HIDE PASSWORD -->

<script>

const togglePassword =
document.getElementById(
'togglePassword'
);

const password =
document.getElementById(
'password'
);



togglePassword.addEventListener(

'click',

function(){


const type =

password.getAttribute(
'type'
)

=== 'password'

? 'text'

: 'password';



password.setAttribute(
'type',
type
);



this.classList.toggle(
'fa-eye'
);


this.classList.toggle(
'fa-eye-slash'
);


}

);

</script>



</body>
</html>