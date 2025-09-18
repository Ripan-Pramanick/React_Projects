<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery+Ajax</title>
    <!-- jQuery for AJAX calls -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tailwind CSS for styling -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 flex flex-col items-center p-4">

    <div class="p-4 w-full max-w-lg mx-auto font-inter mb-4 bg-white rounded-lg shadow-md">
        <h1 class="text-center text-2xl font-bold mb-6 text-gray-800">
            Ajax Insert Form
        </h1>

        <form id="userFrom" class="space-y-4 flex flex-col mx-auto max-w-md">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="text" id="email" name="email"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                <input type="text" id="phone" name="phone"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>
            <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md shadow-lg transition-colors duration-200">
                Submit
            </button>
        </form>
        <div id="response" class="mt-4 p-3 text-center rounded-md text-gray-700 bg-gray-100 hidden"></div>
    </div>

    <div class="w-full  h-full mx-auto font-inter mt-8 p-4 bg-white rounded-lg shadow-md">
        <h1 class="text-center text-2xl font-bold mb-4 text-gray-800">
            User's Data
        </h1>
        <div class="overflow-x-auto">
            <table id="userTable" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody id="userTableBody" class="bg-white divide-y divide-gray-200">
                    <!-- PHP code to fetch and display data will be inserted here -->
                    <?php include "fatch.php" ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $("#userFrom").on("submit", function (e) {
                e.preventDefault();
                let name = $("#name").val();
                let email = $("#email").val();
                let phone = $("#phone").val();

                // Ajax code starts
                $.ajax({
                    url: "db.php",
                    method: "POST",
                    data: { name: name, email: email, phone: phone },
                    // The bug was here. 'success=' should be 'success:'.
                    success: function (response) {
                        $("#response").html(response).removeClass('hidden').addClass('bg-green-100 text-green-700').fadeIn();
                        $("#userFrom")[0].reset();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        $("#response").html("Error: " + textStatus + ", " + errorThrown).removeClass('hidden').addClass('bg-red-100 text-red-700').fadeIn();
                    }
                });
            });

        
            // function loadData() {
            //     $.ajax({
            //         url: "fatch.php",
            //         method: "GET",
            //         success: function(data) {
            //             $("#userTable tbody").html(data);
            //         }
            //     });
            // }

            });
    </script>
</body>

</html>
