<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>
AI Mentor
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

background:#0f172a;

overflow:hidden;

color:white;
}

.sidebar{

width:260px;

height:100vh;

background:#020617;

position:fixed;

left:0;

top:0;

padding:24px;

border-right:1px solid rgba(255,255,255,0.05);
}

.logo{

font-size:24px;

font-weight:700;

background:linear-gradient(to right,#8b5cf6,#06b6d4);

-webkit-background-clip:text;

-webkit-text-fill-color:transparent;
}

.menu{

margin-top:40px;
}

.menu a{

display:block;

padding:14px 18px;

border-radius:14px;

margin-bottom:10px;

font-size:14px;

font-weight:500;

color:#cbd5e1;

text-decoration:none;

transition:0.3s;
}

.menu a:hover{

background:rgba(255,255,255,0.05);
}

.active{

background:linear-gradient(to right,#7c3aed,#06b6d4);

color:white !important;
}

.main{

margin-left:260px;

height:100vh;

display:flex;

flex-direction:column;
}

.topbar{

height:80px;

background:#020617;

border-bottom:1px solid rgba(255,255,255,0.05);

display:flex;

align-items:center;

justify-content:space-between;

padding:0 30px;
}

.topbar h1{

font-size:22px;

font-weight:700;
}

.topbar p{

font-size:13px;

color:#94a3b8;

margin-top:4px;
}

.bot-icon{

width:52px;

height:52px;

border-radius:50%;

background:linear-gradient(to right,#8b5cf6,#06b6d4);

display:flex;

align-items:center;

justify-content:center;

font-size:22px;
}

.chat-container{

flex:1;

padding:30px;

overflow-y:auto;
}

.message{

max-width:75%;

padding:16px 18px;

border-radius:18px;

margin-bottom:20px;

font-size:14px;

line-height:28px;
}

.bot{

background:rgba(255,255,255,0.05);

border:1px solid rgba(255,255,255,0.05);
}

.user{

background:linear-gradient(to right,#7c3aed,#06b6d4);

margin-left:auto;
}

.input-area{

padding:24px;

background:#020617;

border-top:1px solid rgba(255,255,255,0.05);

display:flex;

gap:16px;
}

.input-box{

flex:1;

background:#0f172a;

border:1px solid rgba(255,255,255,0.08);

height:60px;

border-radius:18px;

padding:0 20px;

font-size:14px;

outline:none;

color:white;
}

.send-btn{

width:140px;

border:none;

border-radius:18px;

background:linear-gradient(to right,#7c3aed,#06b6d4);

font-weight:700;

font-size:15px;

cursor:pointer;

color:white;

transition:0.3s;
}

.send-btn:hover{

transform:scale(1.03);
}

.typing{

display:none;

margin-top:10px;

font-size:13px;

color:#94a3b8;
}

</style>

</head>

<body>

<!-- SIDEBAR -->

<div class="sidebar">

<div class="logo">

GradSkills AI

</div>

<div class="menu">

<a href="../dashboard/student/index.php">

🏠 Dashboard

</a>

<a href="#" class="active">

🤖 AI Mentor

</a>

<a href="../courses/index.php">

📚 Courses

</a>

<a href="../assignments/index.php">

📝 Assignments

</a>

<a href="../payments/index.php">

💳 Payments

</a>

<a href="../classes/index.php">

🎥 Live Classes

</a>

</div>

</div>

<!-- MAIN -->

<div class="main">

<!-- TOPBAR -->

<div class="topbar">

<div>

<h1>

AI Mentor Assistant

</h1>

<p>

Ask coding doubts, placement questions & assignments

</p>

</div>

<div class="bot-icon">

🤖

</div>

</div>

<!-- CHAT -->

<div
class="chat-container"
id="chat-box"
>

<div class="message bot">

👋 Hello ANNAM! <br><br>

I am your AI Mentor. <br><br>

You can ask me:

<br><br>

✅ Coding doubts <br>
✅ Interview preparation <br>
✅ DBMS questions <br>
✅ Java programs <br>
✅ Placement guidance <br>
✅ Assignment help

</div>

</div>

<!-- INPUT -->

<div class="input-area">

<input

type="text"

id="message"

class="input-box"

placeholder="Ask your doubt here..."
>

<button

class="send-btn"

onclick="sendMessage()"
>

Send

</button>

</div>

</div>

<script>

async function sendMessage(){

let message =
document
.getElementById("message")
.value;

if(message=="") return;

let chatBox =
document
.getElementById("chat-box");

chatBox.innerHTML += `

<div class="message user">

${message}

</div>

`;

document
.getElementById("message")
.value = "";

chatBox.scrollTop =
chatBox.scrollHeight;

chatBox.innerHTML += `

<div
class="message bot"
id="typing"
>

Typing...

</div>

`;

chatBox.scrollTop =
chatBox.scrollHeight;

let response =
await fetch(
"chat.php",
{

method:"POST",

headers:{
"Content-Type":
"application/x-www-form-urlencoded"
},

body:
"message=" +
encodeURIComponent(message)

}

);

let data =
await response.text();

document
.getElementById("typing")
.remove();

chatBox.innerHTML += `

<div class="message bot">

${data}

</div>

`;

chatBox.scrollTop =
chatBox.scrollHeight;
}

</script>

</body>

</html>