<?php
/*
 * Plugin Name: ac-cmb2-custom-fields
 * Author: Martin Steenbergen
 * Version: 1.0
 */

class AC_CMB2_Custom_Fields{

    public function __construct(){
        $this->init();
    }

    public function init(){
        add_action( 'cmb2_admin_init', array( $this, 'register_page_fields' ) );
        add_action( 'cmb2_admin_init', array( $this, 'create_custom_post_type' ) );
        add_action( 'cmb2_admin_init', array( $this, 'create_custom_taxonomy_hierarchical' ) );
        add_action( 'cmb2_admin_init', array( $this, 'create_custom_taxonomy_non_hierarchical' ) );
    }

    function create_custom_post_type(){

        register_post_type('custom', array(
                'labels' => array(
                    'name' 			=> __('Customs Post Type'),
                    'singular_name'	=> __('Custom')
                ),
                'public'		=> true,
                'has_archive'	=> true,
                'rewrite'		=> array('slug' => 'custom'),
            )
        );
    }

    function create_custom_taxonomy_hierarchical(){

        register_taxonomy('custom_hi_tax', array('post', 'page', 'custom'), array(
                'label' => 'Custom Hierarchical',
                'hierarchical' => true,
            )
        );
    }

    function create_custom_taxonomy_non_hierarchical(){

        register_taxonomy('custom_non_hi_tax', array('post', 'page', 'custom'), array(
                'label' => 'Custom Non-Hierarchical',
                'hierarchical' => false,
            )
        );
    }


    public function register_page_fields(){
        $prefix = 'cmb2_';
        $cmb = new_cmb2_box( array(
            'id'            => 'test_metabox',
            'title'         => __( 'Test Metabox', 'cmb2' ),
            'object_types'  => array( 'page', 'post', 'custom'),
            'context'       => 'normal',
            'priority'      => 'high',
            'show_names'    => true,
    ) );

        // Title
        $cmb->add_field( array(
            'name'  =>  'Test Title',
            'id'    =>  $prefix . 'title',
            'type'  =>  'title',
            'desc'  => 'Text Fields'
        ));

        // Regular text field
        $cmb->add_field( array(
            'name'  =>  'Test Text',
            'id'    =>  $prefix . 'text',
            'type'  =>  'text',
        ) );

        // Small text field
        $cmb->add_field( array(
            'name'  =>  'Test Text Small',
            'id'    =>  $prefix . 'text_small',
            'type'  =>  'text_small'
        ) );

        // Medium text field
        $cmb->add_field( array(
            'name'  =>  'Test Text Medium',
            'id'    =>  $prefix . 'text_medium',
            'type'  =>  'text_medium'
        ));

        // Email
        $cmb->add_field( array(
            'name'  =>  'Test Text Email',
            'id'    =>  $prefix . 'text_email',
            'type'  =>  'text_email'
        ));

        // URL
        $cmb->add_field( array(
            'name'  =>  'Test Website URL',
            'id'    =>  $prefix . 'website_url',
            'type'  =>  'text_url'
        ));

        // Money Dollar
        $cmb->add_field( array(
            'name'  =>  'Test Money',
            'id'    =>  $prefix . 'text_money',
            'type'  =>  'text_money'
        ));

        // Text Area
        $cmb->add_field( array(
            'name'  =>  'Test Text Area',
            'id'    =>  $prefix . 'text_area',
            'type'  =>  'textarea'
        ));

        // Text Area Small
        $cmb->add_field( array(
            'name'  =>  'Test Text Area Small',
            'id'    =>  $prefix . 'text_area_small',
            'type'  =>  'textarea_small'
        ));

        // Text Area Code
        $cmb->add_field( array(
            'name'  =>  'Test Text Area Code',
            'id'    =>  $prefix . 'text_area_code',
            'type'  =>  'textarea_code'
        ));

        // Time Picker
        $cmb->add_field( array(
            'name'  =>  'Test Time Picker',
            'id'    =>  $prefix . 'text_time_picker',
            'type'  =>  'text_time'
        ));

        // Timezone
        $cmb->add_field( array(
            'name'  =>  'Test Timezone',
            'id'    =>  $prefix . 'select_timezone',
            'type'  =>  'select_timezone'
        ));

        // Date
        $cmb->add_field( array(
            'name'  =>  'Test Date Picker',
            'id'    =>  $prefix . 'text_date',
            'type'  =>  'text_date'
        ));

        // Date Timestamp
        $cmb->add_field( array(
            'name'  =>  'Test Date Picker (UNIX timestamp)',
            'id'    =>  $prefix . 'text_date_timestamp',
            'type'  =>  'text_date_timestamp'
        ));

        // Date/time Timestamp
        $cmb->add_field( array(
            'name'  =>  'Test Date/Time Picker Combo (UNIX timestamp)',
            'id'    =>  $prefix . 'text_datetime_timestamp',
            'type'  =>  'text_datetime_timestamp'
        ));

        // Date/time Timestamp Timezone
        $cmb->add_field( array(
            'name'  =>  'Test Date/Time Picker/Time Zone Combo (serialized DateTime object)',
            'id'    =>  $prefix . 'text_datetime_timestamp_timezone',
            'type'  =>  'text_datetime_timestamp_timezone'
        ));

        // Hidden
        $cmb->add_field( array(
            'id'    =>  $prefix . 'hidden',
            'type'  =>  'hidden'
        ));

        // Color Picker
        $cmb->add_field( array(
            'name'  =>  'Test Color Picker',
            'id'    =>  $prefix . 'colorpicker',
            'type'  =>  'colorpicker',
            'default'   => '#ffffff'
        ));

        // Checkbox
        $cmb->add_field( array(
            'name'  => 'Test Checkbox',
            'id'    =>  $prefix . 'checkbox',
            'type'  =>  'checkbox'
        ));

        // Multiple Checkboxes
        $cmb->add_field( array(
            'name'  => 'Test Multiple Checkboxes',
            'id'    =>  $prefix . 'multicheckbox',
            'type'  =>  'multicheck',
            'options'   =>   array(
                'check1'    => 'Check One',
                'check2'    => 'Check Two',
                'check3'    => 'Check Three'
            )
        ));

        // Radio
        $cmb->add_field( array(
            'name'  => 'Test Radio',
            'id'    =>  $prefix . 'radio',
            'type'  =>  'radio',
            'default'   => 'custom',
            'options'   =>   array(
                'standard'   => __('Option One', 'cmb2'),
                'custom'     => __('Option Two', 'cmb2'),
                'none'       => __('Option Three', 'cmb2'),
            )
        ));

        // Radio Inline
        $cmb->add_field( array(
            'name'  => 'Test Radio Inline',
            'id'    =>  $prefix . 'radio_inline',
            'type'  =>  'radio_inline',
            'default'   => 'custom',
            'options'   =>   array(
                'standard'   => __('Option One', 'cmb2'),
                'custom'     => __('Option Two', 'cmb2'),
                'none'       => __('Option Three', 'cmb2'),
            )
        ));

/*
        $var = '';
        $args = array(
            'posts_per_page' => 10,
            'orderby' => 'date'
        );

        $posts_array = get_posts($args);
        foreach ($posts_array as $post) {
         $var .= $post->post_title;
        }

        $str = '';

        for($i =1; $i <=10; $i++) {
            $str .= $i++;
        }
*/
        function optionscb($field){
            if (has_category('uncategorized', $field->object_id)){
                return array(
                    'tabby'   => __( 'Tabby', 'cmb2' ),
                    'siamese' => __( 'Siamese', 'cmb2' ),
                    'calico'  => __( 'Calico', 'cmb2' ),
                );

            }else {
                return array(
                    'german-shepherd' => __( 'German Shepherd', 'cmb2' ),
                    'bulldog'         => __( 'Bulldog', 'cmb2' ),
                    'poodle'          => __( 'Poodle', 'cmb2' ),
                );
            }
        }

        // Select
        $cmb->add_field( array(
            'name'             => 'Test Select',
            'desc'             => 'Select an option',
            'id'               => $prefix . 'select',
            'type'             => 'select',
            'show_option_none' => true,
            'options_cb'       => 'optionscb'

        ) );

        // Taxonomy Radio
        $cmb->add_field( array(
            'name'      => 'Test Taxonomy Radio',
            'id'        => $prefix . 'taxonomy_radio',
            'taxonomy'  => 'category',
            'type'      => 'taxonomy_radio'
        ) );

        // Taxonomy Radio Inline
        $cmb->add_field( array(
            'name'      => 'Test Taxonomy Radio Inline',
            'id'        => $prefix . 'taxonomy_radio_inline',
            'taxonomy'  => 'category',
            'type'      => 'taxonomy_radio_inline'
        ) );

        // Taxonomy Select
        $cmb->add_field( array(
            'name'      => 'Test Taxonomy Select',
            'id'        => $prefix . 'taxonomy_select',
            'taxonomy'  => 'category',
            'type'      => 'taxonomy_select'
        ) );

        // Taxonomy Multicheck
        $cmb->add_field( array(
            'name'      => 'Test Taxonomy Multicheck',
            'id'        => $prefix . 'taxonomy_multicheck',
            'taxonomy'  => 'category',
            'type'      => 'taxonomy_multicheck'
        ) );

        // Taxonomy Multicheck Inline
        $cmb->add_field( array(
            'name'      => 'Test Taxonomy Multicheck Inline',
            'id'        => $prefix . 'taxonomy_multicheck_inline',
            'taxonomy'  => 'category',
            'type'      => 'taxonomy_multicheck_inline'
        ) );

        // WYSIWYG
        $cmb->add_field( array(
            'name'    => 'Test wysiwyg',
            'id'      => $prefix . 'wysiwyg',
            'type'    => 'wysiwyg',
            'options' => array(),
        ) );

        // File
        $cmb->add_field( array(
            'name'    => 'Test File',
            'id'      => $prefix . 'image',
            'type'    => 'file',
        ) );

        // File List
        $cmb->add_field( array(
            'name'    => 'Test File List',
            'id'      => $prefix . 'file_list',
            'type'    => 'file_list',
        ) );

        // Oembed
        $cmb->add_field( array(
            'name' => 'oEmbed',
            'desc' => 'Enter a youtube, twitter, or instagram URL.',
            'id'   => $prefix . 'embed',
            'type' => 'oembed',
        ) );

        // Group
        $group_field_id = $cmb->add_field( array(
            'id'          => 'wiki_test_repeat_group',
            'type'        => 'group',
            'description' => __( 'Generates reusable form entries', 'cmb2' ),

            'options'     => array(
                'group_title'   => __( 'Entry {#}', 'cmb2' ),
                'add_button'    => __( 'Add Another Entry', 'cmb2' ),
                'remove_button' => __( 'Remove Entry', 'cmb2' ),
                'sortable'      => true,
            ),
        ) );



        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Entry Title',
            'id'   => 'title',
            'type' => 'text',

        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Description',
            'description' => 'Write a short description for this entry',
            'id'   => 'description',
            'type' => 'textarea_small',
        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Entry Image',
            'id'   => 'image',
            'type' => 'file',
        ) );

        $cmb->add_group_field( $group_field_id, array(
            'name' => 'Image Caption',
            'id'   => 'image_caption',
            'type' => 'text'
        ) );
    }



}
new AC_CMB2_Custom_Fields();







