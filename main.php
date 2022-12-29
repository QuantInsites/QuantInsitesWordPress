<?php

// This plugin sends relevant form information to Quant Insites upon form submission

/*
 * Plugin Name: Quant Insites WordPress
 * Description: This plugin sends relevant form information to Quant Insites upon form submission
 * Version: 1.0
 * Author: Quant Insites 
 */

try {
add_action( 'wp_footer', function () {
    ?>
    <script>
    document.addEventListener( 'wpcf7mailsent', function ( event ) {
    		
		const fpPromise=import('https://fpcdn.io/v3/7ZdeDx4prR7ICa0vfmyS')
			.then(FingerprintJS=>FingerprintJS.load()).then(fp=>fp.get())
			.then(result=>{fetch('https://m85xmjbgqg.execute-api.us-east-1.amazonaws.com/prod/wordpress-plugin', {
				method:'POST',
				mode: 'no-cors',
				headers: new Headers({ "content-type": "application/json" }),
				body: JSON.stringify(
					{
					"domainName":window.location.hostname,
	 				"pageName":window.location.pathname,
	 				"timestamp":String(Date.now()),
	 				"visitorId":result.visitorId,
					"formData":JSON.stringify(event.detail.inputs),
					}
				)
			})})	
		})
	 
    </script>
    <?php
    }, 10, 0 );
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
} finally {
	
}

?>
