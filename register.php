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
    <form action="registercek.php" method="POST">
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="relative flex flex-col m-6 space-y-8 bg-white shadow-2xl rounded-2xl md:flex-row md:space-y-0">
                <!-- left side -->
                <div class="flex flex-col justify-center p-8 md:p-14 md:w-1/2">
                    <span class="mb-3 text-4xl font-bold">Register</span>
                    <span class="font-light text-gray-400 mb-8">Please register first and then login</span>
                    <div class="py-4">
                        <span class="mb-2 text-md">Username</span>
                        <input type="text" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" name="username" id="username" required />
                    </div>
                    <div class="py-4">
                        <span class="mb-2 text-md">Password</span>
                        <input type="password" name="pass" id="pass" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required />
                    </div>
                    <div class="py-4">
                        <span class="mb-2 text-md">Email</span>
                        <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required />
                    </div>
                </div>

                <!-- right side for Full Name and Address -->
                <div class="flex flex-col justify-center p-8 md:p-14 md:w-1/2 space-y-4">
                    <div class="py-4">
                        <span class="mb-2 text-md">Full Name</span>
                        <input type="text" name="fullname" id="fullname" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required />
                    </div>
                    <div class="py-4">
                        <span class="mb-2 text-md">Address</span>
                        <input type="text" name="alamat" id="address" class="w-full p-2 border border-gray-300 rounded-md placeholder:font-light placeholder:text-gray-500" required />
                    </div>

                    <!-- Sign up button -->
                    <div class="py-4">
                        <input type="submit" value="Sign up" name="submit" class="w-full bg-black text-white p-2 rounded-lg mb-6 hover:bg-white hover:text-black hover:border hover:border-gray-300" />
                    </div>

                    <!-- Already have an account link -->
                    <div class="text-center text-gray-400">
                        Already have an account?
                        <a href="login.php"><span class="font-bold text-black">Sign in here</span></a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
