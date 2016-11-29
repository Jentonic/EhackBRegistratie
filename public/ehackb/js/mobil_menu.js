/**
 * Created by Maxim_Cvetkovic on 27/11/16.
 */
$(window).ready(function() {



    var window_w = $(window).width()
    var my_menu = $('.right')
    var append_here = $('.left')
    var mobil_li = '<li><a href="">ehackb4</a></li><li class="mobil_li"><img class="mobil_icon" src="ehackb/img/menu.png"></li>'

    if (window_w <= 900) {
        $(append_here).html(mobil_li)
        $(my_menu).toggleClass("toggle_mobil_menu", true)
    }


    //VAR HIER PAS TOEVOEGEN OMDAT HIJ ERVOOR NIET IN DE HTML ZIT
    var menu_icon = $('.mobil_icon')
    var on_click_menu = $('.mobil_click')

    if (window_w <= 900)
        $(on_click_menu).click(function() {
            $(my_menu).toggleClass("toggle_mobil_menu")
        })

    $(menu_icon).click(function() {
        $(my_menu).toggleClass("toggle_mobil_menu")
    })

});
