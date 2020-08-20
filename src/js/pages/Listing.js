import Swiper from '../../../node_modules/swiper/js/swiper.min.js';

export default class {

	constructor() {

	}

	setupGallery() {

		const galleryThumbs = new Swiper( '.listing-display__thumbs', {
			spaceBetween: 15,
			slidesPerView: 5,
			freeMode: true,
			watchSlidesVisibility: true,
			watchSlidesProgress: true
		});

		new Swiper( '.listing-display__slider', {
			loop: true,
			spaceBetween: 15,
			centeredSlides: true,

			autoplay: {
				delay: 4000,
				disableOnInteraction: true
			},

			thumbs: {
				swiper: galleryThumbs
			},

			navigation: {
				nextEl: '.listing-display__slider--buttons--next',
				prevEl: '.listing-display__slider--buttons--previous'
			}
		});
	}

	setupSidebar() {
		console.log( 'sidebar' );
	}

	setupTabs() {
		console.log( 'tabs' );
	}

	create() {
		this.setupGallery();
		this.setupSidebar();
		this.setupTabs();
	}
}
