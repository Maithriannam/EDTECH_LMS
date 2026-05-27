<?php

include "../../config/constants.php";

session_start();

require_once("../../config/db.php");

$course_count =
mysqli_num_rows(
mysqli_query(
$GLOBALS['conn'],
"SELECT * FROM courses"
)
);

$assignment_count =
mysqli_num_rows(
mysqli_query(
$GLOBALS['conn'],
"SELECT * FROM assignments"
)
);

$test_count =
mysqli_num_rows(
mysqli_query(
$GLOBALS['conn'],
"SELECT * FROM tests"
)
);

$certificate_count =
mysqli_num_rows(
mysqli_query(
$GLOBALS['conn'],
"SELECT * FROM certificates"
)
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

<title>

Student Dashboard

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

border-right:1px solid #e2e8f0;

padding:24px;

overflow-y:auto;
}

.logo{

font-size:24px;

font-weight:800;

background:linear-gradient(to right,#7c3aed,#06b6d4);

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

.search{

width:280px;

padding:10px 14px;

border-radius:12px;

border:1px solid #cbd5e1;

font-size:12px;

outline:none;
}

.search:focus{

border-color:#8b5cf6;
}

.top-right{

display:flex;

align-items:center;

gap:16px;
}

/* NOTIFICATIONS */

.notification-wrapper{

position:relative;
}

.notification-icon{

width:36px;

height:36px;

border-radius:12px;

background:linear-gradient(
135deg,
#8b5cf6,
#6366f1
);

display:flex;

align-items:center;

justify-content:center;

cursor:pointer;

font-size:14px;

position:relative;

color:white;

box-shadow:0 6px 18px rgba(99,102,241,0.3);

transition:0.3s;
}

.notification-icon:hover{

transform:translateY(-2px);

box-shadow:0 10px 24px rgba(99,102,241,0.4);
}

.notification-count{

position:absolute;

top:-5px;

right:-4px;

background:#ef4444;

color:white;

width:18px;

height:18px;

border-radius:50%;

font-size:10px;

display:flex;

align-items:center;

justify-content:center;

font-weight:700;

border:2px solid white;
}

.notification-dropdown{

position:absolute;

top:50px;

right:0;

width:320px;

background:white;

border-radius:18px;

padding:18px;

box-shadow:0 15px 40px rgba(0,0,0,0.15);

display:none;

z-index:999;
}

.notification-title{

font-size:15px;

font-weight:700;

margin-bottom:14px;
}

.notification-item{

display:flex;

gap:12px;

padding:12px;

border-radius:12px;

transition:0.3s;

cursor:pointer;
}

.notification-item:hover{

background:#f1f5f9;
}

.notification-dot{

width:8px;

height:8px;

background:#8b5cf6;

border-radius:50%;

margin-top:7px;
}

.notification-text{

font-size:12px;

font-weight:600;

color:#0f172a;
}

.notification-time{

font-size:10px;

color:#94a3b8;

margin-top:4px;
}

/* SMALL TOGGLE */

.theme-toggle{

width:42px;

height:22px;

background:#dbe4f0;

border-radius:40px;

position:relative;

cursor:pointer;

transition:0.3s;

box-shadow:inset 0 2px 6px rgba(0,0,0,0.08);
}

.toggle-circle{

width:16px;

height:16px;

background:white;

border-radius:50%;

position:absolute;

top:3px;

left:3px;

transition:0.3s;

box-shadow:0 2px 8px rgba(0,0,0,0.15);
}

/* PROFILE */

.profile{

display:flex;

align-items:center;

gap:10px;
}

.profile img{

width:40px;

height:40px;

border-radius:50%;
}

.profile-name{

font-size:12px;

font-weight:700;
}

/* BANNER */

.banner{

margin-top:24px;

height:220px;

border-radius:24px;

overflow:hidden;
}

.banner img{

width:100%;

height:100%;

object-fit:cover;
}

/* WELCOME */

.welcome-row{

display:grid;

grid-template-columns:2fr 1fr 1fr;

gap:18px;

margin-top:24px;
}

.welcome-box{

background:white;

border-radius:20px;

padding:24px;

border:1px solid #e2e8f0;
}

.welcome-box h2{

font-size:18px;

font-weight:700;
}

.welcome-box p{

font-size:12px;

color:#64748b;

margin-top:10px;

line-height:22px;
}

/* RANK */

.rank-box{

background:white;

border:1px solid #e2e8f0;

border-radius:20px;

padding:22px;
}

.rank-title{

font-size:12px;

color:#64748b;
}

.rank-value{

font-size:30px;

font-weight:700;

margin-top:10px;
}

/* CARDS */

.cards{

display:grid;

grid-template-columns:repeat(4,1fr);

gap:18px;

margin-top:24px;
}

.card{

background:white;

border-radius:20px;

padding:24px;

border:1px solid #e2e8f0;

transition:0.3s;
}

.card:hover{

transform:translateY(-5px);
}

.card-title{

font-size:12px;

color:#64748b;
}

.card-value{

font-size:34px;

font-weight:800;

margin-top:16px;
}

/* PROGRESS */

.progress-section{

margin-top:24px;

background:white;

padding:24px;

border-radius:20px;

border:1px solid #e2e8f0;
}

.progress-title{

font-size:17px;

font-weight:700;

margin-bottom:24px;
}

.progress-item{

margin-bottom:22px;
}

.progress-top{

display:flex;

justify-content:space-between;

font-size:12px;

margin-bottom:10px;
}

.progress-bar{

height:10px;

background:#e2e8f0;

border-radius:30px;

overflow:hidden;
}

.progress-fill{

height:100%;

border-radius:30px;
}

/* DARK MODE */

.dark-mode{

background:#020617;

color:white;
}

.dark-mode .sidebar,
.dark-mode .topbar,
.dark-mode .welcome-box,
.dark-mode .rank-box,
.dark-mode .card,
.dark-mode .progress-section,
.dark-mode .notification-dropdown{

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

.dark-mode .toggle-circle{

left:23px;
}

.dark-mode .theme-toggle{

background:#334155;
}

.dark-mode .card-title,
.dark-mode .rank-title,
.dark-mode .welcome-box p,
.dark-mode .notification-time{

color:#94a3b8;
}

.dark-mode .notification-text{

color:white;
}

.dark-mode .notification-item:hover{

background:#1e293b;
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

<div class="menu-title">

Main Navigation

</div>

<a
href="<?php echo BASE_URL; ?>dashboard/student/index.php"
class="active"
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
>

🧠 Tests

</a>

<a
href="<?php echo BASE_URL; ?>payments/index.php"
>

💳 FeeFlow

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

<a
href="<?php echo BASE_URL; ?>notifications/index.php"
>

🔔 Notifications

</a>

<a
href="<?php echo BASE_URL; ?>logout.php"
style="
background:#ef4444;
color:white;
margin-top:30px;
"
>

🚪 Logout

</a>

</div>

</div>

<!-- MAIN -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<input
type="text"
placeholder="Search..."
class="search"
>

<div class="top-right">

<!-- NOTIFICATION -->

<div class="notification-wrapper">

<div
class="notification-icon"
onclick="toggleNotifications()"
>

🔔

<span class="notification-count">

4

</span>

</div>

<div
id="notificationDropdown"
class="notification-dropdown"
>

<div class="notification-title">

Notifications

</div>

<div class="notification-item">

<div class="notification-dot"></div>

<div>

<div class="notification-text">

DBMS Assignment due tomorrow

</div>

<div class="notification-time">

2 mins ago

</div>

</div>

</div>

<div class="notification-item">

<div class="notification-dot"></div>

<div>

<div class="notification-text">

Payment Successful

</div>

<div class="notification-time">

10 mins ago

</div>

</div>

</div>

<div class="notification-item">

<div class="notification-dot"></div>

<div>

<div class="notification-text">

AI Workshop starts at 6 PM

</div>

<div class="notification-time">

1 hour ago

</div>

</div>

</div>

</div>

</div>

<!-- TOGGLE -->

<div
class="theme-toggle"
onclick="toggleTheme()"
>

<div class="toggle-circle"></div>

</div>

<!-- PROFILE -->

<div class="profile">

<img
src="https://i.pravatar.cc/100"
>

<div>

<div class="profile-name">

ANNAM MAITHRI

</div>

<div
style="
font-size:11px;
color:#64748b;
"
>

Student

</div>

</div>

</div>

</div>

</div>

<!-- BANNER -->

<div class="banner">

<img
src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?q=80&w=1600&auto=format&fit=crop"
>

</div>

<!-- WELCOME -->

<div class="welcome-row">

<div class="welcome-box">

<h2>

Welcome Back 👋

</h2>

<p>

Track assignments, live classes,
AI mentor guidance, certificates,
payments and overall learning progress.

</p>

</div>

<div class="rank-box">

<div class="rank-title">

University Rank

</div>

<div class="rank-value">

#462

</div>

</div>

<div class="rank-box">

<div class="rank-title">

Batch Rank

</div>

<div class="rank-value">

#14

</div>

</div>

</div>

<!-- CARDS -->

<div class="cards">

<div class="card">

<div class="card-title">

Courses

</div>

<div class="card-value">

<?php echo $course_count; ?>

</div>

</div>

<div class="card">

<div class="card-title">

Assignments

</div>

<div class="card-value">

<?php echo $assignment_count; ?>

</div>

</div>

<div class="card">

<div class="card-title">

Tests

</div>

<div class="card-value">

<?php echo $test_count; ?>

</div>

</div>

<div class="card">

<div class="card-title">

Certificates

</div>

<div class="card-value">

<?php echo $certificate_count; ?>

</div>

</div>

</div>

<!-- PROGRESS -->

<div class="progress-section">

<div class="progress-title">

Learning Progress

</div>

<div class="progress-item">

<div class="progress-top">

<span>Frontend Development</span>

<span>92%</span>

</div>

<div class="progress-bar">

<div
class="progress-fill"
style="
width:92%;
background:#3b82f6;
"
></div>

</div>

</div>

<div class="progress-item">

<div class="progress-top">

<span>Backend Development</span>

<span>80%</span>

</div>

<div class="progress-bar">

<div
class="progress-fill"
style="
width:80%;
background:#8b5cf6;
"
></div>

</div>

</div>

<div class="progress-item">

<div class="progress-top">

<span>Database Management</span>

<span>75%</span>

</div>

<div class="progress-bar">

<div
class="progress-fill"
style="
width:75%;
background:#06b6d4;
"
></div>

</div>

</div>

</div>

</div>

<script>

function toggleTheme(){

document
.getElementById("body")
.classList.toggle("dark-mode");
}

function toggleNotifications(){

const dropdown =
document.getElementById(
"notificationDropdown"
);

if(
dropdown.style.display === "block"
){

dropdown.style.display = "none";

}else{

dropdown.style.display = "block";
}
}

window.onclick = function(event){

if(
!event.target.closest(
'.notification-wrapper'
)
){

const dropdown =
document.getElementById(
"notificationDropdown"
);

if(dropdown){

dropdown.style.display = "none";
}
}
}

</script>

</body>

</html>