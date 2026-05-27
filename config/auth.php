<?php

session_start();

require_once("../config/db.php");

$sql = "

SELECT * FROM assignments

ORDER BY id DESC

";

$result = mysqli_query(

    $GLOBALS['conn'],

    $sql
);

?>

<!DOCTYPE html>

<html>

<head>

<title>Assignments</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{

background:#020617;

color:white;

font-family:Arial;
}

.glass{

background:rgba(255,255,255,0.05);

backdrop-filter:blur(20px);

border:1px solid rgba(255,255,255,0.1);
}

</style>

</head>

<body class="p-10">

<h1
class="
text-6xl
font-bold
mb-12
"
>

Assignments

</h1>

<div
class="
grid
grid-cols-3
gap-8
"
>

<?php

while($row = mysqli_fetch_assoc($result)){

?>

<div
class="
glass
rounded-3xl
p-6
"
>

<h2
class="
text-3xl
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

<?php echo $row['description']; ?>

</p>

<div class="mt-6">

<p>

Due Date:
<?php echo $row['due_date']; ?>

</p>

<p class="mt-2">

Teacher:
<?php echo $row['uploaded_by']; ?>

</p>

</div>

<a

href="../uploads/assignments/<?php echo $row['file']; ?>"

download

class="
block
mt-6
bg-gradient-to-r
from-purple-600
to-cyan-500
p-4
rounded-2xl
text-center
font-bold
"
>

Download Assignment

</a>

</div>

<?php } ?>

</div>

</body>

</html>