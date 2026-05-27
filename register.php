<?php

session_start();

include "config/db.php";

if(isset($_POST['register'])){

    $full_name = $_POST['full_name'];

    $email = $_POST['email'];

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $role = $_POST['role'];

    $check = mysqli_query(
        $conn,
        "SELECT * FROM users
         WHERE email='$email'"
    );

    if(mysqli_num_rows($check) > 0){

        $error = "Email already exists";

    } else {

        $query = mysqli_query(

            $conn,

            "INSERT INTO users(
                full_name,
                email,
                password,
                role
            )

            VALUES(

                '$full_name',

                '$email',

                '$password',

                '$role'
            )"
        );

        if($query){

            header("Location: login.php");

            exit();
        }
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
    Register
  </title>

  <script src="https://cdn.tailwindcss.com"></script>

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
      p-10
      rounded-3xl
      w-[450px]
      border
      border-slate-800
    "
  >

    <h1
      class="
        text-4xl
        font-bold
        mb-8
        text-purple-500
      "
    >
      Create Account
    </h1>

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

    <input

      type="text"

      name="full_name"

      placeholder="Full Name"

      required

      class="
        w-full
        p-4
        rounded-xl
        bg-slate-800
        mb-5
        outline-none
      "
    >

    <input

      type="email"

      name="email"

      placeholder="Email"

      required

      class="
        w-full
        p-4
        rounded-xl
        bg-slate-800
        mb-5
        outline-none
      "
    >

    <input

      type="password"

      name="password"

      placeholder="Password"

      required

      class="
        w-full
        p-4
        rounded-xl
        bg-slate-800
        mb-5
        outline-none
      "
    >

    <select

      name="role"

      class="
        w-full
        p-4
        rounded-xl
        bg-slate-800
        mb-5
      "
    >

      <option value="student">
        Student
      </option>

      <option value="teacher">
        Teacher
      </option>

    </select>

    <button

      type="submit"

      name="register"

      class="
        w-full
        bg-purple-600
        p-4
        rounded-xl
        font-bold
      "
    >
      Register
    </button>

    <p
      class="
        mt-6
        text-slate-400
      "
    >

      Already have account?

      <a
        href="login.php"
        class="text-purple-400"
      >
        Login
      </a>

    </p>

  </form>

</body>

</html>