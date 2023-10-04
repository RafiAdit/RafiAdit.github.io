function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");

    if (document.body.classList.contains("dark-mode")) {
        alert("Dark mode enabled.");
    } else {
        alert("Dark mode disabled.");
    }
}
function myButtonClick() {
    var confirmation = confirm("Apakah Anda ingin melanjutkan?");
    if (confirmation) {
        
        alert("Anda memilih untuk melanjutkan.");
    } else {
        alert("Anda memilih untuk tidak melanjutkan.");
    }
}

document.getElementById("myButton").addEventListener("click", myButtonClick);