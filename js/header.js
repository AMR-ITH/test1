// let ui_menu = document.querySelector(" #nav_container ul");
// let humberger_menu = document.querySelector(".humberger_menu");
// let cross_menu = document.querySelector(".icon_cross");

let ui_menu = document.querySelector("#nav_container ul");
let humberger_menu = document.querySelector(".humberger_menu");
let cross_menu = document.querySelector(".icon_cross");

// Function to show the menu
function showMenu() {
  ui_menu.style.visibility = "visible";
  ui_menu.style.animation = "none";
  ui_menu.offsetHeight; // Trigger a reflow to apply the reset
  ui_menu.style.animation = null;

  ui_menu.style.animationPlayState = "running";
}

// Function to hide the menu
function hideMenu() {
  ui_menu.style.visibility = "hidden";
  ui_menu.style.animation = "none";
  ui_menu.offsetHeight; // Trigger a reflow to apply the reset
  ui_menu.style.animation = null;

  ui_menu.addEventListener(
    "animationend",
    () => {
      ui_menu.style.animationPlayState = "paused"; // Pause the animation after it ends
    },
    { once: true }
  );
}

// Toggle the menu when the hamburger icon is clicked
// humberger_menu.addEventListener("click", function () {
//   if (ui_menu.style.visibility === "visible") {
//     hideMenu(); // Hide the menu when it's already visible or not set
//   } else {
//     showMenu(); // Show the menu when it's hidden
//   }
// });

// // Toggle the menu when the close icon is clicked
// cross_menu.addEventListener("click", function () {
//   hideMenu();
// });
humberger_menu.addEventListener("click", function () {
  if (ui_menu.style.animationPlayState === "running") {
    hideMenu();
  } else {
    showMenu();
  }
});

cross_menu.addEventListener("click", function () {
  hideMenu();
});

window.onload = () => {
  document.body.style.opacity = 1;
};
