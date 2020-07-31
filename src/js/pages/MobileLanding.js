export default class {

	constructor() {

	}

	/**
	 * setup
	 *
	 * Prepares the page.
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setup() {
		document.getElementById( 'contentButton' ).addEventListener( 'click', ( e ) => {
			e.preventDefault();
			const contentPos = document.getElementById( 'mobile-content' ).getBoundingClientRect().top + window.pageYOffset;
			window.scroll({
				top: contentPos,
				behavior: 'smooth'
			});
		});
	}

	create() {
		this.setup();
	}
}
