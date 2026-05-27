<?php

$title =
$_GET['title'] ?? "Assignment";

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

Assignment

</title>

<script src="https://cdn.tailwindcss.com"></script>

<link
href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
rel="stylesheet"
>

<style>

body{

font-family:'Inter',sans-serif;

background:#eef2f7;
}

.card{

max-width:850px;

margin:auto;

background:white;

padding:40px;

border-radius:28px;

margin-top:60px;

box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.title{

font-size:38px;

font-weight:800;

color:#0f172a;
}

.desc{

margin-top:18px;

font-size:15px;

line-height:30px;

color:#64748b;
}

textarea{

width:100%;

height:240px;

margin-top:30px;

border:1px solid #cbd5e1;

border-radius:20px;

padding:20px;

font-size:14px;

outline:none;

resize:none;
}

textarea:focus{

border-color:#8b5cf6;
}

.btn{

margin-top:24px;

padding:14px 24px;

border:none;

border-radius:16px;

background:linear-gradient(
to right,
#8b5cf6,
#06b6d4
);

color:white;

font-size:14px;

font-weight:700;

cursor:pointer;
}

</style>

</head>

<body>

<div class="card">

<div class="title">

<?php echo htmlspecialchars($title); ?>

</div>

<div class="desc">

Complete this assignment and submit your answer before the deadline.

</div>

<textarea
placeholder="Write your answer here..."
></textarea>

<br>

<button class="btn">

Submit Assignment

</button>

</div>

</body>

</html>