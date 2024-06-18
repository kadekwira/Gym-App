function toggleDropdown() {
  var dropdownMenu = document.getElementById("dropdownMenu");
  if (dropdownMenu.style.display === "block") {
      dropdownMenu.style.display = "none";
  } else {
      dropdownMenu.style.display = "block";
  }
}

window.onclick = function(event) {
  if (!event.target.matches('.profile-link')) {
      var dropdowns = document.getElementsByClassName("dropdown-content");
      for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.style.display === "block") {
              openDropdown.style.display = "none";
          }
      }
  }
}




