<?php

session_start();

include "../config/db.php";

$success = "";

if(isset($_POST['add_course'])){

    $title =
    mysqli_real_escape_string(
        $conn,
        $_POST['title']
    );

    $description =
    mysqli_real_escape_string(
        $conn,
        $_POST['description']
    );

    $instructor =
    $_SESSION['full_name'];

    $thumbnail =
    $_FILES['thumbnail']['name'];

    $tmp_name =
    $_FILES['thumbnail']['tmp_name'];

    move_uploaded_file(

        $tmp_name,

        "../uploads/" . $thumbnail
    );

    $sql =
    "INSERT INTO courses
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

    $success =
    "Course Added Successfully";
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

<style>

body{

background:#020617;

font-family:Arial;

color:white;
}

.container{

width:600px;

margin:50px auto;

background:#111827;

padding:40px;

border-radius:20px;
}

input,
textarea{

width:100%;

padding:15px;

margin-top:15px;

background:#1e293b;

border:none;

border-radius:10px;

color:white;
}

button{

width:100%;

padding:15px;

margin-top:20px;

background:#7c3aed;

border:none;

border-radius:10px;

color:white;

font-size:18px;

cursor:pointer;
}

.success{

background:green;

padding:15px;

border-radius:10px;

margin-bottom:20px;
}

</style>

</head>

<body>

<div class="container">

<h1>Add Course</h1>

<?php

if($success != ""){

echo "<div class='success'>";

echo $success;

echo "</div>";
}
?>

<form

method="POST"

enctype="multipart/form-data"
>

<input
type="text"
name="title"
placeholder="Course Title"
required
>

<textarea
name="description"
placeholder="Course Description"
required
></textarea>

<input
type="file"
name="thumbnail"
required
>

<button
type="submit"
name="add_course"
>

Add Course

</button>

</form>

</div>

</body>

</html>