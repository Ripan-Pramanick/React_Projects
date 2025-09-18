$(document).ready(function(){
    $("#search").on("keyup", function(){
        let keyword = $(this).val();
        if(keyword != ""){
            $.ajax({
                url: 'search.php',
                method: 'POST',
                data: {query: keyword},
                success: function(data){
                    $("#result").html(data);
                }
            });
        };
    });
});