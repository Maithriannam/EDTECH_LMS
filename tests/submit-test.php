<?php

session_start();

require_once("../config/db.php");

$student_name = "Student";

if(isset($_SESSION['full_name'])){

    $student_name =
    $_SESSION['full_name'];
}

$test_id =
$_POST['test_id'];

$selected_answer =
$_POST['answer'];

$sql =
"SELECT * FROM tests
WHERE id='$test_id'";

$result =
mysqli_query(
    $GLOBALS['conn'],
    $sql
);

$row =
mysqli_fetch_assoc($result);

$correct_answer =
$row['correct_answer'];

$score = 0;

if($selected_answer == $correct_answer){

    $score = 100;
}

$insert =
"INSERT INTO test_results
(
student_name,
test_id,
selected_answer,
score
)

VALUES
(
'$student_name',
'$test_id',
'$selected_answer',
'$score'
)";

mysqli_query(
    $GLOBALS['conn'],
    $insert
);

?>

<!DOCTYPE html>

<html>

<head>

<title>Test Result</title>

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

<body
class="
min-h-screen
flex
items-center
justify-center
"
>

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
text-5xl
font-bold
mb-8
"
>

Test Submitted

</h1>

<p class="text-3xl mb-6">

Your Score:

</p>

<h2
class="
text-7xl
font-extrabold
text-cyan-400
"
>

<?php echo $score; ?>

</h2>

<a

href="index.php"

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

Back To Tests

</a>

</div>

</body>

</html>