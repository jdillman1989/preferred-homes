export default class {

	constructor() {

	}

	/**
	 * setup
	 *
	 * Prepares the accordion toggle click
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setup() {
		document.querySelectorAll( '.accordion__toggle' ).forEach( toggle => {
			toggle.addEventListener( 'click', ( event ) => {
				const { target } = event;
				target.parentNode.classList.toggle( 'active' );
			});
		});
	}
}
