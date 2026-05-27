<?php

include "../config/db.php";

$payment_id =
$_GET['payment_id'];

$student_name =
"ANNAM";

$title =
"Full Stack Development";

$amount =
999;

$status =
"Success";

$sql =
"INSERT INTO payments
(
student_name,
payment_title,
amount,
payment_id,
status
)

VALUES
(
'$student_name',
'$title',
'$amount',
'$payment_id',
'$status'
)";

mysqli_query(
    $GLOBALS['conn'],
    $sql
);

?>

<!DOCTYPE html>

<html>

<head>

<title>
Payment Success
</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{

background:#020617;

font-family:Arial;

color:white;

display:flex;

justify-content:center;

align-items:center;

height:100vh;
}

.glass{

background:rgba(255,255,255,0.05);

backdrop-filter:blur(18px);

border:1px solid rgba(255,255,255,0.08);
}

</style>

</head>

<body>

<div
class="
glass
p-12
rounded-3xl
text-center
w-[600px]
"
>

<h1
class="
text-7xl
font-extrabold
text-green-400
"
>

✓

</h1>

<h2
class="
text-4xl
font-bold
mt-6
"
>

Payment Successful

</h2>

<p
class="
text-slate-300
mt-6
text-lg
leading-8
"
>

Payment ID:

<br><br>

<span class="text-cyan-400">

<?php echo $payment_id; ?>

</span>

</p>

<a

href="../dashboard/student/index.php"

class="
block
mt-10
bg-gradient-to-r
from-purple-600
to-cyan-500
p-4
rounded-2xl
font-bold
"

>

Go To Dashboard

</a>

</div>

</body>

</html>