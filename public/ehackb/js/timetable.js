$(document).ready(function() {
    $(".tableitem a").click(function(event) {
        event.preventDefault();
        var selected = $(".tableitem.open").get(0);
        $(".tableitem").removeClass("open");
        if ($(this).parent().index() !== $(selected).index())
            $(this).parent().addClass("open");
    });

    $("article#locatie section a").on("click", function(e) {
        e.preventDefault();
        var current = $(this).parent();
        if (current.hasClass("selected")) {
            $("article#locatie section").removeClass("selected");
            $("article#locatie section").removeClass("hide");
            $(current).find("a img").attr("src", "img/button.png");
        } else {
            $("article#locatie section").removeClass("selected");
            $("article#locatie section").addClass("hide");
            $(current).addClass("selected");
            $(current).find("a img").attr("src", "img/cross.png");
        }
        $("article#locatie section.map").removeClass("hide");

    });

});
