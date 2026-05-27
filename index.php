<?php

session_start();

if(
    !isset($_SESSION['user_id'])
){

    header(
      "Location: ../../login.php"
    );

    exit();
}

if(
    $_SESSION['role']
    != "student"
){

    header(
      "Location: ../../login.php"
    );

    exit();
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
    Student Dashboard
  </title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Font -->
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

<body class="bg-slate-950 text-white">

  <div class="flex">

    <!-- SIDEBAR -->
    <aside
      class="
        w-72
        h-screen
        bg-slate-900
        border-r
        border-slate-800
        p-6
      "
    >

      <!-- LOGO -->
      <h1
        class="
          text-3xl
          font-extrabold
          text-purple-500
          mb-12
        "
      >
        Learnova
      </h1>

      <!-- MENU -->
      <nav class="space-y-4">

        <a
          href="#"

          class="
            block
            bg-purple-600
            p-4
            rounded-2xl
            font-bold
          "
        >
          Dashboard
        </a>

        <a
          href="#"

          class="
            block
            hover:bg-slate-800
            p-4
            rounded-2xl
          "
        >
          Courses
        </a>

        <a
          href="#"

          class="
            block
            hover:bg-slate-800
            p-4
            rounded-2xl
          "
        >
          Assignments
        </a>

        <a
          href="#"

          class="
            block
            hover:bg-slate-800
            p-4
            rounded-2xl
          "
        >
          Tests
        </a>

        <a
          href="#"

          class="
            block
            hover:bg-slate-800
            p-4
            rounded-2xl
          "
        >
          FeeFlow
        </a>

        <a
          href="#"

          class="
            block
            hover:bg-slate-800
            p-4
            rounded-2xl
          "
        >
          Certificates
        </a>

        <a
          href="#"

          class="
            block
            hover:bg-slate-800
            p-4
            rounded-2xl
          "
        >
          Live Classes
        </a>

        <a
          href="../../logout.php"

          class="
            block
            bg-red-500
            p-4
            rounded-2xl
            mt-10
          "
        >
          Logout
        </a>

      </nav>

    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-10">

      <!-- TOP -->
      <div
        class="
          flex
          justify-between
          items-center
          mb-12
        "
      >

        <div>

          <h1
            class="
              text-5xl
              font-extrabold
            "
          >

            Welcome,

            <span class="text-purple-500">

              <?= $_SESSION['full_name'] ?>

            </span>

          </h1>

          <p
            class="
              text-slate-400
              mt-4
            "
          >
            AI Powered Student Dashboard
          </p>

        </div>

        <!-- PROFILE -->
        <div
          class="
            bg-slate-900
            px-6
            py-4
            rounded-2xl
            border
            border-slate-800
          "
        >

          Student

        </div>

      </div>

      <!-- ANALYTICS -->
      <div
        class="
          grid
          grid-cols-4
          gap-6
        "
      >

        <!-- GPA -->
        <div
          class="
            bg-slate-900
            rounded-3xl
            p-8
            border
            border-slate-800
          "
        >

          <p
            class="
              text-slate-400
              mb-4
            "
          >
            GPA
          </p>

          <h1
            class="
              text-5xl
              font-bold
            "
          >
            8.9
          </h1>

        </div>

        <!-- XP -->
        <div
          class="
            bg-slate-900
            rounded-3xl
            p-8
            border
            border-slate-800
          "
        >

          <p
            class="
              text-slate-400
              mb-4
            "
          >
            XP Score
          </p>

          <h1
            class="
              text-5xl
              font-bold
            "
          >
            2400
          </h1>

        </div>

        <!-- ATTENDANCE -->
        <div
          class="
            bg-slate-900
            rounded-3xl
            p-8
            border
            border-slate-800
          "
        >

          <p
            class="
              text-slate-400
              mb-4
            "
          >
            Attendance
          </p>

          <h1
            class="
              text-5xl
              font-bold
            "
          >
            92%
          </h1>

        </div>

        <!-- RANK -->
        <div
          class="
            bg-slate-900
            rounded-3xl
            p-8
            border
            border-slate-800
          "
        >

          <p
            class="
              text-slate-400
              mb-4
            "
          >
            Rank
          </p>

          <h1
            class="
              text-5xl
              font-bold
            "
          >
            #4
          </h1>

        </div>

      </div>

      <!-- COURSES -->
      <div
        class="
          mt-12
          bg-slate-900
          rounded-3xl
          p-10
          border
          border-slate-800
        "
      >

        <div
          class="
            flex
            justify-between
            items-center
            mb-10
          "
        >

          <h2
            class="
              text-3xl
              font-bold
            "
          >
            My Courses
          </h2>

          <button
            class="
              bg-purple-600
              px-6
              py-3
              rounded-2xl
            "
          >
            View All
          </button>

        </div>

        <!-- COURSE GRID -->
        <div
          class="
            grid
            grid-cols-3
            gap-6
          "
        >

          <!-- CARD -->
          <div
            class="
              bg-slate-800
              rounded-3xl
              p-6
            "
          >

            <h3
              class="
                text-2xl
                font-bold
              "
            >
              Artificial Intelligence
            </h3>

            <p
              class="
                text-slate-400
                mt-4
              "
            >
              Learn AI concepts and projects.
            </p>

            <button
              class="
                mt-6
                bg-cyan-500
                px-5
                py-3
                rounded-2xl
              "
            >
              Continue
            </button>

          </div>

          <!-- CARD -->
          <div
            class="
              bg-slate-800
              rounded-3xl
              p-6
            "
          >

            <h3
              class="
                text-2xl
                font-bold
              "
            >
              Full Stack Development
            </h3>

            <p
              class="
                text-slate-400
                mt-4
              "
            >
              MERN Stack + Deployment.
            </p>

            <button
              class="
                mt-6
                bg-cyan-500
                px-5
                py-3
                rounded-2xl
              "
            >
              Continue
            </button>

          </div>

          <!-- CARD -->
          <div
            class="
              bg-slate-800
              rounded-3xl
              p-6
            "
          >

            <h3
              class="
                text-2xl
                font-bold
              "
            >
              Cloud Computing
            </h3>

            <p
              class="
                text-slate-400
                mt-4
              "
            >
              AWS + Azure + DevOps.
            </p>

            <button
              class="
                mt-6
                bg-cyan-500
                px-5
                py-3
                rounded-2xl
              "
            >
              Continue
            </button>

          </div>

        </div>

      </div>

    </main>

  </div>

</body>

</html>