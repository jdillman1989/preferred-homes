import Swiper from '../../../node_modules/swiper/js/swiper.min.js';

export default class {

	constructor() {

	}

	/**
	 * setupSwiper
	 *
	 * Init Swiper Slider.
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setupSwiper() {
		new Swiper( '.testimonials__slider', {
			loop: true,
			centeredSlides: true,

			navigation: {
				nextEl: '.testimonials__slider--buttons--next',
				prevEl: '.testimonials__slider--buttons--previous'
			}
		});
	}
}
