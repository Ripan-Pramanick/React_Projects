<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <link rel="stylesheet" href="searchBar.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 flex flex-col items-center p-4 relative">
    <div>
        <div id="poda" class="relative mx-auto">
            <div class="glowr"></div>
            <div class="darkBorderBgr"></div>
            <div class="darkBorderBgr"></div>
            <div class="darkBorderBgr"></div>

            <div class="white"></div>

            <div class="border"></div>

            <div id="main ">
                <input placeholder="Search..." type="text" id="search" name="text" class="input" />
                <div id="input-mask"></div>
                <div id="pink-mask"></div>
                <div class="filterBorder"></div>
                <div id="filter-icon">
                    <div id="wifi-loader">
                        <svg class="circle-outer" viewBox="0 0 86 86">
                            <circle class="back" cx="43" cy="43" r="40"></circle>
                            <circle class="front" cx="43" cy="43" r="40"></circle>
                            <circle class="new" cx="43" cy="43" r="40"></circle>
                        </svg>
                        <svg class="circle-middle" viewBox="0 0 60 60">
                            <circle class="back" cx="30" cy="30" r="27"></circle>
                            <circle class="front" cx="30" cy="30" r="27"></circle>
                        </svg>
                        <svg class="circle-inner" viewBox="0 0 34 34">
                            <circle class="back" cx="17" cy="17" r="14"></circle>
                            <circle class="front" cx="17" cy="17" r="14"></circle>
                        </svg>
                        <div class="text" data-text="Searching"></div>
                    </div>
                </div>
                <div id="search-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke-linejoin="round" stroke-linecap="round" height="24" fill="none"
                        class="feather feather-search">
                        <circle stroke="url(#search)" r="8" cy="11" cx="11"></circle>
                        <line stroke="url(#searchl)" y2="16.65" y1="22" x2="16.65" x1="22"></line>
                        <defs>
                            <linearGradient gradientTransform="rotate(50)" id="search">
                                <stop stop-color="#f8e7f8" offset="0%"></stop>
                                <stop stop-color="#b6a9b7" offset="50%"></stop>
                            </linearGradient>
                            <linearGradient id="searchl">
                                <stop stop-color="#b6a9b7" offset="0%"></stop>
                                <stop stop-color="#837484" offset="50%"></stop>
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div id="result"></div>

    <script>
        $(document).ready(function () {
            $("#search").on("keyup", function () {
                let keyword = $(this).val().trim(); // Use .trim() to handle whitespace
                if (keyword !== "") { // Use strict equality for better practice
                    $.ajax({
                        url: 'searchFatch.php',
                        method: 'POST',
                        data: { query: keyword },
                        success: function (data) {
                            $("#result").html(data);
                        }
                    });
                } else {
                    $("#result").html(''); // Clear the results when the search bar is empty
                }
            });
        });
    </script>
</body>

</html>