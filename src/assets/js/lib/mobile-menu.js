/**
 * Created by franz on 2017-10-22.
 */
jQuery(document).ready(function($) {
    $("#mobile-menu-button").on("click", function(){
        if ($("#mobile-menu-button").hasClass("is-active")) {
            $("#mobile-menu-button").removeClass("is-active");
        } else {
            $("#mobile-menu-button").addClass("is-active");
        }
    });
    $(window).resize(function(){
       if ($("#mobile-menu").css("display") == "none") {
            $("#mobile-menu-button").removeClass("is-active");
        }
    });
});