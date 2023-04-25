/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            width: {
                useredit: "25rem",
                128: "70rem",
                card: "20rem",
                card_cart: "16rem",
                card_craft: "15rem",
                card_bot_admin: "10rem",
                table: "65rem",
                table_category: "70rem",
                add_bot_card: "30rem",
            },
            gridTemplateColumns: {
                cart: "300px 1fr",
                choose_bot: "300px 1fr",
                combine: "1fr 1px 1fr",
                game: "1fr 200px 1fr",
            },
        },
    },
    plugins: [],
};
