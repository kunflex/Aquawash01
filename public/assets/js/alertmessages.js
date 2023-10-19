 // error message alert
 document.addEventListener("DOMContentLoaded", function () {
    // Get a reference to the error div and the close button
    const errorDiv = document.querySelector(".error");
    const closeButton = errorDiv.querySelector("button");

    // Add a click event listener to the close button
    closeButton.addEventListener("click", function () {
        // Hide the error div by setting its display property to "none"
        errorDiv.style.display = "none";
    });
});

// success message alert
document.addEventListener("DOMContentLoaded", function () {
    // Get a reference to the error div and the close button
    const errorDiv = document.querySelector(".success");
    const closeButton = errorDiv.querySelector("button");

    // Add a click event listener to the close button
    closeButton.addEventListener("click", function () {
        // Hide the error div by setting its display property to "none"
        errorDiv.style.display = "none";
    });
});