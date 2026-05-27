<?php

session_start();

include "../config/db.php";
/** @var mysqli $conn */

if(isset($_POST['add_course'])){

    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $description = mysqli_real_escape_string(
        $conn,
        $_POST['description']
    );

    $instructor = $_SESSION['full_name'];

    $thumbnail = $_FILES['thumbnail']['name'];

    $tmp_name = $_FILES['thumbnail']['tmp_name'];

    move_uploaded_file(
        $tmp_name,
        "../uploads/" . $thumbnail
    );

    $sql = "INSERT INTO courses
    (
        title,
        description,
        thumbnail,
        instructor
    )

    VALUES
    (
        '$title',
        '$description',
        '$thumbnail',
        '$instructor'
    )";

    mysqli_query($conn, $sql);

    $success = "Course Added Successfully";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>Add Course</title>

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
}

.glass{

background:rgba(255,255,255,0.06);

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
text-white
"
>

<form

method="POST"

enctype="multipart/form-data"

class="
glass
w-[650px]
p-10
rounded-3xl
"
>

<h1
class="
text-5xl
font-extrabold
mb-10
"
>

Add Course

</h1>

<?php if(isset($success)){ ?>

<div
class="
bg-green-500
p-4
rounded-2xl
mb-6
"
>

<?= $success ?>

</div>

<?php } ?>

<input

type="text"

name="title"

placeholder="Course Title"

required

class="
w-full
p-5
rounded-2xl
bg-slate-900
mb-6
outline-none
"
>

<textarea

name="description"

placeholder="Course Description"

required

class="
w-full
p-5
rounded-2xl
bg-slate-900
mb-6
outline-none
h-40
"
></textarea>

<input

type="file"

name="thumbnail"

required

class="
w-full
p-5
rounded-2xl
bg-slate-900
mb-6
outline-none
"
>

<button

type="submit"

name="add_course"

class="
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
"
>

Add Course

</button>

</form>

</body>

</html>