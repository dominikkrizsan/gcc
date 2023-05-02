$(document).ready(function () {
    // data
    // car data 4 style
    const carhp = $("#car_hp");
    const cartq = $("#car_tq");
    const carztoh = $("#car_ztoh");
    const carqmile = $("#car_qmile");
    const carptow = $("#car_ptow");
    // bot data
    const bothp = $("#bot_hp").val();
    const bottq = $("#bot_tq").val();
    const botztoh = $("#bot_ztoh").val();
    const botqmile = $("#bot_qmile").val();
    const botptow = $("#bot_ptow").val();
    // deck data
    const deckhp = $("#deck_hp").val();
    const decktq = $("#deck_tq").val();
    const deckztoh = $("#deck_ztoh").val();
    const deckqmile = $("#deck_qmile").val();
    const deckptow = $("#deck_ptow").val();
    // game data
    let botpoints = 0;
    let playerpoints = 0;
    let winner = "";
    let balanceget = 0;
    const bot_tier = $("#bot_card_tier").val();

    // calculate results
    // calculate time values
    const bottimesresult = parseFloat(botztoh) + parseFloat(botqmile);
    const decktimesresult = parseFloat(deckztoh) + parseFloat(deckqmile);
    // calculate hp and tq
    const botstrength = parseInt(bothp) + parseInt(bottq);
    const deckstrength = parseInt(deckhp) + parseInt(decktq);
    // calculate balanceget
    if (bot_tier == 1) {
        balanceget = 50;
    } else if (bot_tier == 2) {
        balanceget = 75;
    } else if (bot_tier == 3) {
        balanceget = 100;
    } else if (bot_tier == 4) {
        balanceget = 150;
    } else if (bot_tier == 5) {
        balanceget = 300;
    }

    // invisble on load
    carhp.css("color", "#e4e4e7");
    cartq.css("color", "#e4e4e7");
    carztoh.css("color", "#e4e4e7");
    carqmile.css("color", "#e4e4e7");
    carptow.css("color", "#e4e4e7");

    // result
    $("#try").on("click", function () {
        // change to visible
        carhp.css("color", "#3f3f46");
        cartq.css("color", "#3f3f46");
        carztoh.css("color", "#3f3f46");
        carqmile.css("color", "#3f3f46");
        carptow.css("color", "#3f3f46");
        // measure times
        if (decktimesresult > bottimesresult) {
            botpoints++;
        } else {
            playerpoints++;
        }
        if (deckstrength > botstrength) {
            playerpoints++;
        } else {
            botpoints++;
        }
        if (deckptow > botptow) {
            playerpoints++;
        } else {
            botpoints++;
        }
        if (playerpoints > botpoints) {
            winner = "player";
            $("#score").val(playerpoints + "-" + botpoints);
            $("#result").val(winner);
            $("#balanceget").val(balanceget);
            swal({
                title: "The score is " + playerpoints + " - " + botpoints,
                text: "Good job, YOU WIN",
                icon: "success",
                button: "Continue",
            });
        } else {
            balanceget = 0;
            winner = "bot";
            $("#score").val(playerpoints + "-" + botpoints);
            $("#result").val(winner);
            $("#balanceget").val(balanceget);
            swal({
                title: "The score is " + playerpoints + " - " + botpoints,
                text: "You lost!",
                icon: "warning",
                button: "Continue",
            });
        }
    });

    //----------------------------------------------------------it lesz ha mukodik minden
    // do duel
    $("#do_duel").on("click", function () {
        $("#myForm").submit(function (event) {
            var formId = this.id,
                form = this;
            mySpecialFunction(formId);

            event.preventDefault();

            setTimeout(function () {
                form.submit();
            }, 3000);
        });
        // change to visible
        carhp.css("color", "#3f3f46");
        cartq.css("color", "#3f3f46");
        carztoh.css("color", "#3f3f46");
        carqmile.css("color", "#3f3f46");
        carptow.css("color", "#3f3f46");
        // measure times
        if (decktimesresult > bottimesresult) {
            botpoints++;
        } else {
            playerpoints++;
        }
        if (deckstrength > botstrength) {
            playerpoints++;
        } else {
            botpoints++;
        }
        if (deckptow > botptow) {
            playerpoints++;
        } else {
            botpoints++;
        }
        if (playerpoints > botpoints) {
            winner = "player";
            $("#score").val(playerpoints + "-" + botpoints);
            $("#result").val(winner);
            $("#balanceget").val(balanceget);
            swal({
                title: "The score is " + playerpoints + " - " + botpoints,
                text: "Good job, YOU WIN",
                icon: "success",
                button: "Continue",
            });
        } else {
            balanceget = 0;
            winner = "bot";
            $("#score").val(playerpoints + "-" + botpoints);
            $("#result").val(winner);
            $("#balanceget").val(balanceget);
            swal({
                title: "The score is " + playerpoints + " - " + botpoints,
                text: "You lost!",
                icon: "warning",
                button: "Continue",
            });
        }
    });
    //----------------------------------------------------------it fent lesz ha mukodik minden

    // delay form submission
    $("#myForm").submit(function (event) {
        var formId = this.id,
            form = this;
        mySpecialFunction(formId);

        event.preventDefault();

        setTimeout(function () {
            form.submit();
        }, 300);
    });

    // tier alapjan color set
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
