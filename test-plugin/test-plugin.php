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

*/

add_action('admin_init','playground_test_now');
function playground_test_now() {
    $done = get_option('playground_test');
    if($done)
        return;
    playground_test();
    update_option('playground_test',true);
}

function playground_test() {
    $new['post_title'] = 'Playground Test';
    $new['post_type'] = 'page';
    $new['post_content'] = '<p>These are the times that try men\'s souls.</p>
    [rsvpmaker_upcoming cal="1" calendar="1"]';
    $new['post_status'] = 'publish';
    $home = wp_insert_post($new);
    update_option('show_on_front','page');
    update_option('page_on_front',$home);
    update_option('timezone_string', 'America/New_York');
    update_option('RSVPMAKER_Options', 'a:48:{s:13:\"menu_security\";s:14:\"manage_options\";s:18:\"rsvpmaker_template\";s:18:\"publish_rsvpmakers\";s:15:\"recurring_event\";s:18:\"publish_rsvpmakers\";s:15:\"multiple_events\";s:18:\"publish_rsvpmakers\";s:13:\"documentation\";s:15:\"edit_rsvpmakers\";s:14:\"calendar_icons\";i:1;s:17:\"social_title_date\";i:1;s:15:\"default_content\";s:0:\"\";s:7:\"rsvp_to\";s:28:\"david@carrcommunications.com\";s:26:\"confirmation_include_event\";i:0;s:33:\"rsvpmaker_send_confirmation_email\";i:1;s:17:\"rsvp_instructions\";s:0:\"\";s:10:\"rsvp_count\";i:1;s:16:\"rsvp_count_party\";i:1;s:10:\"rsvp_yesno\";i:1;s:22:\"send_payment_reminders\";i:1;s:7:\"rsvp_on\";s:1:\"1\";s:8:\"rsvp_max\";i:0;s:14:\"login_required\";i:0;s:12:\"rsvp_captcha\";i:0;s:14:\"show_attendees\";s:1:\"1\";s:16:\"convert_timezone\";i:0;s:12:\"add_timezone\";i:0;s:15:\"rsvp_form_title\";s:9:\"RSVP Now!\";s:11:\"defaulthour\";i:19;s:10:\"defaultmin\";i:0;s:9:\"long_date\";s:8:\"l F j, Y\";s:10:\"short_date\";s:3:\"M j\";s:11:\"time_format\";s:5:\"g:i A\";s:4:\"smtp\";s:0:\"\";s:15:\"paypal_currency\";s:3:\"USD\";s:16:\"currency_decimal\";s:1:\".\";s:18:\"currency_thousands\";s:1:\",\";s:15:\"payment_minimum\";s:4:\"5.00\";s:16:\"paypal_invoiceno\";i:1;s:6:\"stripe\";i:0;s:21:\"show_screen_recurring\";i:0;s:20:\"show_screen_multiple\";i:0;s:17:\"dashboard_message\";s:0:\"\";s:11:\"update_rsvp\";s:11:\"Update RSVP\";s:8:\"rsvplink\";s:395:\"<!-- wp:buttons -->\n<div class=\"wp-block-buttons\"><!-- wp:button {\"style\":{\"color\":{\"text\":\"#ffffff\",\"background\":\"#5c9538\"}},\"className\":\"rsvplink\"} -->\n<div class=\"wp-block-button rsvplink\"><a class=\"wp-block-button__link has-text-color has-background wp-element-button\" href=\"%s\" style=\"color:#ffffff;background-color:#5c9538\">Buy Now!</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\";s:13:\"rsvplink_edit\";s:64:\"https://swank.rsvpmaker.com/wp-admin/post.php?action=edit&post=3\";s:9:\"rsvp_form\";i:4;s:12:\"rsvp_confirm\";i:5;s:13:\"model_version\";i:1;s:9:\"dbversion\";s:64:\"3d29b15d4d632b5b934c809281ca20289d91a2ef0d232406fe9027b82e3fb0a1\";s:15:\"payment_gateway\";s:15:\"PayPal REST API\";s:19:\"cancel_unpaid_hours\";s:1:\"1\";}');
    update_option('rsvpmaker_stripe_keys', 'a:5:{s:2:\"pk\";s:0:\"\";s:2:\"sk\";s:0:\"\";s:10:\"sandbox_pk\";s:32:\"pk_test_EKlwr2NM3rq7i4QzcNgbicqW\";s:10:\"sandbox_sk\";s:32:\"sk_test_ckXSDZSY0ULpvLAGBTYVvIQA\";s:4:\"mode\";s:7:\"sandbox\";}');
    update_option('rsvpmaker_paypal_rest_keys', 'a:12:{s:2:\"pk\";s:0:\"\";s:2:\"sk\";s:0:\"\";s:10:\"sandbox_pk\";s:0:\"\";s:10:\"sandbox_sk\";s:0:\"\";s:9:\"client_id\";s:1:\"x\";s:13:\"client_secret\";s:1:\"y\";s:17:\"sandbox_client_id\";s:80:\"ATuAid72C1YDTqwUaZe9aRGkBAb8NHUNdjFA5By1qHa-ANHYByRzRj7xRxir1hAW4vKfVSYWgFF_-87X\";s:21:\"sandbox_client_secret\";s:80:\"ECUquDc9fTyTG1lHw1LnqMDeec6fvh4tkspegaEALPSgYfHwtuAWPc8dTQCPipET8Ts3lhl41Cj8cC9q\";s:4:\"mode\";s:7:\"sandbox\";s:7:\"sandbox\";s:1:\"1\";s:15:\"funding_sources\";s:5:\"venmo\";s:24:\"excluded_funding_sources\";s:8:\"paylater\";}');

    global $wp_rewrite; $wp_rewrite->set_permalink_structure('/%postname%/'); $wp_rewrite->flush_rules();

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
    update_post_meta($post_id,'_per', 'a:2:{s:4:\"unit\";a:1:{i:0;s:7:\"Tickets\";}s:5:\"price\";a:1:{i:0;s:0:\"\";}}');

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
    update_post_meta($post_id,'_per', 'a:2:{s:4:\"unit\";a:1:{i:0;s:7:\"Tickets\";}s:5:\"price\";a:1:{i:0;s:0:\"\";}}');

}