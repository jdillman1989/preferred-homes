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
			if ( 1 < document.documentElement.scrollTop && 767 < window.innerWidth ) {
				navBar.classList.add( 'fixed' );
				navBar.style.top = headerHeight + 'px';
			} else {
				navBar.classList.remove( 'fixed' );
				navBar.style.top = initialTop;
			}
		});

		window.addEventListener( 'resize', () => {
			headerHeight = document.querySelector( '.top-nav' ).offsetHeight;
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
		const mobileIcon = document.querySelector( '#mobileNav' );
		const mainNavList = document.querySelector( '#mainNavList' );

		mobileIcon.addEventListener( 'click', () => {
			mainNavList.classList.toggle( 'mobile-visible' );
		});

		window.addEventListener( 'resize', () => {
			if ( 1023 < window.innerWidth ) {
				mainNavList.classList.remove( 'mobile-visible' );
			}
		});
	}

	setupDefaults() {
		const blankLinks = document.querySelectorAll( 'a[href="#"]' );

		blankLinks.forEach( link => {
			link.addEventListener( 'click', ( e ) => {
				e.preventDefault();
			});
		});
	}
}
