(function($) {
    console.log("test");
    $(".gform_wrapper form input").focus(function () {
        console.log(this.id);
        var id = this.id;
        $("label[for='"+id+"']").addClass('focus');
    });


    function removeFocus($focus) {

    }
    function addFocus($focus) {

    }
})( jQuery );