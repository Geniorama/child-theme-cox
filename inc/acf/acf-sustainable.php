<?php
if (function_exists('acf_add_local_field_group')):

  acf_add_local_field_group(array(
    'key' => 'group_66e59cfa54cce',
    'title' => 'Sustainability',
    'fields' => array(
      array(
        'key' => 'field_66e59d2da9306',
        'label' => 'Sustainability',
        'name' => 'sustainability',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => 'field_66e59d6ca9307',
        'min' => 0,
        'max' => 0,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_66e59f14a9308',
            'label' => 'White Icon',
            'name' => 'white_icon',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '10',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => 'svg,png,webp',
          ),
          array(
            'key' => 'field_66e5ad7dc1f8b',
            'label' => 'Color Icon',
            'name' => 'color_icon',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '10',
              'class' => '',
              'id' => '',
            ),
            'return_format' => 'url',
            'preview_size' => 'medium',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => 'svg,png,webp',
          ),
          array(
            'key' => 'field_66e5d2eaf0770',
            'label' => 'Card Color',
            'name' => 'card_color',
            'type' => 'color_picker',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '10',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'enable_opacity' => 0,
            'return_format' => 'string',
          ),
          array(
            'key' => 'field_66e59d6ca9307',
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '25',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_66e59f60a9309',
            'label' => 'Decription',
            'name' => 'decription',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '45',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
        ),
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page',
          'operator' => '==',
          'value' => '690',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => 0,
  ));

endif;