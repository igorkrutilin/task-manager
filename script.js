$(document).ready(function() {
    $("#form").submit(function(event) {
        event.preventDefault();
        for (var i = 0; i < $("input:first").val().length; i++) {
            if ($("input:first").val()[i] == "\"" || $("input:first").val()[i] == "'") {
                $("#task").val("");
                iziToast.error({
                    title: "Error!",
                    message: "You can't use ' or \" symbols",
                });
                return;
            }
        }
        $.ajax({
            type: "POST",
            url: "adding_handler.php",
            data: $("#form").serialize(),
            success: function(task) {
                $("#task").val("");
                $("#list").append(task);
                iziToast.success({
                    title: "Success!",
                    message: "Task is successfuly added!",
                });
            }
        });
    });

    $(document).on("click", "button", function() {
        var div = $(this).parent();
        var div_text = $(this).parent().text();
        var task = "";
        for (var i = 0; i < div_text.length - 3; i++) {
            task += div_text[i];
        }
        $.ajax({
            type: "POST",
            url: "deleting_handler.php",
            data: {
                task: task
            },
            success: function() {
                div.remove();
                iziToast.success({
                    title: "Success!",
                    message: "Task marked as completed!",
                });
            }
        });
    });
});
