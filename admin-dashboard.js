function setupDropdown(itemClass) {
  item = document.querySelector(itemClass);

  item.addEventListener("click", function () {
    const dropDown = this.querySelector(".dropdown-ul");
    const arrowDown = this.querySelector(".side-arrow");

    dropDown.classList.toggle("show");

    if (arrowDown.classList.contains("fa-chevron-right")) {
      arrowDown.classList.remove("fa-chevron-right");
      arrowDown.classList.add("fa-angle-down");
    } else {
      arrowDown.classList.remove("fa-angle-downf");
      arrowDown.classList.add("fa-chevron-right");
    }
  });
}

setupDropdown(".manufactures-item");
setupDropdown(".products-item");
