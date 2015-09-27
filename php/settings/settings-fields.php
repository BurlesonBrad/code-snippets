<?php

/**
 * Retrieve the default setting values
 * @return array
 */
function code_snippets_get_default_settings() {
	static $defaults;

	if ( isset( $defaults ) ) {
		return $defaults;
	}

	$defaults = array();
	$fields = code_snippets_get_settings_fields();

	foreach ( $fields as $section_id => $section_fields ) {
		$defaults[ $section_id ] = wp_list_pluck( $section_fields, 'default', 'id' );
	}

	return $defaults;
}

/**
 * Retrieve the settings fields
 * @return array
 */
function code_snippets_get_settings_fields() {
	static $fields;

	if ( isset( $fields ) ) {
		return $fields;
	}

	$fields = array();

	$fields['general'] = array(
		array(
			'id' => 'activate_by_default',
			'name' => __( 'Activate by Default', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( "Make the 'Save and Activate' button the default action when saving a snippet.", 'code-snippets' ),
			'default' => false,
		),

		array(
			'id' => 'snippet_scope_enabled',
			'name' => __( 'Enable Scope Selector', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( 'Enable the scope selector when editing a snippet', 'code-snippets' ),
			'default' => true,
		),


		array(
			'id' => 'enable_tags',
			'name' => __( 'Enable Snippet Tags', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( 'Show snippet tags on admin pages' ),
			'default' => true,
		),

		array(
			'id' => 'enable_description',
			'name' => __( 'Enable Snippet Descriptions', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( 'Show snippet descriptions on admin pages' ),
			'default' => true,
		),

	);

	/* Description Editor settings section */
	$fields['description_editor'] = array(

		array(
			'id' => 'rows',
			'name' => __( 'Row Height', 'code-snippets' ),
			'type' => 'number',
			'label' => __( 'rows', 'code-snippets' ),
			'default' => 5,
			'min' => 0,
		),

		array(
			'id' => 'use_full_mce',
			'name' => __( 'Use Full Editor', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( 'Enable all features of the visual editor', 'code-snippets' ),
			'default' => false,
		),

		array(
			'id' => 'media_buttons',
			'name' => __( 'Media Buttons', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( 'Enable the add media buttons', 'code-snippets' ),
			'default' => false,
		),
	);

	/* Code Editor settings section */

	$fields['editor'] = array(
		array(
			'id' => 'theme',
			'name' => __( 'Theme', 'code-snippets' ),
			'type' => 'codemirror_theme_select',
			'default' => 'default',
			'codemirror' => 'theme',
		),

		array(
			'id' => 'indent_with_tabs',
			'name' => __( 'Indent With Tabs', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( 'Use hard tabs (not spaces) for indentation.', 'code-snippets' ),
			'default' => true,
			'codemirror' => 'indentWithTabs',
		),

		array(
			'id' => 'tab_size',
			'name' => __( 'Tab Size', 'code-snippets' ),
			'type' => 'number',
			'desc' => __( 'The width of a tab character.', 'code-snippets' ),
			'default' => 4,
			'codemirror' => 'tabSize',
			'min' => 0,
		),

		array(
			'id' => 'indent_unit',
			'name' => __( 'Indent Unit', 'code-snippets' ),
			'type' => 'number',
			'desc' => __( 'How many spaces a block should be indented.', 'code-snippets' ),
			'default' => 2,
			'codemirror' => 'indentUnit',
			'min' => 0,
		),

		array(
			'id' => 'wrap_lines',
			'name' => __( 'Wrap Lines', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( 'Whether the editor should scroll or wrap for long lines.', 'code-snippets' ),
			'default' => true,
			'codemirror' => 'lineWrapping',
		),

		array(
			'id' => 'line_numbers',
			'name' => __( 'Line Numbers', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( 'Show line numbers to the left of the editor.', 'code-snippets' ),
			'default' => true,
			'codemirror' => 'lineNumbers',
		),

		array(
			'id' => 'auto_close_brackets',
			'name' => __( 'Auto Close Brackets', 'code-snippets' ),
			'type' => 'checkbox',
			'label' => __( 'Auto-close brackets and quotes when typed.', 'code-snippets' ),
			'default' => true,
			'codemirror' => 'autoCloseBrackets',
		),

		array(
			'id' => 'highlight_selection_matches',
			'name' => __( 'Highlight Selection Matches', 'code-snippets' ),
			'label' => __( 'Highlight all instances of a currently selected word.', 'code-snippets' ),
			'type' => 'checkbox',
			'default' => true,
			'codemirror' => 'highlightSelectionMatches',
		),
	);

	$fields = apply_filters( 'code_snippets_settings_fields', $fields );
	return $fields;
}
