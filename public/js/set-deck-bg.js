$(document).ready(function () {
    const tier_val = $("#tierval").val();
    const tier_text = $("#tier");
    const bg = $("#card_bg");
    if (tier_val == 1) {
        tier_text.css("color", "#d1d5db");
        bg.attr({
            style: "background-image:linear-gradient(to bottom right, #6b7280 , black);",
        });
        $(".spec").css("color", "#4b5563");
    } else if (tier_val == 2) {
        tier_text.css("color", "#38bdf8");
        bg.attr({
            style: "background-image:linear-gradient(to bottom right, #38bdf8 , black);",
        });
        $(".spec").css("color", "#0284c7");
    } else if (tier_val == 3) {
        tier_text.css("color", "#10b981");
        bg.attr({
            style: "background-image:linear-gradient(to bottom right, #047857 , black);",
        });
        $(".spec").css("color", "#059669");
    } else if (tier_val == 4) {
        tier_text.css("color", "#ef4444");
        bg.attr({
            style: "background-image:linear-gradient(to bottom right, #b91c1c , black);",
        });
        $(".spec").css("color", "#dc2626");
    } else if (tier_val == 5) {
        tier_text.css("color", "#a855f7");
        bg.attr({
            style: "background-image:linear-gradient(to bottom right, #7e22ce , black);",
        });
        $(".spec").css("color", "#9333ea");
    }
});
