$(function() {
    var visible = 0;
    $("#mainMenu .right li.mobil_click a").on("click", function(e) {
        e.preventDefault();
        if ($($(this).attr("href"))) {
            $("html, body").animate({
                scrollTop: $($(this).attr("href")).offset().top
            }, 200);
        }
    });

    $(window).scroll(function() {
        $("article").each(function(key, val) {
            if ($(val).is_on_screen()) {
                if (visible !== key) {
                    visible = key;

                    $("#mainMenu .right li a").removeClass("active");
                    var current = $("#mainMenu .right li:nth-child(" + (key + 1) + ") a");
                    console.log($(current).attr("href"));
                    $(current).addClass("active");
                }


            }
        });
    });

});

$.fn.is_on_screen = function() {

    var win = $(window);

    var viewport = {
        top: win.scrollTop(),
        left: win.scrollLeft()
    };
    viewport.right = viewport.left + win.width();
    viewport.bottom = viewport.top + win.height();

    var bounds = this.offset();
    bounds.right = bounds.left + this.outerWidth();
    bounds.bottom = bounds.top + this.outerHeight();

    return (!(viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom));

};
