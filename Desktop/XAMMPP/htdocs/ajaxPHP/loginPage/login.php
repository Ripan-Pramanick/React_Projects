<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full w-full bg-cover bg-center " style="background-image:url(https://images.pexels.com/photos/3585093/pexels-photo-3585093.jpeg);" >
    <div class="min-h-screen flex items-center justify-center ">
        <div class="bg-white  p-8 rounded shadow-md w-full max-w-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
            <form id="" class="space-y-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <button type="submit"
                        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validate() {
            const username = document.getElementById("username").value;
            const password = document.getElementById("password").value;

            // Check for empty fields
            if (username === "" || password === "") {
                alert("Please fill in all fields.");
                return false;
            }

            // Validate username as email
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(username)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Validate password against the pattern
            const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordPattern.test(password)) {
                alert("Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.");
                return false;
            }

            return true;
        }

        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault(); // Always prevent default submission to handle it with Fetch

            // Run all validations
            if (validate()) {
                const username = document.getElementById('username').value;
                const password = document.getElementById('password').value;

                const formData = new FormData();
                formData.append('username', username);
                formData.append('password', password);

                // Send the data using Fetch API
                fetch('fetch.php', { // Corrected the typo from 'fatch.php' to 'fetch.php'
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    alert(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("An error occurred. Please try again later.");
                });
            }
        });
    </script>
</body>

</html>