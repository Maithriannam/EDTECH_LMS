<?php

include "../config/db.php";

$sql =
"SELECT * FROM notifications
ORDER BY id DESC";

$result =
mysqli_query(
$GLOBALS['conn'],
$sql
);

?>

<!DOCTYPE html>

<html>

<head>

<title>
Notifications
</title>

<script src="https://cdn.tailwindcss.com"></script>

<link
href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
rel="stylesheet"
>

<style>

body{

font-family:'Inter',sans-serif;

background:#020617;

color:white;
}

.glass{

background:rgba(255,255,255,0.05);

backdrop-filter:blur(20px);

border:1px solid rgba(255,255,255,0.08);
}

.success{

border-left:6px solid #22c55e;
}

.warning{

border-left:6px solid #facc15;
}

.info{

border-left:6px solid #38bdf8;
}

</style>

</head>

<body class="p-10">

<!-- HEADER -->

<div
class="
flex
justify-between
items-center
mb-10
"
>

<div>

<h1
class="
text-5xl
font-extrabold
"
>

Notifications 🔔

</h1>

<p
class="
text-slate-400
mt-4
"
>

Latest LMS updates & alerts

</p>

</div>

<div
class="
bg-gradient-to-r
from-purple-600
to-cyan-500
px-6
py-4
rounded-2xl
font-bold
"
>

<?php echo mysqli_num_rows($result); ?>

Alerts

</div>

</div>

<!-- LIST -->

<div class="space-y-6">

<?php

mysqli_data_seek($result,0);

while($row = mysqli_fetch_assoc($result)){

$type =
$row['type'];

?>

<div
class="
glass
<?php echo $type; ?>
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
text-2xl
font-bold
"
>

<?php echo $row['title']; ?>

</h2>

<p
class="
text-slate-300
mt-4
leading-7
"
>

<?php echo $row['message']; ?>

</p>

</div>

<div
class="
text-sm
text-slate-400
"
>

<?php echo $row['created_at']; ?>

</div>

</div>

</div>

<?php } ?>

</div>

</body>

</html>