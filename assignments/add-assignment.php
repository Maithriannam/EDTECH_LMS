<?php

session_start();

include "../config/db.php";

// CHECK DATABASE CONNECTION
if(!isset($conn)){

    die("Database Connection Failed");
}

$success = "";

if(isset($_POST['upload_assignment'])){

    // GET FORM DATA
    $title = mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $description = mysqli_real_escape_string(
        $conn,
        $_POST['description']
    );

    $due_date = $_POST['due_date'];

    // SESSION USER
    $uploaded_by = "";

    if(isset($_SESSION['full_name'])){

        $uploaded_by =
        $_SESSION['full_name'];

    } else {

        $uploaded_by = "Teacher";
    }

    // FILE UPLOAD
    $file_name =
    $_FILES['file']['name'];

    $tmp_name =
    $_FILES['file']['tmp_name'];

    // CREATE UNIQUE FILE NAME
    $new_file_name =
    time() . "_" . $file_name;

    // DESTINATION
    $destination =
    "../uploads/assignments/" .
    $new_file_name;

    // MOVE FILE
    move_uploaded_file(
        $tmp_name,
        $destination
    );

    // INSERT QUERY
    $sql = "INSERT INTO assignments
    (
        title,
        description,
        due_date,
        uploaded_by,
        file
    )

    VALUES
    (
        '$title',
        '$description',
        '$due_date',
        '$uploaded_by',
        '$new_file_name'
    )";

    // EXECUTE QUERY
    $query = mysqli_query(
        $conn,
        $sql
    );

    if($query){

        $success =
        "Assignment Uploaded Successfully";

    } else {

        $success =
        "Database Error";
    }
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

<title>
Upload Assignment
</title>

<!-- Tailwind -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Google Font -->
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

backdrop-filter:blur(20px);

border:1px solid rgba(255,255,255,0.1);

box-shadow:
0 8px 32px rgba(0,0,0,0.3);
}

</style>

</head>

<body
class="
min-h-screen
flex
items-center
justify-center
p-10
"
>

<form

method="POST"

enctype="multipart/form-data"

class="
glass
w-full
max-w-3xl
p-10
rounded-3xl
"
>

<!-- TITLE -->
<h1
class="
text-5xl
font-extrabold
mb-10
"
>

Upload Assignment

</h1>

<!-- SUCCESS -->
<?php

if($success != ""){

echo "

<div
class='
bg-green-500
p-4
rounded-2xl
mb-6
text-lg
font-bold
'
>

$success

</div>

";
}
?>

<!-- TITLE -->
<input

type="text"

name="title"

placeholder="Assignment Title"

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

<!-- DESCRIPTION -->
<textarea

name="description"

placeholder="Assignment Description"

required

class="
w-full
h-40
p-5
rounded-2xl
bg-slate-900
mb-6
outline-none
"
></textarea>

<!-- DATE -->
<input

type="date"

name="due_date"

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

<!-- FILE -->
<input

type="file"

name="file"

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

<!-- BUTTON -->
<button

type="submit"

name="upload_assignment"

class="
w-full
bg-gradient-to-r
from-purple-600
to-cyan-500
p-5
rounded-2xl
text-xl
font-bold
hover:scale-105
transition
duration-300
"
>

Upload Assignment

</button>

</form>

</body>

</html>