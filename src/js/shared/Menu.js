export default class {

	constructor() {

	}

	/**
	 * setupScroll
	 *
	 * Fixed position on scroll.
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setupScroll() {

		const navBar = document.querySelector( '#mainNav' );
		let headerHeight = document.querySelector( '.top-nav' ).offsetHeight;
		let initialTop = navBar.style.top;

		window.addEventListener( 'scroll', () => {
			if ( 1 < document.documentElement.scrollTop ) {
				navBar.classList.add( 'fixed' );
				navBar.style.top = headerHeight + 'px';
			} else {
				navBar.classList.remove( 'fixed' );
				navBar.style.top = initialTop;
			}
		});

		window.addEventListener( 'resize', () => {
			headerHeight = document.querySelector( '.header__wrapper' ).offsetHeight;
			initialTop = navBar.style.top;
		});
	}

	/**
	 * setupMobile
	 *
	 * Prepares the mobile menu.
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setupMobile() {
		console.log( 'Menu' );
	}
}
