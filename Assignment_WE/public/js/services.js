window.addEventListener("message", function (event) {
    // Ensure the message is from a trusted source
    if (event.origin !== window.location.origin) return;
    
    // Scroll to the section based on the message received
    const sectionId = event.data;
    const sectionElement = document.getElementById(sectionId);
    if (sectionElement) {
        sectionElement.scrollIntoView({ behavior: 'smooth' });
    }
});



function scrollToSection(sectionId) {
    const sectionElement = document.getElementById(sectionId);
    if (sectionElement) {
        sectionElement.scrollIntoView({ behavior: 'smooth' });
        let lastChar = String(sectionId)
        lastChar = lastChar[lastChar.length-1];
        display_hidden_details(lastChar);
    }
}

function toggle_hidden_details(i){
    const sectionDiv = document.getElementById("section-div-" + i);
    const cur = sectionDiv.style.display 
    sectionDiv.style.display = cur == "block" ? "none":"block";
    document.getElementById("section-button-"+i).innerHTML = cur == "block" ? "Show Details":"Hide Details";
}

function display_hidden_details(i){
    const sectionDiv = document.getElementById("section-div-" + i);
    sectionDiv.style.display = "block";
    document.getElementById("section-button-"+i).innerHTML = "Hide Details";
}
