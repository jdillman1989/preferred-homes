export default class {

	/**
	 * setupDropdowns
	 *
	 * Display term lists on filter button click
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setupDropdowns() {

		const taxonomySelector = '.filter-button';
		const taxonomyButtons = document.querySelectorAll( taxonomySelector );

		document.addEventListener( 'click', ( event ) => {
			const { target } = event;

			if ( target.classList.contains( 'displayed' ) ) {
				target.classList.remove( 'displayed' );
				return;
			}

			taxonomyButtons.forEach( button => {
				button.classList.remove( 'displayed' );
			});

			if ( target.classList.contains( 'filter-button' ) ) {
				target.classList.add( 'displayed' );
			}
		});
	}

	/**
	 * setupTerms
	 *
	 * Display term name and call posts
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setupTerms() {
		const nextButton = document.getElementById( 'morePosts' );

		document.querySelectorAll( '.term-item' ).forEach( listItem => {
			listItem.addEventListener( 'click', ( event ) => {
				const { target } = event;
				const taxonomy = target.dataset.tax;
				const term = target.dataset.term;
				const label = target.innerText;

				document.getElementById( taxonomy + '-current' ).innerText = label;

				let currentFilter = JSON.parse( nextButton.dataset.tax );
				currentFilter[taxonomy] = term;
				currentFilter.category = 'all';
				nextButton.dataset.tax = JSON.stringify( currentFilter );

				this.filterPosts( nextButton.dataset );
			});
		});
	}

	/**
	 * setupNextButton
	 *
	 * Load more posts button
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	setupNextButton() {
		const nextButton = document.getElementById( 'morePosts' );

		nextButton.addEventListener( 'click', ( event ) => {
			const { target } = event;
			this.filterPosts( target.dataset, true );
		});
	}

	/**
	 * filterPosts
	 *
	 * Display term name and call posts
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	filterPosts( filterParams, isAppended = false, isSearch = false ) {

		const nextButton = document.getElementById( 'morePosts' );
		const postsSection = document.querySelector( '.archive__posts' );
		const postsWrapper = document.querySelector( '.archive__posts--wrapper' );

		postsSection.classList.add( 'faded' );

		const requestData = ( isSearch ) ? filterParams :
			{
				tax: JSON.parse( filterParams.tax ),
				next: ( isAppended ) ? filterParams.next : 1,
				ppp: filterParams.ppp,
				type: filterParams.type
			};

		fetch( nextButton.dataset.action, {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify( requestData )
		}).then( ( response ) => {
			return response.json();
		}).then( ( data ) => {
			const next = ( isAppended ) ? parseInt( nextButton.dataset.next ) + 1 : 2;
			nextButton.dataset.next = next;
			nextButton.dataset.max = data.max;

			if ( next > data.max || isSearch ) {
				nextButton.classList.add( 'disabled' );
			} else {
				nextButton.classList.remove( 'disabled' );
			}

			const dataHTML = this.getPostsMarkup( postsWrapper, data.data );

			if ( ! isAppended ) {
				postsWrapper.parentNode.replaceChild( dataHTML, postsWrapper );
			} else {
				dataHTML.replaceWith( ...dataHTML.childNodes );
				postsWrapper.appendChild( ...dataHTML.childNodes );
			}

			postsSection.classList.remove( 'faded' );
		}).catch( error => console.error( 'Error:', error ) );
	}

	/**
	 * getPostsMarkup
	 *
	 * Apply post data to view markup
	 *
	 * @type function
	 * @since 0.0.1
	 *
	 * @param NA
	 * @return NA
	 */
	getPostsMarkup( wrapper, postData ) {
		const getTemplate = wrapper.firstElementChild;

		const html = wrapper.cloneNode();

		if ( ! postData.length ) {
			const template = getTemplate.cloneNode( true );
			template.style.display = 'none';

			html.appendChild( template );

			const noPosts = document.createElement( 'p' );
			noPosts.classList.add( 'error' );
			noPosts.innerText = 'No posts found.';
			html.appendChild( noPosts );

			return html;
		}

		postData.forEach( post => {
			const template = getTemplate.cloneNode( true );
			if ( 'A' == template.tagName ) {
				template.href = post.url;
			}

			const title = template.querySelector( '[data-title]' );
			const links = template.querySelectorAll( '[data-url]' );
			const img = template.querySelector( '[data-img]' );
			const sqft = template.querySelector( '[data-sqft]' );
			const size = template.querySelector( '[data-size]' );

			title.innerText = post.title;
			sqft.innerText = 'SqFt: ' + post.sqft;
			size.innerText = 'Size: ' + post.size;

			links.forEach( link => {
				link.href = post.url;
			});

			if ( post.image ) {
				img.src = post.image;
			}
			img.style.display = 'block';

			template.style.display = 'block';

			html.appendChild( template );
		});

		return html;
	}

	create() {
		this.setupDropdowns();
		this.setupTerms();
		this.setupNextButton();
	}
}
