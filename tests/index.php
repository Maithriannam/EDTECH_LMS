<?php

include "../config/constants.php";

session_start();

include "../config/db.php";

$sql =
"SELECT * FROM tests
ORDER BY id DESC";

$result =
mysqli_query($conn, $sql);

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

Online Tests

</title>

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

background:#f1f5f9;
}

/* SIDEBAR */

.sidebar{

width:250px;

height:100vh;

background:white;

position:fixed;

left:0;

top:0;

border-right:1px solid #e2e8f0;

padding:24px;

overflow-y:auto;
}

.logo{

font-size:24px;

font-weight:800;

background:linear-gradient(
to right,
#7c3aed,
#06b6d4
);

-webkit-background-clip:text;

-webkit-text-fill-color:transparent;
}

.menu{

margin-top:35px;
}

.menu-title{

font-size:11px;

font-weight:700;

color:#94a3b8;

margin-bottom:15px;

text-transform:uppercase;

letter-spacing:1px;
}

.menu a{

display:flex;

align-items:center;

gap:12px;

padding:13px 16px;

margin-bottom:10px;

border-radius:14px;

font-size:13px;

font-weight:500;

color:#334155;

text-decoration:none;

transition:0.3s;
}

.menu a:hover{

background:#eff6ff;

color:#2563eb;
}

.active{

background:#dbeafe;

color:#2563eb !important;
}

/* MAIN */

.main{

margin-left:250px;

padding:24px;
}

/* TOPBAR */

.topbar{

height:72px;

background:white;

border-radius:18px;

padding:0 24px;

display:flex;

align-items:center;

justify-content:space-between;

border:1px solid #e2e8f0;
}

.page-title{

font-size:22px;

font-weight:700;
}

.search{

width:250px;

padding:10px 14px;

border-radius:12px;

border:1px solid #cbd5e1;

font-size:12px;

outline:none;
}

/* TEST GRID */

.test-grid{

display:grid;

grid-template-columns:repeat(3,1fr);

gap:20px;

margin-top:24px;
}

.test-card{

background:white;

border-radius:22px;

padding:22px;

border:1px solid #e2e8f0;

transition:0.3s;
}

.test-card:hover{

transform:translateY(-6px);

box-shadow:0 15px 30px rgba(0,0,0,0.08);
}

.test-top{

display:flex;

justify-content:space-between;

align-items:center;
}

.test-icon{

width:54px;

height:54px;

border-radius:18px;

background:linear-gradient(
135deg,
#8b5cf6,
#06b6d4
);

display:flex;

align-items:center;

justify-content:center;

font-size:24px;

color:white;
}

.test-status{

padding:7px 14px;

border-radius:40px;

font-size:11px;

font-weight:700;

background:#dcfce7;

color:#166534;
}

.test-title{

font-size:18px;

font-weight:700;

margin-top:18px;

color:#0f172a;
}

.test-desc{

font-size:12px;

line-height:22px;

color:#64748b;

margin-top:12px;
}

.test-info{

margin-top:20px;
}

.info-item{

display:flex;

justify-content:space-between;

margin-bottom:10px;

font-size:12px;
}

.label{

color:#94a3b8;
}

.value{

font-weight:600;

color:#0f172a;
}

.test-actions{

display:flex;

gap:12px;

margin-top:22px;
}

.btn{

flex:1;

padding:12px;

border:none;

border-radius:14px;

font-size:12px;

font-weight:700;

cursor:pointer;

transition:0.3s;
}

.start-btn{

background:linear-gradient(
to right,
#8b5cf6,
#06b6d4
);

color:white;
}

.start-btn:hover{

opacity:0.9;
}

.score-btn{

background:#eff6ff;

color:#2563eb;
}

.score-btn:hover{

background:#dbeafe;
}

/* DARK MODE */

.dark-mode{

background:#020617;

color:white;
}

.dark-mode .sidebar,
.dark-mode .topbar,
.dark-mode .test-card{

background:#0f172a;

border-color:#1e293b;
}

.dark-mode .menu a{

color:#cbd5e1;
}

.dark-mode .menu a:hover{

background:#1e293b;
}

.dark-mode .search{

background:#020617;

border-color:#334155;

color:white;
}

.dark-mode .test-title,
.dark-mode .value{

color:white;
}

.dark-mode .test-desc,
.dark-mode .label{

color:#94a3b8;
}

/* RESPONSIVE */

@media(max-width:1200px){

.test-grid{

grid-template-columns:repeat(2,1fr);
}
}

@media(max-width:768px){

.sidebar{

width:100%;
height:auto;
position:relative;
}

.main{

margin-left:0;
}

.test-grid{

grid-template-columns:1fr;
}
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">

GradSkills

</div>

<div class="menu">

<div class="menu-title">

Navigation

</div>

<a
href="<?php echo BASE_URL; ?>dashboard/student/index.php"
>

🏠 Dashboard

</a>

<a
href="<?php echo BASE_URL; ?>courses/index.php"
>

📚 Courses

</a>

<a
href="<?php echo BASE_URL; ?>assignments/index.php"
>

📝 Assignments

</a>

<a
href="<?php echo BASE_URL; ?>tests/index.php"
class="active"
>

🧠 Tests

</a>

<a
href="<?php echo BASE_URL; ?>payments/index.php"
>

💳 Payments

</a>

<a
href="<?php echo BASE_URL; ?>classes/index.php"
>

🎥 Live Classes

</a>

<a
href="<?php echo BASE_URL; ?>certificates/generate.php"
>

🏆 Certificates

</a>

<a
href="<?php echo BASE_URL; ?>ai/index.php"
>

🤖 AI Mentor

</a>

</div>

</div>

<!-- MAIN -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<div class="page-title">

Online Tests

</div>

<input
type="text"
placeholder="Search tests..."
class="search"
>

</div>

<!-- TEST GRID -->

<div class="test-grid">

<?php

while($row = mysqli_fetch_assoc($result)){

?>

<div class="test-card">

<div class="test-top">

<div class="test-icon">

🧠

</div>

<div class="test-status">

LIVE

</div>

</div>

<div class="test-title">

<?php echo $row['title']; ?>

</div>

<div class="test-desc">

Online assessment test for students.

</div>

<div class="test-info">

<div class="info-item">

<div class="label">

Duration

</div>

<div class="value">

60 mins

</div>

</div>

<div class="info-item">

<div class="label">

Total Marks

</div>

<div class="value">

100

</div>

</div>

</div>

<div class="test-actions">

<a

href="<?php echo BASE_URL; ?>tests/submit-test.php?id=<?php echo $row['id']; ?>"

class="
btn
start-btn
text-center
"
>

Start Test

</a>

<button
class="
btn
score-btn
"
>

View Score

</button>

</div>

</div>

<?php } ?>

</div>

</div>

</body>

</html>