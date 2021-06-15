$(document).ready(function () {
    $(".btn-like").css("cursor", "pointer");
    $(".btn-dislike").css("cursor", "pointer");

    let url = "";
    if (location.host == "localhost") {
        url = "http://localhost/Red-Social/public/";
    } else {
        url = location.protocol + "//" + location.host + "/";
    }

    console.log(url);
    function like() {
        $(".btn-like")
            .unbind("click")
            .click(function () {
                const image_id = $(this).data("id");
                $(this).addClass("btn-dislike").removeClass("btn-like");
                $(this).attr("src", url + "img/red.ico");
                $.ajax({
                    url: url + "imagen/like/" + image_id,
                    type: "GET",
                    success: function (response) {
                        if (response) {
                            $.ajax({
                                url: url + "countLikes/" + image_id,
                                type: "GET",
                                success: function (response) {
                                    let id_img = "#" + image_id;
                                    $(id_img).html(response.count.length);
                                },
                            });
                        }
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
                const image_id = $(this).data("id");
                $(this).addClass("btn-like").removeClass("btn-dislike");
                $(this).attr("src", url + "img/black.ico");

                $.ajax({
                    url: url + "imagen/dislike/" + image_id,
                    type: "GET",
                    success: function (response) {
                        if (response) {
                            $.ajax({
                                url: url + "countLikes/" + image_id,
                                type: "GET",
                                success: function (response) {
                                    let id_img = "#" + image_id;
                                    $(id_img).html(response.count.length);
                                },
                            });
                        }
                    },
                });

                like();
            });
    }
    dislike();

    $("#buscador").submit(function () {
        $(this).attr(
            "action",
            url + "user/index/" + $("#buscador #search").val()
        );
    });
});
