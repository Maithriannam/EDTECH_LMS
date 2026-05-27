<?php

session_start();

require_once("../config/db.php");

require_once("../vendor/fpdf/fpdf.php");

$success = "";

if(isset($_POST['generate'])){

    $student_name =
    $_POST['student_name'];

    $course_name =
    $_POST['course_name'];

    // PDF NAME
    $pdf_name =
    time() . "_certificate.pdf";

    // SAVE LOCATION
    $pdf_path =
    "../uploads/certificates/" .
    $pdf_name;

    // CREATE PDF
    $pdf = new FPDF(

        'L',
        'mm',
        'A4'
    );

    $pdf->AddPage();

    // BACKGROUND
    $pdf->SetFillColor(
        15,
        23,
        42
    );

    $pdf->Rect(
        0,
        0,
        297,
        210,
        'F'
    );

    // TITLE
    $pdf->SetTextColor(
        255,
        255,
        255
    );

    $pdf->SetFont(
        'Arial',
        'B',
        30
    );

    $pdf->Cell(
        0,
        30,
        'CERTIFICATE OF COMPLETION',
        0,
        1,
        'C'
    );

    // STUDENT NAME
    $pdf->SetFont(
        'Arial',
        'B',
        28
    );

    $pdf->SetTextColor(
        0,
        255,
        255
    );

    $pdf->Cell(
        0,
        30,
        $student_name,
        0,
        1,
        'C'
    );

    // DESCRIPTION
    $pdf->SetTextColor(
        255,
        255,
        255
    );

    $pdf->SetFont(
        'Arial',
        '',
        18
    );

    $pdf->Cell(
        0,
        20,
        'has successfully completed',
        0,
        1,
        'C'
    );

    // COURSE NAME
    $pdf->SetFont(
        'Arial',
        'B',
        24
    );

    $pdf->SetTextColor(
        255,
        215,
        0
    );

    $pdf->Cell(
        0,
        20,
        $course_name,
        0,
        1,
        'C'
    );

    // DATE
    $pdf->Ln(20);

    $pdf->SetFont(
        'Arial',
        '',
        16
    );

    $pdf->SetTextColor(
        255,
        255,
        255
    );

    $pdf->Cell(
        0,
        20,
        'Issued On: ' . date("d-m-Y"),
        0,
        1,
        'C'
    );

    // SAVE PDF
    $pdf->Output(
        'F',
        $pdf_path
    );

    // INSERT DATABASE
    $sql =
    "INSERT INTO certificates
    (
        student_name,
        course_name,
        certificate_file
    )

    VALUES
    (
        '$student_name',
        '$course_name',
        '$pdf_name'
    )";

    mysqli_query(
        $GLOBALS['conn'],
        $sql
    );

    $success =
    $pdf_name;
}
?>

<!DOCTYPE html>

<html>

<head>

<title>
Generate Certificate
</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>

body{

background:
radial-gradient(circle at top left,#7c3aed,transparent 25%),
radial-gradient(circle at bottom right,#06b6d4,transparent 25%),
#020617;

color:white;

font-family:Arial;
}

.glass{

background:rgba(255,255,255,0.05);

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
"
>

<form

method="POST"

class="
glass
w-[700px]
p-10
rounded-3xl
"
>

<h1
class="
text-5xl
font-bold
mb-10
"
>

Generate Certificate

</h1>

<?php

if($success != ""){

echo "

<div
class='
bg-green-500
p-4
rounded-2xl
mb-6
'
>

Certificate Generated Successfully

<a

href='../uploads/certificates/$success'

download

class='underline ml-3'

>

Download PDF

</a>

</div>

";
}
?>

<input

type="text"

name="student_name"

placeholder="Student Name"

required

class="
w-full
p-5
rounded-2xl
bg-slate-900
mb-6
"
>

<input

type="text"

name="course_name"

placeholder="Course Name"

required

class="
w-full
p-5
rounded-2xl
bg-slate-900
mb-6
"
>

<button

type="submit"

name="generate"

class="
w-full
bg-gradient-to-r
from-purple-600
to-cyan-500
p-5
rounded-2xl
font-bold
text-xl
"
>

Generate Certificate

</button>

</form>

</body>

</html>