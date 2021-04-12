$(document).ready(function () {
    $(".btn-like").css("cursor", "pointer");
    $(".btn-dislike").css("cursor", "pointer");
    const url = "http://localhost/CursoPHP/app_red_social/public/";
    const contador = $(".count-like");
    function like() {
        $(".btn-like")
            .unbind("click")
            .click(function () {
                $(this).addClass("btn-dislike").removeClass("btn-like");
                $(this).attr("src", url + "img/red.ico");
                $.ajax({
                    url: url + "imagen/like/" + $(this).data("id"),
                    type: "GET",
                    success: function (response) {
                        console.log(response);
                    },
                });
                dislike();
            });
    }
    like();

    function dislike() {
        $(".btn-dislike")
            .unbind("click")
            .click(function () {
                $(this).addClass("btn-like").removeClass("btn-dislike");
                $(this).attr("src", url+"img/black.ico");

                $.ajax({
                    url: url + "imagen/dislike/" + $(this).data("id"),
                    type: "GET",
                    success: function (response) {
                        console.log(response);
                    },
                });

                like();
            });
    }
    dislike();
});
