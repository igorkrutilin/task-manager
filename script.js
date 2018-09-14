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
});
