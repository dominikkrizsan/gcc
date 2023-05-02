$(".car").change(function () {
    if (this.checked) {
        //style when check
        if ($(".car").filter(":checked")) {
            $(this).parent().css("background-color", "#7dd3fc");
        }
        //error
        if ($(".car").filter(":checked").length > 1) {
            $(".car").prop("checked", false);
            swal("You can only choose ONE car card", "", "error");
            $(".car").parent().css("background-color", "#fafafa");
        }
    } else {
        $(this).parent().css("background-color", "#fafafa");
    }
});
$(".tuning").change(function () {
    if (this.checked) {
        //style when check
        if ($(".tuning").filter(":checked")) {
            $(this).parent().css("background-color", "#7dd3fc");
        }
        //error
        if ($(".tuning").filter(":checked").length > 1) {
            $(".tuning").prop("checked", false);
            swal("You can only choose ONE tuning cards", "", "error");
            $(".tuning").parent().css("background-color", "#fafafa");
        }
    } else {
        $(this).parent().css("background-color", "#fafafa");
    }
});
