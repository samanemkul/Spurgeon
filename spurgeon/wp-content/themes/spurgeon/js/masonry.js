const ssMasonry = function () {
  const containerBricks = document.querySelector(".bricks-wrapper");
  if (!containerBricks) return;

  imagesLoaded(containerBricks, function () {
    const msnry = new Masonry(containerBricks, {
      itemSelector: ".entry",
      columnWidth: ".grid-sizer",
      percentPosition: true,
      resize: true,
    });
  });
};
