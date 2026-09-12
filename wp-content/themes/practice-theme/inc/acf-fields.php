<?php
/**
 * Programmatically register ACF Flexible Content Field Group
 */
add_action( 'acf/init', 'e2m_register_flexible_content_fields' );

function e2m_register_flexible_content_fields() {

    if ( function_exists( 'acf_add_local_field_group' ) ) {

        acf_add_local_field_group( array(
            'key' => 'group_page_sections',
            'title' => 'Page Sections',
            'fields' => array(
                array(
                    'key' => 'field_page_sections',
                    'label' => 'Page Sections',
                    'name' => 'page_sections',
                    'type' => 'flexible_content',
                    'instructions' => 'Add and reorder sections for this page.',
                    'required' => 0,
                    'button_label' => 'Add Section',
                    'show_in_rest' => 1, // Exposes field to REST API
                    'layouts' => array(
                        
                        // 1. HERO LAYOUT
                        'layout_hero' => array(
                            'key' => 'layout_hero',
                            'name' => 'hero',
                            'label' => 'Hero',
                            'display' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_hero_title',
                                    'label' => 'Title',
                                    'name' => 'title',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_hero_subtitle',
                                    'label' => 'Subtitle',
                                    'name' => 'subtitle',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_hero_bg_image',
                                    'label' => 'Background Image',
                                    'name' => 'background_image',
                                    'type' => 'image',
                                    'return_format' => 'array',
                                ),
                            ),
                        ),

                        // 2. TEXT BLOCK LAYOUT
                        'layout_text_block' => array(
                            'key' => 'layout_text_block',
                            'name' => 'text_block',
                            'label' => 'Text Block',
                            'display' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_tb_heading',
                                    'label' => 'Heading',
                                    'name' => 'heading',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_tb_content',
                                    'label' => 'Content',
                                    'name' => 'content',
                                    'type' => 'wysiwyg',
                                ),
                            ),
                        ),

                        // 3. STATS LAYOUT (With a Repeater Subfield)
                        'layout_stats' => array(
                            'key' => 'layout_stats',
                            'name' => 'stats',
                            'label' => 'Stats',
                            'display' => 'block',
                            'sub_fields' => array(
                                array(
                                    'key' => 'field_stats_title',
                                    'label' => 'Section Title',
                                    'name' => 'section_title',
                                    'type' => 'text',
                                ),
                                array(
                                    'key' => 'field_stats_items',
                                    'label' => 'Stat Items',
                                    'name' => 'stat_items',
                                    'type' => 'repeater',
                                    'button_label' => 'Add Stat',
                                    'sub_fields' => array(
                                        array(
                                            'key' => 'field_stat_number',
                                            'label' => 'Number',
                                            'name' => 'number',
                                            'type' => 'text',
                                        ),
                                        array(
                                            'key' => 'field_stat_label',
                                            'label' => 'Label',
                                            'name' => 'label',
                                            'type' => 'text',
                                        ),
                                    ),
                                ),
                            ),
                        ),

                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'project',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'show_in_rest' => 1,
        ) );

    }
}