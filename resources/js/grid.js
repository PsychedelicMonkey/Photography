import imagesLoaded from 'imagesloaded';
import Masonry from 'masonry-layout';
import InfiniteScroll from 'infinite-scroll';
import lightGallery from 'lightgallery';

InfiniteScroll.imagesLoaded = imagesLoaded;

const grid = document.querySelector('.grid');

if (grid) {
  let msnry = new Masonry(grid, {
    itemSelector: 'none',
    columnWidth: '.grid-sizer',
    gutter: 22,
    percentPosition: true,
    stagger: 30,
    visibleStyle: { transform: 'translateY(0)', opacity: 1 },
    hiddenStyle: { transform: 'translateY(100px)', opacity: 0 },
  });

  imagesLoaded(grid, () => {
    msnry.options.itemSelector = '.grid-item';
    let items = grid.querySelectorAll('.grid-item');
    msnry.appended(items);
  });

  let infScroll = new InfiniteScroll(grid, {
    path: '?page={{#}}',
    history: false,
    append: '.grid-item',
    outlayer: msnry,
  });

  if (grid.classList.contains('photo-grid')) {
    const lg = lightGallery(grid, {
      download: false,
      licenseKey: import.meta.env.VITE_LG_LICENSE_KEY,
      selector: '.grid-item',
    });

    infScroll.on('append', (body, path, items, response) => {
      lg.refresh();
    });
  }
}
