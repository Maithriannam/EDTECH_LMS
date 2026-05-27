<?php

session_start();

include "config/db.php";

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $password = $_POST['password'];

    // FIND USER
    $query = mysqli_query(

        $conn,

        "SELECT * FROM users
         WHERE email='$email'"
    );

    // USER EXISTS
    if(mysqli_num_rows($query) > 0){

        $user = mysqli_fetch_assoc($query);

        // VERIFY PASSWORD
        if(
            password_verify(
                $password,
                $user['password']
            )
        ){

            // CREATE SESSION
            $_SESSION['user_id']
                = $user['id'];

            $_SESSION['full_name']
                = $user['full_name'];

            $_SESSION['role']
                = $user['role'];

            // REDIRECT BASED ON ROLE
            if(
                $user['role']
                == "student"
            ){

                header(
                    "Location: dashboard/student/index.php"
                );

                exit();

            } elseif(
                $user['role']
                == "teacher"
            ){

                header(
                    "Location: dashboard/teacher/index.php"
                );

                exit();

            } else {

                header(
                    "Location: dashboard/admin/index.php"
                );

                exit();
            }

        } else {

            $error =
                "Invalid Password";
        }

    } else {

        $error =
            "User Not Found";
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
        Login
    </title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;800&display=swap"
        rel="stylesheet"
    >

    <style>

        body{
            font-family: 'Inter', sans-serif;
        }

    </style>

</head>

<body
    class="
        bg-slate-950
        text-white
        min-h-screen
        flex
        items-center
        justify-center
    "
>

    <form

        method="POST"

        class="
            bg-slate-900
            border
            border-slate-800
            p-10
            rounded-3xl
            w-[450px]
            shadow-2xl
        "
    >

        <!-- TITLE -->
        <h1
            class="
                text-4xl
                font-extrabold
                text-purple-500
                mb-8
            "
        >
            Welcome Back
        </h1>

        <!-- ERROR -->
        <?php if(isset($error)){ ?>

            <div
                class="
                    bg-red-500
                    p-4
                    rounded-xl
                    mb-6
                "
            >

                <?= $error ?>

            </div>

        <?php } ?>

        <!-- EMAIL -->
        <input

            type="email"

            name="email"

            placeholder="Enter Email"

            required

            class="
                w-full
                p-4
                rounded-2xl
                bg-slate-800
                mb-5
                outline-none
            "
        >

        <!-- PASSWORD -->
        <input

            type="password"

            name="password"

            placeholder="Enter Password"

            required

            class="
                w-full
                p-4
                rounded-2xl
                bg-slate-800
                mb-6
                outline-none
            "
        >

        <!-- BUTTON -->
        <button

            type="submit"

            name="login"

            class="
                w-full
                bg-gradient-to-r
                from-purple-600
                to-cyan-500
                p-4
                rounded-2xl
                font-bold
                text-lg
            "
        >
            Login
        </button>

        <!-- REGISTER -->
        <p
            class="
                text-slate-400
                mt-6
                text-center
            "
        >

            Don't have account?

            <a
                href="register.php"
                class="
                    text-purple-400
                    font-bold
                "
            >
                Register
            </a>

        </p>

    </form>

</body>

</html>