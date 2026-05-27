<?php

include "../config/db.php";

$sql = "SELECT * FROM courses ORDER BY id DESC";

$courses = mysqli_query(
    $GLOBALS['conn'],
    $sql
);

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>Courses</title>

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

background:rgba(255,255,255,0.06);

backdrop-filter:blur(20px);

border:1px solid rgba(255,255,255,0.1);
}

.course-card:hover{

transform:translateY(-10px);

transition:0.4s;
}

</style>

</head>

<body class="p-10">

<!-- TITLE -->

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

All Courses

</h1>

<p
class="
text-slate-300
mt-4
text-lg
"
>

Explore premium learning paths 🚀

</p>

</div>

<a

href="add-course.php"

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

+ Add Course

</a>

</div>

<!-- COURSES GRID -->

<div
class="
grid
grid-cols-3
gap-8
"
>

<?php while($course = mysqli_fetch_assoc($courses)){ ?>

<!-- CARD -->

<div
class="
glass
course-card
rounded-3xl
overflow-hidden
"
>

<!-- IMAGE -->

<img

src="../uploads/<?php echo $course['thumbnail']; ?>"

class="
w-full
h-56
object-cover
"

>

<!-- CONTENT -->

<div class="p-6">

<h2
class="
text-3xl
font-bold
"
>

<?php echo $course['title']; ?>

</h2>

<p
class="
text-slate-300
mt-4
leading-7
h-28
overflow-hidden
"
>

<?php echo $course['description']; ?>

</p>

<!-- FOOTER -->

<div
class="
mt-6
flex
justify-between
items-center
"
>

<div>

<p class="text-slate-400 text-sm">

Instructor

</p>

<p class="text-cyan-400 font-semibold">

<?php echo $course['instructor']; ?>

</p>

</div>

</div>

<!-- BUTTONS -->

<div
class="
mt-6
grid
grid-cols-2
gap-4
"
>

<a

href="view-course.php?id=<?php echo $course['id']; ?>"

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

Open Course

</a>

<button

class="
border
border-white/20
p-4
rounded-2xl
hover:bg-white/10
transition
"

>

Enroll

</button>

</div>

</div>

</div>

<?php } ?>

</div>

</body>

</html>nex