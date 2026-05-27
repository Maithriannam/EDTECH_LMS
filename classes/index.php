<?php

include "../config/db.php";

$sql =
"SELECT * FROM live_classes
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
Live Classes
</title>

<script src="https://cdn.tailwindcss.com"></script>

<link
href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap"
rel="stylesheet"
>

<style>

body{

font-family:'Inter',sans-serif;

background:
radial-gradient(circle at top left,#7c3aed,transparent 25%),
radial-gradient(circle at bottom right,#06b6d4,transparent 25%),
#020617;

color:white;
}

.glass{

background:rgba(255,255,255,0.05);

backdrop-filter:blur(18px);

border:1px solid rgba(255,255,255,0.08);
}

.class-card:hover{

transform:translateY(-10px);

transition:0.4s;
}

.live{

background:#22c55e;
}

.upcoming{

background:#eab308;
}

.completed{

background:#ef4444;
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
mb-12
"
>

<div>

<h1
class="
text-6xl
font-extrabold
"
>

Live Classes

</h1>

<p
class="
text-slate-300
mt-4
text-lg
"
>

Join interactive online sessions 🚀

</p>

</div>

<button
class="
bg-gradient-to-r
from-purple-600
to-cyan-500
px-8
py-4
rounded-2xl
font-bold
"
>

+ Schedule Class

</button>

</div>

<!-- GRID -->

<div
class="
grid
grid-cols-3
gap-8
"
>

<?php

while($row = mysqli_fetch_assoc($result)){

$status =
strtolower($row['status']);

?>

<!-- CARD -->

<div
class="
glass
class-card
rounded-3xl
p-8
"
>

<!-- TOP -->

<div
class="
flex
justify-between
items-center
"
>

<div
class="
px-4
py-2
rounded-full
text-sm
font-bold
<?php echo $status; ?>
"
>

<?php echo $row['status']; ?>

</div>

<div class="text-slate-400 text-sm">

🎥 Zoom Class

</div>

</div>

<!-- TITLE -->

<h2
class="
text-3xl
font-bold
mt-8
leading-tight
"
>

<?php echo $row['class_title']; ?>

</h2>

<!-- DETAILS -->

<div class="mt-8 space-y-4">

<p class="text-slate-300">

👨‍🏫 Instructor:
<span class="text-cyan-400">

<?php echo $row['instructor']; ?>

</span>

</p>

<p class="text-slate-300">

📅 Date:
<?php echo $row['class_date']; ?>

</p>

<p class="text-slate-300">

⏰ Time:
<?php echo $row['class_time']; ?>

</p>

</div>

<!-- BUTTONS -->

<div
class="
grid
grid-cols-2
gap-4
mt-10
"
>

<a

href="<?php echo $row['meeting_link']; ?>"

target="_blank"

class="
bg-gradient-to-r
from-purple-600
to-cyan-500
p-4
rounded-2xl
text-center
font-bold
"

>

Join Class

</a>

<a

href="<?php echo $row['recording_link']; ?>"

target="_blank"

class="
border
border-white/20
p-4
rounded-2xl
text-center
"

>

Recording

</a>

</div>

</div>

<?php } ?>

</div>

</body>

</html>