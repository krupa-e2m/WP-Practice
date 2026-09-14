/**
 * Front-end behaviour for the PixeSaaS sections.
 *
 * Two things only, both progressive enhancements: the mobile navigation
 * panel and the monthly/annual switch in the pricing section. Every section
 * still reads and works with JavaScript disabled.
 *
 * @package PixeSaaS
 */

( function () {
	'use strict';

	/**
	 * Mobile navigation panel.
	 */
	function initNavigation() {
		var toggle = document.querySelector( '[data-nav-toggle]' );
		var panel = document.querySelector( '[data-nav-panel]' );

		if ( ! toggle || ! panel ) {
			return;
		}

		function close() {
			toggle.setAttribute( 'aria-expanded', 'false' );
			panel.classList.remove( 'is-open' );
			document.body.classList.remove( 'ps-nav-open' );
		}

		toggle.addEventListener( 'click', function () {
			var open = toggle.getAttribute( 'aria-expanded' ) === 'true';

			toggle.setAttribute( 'aria-expanded', open ? 'false' : 'true' );
			panel.classList.toggle( 'is-open', ! open );
			document.body.classList.toggle( 'ps-nav-open', ! open );
		} );

		// Close on Escape, on an outside click, and when the layout goes wide.
		document.addEventListener( 'keydown', function ( event ) {
			if ( event.key === 'Escape' ) {
				close();
			}
		} );

		document.addEventListener( 'click', function ( event ) {
			if ( ! panel.classList.contains( 'is-open' ) ) {
				return;
			}

			if ( ! panel.contains( event.target ) && ! toggle.contains( event.target ) ) {
				close();
			}
		} );

		if ( window.matchMedia ) {
			var wide = window.matchMedia( '(min-width: 1024px)' );
			var onChange = function ( event ) {
				if ( event.matches ) {
					close();
				}
			};

			if ( wide.addEventListener ) {
				wide.addEventListener( 'change', onChange );
			} else if ( wide.addListener ) {
				wide.addListener( onChange );
			}
		}
	}

	/**
	 * Pricing monthly / annual switch.
	 *
	 * Both prices are always present in the markup; the switch only flips
	 * which one is visible, so the section is complete without JS too.
	 */
	function initPricing() {
		var toggles = document.querySelectorAll( '[data-pricing-toggle]' );

		Array.prototype.forEach.call( toggles, function ( toggle ) {
			var section = toggle.closest( '.ps-pricing' );

			if ( ! section ) {
				return;
			}

			var labels = section.querySelectorAll( '[data-pricing-label]' );

			var apply = function ( annual ) {
				toggle.setAttribute( 'aria-checked', annual ? 'true' : 'false' );
				section.classList.toggle( 'is-annual', annual );

				Array.prototype.forEach.call( labels, function ( label ) {
					var isAnnual = label.getAttribute( 'data-pricing-label' ) === 'annual';

					label.classList.toggle( 'is-active', isAnnual === annual );
				} );
			};

			apply( toggle.getAttribute( 'aria-checked' ) === 'true' );

			toggle.addEventListener( 'click', function () {
				apply( toggle.getAttribute( 'aria-checked' ) !== 'true' );
			} );
		} );
	}

	function init() {
		initNavigation();
		initPricing();
	}

	if ( document.readyState === 'loading' ) {
		document.addEventListener( 'DOMContentLoaded', init );
	} else {
		init();
	}
}() );
