$(document).ready(function () {
    const winner = $("#game_winner").val();
    const bg = $("#bg");
    if (winner == "bot") {
        bg.attr({
            style: "background-image:linear-gradient(to bottom right, red , #3f3f46);",
        });
    } else {
        bg.attr({
            style: "background-image:linear-gradient(to bottom right, #10b981 , #3f3f46);",
        });
    }
});
