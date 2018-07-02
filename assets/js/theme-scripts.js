jQuery( function( $ ) {
	"use strict";
	$( ".maincat > .cat-item-count" ).each( function() {
		$( this ).prev( "a" ).append( " " + $( this ).html() );
		$( this ).remove();
	} );
	if ( "click" == hrb_i18n.categories_menu ) {
		$( '#navigation a[href*="/categories"]' ).addClass( "dynamic-cat-menu" );
		$( ".dynamic-cat-menu" ).on( "click", function( e ) {
			var a_obj = $( this );
			$( ".categories-menu" ).slideToggle( "slow", function() {
				var hidden = $( this ).is( ":hidden" );
				if ( !hidden ) {
					a_obj.addClass( "hide-categories" );
				} else {
					a_obj.removeClass( "hide-categories" );
				}
			} );
			e.preventDefault();
		} );
	}
	var url = window.location.hash;
	var hash = url.substring( url.indexOf( "#" ) + 1 );
	if ( hash ) {
		if ( "respond" === hash ) {
			hash = "clarification";
		}
		if ( undefined !== $( '.section-tabs a[href="#' + hash + '"]' ).html() ) {
			$( ".section-tabs a" ).parents( "section" ).removeClass( "active" );
			$( '.section-tabs a[href="#' + hash + '"]' ).closest( "section" ).addClass( "active" );
			$( "html,body" ).animate( {
				scrollTop: $( ".section-tabs a[href=#" + hash + "]" ).offset().top - 100
			} );
		} else if ( undefined !== $( "#respond" ).html() ) {
			$( "html,body" ).animate( {
				scrollTop: $( "#respond" ).offset().top - 100
			} );
		}
	}
	$( ".f-dropdown:not(.open)" ).css( {
		position: "absolute",
		left: "-99999px"
	} );
	$( ".f-dropdown" ).click( function() {
		if ( $( this ).hasClass( "open" ) ) {
			$( 'a[data-dropdown="' + $( this ).attr( "id" ) + '"]' ).trigger( "click" );
		}
	} );
	$( "#drop-search a" ).click( function() {
		$( "#st" ).val( $( this ).attr( "data-value" ) );
		$( 'a[data-dropdown="drop-search"]' ).html( $( this ).html() );
	} );
	$( ".previous-step" ).click( function( ev ) {
		ev.preventDefault();
		var action = $( this ).attr( "previous-step-url" );
		$( "form.main" ).attr( "action", action );
		$( "form.main" ).submit();
	} );
	$( "input[name=plan]" ).on( "change", function() {
		var plan_id = $( this ).val();
		$( ".featured-option:not(.plan_id-" + plan_id + ") input[type=checkbox]" ).prop( "checked", "" );
		$( document ).foundation( "forms" );
	} );

	function hrb_parse_url_vars( url ) {
		var vars = [],
			hash;
		var hashes = url.slice( url.indexOf( "?" ) + 1 ).split( "&" );
		for ( var i = 0; i < hashes.length; i++ ) {
			hash = hashes[ i ].split( "=" );
			vars.push( hash[ 0 ] );
			vars[ hash[ 0 ] ] = hash[ 1 ];
		}
		return vars;
	}
	$( document ).on( "click", ".favorites > a", function( e ) {
		var fave = $( this );
		var fave_data = hrb_parse_url_vars( fave.attr( "href" ) );
		var faved_count = $( ".project-unfave-link" ).length;
		var unfaved_count = 0;
		$.post( hrb_i18n.ajaxurl, {
			action: "project_favorite",
			current_url: hrb_i18n.current_url,
			_ajax_nonce: fave_data[ "ajax_nonce" ],
			favorite: fave_data[ "favorite" ],
			post_id: fave_data[ "post_id" ]
		}, function( data ) {
			$( ".notice" ).fadeOut( "slow" );
			$( "#main:first-child" ).prepend( data.notice );
			fave.replaceWith( data.html );
			if ( data.redirect ) {
				return;
			}
			if ( ( "projects" == hrb_i18n.dashboard || "favorites" == hrb_i18n.dashboard ) && fave.hasClass( "project-unfave-link" ) ) {
				$( "article#post-" + fave_data[ "post_id" ] ).fadeOut();
				unfaved_count++;
				if ( faved_count == unfaved_count ) {
					location.reload();
				}
			}
		}, "json" );
		e.preventDefault();
		return false;
	} );
	if ( undefined !== $( "form[id*=payment-form]" ).html() ) {
		$( "form[id*=payment-form]" ).on( "mousemove", function( event ) {
			if ( undefined !== $( "form[id*=payment-form] .notice" ).html() && undefined === $( "form[id*=payment-form] .alert-box" ).html() ) {
				$( "form[id*=payment-form] .notice" ).addClass( "alert-box" );
			}
		} );
		$( "form[id*=payment-form]" ).addClass( "custom" );
		$( "form[id*=payment-form] input[type=submit]" ).addClass( "button" );
		$( "form[id*=payment-form] input[type=text]" ).addClass( "text regular-text" );
		$( document ).foundation( "forms" );
	}
	$( "form.gateway" ).addClass( "custom" );
	$( ".checkout-process .section-head h2:first" ).replaceWith( "<h1>" + $( ".checkout-process .section-head h2:first" ).text() + "</h1>" );
	$( document ).foundation( "forms" );
} );

jQuery( document ).foundation();
