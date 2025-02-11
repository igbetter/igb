<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// TODO: Move this to a class.
// TODO: Put the static pledgers and API key into a settings page.

/**
 * Make a REST Request to get the first ten subscribers in the `It Gets Better All Contacts` list
 *
 * @return mixed
 * @throws \Exception
 */
function igb_get_cm_subscribers() {
	$key  = 'otcGjCQENqiFLtKHUAmby9MXpB6T4ZBTAnVDJt73KfwgVcVjo/zPyh8zEYfE+GL8INeZYL/peOUcQpgBiPGbrK6I4uQ82dlLSSUJBtPWmuyiZceJxnyViWRVwaGPFA+7Hb+t7weqgEieNWfgUyf05A==';
	$auth = array(
		'api_key' => $key,
	);

	$list_id = '7831ea2b08745bda644ef3111238e5fc';

	$wrap = new \CS_REST_Lists( $list_id, $auth );

	$result = $wrap->get_active_subscribers( '2000-01-01', 1, 10, 'date', 'asc', true );

	if ( $result->was_successful() ) {
		return $result->response;
	} else {
		throw new \Exception( $result->response->Message );
	}
}

/**
 * Make a REST Request to get the first ten unsubscribed in the `It Gets Better All Contacts` list
 *
 * @return mixed
 * @throws \Exception
 */
function igb_get_cm_unsubscribers() {
	$key  = 'otcGjCQENqiFLtKHUAmby9MXpB6T4ZBTAnVDJt73KfwgVcVjo/zPyh8zEYfE+GL8INeZYL/peOUcQpgBiPGbrK6I4uQ82dlLSSUJBtPWmuyiZceJxnyViWRVwaGPFA+7Hb+t7weqgEieNWfgUyf05A==';
	$auth = array(
		'api_key' => $key,
	);

	$list_id = '7831ea2b08745bda644ef3111238e5fc';

	$wrap = new \CS_REST_Lists( $list_id, $auth );

	$result = $wrap->get_unsubscribed_subscribers( '2000-01-01', 1, 10, 'date', 'asc' );

	if ( $result->was_successful() ) {
		return $result->response;
	} else {
		throw new \Exception( $result->response->Message );
	}
}

/**
 * Get some aspect of the landing page curation data.
 *
 * @param $landing_page
 * @param array $keys The option subkey to get. The result will be
 *                        recursively crawled for a value within a nested array
 *                        using the remaining keys provided.
 *
 * @return mixed|string
 */
function igb_get_landing_page_curation( $landing_page, $keys ) {

	$data = get_option( 'landing_pages_' . $landing_page, array() );

	$data = apply_filters( 'igb_get_landing_page_curation', $data, $landing_page, $keys );

	if ( empty( $keys ) ) {
		return $data;
	}

	$return = $data;
	while ( ! empty( $keys ) && is_array( $return ) ) {
		$sub_key = array_shift( $keys );
		$return  = array_key_exists( $sub_key, $return ) ? $return[ $sub_key ] : '';
	}

	return $return;
}

/**
 * Display the grand total of plegers
 * (active subscribers + subsribers no longer active + arbitrary number in the Curation settings)
 *
 * @param $id
 *
 * @return mixed|string
 */
function igb_get_pledgers( $id ) {
	$transient_name     = 'pledgers_total';
	$pledgers_transient = get_transient( $transient_name );

	if ( false === $pledgers_transient ) {
		try {
			$total_subscribers   = igb_get_cm_subscribers()->TotalNumberOfRecords;
			$total_unsubscribers = igb_get_cm_unsubscribers()->TotalNumberOfRecords;
		} catch ( \Exception $e ) {

			// in case the CM REST API fails, show a backup number
			return get_post_meta( $id, 'total_pledgers', true );
		}

		// Get the pledgers number from the admin
		$static_pledgers = igb_get_landing_page_curation( 'site', array( 'statistics', 'statistics', 'pledgers' ) );

		// Add the subscribed with the unsubscribed with the number in the admin
		$total_pledgers = number_format( $total_subscribers + $total_unsubscribers + intval( str_replace( ',', '', $static_pledgers ) ), 0, '', ',' );

		// Record the number as a transient
		set_transient( $transient_name, $total_pledgers, 60 * 60 * 24 );

		// Set a backup value
		update_post_meta( $id, 'total_pledgers', $total_pledgers );

		return $total_pledgers;
	} else {
		return $pledgers_transient;
	}
}
