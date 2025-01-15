<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body>
    <form action="ceklogin.php" method="POST">
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div
                class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
                <!-- left side -->
                <div class="flex flex-col justify-center p-8 md:p-14">
                    <span class="mb-3 text-4xl font-bold">Welcome back</span>
                    <span class="font-light text-gray-400 mb-8">
                        Welcome back! Please enter your details
                    </span>
                    <div class="py-4">
                        <span class="mb-2 text-md">Username</span>
                        <input
                            type="text"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500"
                            name="username"
                            id="username"
                            required />
                    </div>
                    <div class="py-4">
                        <span class="mb-2 text-md">Password</span>
                        <input
                            type="password"
                            name="pass"
                            id="pass"
                            class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required />
                    </div>
                    <button
                        class="w-full bg-black text-white p-2 rounded-lg mb-6 hover:bg-white hover:text-black hover:border hover:border-gray-300">
                        Sign in
                    </button>
                    <div class="text-center text-gray-400">
                        Dont'have an account?
                        <a href="register.php"><span class="font-bold text-black">Sign up for free</span></a>
                    </div>
                </div>
                <!-- {/* right side */} -->
                <div class="relative">
                    <img
                        src="image.jpg"
                        alt="img"
                        class="w-[400px] h-full hidden rounded-r-2xl md:block object-cover" />
                    <!-- text on image  -->
                </div>
            </div>
        </div>
        </div>
    </form>
</body>

</html>