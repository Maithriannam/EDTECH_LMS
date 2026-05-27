<?php

session_start();

require_once("../config/db.php");

$course_id = $_GET['id'];

$course_sql =
"SELECT * FROM courses
WHERE id='$course_id'";

$course_result =
mysqli_query(
    $GLOBALS['conn'],
    $course_sql
);

$course =
mysqli_fetch_assoc($course_result);

$module_sql =
"SELECT * FROM course_modules
WHERE course_id='$course_id'";

$module_result =
mysqli_query(
    $GLOBALS['conn'],
    $module_sql
);

?>

<!DOCTYPE html>

<html>

<head>

<title>
Course Details
</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{

background:
radial-gradient(circle at top left,#7c3aed,transparent 25%),
radial-gradient(circle at bottom right,#06b6d4,transparent 25%),
#020617;

font-family:Arial;

color:white;
}

.glass{

background:rgba(255,255,255,0.05);

border:1px solid rgba(255,255,255,0.08);

backdrop-filter:blur(18px);
}

.module:hover{

transform:translateY(-6px);

transition:0.4s;
}

</style>

</head>

<body class="p-10">

<!-- COURSE HEADER -->

<div
class="
glass
rounded-3xl
p-10
mb-10
"
>

<h1
class="
text-6xl
font-extrabold
"
>

<?php echo $course['title']; ?>

</h1>

<p
class="
mt-6
text-slate-300
text-lg
leading-8
"
>

<?php echo $course['description']; ?>

</p>

<div
class="
mt-8
flex
gap-6
"
>

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

Enroll Now

</button>

<button
class="
border
border-white/20
px-8
py-4
rounded-2xl
"
>

Track Progress

</button>

</div>

</div>

<!-- MODULES -->

<h2
class="
text-4xl
font-bold
mb-8
"
>

Course Modules

</h2>

<div
class="
grid
grid-cols-2
gap-8
"
>

<?php

while($module = mysqli_fetch_assoc($module_result)){

?>

<div
class="
glass
module
rounded-3xl
p-8
"
>

<h2
class="
text-3xl
font-bold
"
>

<?php echo $module['module_title']; ?>

</h2>

<div
class="
mt-8
flex
gap-4
"
>

<a

href="<?php echo $module['video_link']; ?>"

target="_blank"

class="
bg-gradient-to-r
from-purple-600
to-cyan-500
px-6
py-3
rounded-2xl
font-bold
"
>

▶ Watch Video

</a>

<a

href="../uploads/assignments/<?php echo $module['notes_file']; ?>"

download

class="
border
border-white/20
px-6
py-3
rounded-2xl
"
>

📄 Download Notes

</a>

</div>

</div>

<?php } ?>

</div>

</body>

</html>