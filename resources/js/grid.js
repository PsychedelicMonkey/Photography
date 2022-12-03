import imagesLoaded from 'imagesloaded';
import Masonry from 'masonry-layout';
import lightGallery from 'lightgallery';

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

if (grid.classList.contains('photo-grid')) {
  lightGallery(grid, {
    download: false,
    licenseKey: import.meta.env.VITE_LG_LICENSE_KEY,
    selector: '.grid-item',
  });
}
