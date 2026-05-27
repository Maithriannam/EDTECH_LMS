<?php

include "../config/db.php";

$assignments = [

[
"title" => "AI Research Assignment",
"subject" => "Artificial Intelligence",
"deadline" => "Tomorrow",
"status" => "Pending"
],

[
"title" => "DBMS Normalization",
"subject" => "Database Management",
"deadline" => "2 Days Left",
"status" => "Submitted"
],

[
"title" => "Cloud Architecture",
"subject" => "Cloud Computing",
"deadline" => "Today",
"status" => "Pending"
],

[
"title" => "Frontend UI Task",
"subject" => "Web Development",
"deadline" => "5 Days Left",
"status" => "Submitted"
]

];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>Assignments</title>

<script src="https://cdn.tailwindcss.com"></script>

<link
href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
rel="stylesheet"
>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
}

body{

font-family:'Inter',sans-serif;

background:#eef2f7;

transition:0.3s;
}

/* SIDEBAR */

.sidebar{

width:250px;

height:100vh;

background:white;

position:fixed;

left:0;

top:0;

padding:20px;

border-right:1px solid #e2e8f0;

overflow-y:auto;
}

.logo{

font-size:24px;

font-weight:800;

margin-bottom:40px;

background:linear-gradient(
to right,
#7c3aed,
#06b6d4
);

-webkit-background-clip:text;

background-clip:text;

-webkit-text-fill-color:transparent;
}

.menu a{

display:flex;

align-items:center;

gap:12px;

padding:14px 18px;

margin-bottom:12px;

border-radius:16px;

text-decoration:none;

font-size:14px;

font-weight:600;

color:#0f172a;

transition:0.3s;
}

.menu a:hover{

background:#dbeafe;
}

/* MAIN */

.main{

margin-left:250px;

padding:20px;
}

/* TOPBAR */

.topbar{

height:74px;

background:white;

border-radius:22px;

padding:0 22px;

display:flex;

align-items:center;

justify-content:space-between;

border:1px solid #e2e8f0;
}

.search{

width:280px;

height:42px;

padding:0 16px;

border-radius:14px;

border:1px solid #cbd5e1;

font-size:13px;

outline:none;
}

.top-right{

display:flex;

align-items:center;

gap:16px;
}

/* NOTIFICATION */

.notification{

width:40px;

height:40px;

border-radius:14px;

background:linear-gradient(
135deg,
#8b5cf6,
#06b6d4
);

display:flex;

align-items:center;

justify-content:center;

position:relative;

font-size:14px;

color:white;
}

.notification-count{

position:absolute;

top:-5px;

right:-5px;

width:18px;

height:18px;

border-radius:50%;

background:#ef4444;

display:flex;

align-items:center;

justify-content:center;

font-size:10px;

font-weight:700;
}

/* TOGGLE */

.theme-toggle{

width:38px;

height:20px;

background:#dbe4f0;

border-radius:30px;

position:relative;

cursor:pointer;
}

.toggle-circle{

width:14px;

height:14px;

background:white;

border-radius:50%;

position:absolute;

top:3px;

left:3px;

transition:0.3s;
}

/* PROFILE */

.profile img{

width:42px;

height:42px;

border-radius:50%;
}

/* TITLE */

.page-title{

font-size:40px;

font-weight:800;

margin-top:28px;

color:#0f172a;
}

.page-subtitle{

font-size:15px;

margin-top:8px;

color:#64748b;
}

/* GRID */

.grid{

display:grid;

grid-template-columns:repeat(2,1fr);

gap:24px;

margin-top:30px;
}

/* CARD */

.card{

background:white;

border-radius:24px;

padding:24px;

border:1px solid #e2e8f0;

transition:0.3s;
}

.card:hover{

transform:translateY(-5px);

box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.assignment-title{

font-size:20px;

font-weight:700;

color:#0f172a;
}

.subject{

font-size:14px;

color:#64748b;

margin-top:8px;
}

.bottom{

margin-top:22px;

display:flex;

justify-content:space-between;

align-items:center;
}

.deadline{

font-size:13px;

font-weight:600;

color:#ef4444;
}

.status{

padding:6px 14px;

border-radius:30px;

font-size:12px;

font-weight:700;
}

.pending{

background:#fee2e2;

color:#dc2626;
}

.submitted{

background:#dcfce7;

color:#16a34a;
}

/* BUTTON */

.btn{

margin-top:18px;

padding:11px 18px;

border:none;

border-radius:14px;

font-size:13px;

font-weight:700;

cursor:pointer;

color:white;

background:linear-gradient(
to right,
#8b5cf6,
#06b6d4
);
}

/* DARK MODE */

.dark{

background:#020617;
}

.dark .sidebar,
.dark .topbar,
.dark .card{

background:#0f172a;

border-color:#1e293b;
}

.dark .menu a{

color:white;
}

.dark .search{

background:#020617;

border-color:#334155;

color:white;
}

.dark .assignment-title,
.dark .page-title{

color:white;
}

.dark .subject,
.dark .page-subtitle{

color:#94a3b8;
}

.dark .toggle-circle{

left:21px;
}

@media(max-width:900px){

.grid{

grid-template-columns:1fr;
}
}

@media(max-width:768px){

.sidebar{

display:none;
}

.main{

margin-left:0;
}
}

</style>

</head>

<body id="body">

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">
    Learnova
</div>

<div class="menu">

<a href="../dashboard/student/index.php">
🏠 Dashboard
</a>

<a href="../courses/index.php">
📚 Courses
</a>

<a href="../assignments/index.php">
📝 Assignments
</a>

<a href="../tests/index.php">
🧠 Tests
</a>

<a href="../payments/index.php">
💳 FeeFlow
</a>

<a href="../classes/index.php">
🎥 Live Classes
</a>

<a href="../ai/index.php">
🤖 AI Mentor
</a>

</div>

</div>

<!-- MAIN -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<input
type="text"
placeholder="Search assignments..."
class="search"
>

<div class="top-right">

<div class="notification">

🔔

<div class="notification-count">
3
</div>

</div>

<div
class="theme-toggle"
onclick="toggleTheme()"
>

<div class="toggle-circle"></div>

</div>

<div class="profile">

<img
src="https://i.pravatar.cc/100"
>

</div>

</div>

</div>

<!-- TITLE -->

<div class="page-title">

Assignments

</div>

<div class="page-subtitle">

Track and submit your tasks 📚

</div>

<!-- GRID -->

<div class="grid">

<?php foreach($assignments as $assignment){ ?>

<div class="card">

<div class="assignment-title">

<?php echo $assignment['title']; ?>

</div>

<div class="subject">

<?php echo $assignment['subject']; ?>

</div>

<div class="bottom">

<div class="deadline">

⏰ <?php echo $assignment['deadline']; ?>

</div>

<div
class="status <?php echo strtolower($assignment['status']); ?>"
>

<?php echo $assignment['status']; ?>

</div>

</div>

<a
href="view-assignment.php?title=<?php echo urlencode($assignment['title']); ?>"
class="btn"
style="
display:inline-block;
text-decoration:none;
text-align:center;
"
>

Open Assignment

</a>

</div>

<?php } ?>

</div>

</div>

<script>

function toggleTheme(){

document
.getElementById("body")
.classList.toggle("dark");

}

</script>

</body>

</html>