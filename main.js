let nav = document.querySelectorAll(".nav-item")

for (let i = 0; i < nav.length; i++) {
    nav[i].onclick = function() {
        let j = 0;
        while (j < nav.length) {
            nav[j++].className = 'nav-item'
        }
        nav[i].className = 'nav-item active'
    }
}
function showGenre() {
    var childContents = document.querySelectorAll('.genre');
        for (var i = 0; i < childContents.length; i++) {
          childContents[i].style.display = 'block';
        }
}
function hideGenre() {
    var childContents = document.querySelectorAll('.genre');
        for (var i = 0; i < childContents.length; i++) {
          childContents[i].style.display = 'none';
        }
}

let flag = true;

myDiv.addEventListener("click", function() {
  if (flag) {
    // execute f1 on first click
    showGenre();
    flag = false;
  } else {
    // execute f2 on second click
    hideGenre();
    flag = true;
  }
});

marker.addEventListener("click", function() {
  var xhttp = new XMLHttpRequest();
  alert("aassa")
});