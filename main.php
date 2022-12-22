<?php

// This plugin runs a script from an API automatically whenever a specific page of a site is loaded.

/*
 * Plugin Name: Page Load Script Runner
 * Description: Runs a script from an API whenever a specific page of a site is loaded
 * Version: 1.0
 * Author: Your Company
 */

add_action('template_redirect', 'run_page_load_script');

function run_page_load_script() {
    if (is_page('PAGE_SLUG')) {
        $api_url = 'https://your-api-url.com/script.php';
        $response = wp_remote_get($api_url);
    }
}

?>
