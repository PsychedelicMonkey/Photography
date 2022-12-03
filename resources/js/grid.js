import imagesLoaded from 'imagesloaded';
import Masonry from 'masonry-layout';

const grid = document.querySelector('.grid');
let msnry;

imagesLoaded(grid, () => {
  msnry = new Masonry(grid, {
    columnWidth: '.grid-sizer',
    gutter: 22,
    itemSelector: '.grid-item',
    percentPosition: true,
  });
});
