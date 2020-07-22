import './utils/polyfills';

import Menu from './shared/Menu';
import Testimonials from './shared/Testimonials';

import Home from './pages/Home';

class App {
	constructor() {
		this.content = document.querySelector( '#main' );
		this.template = this.content.dataset.template;

		this.createPages();
		this.setupComponents();
	}

	/**
	 * Load Page Classes
	 */
	createPages() {
		this.content = document.querySelector( '#main' );

		this.pages = new Map();

		this.pages.set( 'home', new Home() );

		this.page = this.pages.get( this.template ) || this.pages.get( 'not-found' );
		if ( this.page ) {
			this.page.create();
		}
	}

	/**
	 * setupComponents
	 *
	 * Initializes the main components.
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setupComponents() {

		this.menu = new Menu();
		this.menu.setupMobile();
		this.menu.setupScroll();

		this.testimonials = new Testimonials();
		this.testimonials.setupSwiper();
	}
}

window.APP = new App();
