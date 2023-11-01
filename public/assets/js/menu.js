//Menu button on navigation bar
const toggleButton = document.getElementById('toggle-button');
const myDiv = document.getElementById('Sidebar');
const myDiv1 = document.getElementById('mainbody');

toggleButton.addEventListener('click', function () {
    if (myDiv.style.display !== 'none') {
        myDiv.style.display = 'none'; // Hide the div
        toggleButton.style.marginLeft = '20px';
        myDiv1.style.marginLeft = '0px';
    } else {
        myDiv.style.display = 'block'; // Display the div
        toggleButton.style.marginLeft = '280px'; // Reset margin-left when displaying the div
        myDiv1.style.marginLeft = '270px';
    }
});