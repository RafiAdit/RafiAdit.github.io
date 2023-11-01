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

  function updateClock() {
    var elementJam = document.getElementById("jam");
    var now = new Date();
    var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    var day = days[now.getDay()];
    var date = now.getDate();
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    var month = months[now.getMonth()];
    var year = now.getFullYear();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeString = day + ', ' + date + ' ' + month + ' ' + year + ' - ' + (hours < 10 ? "0" : "") + hours + ':' + (minutes < 10 ? "0" : "") + minutes + ':' + (seconds < 10 ? "0" : "") + seconds;
    elementJam.innerText = timeString;
  }

  updateClock();
  setInterval(updateClock, 1000);
