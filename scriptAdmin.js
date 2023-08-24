const cardDivs = document.querySelectorAll(".card");

cardDivs.forEach((div) => {
    div.addEventListener("click", () => {
        const restauranteId = div.dataset.restaurantId;
        window.location.href = `restauranteAdmin.php?restauranteId=${restauranteId}`;
        console.log(restauranteId);
    });
});
