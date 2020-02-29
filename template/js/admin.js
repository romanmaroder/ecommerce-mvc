
$(document).ready(function() {

    $(".admin__input-hide").change(function() {

        var f_name = [];

        for (var i = 0; i < $(this).get(0).files.length; ++i) {

            f_name.push(" " + $(this).get(0).files[i].name);

        }

        $("#admin__img").val(f_name.join(", "));
    });

});