function init() {

}
function ImageSlider() {
     var time = 2000;
     var current = 0;
     var images = getImagesFromSlider();
     var slider = document.querySelector("#slider");
     slider.style.position = "relative";
     var slides = slider.querySelector(".slides");
     slides.style.display = "none";
     var c_slides = document.createElement("div");
     c_slides.appendChild(createImg());
     c_slides.children[0].src = images[0];
     slider.appendChild(c_slides);
     var roundBtn = createRoundBtn(images.length);
     slider.appendChild(roundBtn);
     roundBtn.style.left = `calc(50% - ${roundBtn.offsetWidth/2}px)`;
     slider.addEventListener("click", function(e) {
          event.preventDefault();
          let togglers = document.querySelectorAll("#slider .toggleImage");
          let index = Array.from(togglers).indexOf(e.target);
          if(index > -1) {
               c_slides.children[0].src = images[index];
               current = index;
               Array.from(roundBtn.children).forEach(function(btn) {
                    btn.style.background = "#fff";
                    roundBtn.children[current].style.background = "#17a2b8";
               });
               clearInterval(runInt);
               runInt = setInterval(func, time);
          }
     });
     var func = function() {
          current += 1;
          c_slides.children[0].src = images[current];
          Array.from(roundBtn.children).forEach(function(btn) {
               btn.style.background = "#fff";
               roundBtn.children[current].style.background = "#17a2b8";
          });
          if(current == images.length - 1)
               current = -1;
     };
     window.onload = function () {
          var runInt = setInterval(func, time);
     };
     console.log(c_slides);
}
function getImagesFromSlider() {
     let arr = [];
     let images = document.getElementsByClassName("slide");
     for (let i = 0; i < images.length; i++) {
          arr.push(images[i].src);
     }
     return arr;
}
function createImg() {
     let img = document.createElement("img");
     img.style.width = "100%";
     img.style.height = "450px";
     return img;
}
function createRoundBtn(count) {
     let container = document.createElement("div");
     container.style.position = "absolute";
     container.style.bottom = "50px";
     container.style.display = "flex";
     for(let i = 0; i < count; i++) {
          let spaces = "7px";
          let dot = document.createElement("div");
          dot.style.width = "15px";
          dot.style.height = "15px";
          dot.style.marginLeft = spaces;
          dot.style.marginRight = spaces;
          dot.style.background = i == 0 ? "#17a2b8" : "white";
          dot.style.borderRadius = "50%";
          dot.className = "toggleImage";
          container.appendChild(dot);
     }
     return container;
}
// console.dir(document);
ImageSlider();
