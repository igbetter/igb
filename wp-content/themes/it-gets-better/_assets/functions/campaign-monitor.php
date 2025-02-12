<?php

/**
 * Campaign Monitor functions for the Take the Pledge campaign
 */

if (! defined('ABSPATH') ) {
    exit;
}

require_once get_template_directory() . '/vendor/campaignmonitor/createsend-php/csrest_lists.php';

/**
 * Make a REST Request to get the first ten subscribers in the `It Gets Better All Contacts` list
 *
 * @return mixed
 * @throws \Exception
 */
function igb_get_cm_subscribers()
{
    $key  = get_option('igb_cm_api_key');
    $auth = array(
    'api_key' => $key,
    );

    $list_id = get_option('igb_cm_list_id');

    $wrap = new \CS_REST_Lists($list_id, $auth);

    $result = $wrap->get_active_subscribers('2000-01-01', 1, 10, 'date', 'asc', true);

    if ($result->was_successful() ) {
        return $result->response;
    } else {
        throw new \Exception($result->response->Message);
    }
}

/**
 * Make a REST Request to get the first ten unsubscribed in the `It Gets Better All Contacts` list
 *
 * @return mixed
 * @throws \Exception
 */
function igb_get_cm_unsubscribers()
{
    $key  = get_option('igb_cm_api_key');
    $auth = array(
    'api_key' => $key,
    );

    $list_id = get_option('igb_cm_list_id');

    $wrap = new \CS_REST_Lists($list_id, $auth);

    $result = $wrap->get_unsubscribed_subscribers('2000-01-01', 1, 10, 'date', 'asc');

    if ($result->was_successful() ) {
        return $result->response;
    } else {
        throw new \Exception($result->response->Message);
    }
}

/**
 * Get some aspect of the landing page curation data.
 *
 * @param $landing_page
 * @param array $keys         The option subkey to get. The result will be
 *                            recursively crawled for a value within a
 *                            nested array using the remaining keys
 *                            provided.
 *
 * @return mixed|string
 */
function igb_get_landing_page_curation( $landing_page, $keys )
{

    $data = get_option('landing_pages_' . $landing_page, array());

    $data = apply_filters('igb_get_landing_page_curation', $data, $landing_page, $keys);

    if (empty($keys) ) {
        return $data;
    }

    $return = $data;
    while ( ! empty($keys) && is_array($return) ) {
        $sub_key = array_shift($keys);
        $return  = array_key_exists($sub_key, $return) ? $return[ $sub_key ] : '';
    }

    return $return;
}

/**
 * Display the grand total of pledgers
 * (active subscribers + subsribers no longer active + arbitrary number in the Curation settings)
 *
 * @return mixed|string
 */
function igb_get_pledgers()
{
    $transient_name     = 'igb_pledgers_total';
    $pledgers_transient = get_transient($transient_name);

    if (false === $pledgers_transient || empty($pledgers_transient) ) {
        try {
            $total_subscribers   = igb_get_cm_subscribers()->TotalNumberOfRecords;
            $total_unsubscribers = igb_get_cm_unsubscribers()->TotalNumberOfRecords;
        } catch ( \Exception $e ) {

            // in case the CM REST API fails, show a backup number
            return get_option('igb_total_pledgers', 0);
        }

        // Get the pledgers number from the admin
        $static_pledgers = get_option('igb_static_pledgers', 0);

        // Add the subscribed with the unsubscribed with the number in the admin
        $total_pledgers = $total_subscribers + $total_unsubscribers + $static_pledgers;

        // Record the number as a transient
        set_transient($transient_name, $total_pledgers, 60 * 60 * 24);

        // Set a backup value
        update_option('igb_total_pledgers', $total_pledgers);

        return $total_pledgers;
    } else {
        return $pledgers_transient;
    }
}

/**
 * Add Campaign Monitor/Take the Pledge settings page to WordPress admin
 * 
 * @return void
 */
function igb_add_take_the_pledge_settings_page()
{
    add_options_page(
        __('Take the Pledge Settings', 'it-gets-better'),
        __('Take the Pledge', 'it-gets-better'), 
        'manage_options',
        'take-the-pledge-settings',
        'igb_render_take_the_pledge_settings'
    );
}
add_action('admin_menu', 'igb_add_take_the_pledge_settings_page');

/**
 * Register Campaign Monitor settings
 * 
 * @return void
 */
function igb_register_take_the_pledge_settings()
{
    register_setting(
        'take_the_pledge_settings', 'igb_cm_api_key', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
        )
    );

    register_setting(
        'take_the_pledge_settings', 'igb_static_pledgers', array(
        'type' => 'number',
        'sanitize_callback' => 'absint',
        'default' => 0
        )
    );

    register_setting(
        'take_the_pledge_settings', 'igb_cm_list_id', array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => ''
        )
    );

    add_settings_section(
        'igb_take_the_pledge_main_section',
        __('Main Settings', 'it-gets-better'),
        null,
        'take-the-pledge-settings'
    );

    add_settings_field(
        'igb_cm_api_key',
        __('Campaign Monitor API Key', 'it-gets-better'),
        'igb_cm_api_key_callback',
        'take-the-pledge-settings',
        'igb_take_the_pledge_main_section'
    );

    add_settings_field(
        'igb_cm_list_id',
        __('Campaign Monitor List ID', 'it-gets-better'),
        'igb_cm_list_id_callback',
        'take-the-pledge-settings',
        'igb_take_the_pledge_main_section'
    );

    add_settings_field(
        'igb_static_pledgers',
        __('Base Pledgers Count', 'it-gets-better'),
        'igb_static_pledgers_callback',
        'take-the-pledge-settings',
        'igb_take_the_pledge_main_section'
    );
}
add_action('admin_init', 'igb_register_take_the_pledge_settings');

/**
 * Render the Campaign Monitor settings page
 * 
 * @return void
 */
function igb_render_take_the_pledge_settings()
{
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('take_the_pledge_settings');
            do_settings_sections('take-the-pledge-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

/**
 * Callback for API key field
 * 
 * @return void
 */
function igb_cm_api_key_callback()
{
    $api_key = get_option('igb_cm_api_key');
    ?>
    <input type="text" 
           name="igb_cm_api_key" 
           value="<?php echo esc_attr($api_key); ?>" 
           class="regular-text"
    />
    <?php
}

/**
 * Callback for static pledgers field
 * 
 * @return void
 */
function igb_static_pledgers_callback()
{
    $static_pledgers = get_option('igb_static_pledgers', 0);
    ?>
    <input type="number" 
           name="igb_static_pledgers" 
           value="<?php echo esc_attr($static_pledgers); ?>" 
           class="regular-text"
           min="0"
           step="1"
    />
    <?php
}

/**
 * Callback for list ID field
 * 
 * @return void
 */
function igb_cm_list_id_callback()
{
    $list_id = get_option('igb_cm_list_id');
    ?>
    <input type="text" 
           name="igb_cm_list_id" 
           value="<?php echo esc_attr($list_id); ?>" 
           class="regular-text"
    />
    <?php
}