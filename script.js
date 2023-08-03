const provinceDivs = document.querySelectorAll(".province");
const cardDivs = document.querySelectorAll(".card");

provinceDivs.forEach((div) => {
  div.addEventListener("click", () => {
    const provinceId = div.dataset.provinceId;
    window.location.href = `homePage.php?provinceId=${provinceId}`;
    console.log(provinceId);
  });
});

cardDivs.forEach((div) => {
    div.addEventListener("click", () => {
      const restauranteId = div.dataset.restaurantId;
      window.location.href = `restaurante.php?restauranteId=${restauranteId}`;
      console.log(restauranteId);
    });
  });
