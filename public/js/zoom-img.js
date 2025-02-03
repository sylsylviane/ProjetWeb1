var lens = document.getElementById("lens");
var first = document.getElementById("first");
var second = document.getElementById("second");
var img = document.getElementById("img");
var imagesMiniature = document.querySelectorAll(".miniature img");
console.log(imagesMiniature);

imagesMiniature.forEach(function(image){
    image.addEventListener('click', function(){
        console.log(image.src);
        img.src = image.src;
    })
})

first.addEventListener("mousemove", function (e) {
  var rect = img.getBoundingClientRect();
  var x = e.clientX - rect.left;
  var y = e.clientY - rect.top;

  lens.style.display = "block";
  lens.style.left = x + "px";
  lens.style.top = y + "px";

  second.style.backgroundImage = "url('" + img.src + "')";
  second.style.backgroundPosition =
    (x - lens.offsetWidth / 2) * -6 +
    "px " +
    (y - lens.offsetHeight / 2) * -6 +
    "px";
});

first.addEventListener("mouseout", function () {
  lens.style.display = "none";
});


