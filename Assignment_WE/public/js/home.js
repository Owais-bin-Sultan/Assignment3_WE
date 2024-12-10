document.addEventListener("DOMContentLoaded", () => {
    // Save initial styles using getComputedStyle
    const initialStyles = [];
    const cardStyles = [];
    const textElements = document.querySelectorAll('.testimonials .text');
    const nameElements = document.querySelectorAll('.testimonials .name');
    const cardTestimonials = document.querySelectorAll('.testimonials .text-container');

    // Save styles for text and name elements
    textElements.forEach((text) => {
        const computedStyle = window.getComputedStyle(text);
        initialStyles.push({
            element: text,
            fontSize: computedStyle.fontSize,
            fontStyle: computedStyle.fontStyle,
            color: computedStyle.color,
            backgroundColor: computedStyle.backgroundColor,
        });
    });

    nameElements.forEach((name) => {
        const computedStyle = window.getComputedStyle(name);
        initialStyles.push({
            element: name,
            fontSize: computedStyle.fontSize,
            color: computedStyle.color,
            backgroundColor: computedStyle.backgroundColor,
        });
    });

    // Save initial background color for cardTestimonials
    cardTestimonials.forEach((card) => {
        const computedStyle = window.getComputedStyle(card);
        cardStyles.push({
            element: card,
            backgroundColor: computedStyle.backgroundColor,
        });
    });

    // Change Text Style
    document.getElementById("changeTextStyle").addEventListener("click", function () {
        textElements.forEach((text) => {
            text.style.fontSize = "20px";
            text.style.fontStyle = "normal";
            text.style.color = "black";
            text.style.backgroundColor = "white";
        });

        nameElements.forEach((name) => {
            name.style.fontSize = "22px";
            name.style.color = "black";
            name.style.backgroundColor = "white";
        });

        cardTestimonials.forEach((card) => {
            card.style.backgroundColor = "white";
        });
    });

    // Reset Text Style
    document.getElementById("resetTextStyle").addEventListener("click", function () {
        initialStyles.forEach((style) => {
            style.element.style.fontSize = style.fontSize;
            style.element.style.fontStyle = style.fontStyle || "";
            style.element.style.color = style.color;
            style.element.style.backgroundColor = style.backgroundColor;
        });

        cardStyles.forEach((style) => {
            style.element.style.backgroundColor = style.backgroundColor;
        });
    });
});
