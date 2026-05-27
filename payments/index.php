<?php

session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
Razorpay Payment
</title>

<!-- Tailwind -->

<script src="https://cdn.tailwindcss.com"></script>

<!-- Razorpay -->

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<!-- Font -->

<link
href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
rel="stylesheet"
>

<style>

*{

margin:0;
padding:0;
box-sizing:border-box;
}

body{

font-family:'Inter',sans-serif;

background:
radial-gradient(circle at top left,#7c3aed,transparent 25%),
radial-gradient(circle at bottom right,#06b6d4,transparent 25%),
#020617;

min-height:100vh;

display:flex;

align-items:center;

justify-content:center;

color:white;
}

.glass{

background:rgba(255,255,255,0.05);

backdrop-filter:blur(20px);

border:1px solid rgba(255,255,255,0.08);

box-shadow:
0 8px 32px rgba(0,0,0,0.3);
}

</style>

</head>

<body>

<!-- CARD -->

<div
class="
glass
w-[700px]
rounded-3xl
p-10
"
>

<!-- HEADER -->

<div
class="
flex
justify-between
items-center
"
>

<div>

<h1
class="
text-5xl
font-extrabold
"
>

Course Payment

</h1>

<p
class="
text-slate-300
mt-4
text-lg
leading-8
"
>

Securely pay course fees using Razorpay 💳

</p>

</div>

<img
src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
width="100"
>

</div>

<!-- COURSE CARD -->

<div
class="
mt-10
bg-white/5
rounded-3xl
p-8
"
>

<div
class="
flex
justify-between
items-center
"
>

<div>

<h2
class="
text-3xl
font-bold
"
>

Full Stack Development

</h2>

<p
class="
text-slate-400
mt-3
"
>

Premium Course Access

</p>

</div>

<div
class="
text-5xl
font-extrabold
text-cyan-400
"
>

₹999

</div>

</div>

<!-- FEATURES -->

<div
class="
grid
grid-cols-2
gap-6
mt-10
"
>

<div
class="
bg-white/5
p-5
rounded-2xl
"
>

🎥 Live Classes

</div>

<div
class="
bg-white/5
p-5
rounded-2xl
"
>

📄 Notes & PDFs

</div>

<div
class="
bg-white/5
p-5
rounded-2xl
"
>

🧠 AI Mentor

</div>

<div
class="
bg-white/5
p-5
rounded-2xl
"
>

🏆 Certificate

</div>

</div>

<!-- PAY BUTTON -->

<button

id="pay-btn"

class="
mt-10
w-full
bg-gradient-to-r
from-purple-600
to-cyan-500
p-5
rounded-2xl
font-bold
text-xl
hover:scale-105
transition
duration-300
"
>

Pay Now

</button>

</div>

</div>

<script>

document
.getElementById("pay-btn")
.onclick = function(){

var options = {


"key":
"rzp_test_SuIJfuP0V3YvJo",
"amount":
99900,

"currency":
"INR",

"name":
"GradSkills LMS",

"description":
"Course Payment",

"image":
"https://cdn-icons-png.flaticon.com/512/3135/3135715.png",

"handler":
function (response){

window.location.href =

"success.php?payment_id=" +

response.razorpay_payment_id;
},

"theme": {

"color":
"#8b5cf6"
}

};

var rzp1 =
new Razorpay(options);

rzp1.open();
}

</script>

</body>

</html>