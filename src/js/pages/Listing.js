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
		const sidebar = document.querySelector( '.listing-sidebar__aside__wrapper' );
		let headerHeight =
			document.querySelector( '.main-nav' ).offsetHeight +
			document.querySelector( '.top-nav' ).offsetHeight;
		let origin = 0;
		let initialTop = sidebar.style.top;

		console.log( headerHeight );

		window.addEventListener( 'scroll', () => {
			if ( 1200 < window.innerWidth ) {
				if ( sidebar.getBoundingClientRect().top <= headerHeight && ! origin ) {
					sidebar.classList.add( 'fixed' );
					sidebar.style.top = headerHeight + 'px';
					origin = document.documentElement.scrollTop + headerHeight;
				} else if ( origin && document.documentElement.scrollTop + headerHeight <= origin ) {
					sidebar.classList.remove( 'fixed' );
					sidebar.style.top = initialTop;
					origin = 0;
				}
			} else {
				sidebar.classList.remove( 'fixed' );
				sidebar.style.top = initialTop;
				origin = 0;
			}
		});

		window.addEventListener( 'resize', () => {
			headerHeight =
				document.querySelector( '.main-nav' ).offsetHeight +
				document.querySelector( '.top-nav' ).offsetHeight;

			origin = 0;
			initialTop = sidebar.style.top;
		});
	}

	setupTabs() {
		const tabs = document.querySelectorAll( '.listing-sidebar__content--tab' );
		const contents = document.querySelectorAll( '.listing-sidebar__content--tab-content' );
		tabs.forEach( tab => {
			tab.addEventListener( 'click', ( event ) => {
				const { target } = event;
				const contentTarget = target.dataset.tab;

				contents.forEach( content => {
					content.classList.remove( 'selected' );

					if ( content.dataset.tabcontent == contentTarget ) {
						content.classList.add( 'selected' );
					}
				});

				tabs.forEach( button => {
					button.classList.remove( 'selected' );
					target.classList.add( 'selected' );
				});
			});
		});
	}

	create() {
		this.setupGallery();
		this.setupSidebar();
		this.setupTabs();
	}
}
