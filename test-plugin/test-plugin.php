<?php
/*
Plugin Name: Playground Test
*/

/*
        {
            "step": "installPlugin",
            "pluginData": {
                "resource": "url",
                "url": "https://raw.githubusercontent.com/davidfcarr/blueprints/refs/heads/main/test-plugin.zip"
            },
            "options": {
                "activate": true
            }    
        },
        {
			"step": "runPHP",
			"code": "<?php include 'wordpress/wp-load.php'; playground_test(); "
		},


add_action('admin_init','playground_test_now');
function playground_test_now() {
    $done = get_option('playground_test');
    if($done)
        return;
    playground_test();
    update_option('playground_test',true);
}
*/

add_action('admin_menu','playground_menu');

function playground_menu() {
    add_menu_page( __('Playground Test', 'rsvpmaker-for-toastmasters' ), __( 'Playground Test', 'rsvpmaker-for-toastmasters' ), 'manage_options', 'playground_test', 'playground_test');
}

function playground_test() {
    global $rsvp_options;
    $done = get_option('playground_test');
    if($done) {
        echo 'Already ran';
        return;
    }
    update_option('playground_test',true);

    $new['post_title'] = 'Playground Test';
    $new['post_type'] = 'page';
    $new['post_content'] = '<!-- wp:paragraph -->
<p>These demo events are based on the dinners hosted by Swank Specialty Produce, Loxahatchee, Florida (<a href="https://www.swankspecialtyproduce.com/">swankspecialtyproduce.com</a>).</p>
<!-- /wp:paragraph -->
    
    <!-- wp:query {"queryId":0,"query":{"perPage":20,"pages":0,"offset":0,"postType":"rsvpmaker","order":"asc","author":"","search":"","exclude":[],"sticky":"","inherit":false,"eventOrder":"future","excludeType":"","taxQuery":{"rsvpmaker-type":[]}},"namespace":"rsvpmaker/rsvpmaker-loop"} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":"1"}} -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"customOverlayColor":"#534850","isUserOverlayColor":true,"className":"swankcover","style":{"dimensions":{"aspectRatio":"auto"},"elements":{"link":{"color":{"text":"var:preset|color|base-2"}}}},"textColor":"base-2","layout":{"type":"constrained"}} -->
<div class="wp-block-cover swankcover has-base-2-color has-text-color has-link-color"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#534850"></span><div class="wp-block-cover__inner-container"><!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|base-2"}}}},"textColor":"base-2"} /-->

<!-- wp:rsvpmaker/rsvpdateblock {"alignment":"center"} /--></div></div>
<!-- /wp:cover -->

<!-- wp:rsvpmaker/loop-blocks -->
<div class="wp-block-rsvpmaker-loop-blocks"><!-- wp:read-more {"content":"Read More \u003e\u003e","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|10"}}}} /-->

<!-- wp:rsvpmaker/button -->
<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"className":"rsvplink","color":{"background":"#61bf22"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" href="#rsvpnow" style="background-color:#61bf22">Buy Now!</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:rsvpmaker/button --></div>
<!-- /wp:rsvpmaker/loop-blocks -->
<!-- /wp:post-template -->

<!-- wp:query-pagination -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p>No events found.</p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query -->';
    $new['post_status'] = 'publish';
    $home = wp_insert_post($new);
    update_option('show_on_front','page');
    update_option('page_on_front',$home);
    update_option('timezone_string', 'America/New_York');
    $rsvp_options['rsvp_on'] = 1;
        update_option('RSVPMAKER_Options', $rsvp_options);
    if(isset($_GET['page']))
        printf('<p>stripe options</p><pre>%s</pre>',var_export($stripe_keys,true));
    update_option('rsvpmaker_stripe_keys', $stripe_keys);
        $paypal = array("pk"=>"","sk"=>"","sandbox_pk"=>"","sandbox_sk","client_id"=>"","client_secret"=>"y","sandbox_client_id"=>"ATuAid72C1YDTqwUaZe9aRGkBAb8NHUNdjFA5By1qHa-ANHYByRzRj7xRxir1hAW4vKfVSYWgFF_-87X","sandbox_client_secret"=>"ECUquDc9fTyTG1lHw1LnqMDeec6fvh4tkspegaEALPSgYfHwtuAWPc8dTQCPipET8Ts3lhl41Cj8cC9q","mode"=>"sandbox","sandbox"=>"1","funding_sources"=>"venmo","excluded_funding_sources"=>"paylater");
    update_option('rsvpmaker_paypal_rest_keys', $paypal);

    $t = rsvpmaker_strtotime('next Sunday 7:00 pm');
    $new['post_title'] = 'Fall Harvest Hoe Down';
    $new['post_type'] = 'rsvpmaker';
    $new['post_content'] = '<!-- wp:image {"id":556,"align":"center"} -->
<figure class="wp-block-image aligncenter"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2017/08/Swank-Table-Logo-300x156.png" alt="Swank Table Logo" class="wp-image-556"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","className":"event"} -->
<h2 class="wp-block-heading has-text-align-center event">Farmers Market<br>Hoe Down</h2>
<!-- /wp:heading -->

<!-- wp:rsvpmaker/rsvpdateblock {"alignment":"center"} /-->

<!-- wp:rsvpmaker/button -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"className":"rsvplink","color":{"background":"#4f991d"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" href="#rsvpnow" style="background-color:#4f991d">Buy Now!</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:rsvpmaker/button -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><em>Benefiting: <a href="https://www.connectedpb.com/">Connections of Palm Beach County</a></em></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Come shop our 6 vendors for all your holiday shopping needs and then learn to line dance with our Country Super Stars – Jordan Oaks and Tommy Lynn Band</p>
<!-- /wp:paragraph -->

<!-- wp:block {"ref":5181} /-->

<!-- wp:columns {"verticalAlignment":"center","className":"sponsors","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center sponsors" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4501,"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2022/03/Suzanne-Perrotto-cropped-150x150.jpg" alt="" class="wp-image-4501" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p><strong>Suzanne Perretto<br></strong><em>Owner / Chef<br></em>Brule Bistro and Rose’s Daughter<br>Delray Beach</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":2113,"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2019/08/clayton-carnes-150x150.jpg" alt="" class="wp-image-2113" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p><strong>Clayton Carnes</strong><br><em>Owner/Chef</em><br>Cholo Soy Cucina<br>West Palm Beach</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":"sponsors","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center sponsors" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5581,"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/Glenn-Rogers-150x150.jpeg" alt="" class="wp-image-5581" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p><strong>Glenn Rogers</strong><br><em>Executive Chef</em><br>The Singer Oceanfront Resort<br>Singer Island<br></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5877,"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/ChefCotonStine8-150x150.jpg" alt="" class="wp-image-5877" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p><strong>Coton Guzman</strong><br><em>Owner/ Chef</em><br>Costa and OK&amp;M<br>Delray Beach<br></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":"sponsors","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center sponsors" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4549,"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2022/08/Megan-Robson-150x150.jpeg" alt="" class="wp-image-4549" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p><strong>Megan Lee<br></strong><em>Pastry Chef<br></em>The Pantry<br>Delray Beach</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":6004,"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/Carson-Amber-Bennett-150x150.jpg" alt="" class="wp-image-6004" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p><strong>Carson & Amber Bennett</strong><br><em>Co-Founders</em><br>Guaca Go<br>Delray Beach<br></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":"sponsors","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center sponsors" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5038,"aspectRatio":"1","scale":"cover","sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/prosterity--150x150.jpg" alt="Prosperity" class="wp-image-5038" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5591,"sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/Tommy-Lynn-and-Jordan-Oaks-square-150x150.jpg" alt="" class="wp-image-5591"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p>Jordan Oaks and Tommy Lynn Country Band</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Participating Restaurants</strong></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"verticalAlignment":"center","className":"sponsors","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center sponsors" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-right:0;padding-left:0"><!-- wp:image {"id":4502,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2022/03/brule_bistro.png" alt="" class="wp-image-4502"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":4503,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2022/03/rose-s-daughter.png" alt="" class="wp-image-4503"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":1553,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2018/08/LOGO_CHOLO.jpg" alt="" class="wp-image-1553"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5587,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/TheSinger-PrimaryLogo-Black-07273.jpg" alt="" class="wp-image-5587"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":"sponsors","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center sponsors" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-right:0;padding-left:0"><!-- wp:image {"id":5879,"sizeSlug":"medium","linkDestination":"none"} -->
<figure class="wp-block-image size-medium"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/CostaLogo-300x157.jpg" alt="" class="wp-image-5879"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5874,"sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/guac-a-go-log-150x150.png" alt="" class="wp-image-5874"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Supporting Sponsors</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>For sponsorship opportunities, call Jodi Swank at&nbsp;<a href="tel:(561)%20202-5648" target="_blank" rel="noreferrer noopener">561-202-5648</a>.</strong></p>
<!-- /wp:paragraph -->';
    $new['post_status'] = 'publish';
    $post_id = wp_insert_post($new);
    $cddate = rsvpmaker_date('Y-m-d H:i:s',$t);
    $end = rsvpmaker_date('Y-m-d H:i:s',$t + HOUR_IN_SECONDS);
    rsvpmaker_add_event_row ($post_id, $cddate, $end, 'set');
    update_post_meta($post_id,'_rsvp_on',1);
    update_post_meta($post_id,'_rsvp_rsvpmaker_send_confirmation_email', '1');
    update_post_meta($post_id,'_calendar_icons', '1');
    update_post_meta($post_id,'_payment_gateway', 'PayPal REST API');
    update_post_meta($post_id,'pricing', array( (object) array("unit"=>"Dinners","price"=>"180.00","deadlineDate"=>null,"deadlineTime"=>null,"price_multiple"=>1,"price_deadline"=>null)));

    $t += WEEK_IN_SECONDS;
    $new['post_title'] = 'Dia de los Muertes';
    $new['post_type'] = 'rsvpmaker';
    $new['post_content'] = '<!-- wp:image {"id":556,"align":"center"} -->
<figure class="wp-block-image aligncenter"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2017/08/Swank-Table-Logo-300x156.png" alt="Swank Table Logo" class="wp-image-556"/></figure>
<!-- /wp:image -->

<!-- wp:post-title {"textAlign":"center"} /-->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center">Day of the Dead</h2>
<!-- /wp:heading -->

<!-- wp:rsvpmaker/rsvpdateblock {"alignment":"center"} /-->

<!-- wp:rsvpmaker/button -->
<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"className":"rsvplink","color":{"background":"#4f991d"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-background wp-element-button" href="#rsvpnow" style="background-color:#4f991d">Buy Now!</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
<!-- /wp:rsvpmaker/button -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">A festival celebrated worldwide by people of Mexican Heritage.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Dress in colorful costumes, paint your face, and decorate your table if you wish in celebration of someone you’ve lost and loved.</p>
<!-- /wp:paragraph -->

<!-- wp:block {"ref":5181} /-->

<!-- wp:columns {"verticalAlignment":"center","className":"chefs","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center chefs" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5567,"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/Jobani-Ralac-Cristol-944x1024.jpeg" alt="" class="wp-image-5567" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p><strong>Jobani Ralac-Cristal<br></strong><em>Chef De Cuisine<br></em>A’lu<br>Boynton Beach</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5568,"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/Eduardo-Lara-Chef-Founder-The-Wolf-of-Tacos-Miami.jpeg" alt="" class="wp-image-5568" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p><strong>Eddie Lara</strong><br><em>Chef / Founder</em><br>The Wolf Of Tacos<br>Miami<br></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":"chefs","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center chefs" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5093,"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/Johnny-Demartini-683x1024.jpeg" alt="" class="wp-image-5093" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p><strong>Johnny DeMartini<br></strong><em>Executive Chef<br></em>Ravish Off Ocean<br>Lantana</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5255,"aspectRatio":"1","scale":"cover","sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/09/Anna-Ross-AnnaBakes-1008x1024.jpg" alt="" class="wp-image-5255" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<p style="margin-top:0;margin-bottom:0"><strong>Anna Ross</strong><br><em>Baker/Owner</em><br>AnnaBakes<br>Wellington<br></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"verticalAlignment":"center","className":"chefts","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center chefts" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5570,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/logo-vertical-simple-01.png" alt="" class="wp-image-5570"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5571,"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/SPREAD-THHE-DUB.jpeg" alt="" class="wp-image-5571" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Participating Restaurants</strong></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"verticalAlignment":"center","className":"sponsors","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-columns are-vertically-aligned-center sponsors" style="padding-right:0;padding-left:0"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-right:0;padding-left:0"><!-- wp:image {"id":5569,"sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/thumbnail-150x150.jpg" alt="" class="wp-image-5569"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5910,"sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2024/07/wolf-of-tacos-150x150.jpg" alt="" class="wp-image-5910"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":5099,"sizeSlug":"medium","linkDestination":"none"} -->
<figure class="wp-block-image size-medium"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/ravish-log-300x140.png" alt="" class="wp-image-5099"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":3387,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2020/10/anna-bakes.png" alt="" class="wp-image-3387"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Supporting Sponsors</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>For sponsorship opportunities, call Jodi Swank at&nbsp;<a href="tel:(561)%20202-5648" target="_blank" rel="noreferrer noopener">561-202-5648</a>.</strong></p>
<!-- /wp:paragraph -->';
    $new['post_status'] = 'publish';
    $post_id = wp_insert_post($new);
    $cddate = rsvpmaker_date('Y-m-d H:i:s',$t);
    $end = rsvpmaker_date('Y-m-d H:i:s',$t + HOUR_IN_SECONDS);
    rsvpmaker_add_event_row ($post_id, $cddate, $end, 'set');
    update_post_meta($post_id,'_rsvp_on',1);
    update_post_meta($post_id,'_rsvp_on',1);
    update_post_meta($post_id,'_rsvp_rsvpmaker_send_confirmation_email', '1');
    update_post_meta($post_id,'_calendar_icons', '1');
    update_post_meta($post_id,'_payment_gateway', 'PayPal REST API');
    update_post_meta($post_id,'pricing', array( (object) array("unit"=>"Dinners","price"=>"180.00","deadlineDate"=>null,"deadlineTime"=>null,"price_multiple"=>1,"price_deadline"=>null)));

    //global $wp_rewrite; $wp_rewrite->set_permalink_structure('/%postname%/'); $wp_rewrite->flush_rules();
}