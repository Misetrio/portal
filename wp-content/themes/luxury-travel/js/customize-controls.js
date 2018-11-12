( function( api ) {

	// Extends our custom "luxury-travel" section.
	api.sectionConstructor['luxury-travel'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );