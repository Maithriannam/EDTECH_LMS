<?php

$conn = mysqli_connect(

    "localhost",

    "root",

    "",

    "edtech_lms"
);

if(!$conn){

    die(
        mysqli_connect_error()
    );
}