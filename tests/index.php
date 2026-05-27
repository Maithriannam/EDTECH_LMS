<?php

session_start();

require_once("../config/db.php");

$sql = "
SELECT * FROM tests
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

<title>Online Test</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{

background:
radial-gradient(circle at top left,#7c3aed,transparent 25%),
radial-gradient(circle at bottom right,#06b6d4,transparent 25%),
#020617;

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
font-extrabold
mb-10
"
>

Online Tests

</h1>

<div
class="
grid
grid-cols-1
md:grid-cols-2
gap-8
"
>

<?php

while($row = mysqli_fetch_assoc($result)){

?>

<form

method="POST"

action="submit-test.php"

class="
glass
p-8
rounded-3xl
"
>

<input
type="hidden"
name="test_id"
value="<?php echo $row['id']; ?>"
>

<h2
class="
text-3xl
font-bold
mb-6
"
>

<?php echo $row['title']; ?>

</h2>

<p
class="
text-xl
mb-8
"
>

<?php echo $row['question']; ?>

</p>

<div class="space-y-4">

<label class="block">

<input
type="radio"
name="answer"
value="<?php echo $row['option1']; ?>"
required
>

<?php echo $row['option1']; ?>

</label>

<label class="block">

<input
type="radio"
name="answer"
value="<?php echo $row['option2']; ?>"
>

<?php echo $row['option2']; ?>

</label>

<label class="block">

<input
type="radio"
name="answer"
value="<?php echo $row['option3']; ?>"
>

<?php echo $row['option3']; ?>

</label>

<label class="block">

<input
type="radio"
name="answer"
value="<?php echo $row['option4']; ?>"
>

<?php echo $row['option4']; ?>

</label>

</div>

<button

type="submit"

class="
mt-8
w-full
bg-gradient-to-r
from-purple-600
to-cyan-500
p-4
rounded-2xl
font-bold
"
>

Submit Test

</button>

</form>

<?php } ?>

</div>

</body>

</html>