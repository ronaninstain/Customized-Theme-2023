document.addEventListener("DOMContentLoaded", function () {
  const inputField = document.querySelector(
    ".srs_input_of_view_courses form > .srs_input_field"
  );
  const cards = document.querySelectorAll(".a2n_similar-card");

  inputField.addEventListener("input", function () {
    const inputValue = inputField.value.trim().toLowerCase();

    cards.forEach((card) => {
      const title = card
        .querySelector(".a2n_card-bottom span")
        .textContent.toLowerCase();

      if (title.includes(inputValue)) {
        card.style.display = "flex";
      } else {
        card.style.display = "none";
      }
    });
  });
});
