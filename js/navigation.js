/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByClassName( 'menu-toggle' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links = menu.getElementsByTagName( 'a' );

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {
			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}
			self = self.parentElement;
		}
	}

	/**
	 * Toggles `aria-expanded` attributes and class names.
     * Used for sub-menu toggles if they exist (not currently implemented in this theme's HTML).
	 */
    // This part is for sub-menu dropdowns, which we haven't explicitly added yet,
    // but it's good practice to include if the menu might have them.
	var subMenuToggles = container.getElementsByClassName( 'dropdown-toggle' );
    for ( var j = 0; j < subMenuToggles.length; j++ ) {
        subMenuToggles[j].addEventListener( 'click', function( event ) {
            event.preventDefault();
            var screenReaderSpan = this.querySelector( '.screen-reader-text' );
            var subMenu = this.nextElementSibling; // Assuming sub-menu ul is the next sibling

            if ( subMenu ) {
                var expanded = this.getAttribute( 'aria-expanded' ) === 'true' || false;
                this.setAttribute( 'aria-expanded', !expanded );
                screenReaderSpan.textContent = screenReaderSpan.textContent === 'expand child menu' ? 'collapse child menu' : 'expand child menu';
                subMenu.classList.toggle( 'toggled-on' );
            }
        });
    }

}() );
