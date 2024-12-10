// Function to format the date as "ddth month yyyy"
function formatDate(dateString) {
    const date = new Date(dateString);
    const day = date.getDate();
    const month = date.toLocaleString("default", { month: "long" });
    const year = date.getFullYear();
    
    // Determine the suffix for the day (e.g. "st", "nd", "rd", "th")
    let suffix = "th";
    if (day === 1 || day === 21 || day === 31) {
        suffix = "st";
    } else if (day === 2 || day === 22) {
        suffix = "nd";
    } else if (day === 3 || day === 23) {
        suffix = "rd";
    }

    return `${day}${suffix} ${month} ${year}`;
}

// Service options for subtypes
const serviceOptions = {
    student: [
        { value: "school_dance", text: "School Dance Photography" },
        { value: "graduation", text: "Graduation Portraits" },
        { value: "team_photos", text: "Team Photos" }
    ],
    wedding: [
        { value: "engagement", text: "Engagement Photoshoot" },
        { value: "wedding", text: "Wedding Photography" }
    ],
    corporate: [
        { value: "formal_event", text: "Formal Event Photography" },
        { value: "headshots", text: "Corporate Headshots" },
        { value: "team_portraits", text: "Team Portraits" }
    ],
    family: [
        { value: "studio", text: "Studio Portrait Session" },
        { value: "outdoor", text: "Outdoor Portrait Session" }
    ],
    event: [
        { value: "private_event", text: "Private Event Photography" },
        { value: "corporate_event", text: "Corporate Event Photography" }
    ],
    sessions: [
        { value: "beginner", text: "Beginner Photography" },
        { value: "intermediate", text: "Intermediate Photography" },
        { value: "advanced", text: "Advanced Photography" }
    ]
};

// Updating subtype options
function updateSubtypes() {
    const mainService = document.getElementById("main-service").value;
    const subtypeContainer = document.getElementById("subtype-container");
    const subtypeSelect = document.getElementById("subtype-service");

    subtypeSelect.innerHTML = '<option value="">-- Select a Subtype --</option>';

    if (mainService && serviceOptions[mainService]) {
        serviceOptions[mainService].forEach(subtype => {
            const option = document.createElement("option");
            option.value = subtype.value;
            option.textContent = subtype.text;
            subtypeSelect.appendChild(option);
        });
        subtypeContainer.style.display = "block";
    } else {
        subtypeContainer.style.display = "none";
    }
}

// Function to get the selected text of a dropdown by value
function getSelectedText(selectElementId, value) {
    const selectElement = document.getElementById(selectElementId);
    const selectedOption = Array.from(selectElement.options).find(option => option.value === value);
    return selectedOption ? selectedOption.text : ''; // Return the text or an empty string if no option is found
}

// Adding selected service to the list
document.getElementById("add-service").addEventListener("click", () => {
    const mainService = document.getElementById("main-service").value;
    const subtypeService = document.getElementById("subtype-service").value;
    const serviceDate = document.getElementById("service-date").value;

    if (!mainService || !subtypeService || !serviceDate) {
        showMessage("Please select all service details and date.");
        return;
    }

    // Get the selected text for both main service and subtype service
    const mainServiceText = getSelectedText("main-service", mainService);
    const subtypeServiceText = getSelectedText("subtype-service", subtypeService);

    const formattedDate = formatDate(serviceDate);

    const servicesList = document.getElementById("services-list");
    const listItem = document.createElement("li");
    listItem.textContent = `${mainServiceText} - ${subtypeServiceText} on ${formattedDate}`;
    servicesList.appendChild(listItem);

    showMessage("Service added successfully!", false);
});

// Show validation message
function showMessage(message, isError = true) {
    const messageContainer = document.getElementById("message-container");
    messageContainer.style.display = "block";
    messageContainer.textContent = message;
    messageContainer.style.color = isError ? "red" : "green";
}

// Remove the last item from the list
document.getElementById("remove-service").addEventListener("click", () => {
    const servicesList = document.getElementById("services-list");
    if (servicesList.lastChild) {
        servicesList.removeChild(servicesList.lastChild);
        showMessage("Service removed successfully!", false);
    } else {
        showMessage("No items to remove.");
    }
});

// Submit the booking form when the submit button is clicked
document.getElementById("user-details").addEventListener("submit", (event) => {
    event.preventDefault();

    const name = document.getElementById("user-name").value.trim();
    const email = document.getElementById("user-email").value.trim();
    const contact = document.getElementById("user-contact").value.trim();
    const serviceDate = document.getElementById("service-date").value.trim();
    const servicesList = document.getElementById("services-list");

    // Validation for name
    if (!name) {
        showMessage("Name is required. Please enter your name.");
        return;
    }

    // Validation for email
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!email || !emailPattern.test(email)) {
        showMessage("Invalid email address. Please enter a valid email.");
        return;
    }

    // Validation for contact number
    const contactPattern = /^[0-9]{10,15}$/;
    if (!contact || !contactPattern.test(contact)) {
        showMessage("Invalid contact number. Please enter a valid contact number (10-15 digits).");
        return;
    }

    // Validation for service date
    if (!serviceDate) {
        showMessage("Please select a booking date.");
        return;
    }

    // Validation for services list
    if (servicesList.children.length === 0) {
        showMessage("Please add at least one service to the list.");
        return;
    }

    // Displaying success msg
    showMessage("Your booking has been submitted successfully! Our team will be in touch with you shortly via email or phone call!", false);

    // Clear all input fields
    document.getElementById("user-name").value = "";
    document.getElementById("user-email").value = "";
    document.getElementById("user-contact").value = "";
    document.getElementById("user-msg").value = "";

    document.getElementById("service-date").value = "";

    // Clear services list
    servicesList.innerHTML = "";

    // Reset service selector
    document.getElementById("main-service").value = "";
    document.getElementById("subtype-service").innerHTML = '<option value="">-- Select a Subtype --</option>';
    document.getElementById("subtype-container").style.display = "none";
});

// Set the minimum date to tomorrow when the page loads
window.onload = setMinDate;

// Function to set the minimum date to tomorrow
function setMinDate() {
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);

    const dateInput = document.getElementById("service-date");
    const year = tomorrow.getFullYear();
    const month = String(tomorrow.getMonth() + 1).padStart(2, "0");
    const day = String(tomorrow.getDate()).padStart(2, "0");

    dateInput.setAttribute("min", `${year}-${month}-${day}`);
}
