<?php  
function it_gets_better_theme_customizer_register( $wp_customize ) {
    //Dark mode logo variant
    $wp_customize->add_section( 'it_gets_better_main_logo_dark_mode', array(
        'title'      => __('Header Logo Dark Mode','it-gets-better'),
        'priority'   => 190,
        'sanitize_callback' => 'wp_filter_nohtml_kses' //removes all HTML from content
    ));

    $wp_customize->add_setting( 'it_gets_better_main_logo_dark_mode' , array());

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'it_gets_better_main_logo_dark_mode',
            array(
                'label'      => __( 'Dark Mode Logo', 'it-gets-better' ),
                'section'    => 'it_gets_better_main_logo_dark_mode',
                'settings'   => 'it_gets_better_main_logo_dark_mode',
                'description' =>  __('Upload Dark Mode Main Logo', 'it-gets-better')
            )
        )
    );

    //custom section for safe exit
    $wp_customize->add_panel( 'safe_exit_panel', array(
        'priority'       => 500,
        'theme_supports' => '',
        'title'          => __( 'Safe Exit Settings', 'it-gets-better' ),
        'description'    => __( 'Set editable text for certain content.', 'it-gets-better' ),
    ) );
    $wp_customize->add_section( 'safe_exit_section' , array(
        'title'    => __('Update Safe Exit Text / Link','it-gets-better'),
        'panel'    => 'safe_exit_panel',
        'priority' => 10
    ) );
    // Add setting
    $wp_customize->add_setting( 'safe_exit_custom_text', array(
        'default'           => __( 'text goes here', 'it-gets-better' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'safe_exit_url', array(
        'default'           => __( 'url goes here', 'it-gets-better' ),
        'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'safe_exit_url_text', array(
        'default'           => __( 'link text goes here', 'it-gets-better' ),
        'sanitize_callback' => 'sanitize_text'
    ) );
    // Add control
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'safe_exit_markup',
            array(
                'label'    => __( 'Safe Exit Text', 'it-gets-better' ),
                'section'  => 'safe_exit_section',
                'settings' => 'safe_exit_custom_text',
                'type'     => 'text'
            )
            ));

            $wp_customize->add_control( new WP_Customize_Control(
                $wp_customize,
                'safe_exit_href',
                    array(
                        'label'    => __( 'Exit URL', 'it-gets-better' ),
                        'section'  => 'safe_exit_section',
                        'settings' => 'safe_exit_url',
                        'type'     => 'text'
                    )
                    ));
                    
        $wp_customize->add_control( new WP_Customize_Control(
                        $wp_customize,
                        'safe_exit_link_text',
                            array(
                                'label'    => __( 'Link Text', 'it-gets-better' ),
                                'section'  => 'safe_exit_section',
                                'settings' => 'safe_exit_url_text',
                                'type'     => 'text'
                            )
                    ));

        // Sanitize text
        function sanitize_text( $text ) {
            return sanitize_text_field( $text );
        }
}


add_action('customize_register', 'it_gets_better_theme_customizer_register');