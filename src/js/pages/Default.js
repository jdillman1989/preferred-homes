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
		const socialShare = document.querySelector( '.social-share' );

		document.getElementById( 'socialToggle' ).addEventListener( 'click', () => {
			socialShare.classList.toggle( 'visible' );
		});

		document.getElementById( 'socialClose' ).addEventListener( 'click', () => {
			socialShare.classList.remove( 'visible' );
			socialShare.style.display = 'none';
		});
	}

	create() {
		this.setup();
	}
}
