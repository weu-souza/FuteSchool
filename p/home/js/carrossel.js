const $leftBtn = $(".carrossel-left");
const $rightBtn = $(".carrossel-right");
const $imagensCarrossel = $(".carrossel-images");

const itemWidth = $imagensCarrossel.find(".imagens").first().outerWidth(true);

$leftBtn.on("click", function () {
  $imagensCarrossel.animate(
    {
      scrollLeft: $imagensCarrossel.scrollLeft() - itemWidth,
    },
    400
  );
});

$rightBtn.on("click", function () {
  $imagensCarrossel.animate(
    {
      scrollLeft: $imagensCarrossel.scrollLeft() + itemWidth,
    },
    400
  );
});
