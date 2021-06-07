$(document).ready(function () {
    const menu_desplegable = $(".menu_app");
    let accion_menu = "#btn_menu_accion";
    let btn_menu = $(".btn_menu");

    $(accion_menu).click(function () {
        if (!menu_desplegable.hasClass("show")) {
            menu_desplegable.toggleClass("show");
            btn_menu.removeAttr("id");
            btn_menu.attr("id", "cerrarMenu");
            accion_menu = "#cerrarMenu";
        } else {
            menu_desplegable.toggleClass("show");
            btn_menu.attr("id", "btn_menu_accion");
            accion_menu = "#cerrarMenu";
        }
    });
});
