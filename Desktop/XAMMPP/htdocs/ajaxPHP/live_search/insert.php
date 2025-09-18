<?php
include 'db.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO `live_search` (`name`, `email`, `phone`) VALUES ('$name', '$email', '$phone');";
    $result = $conn->query($sql);
    if($result == TRUE){
        echo "New record created successfully.";
    }else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
    $conn->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tailwind CSS for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col items-center p-4">

    <div class="p-4 w-full max-w-lg mx-auto font-inter mb-4 bg-white rounded-lg shadow-md">
        <h1 class="text-center text-2xl font-bold mb-6 text-gray-800">
            Live Search Insert Form
        </h1>

        <form id="userFrom" class="space-y-4 flex flex-col mx-auto max-w-md">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="email" name="email"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow-lg transition-colors duration-200">
                Submit
            </button>
        </form>
        <div id="response" class="mt-4 p-3 text-center rounded-md text-gray-700 bg-gray-100 hidden"></div>
    </div>
</body>
</html>