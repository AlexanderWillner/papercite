<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Papercite
 */

$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	throw new Exception( "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/papercite-wp-plugin.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

define('PHPUNIT_PAPERCITE_TESTSUITE', 1);

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
