console.log("header_footer.js is loaded!");

// Add an event listener for the theme toggle
document.addEventListener("DOMContentLoaded", function () {
    const themeToggle = document.getElementById("theme-toggle");
    
    if (themeToggle) {
        themeToggle.addEventListener("change", function () {
            const body = document.body;

            // Toggle the theme based on the checkbox status
            if (this.checked) {
                body.classList.add("theme2");
            } else {
                body.classList.remove("theme2");
            }
        });
    } else {
        console.error("Theme toggle element not found.");
    }
});
