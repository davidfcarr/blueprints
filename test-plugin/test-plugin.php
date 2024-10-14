<?php
/*
Plugin Name: Playground Test
*/

function playground_test() {
    $new['post_title'] = 'Playground Test';
    $new['post_type'] = 'page';
    $new['post_content'] = '<p>These are the times that try men\'s souls.</p>
    [rsvpmaker_upcoming cal="1" calendar="1"]';
    $new['post_status'] = 'publish';
    $home = wp_insert_post($new);
    update_option('show_on_front','page');
    update_option('page_on_front',$home);
    global $wp_rewrite; $wp_rewrite->set_permalink_structure('/%postname%/'); $wp_rewrite->flush_rules();

    $t = rsvpmaker_strtotime('next Sunday 7:00 pm');
    $new['post_title'] = 'Fall Harvest Hoe Down';
    $new['post_type'] = 'rsvpmaker';
    $new['post_content'] = '<!-- wp:image {"id":556,"align":"center"} -->
<figure class="wp-block-image aligncenter"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2017/08/Swank-Table-Logo-300x156.png" alt="Swank Table Logo" class="wp-image-556"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","className":"event"} -->
<h2 class="wp-block-heading has-text-align-center event">Fall Harvest Hoe Down</h2>
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
<p class="has-text-align-center"><em>Benefiting: <a href="http://www.beachwoodri.org/">Beachwood Integrative Equine Therapy</a></em></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><em>Get ready for our second farm dinner “Hoe Down.” Wear your cowboy boots and hats and learn to line dance with our professional instructor, Mark. See you all “down on the farm!”</em></p>
<!-- /wp:paragraph -->

<!-- wp:block {"ref":5181} /-->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5036,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/Nick-Dellinger-150x150.jpg" alt="" class="wp-image-5036"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Nick Dellinger","title":"Chef de Cuisine","place":"Brick and Barrel","city":"Jupiter","parse":"Nick Dellinger,  Chef de Cuisine, Brick and Barrel, Jupiter"} -->
<div class="wp-block-swank-chef"><strong>Nick Dellinger</strong><br/><em>Chef de Cuisine</em><br/>Brick and Barrel<br/>Jupiter<br/></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":2113,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2019/08/clayton-carnes-150x150.jpg" alt="" class="wp-image-2113"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Clayton Carnes","title":"Owner/Chef","place":"Cholo Soy Cocina","city":"West Palm Beach","parse":"Clayton Carnes, Owner/Chef, Cholo Soy Cocina, West Palm Beach"} -->
<div class="wp-block-swank-chef"><strong>Clayton Carnes</strong><br/><em>Owner/Chef</em><br/>Cholo Soy Cocina<br/>West Palm Beach<br/></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5037,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/Chef-Rodrigo-Mezadri.Headshot-150x150.jpg" alt="" class="wp-image-5037"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Rodrigo Mezadri","title":"Executive Chef","place":"Hilton","city":"West Palm Beach","parse":"Rodrigo Mezadri, Executive Chef, Hilton, West Palm Beach"} -->
<div class="wp-block-swank-chef"><strong>Rodrigo Mezadri</strong><br/><em>Executive Chef</em><br/>Hilton<br/>West Palm Beach<br/></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5255,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/09/Anna-Ross-AnnaBakes-150x150.jpg" alt="" class="wp-image-5255"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Anna Ross","title":"Owner/Baker","place":"AnnaBakes","city":"Wellington","parse":"Anna Ross, Owner/Baker, AnnaBakes, Wellington"} -->
<div class="wp-block-swank-chef"><strong>Anna Ross</strong><br/><em>Owner/Baker</em><br/>AnnaBakes<br/>Wellington<br/></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":4583,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2022/08/philippe-crop-150x150.jpg" alt="" class="wp-image-4583"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Phillipe Harari and His All Star Country Band","parse":"Phillipe Harari and His All Star Country Band"} -->
<div class="wp-block-swank-chef"><strong>Phillipe Harari and His All Star Country Band</strong><br/><em></em></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5038,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/prosterity--150x150.jpg" alt="" class="wp-image-5038"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Prosperity Brewery","parse":"Prosperity Brewery"} -->
<div class="wp-block-swank-chef"><strong>Prosperity Brewery</strong><br/><em></em></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center">Line Dancer: Mark Paulino</p>
<!-- /wp:paragraph -->

<!-- wp:image {"id":5360,"sizeSlug":"full","linkDestination":"none","align":"center"} -->
<figure class="wp-block-image aligncenter size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/09/1_HoeDown_2023-scaled.jpg" alt="" class="wp-image-5360"/></figure>
<!-- /wp:image -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Participating Restaurants</strong></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"sponsors"} -->
<div class="wp-block-columns sponsors"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":3337,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2020/10/brick-barrel-1024x768.jpg" alt="" class="wp-image-3337"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":1553,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2018/08/LOGO_CHOLO.jpg" alt="" class="wp-image-1553"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":2153,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2019/08/hilton-1024x790.jpg" alt="" class="wp-image-2153"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":3387,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2020/10/anna-bakes.png" alt="" class="wp-image-3387"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Supporting Sponsors</strong></p>
<!-- /wp:paragraph -->

<!-- wp:block {"ref":2295} /-->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>For sponsorship opportunities, call Jodi Swank at&nbsp;<a href="tel:(561)%20202-5648" target="_blank" rel="noreferrer noopener">561-202-5648</a>.</strong></p>
<!-- /wp:paragraph -->';
    $new['post_status'] = 'publish';
    $post_id = wp_insert_post($new);
    $cddate = rsvpmaker_date('Y-m-d H:i:s',$t);
    $end = rsvpmaker_date('Y-m-d H:i:s',$t + HOUR_IN_SECONDS);
    rsvpmaker_add_event_row ($post_id, $cddate, $end, 'set');

    $t += WEEK_IN_SECONDS;
    $new['post_title'] = 'Farm Market Asado';
    $new['post_type'] = 'rsvpmaker';
    $new['post_content'] = '<!-- wp:image {"id":556,"align":"center"} -->
<figure class="wp-block-image aligncenter"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2017/08/Swank-Table-Logo-300x156.png" alt="Swank Table Logo" class="wp-image-556"/></figure>
<!-- /wp:image -->

<!-- wp:heading {"textAlign":"center","className":"event"} -->
<h2 class="wp-block-heading has-text-align-center event">Farm Market Asado</h2>
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
<p class="has-text-align-center"><em>Benefiting: <a href="http://www.msoafoundation.org/">Bak Middle School of the Arts Foundation</a></em></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><em>Join local and artisan vendors who will sell their goods under our pole barn during the dinner.</em></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><em>Each chef will incorporate products from vendors into their menu for this Asado feast!</em></p>
<!-- /wp:paragraph -->

<!-- wp:block {"ref":5181} /-->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5045,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/Tristen-Epps-150x150.jpg" alt="" class="wp-image-5045"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Tristen Epps","title":"Executive Chef","place":"Ocean Social","city":"Miami Beach","parse":"Tristen Epps, Executive Chef, Ocean Social, Miami Beach"} -->
<div class="wp-block-swank-chef"><strong>Tristen Epps</strong><br/><em>Executive Chef</em><br/>Ocean Social<br/>Miami Beach<br/></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5046,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/Brian-Nasajon-150x150.jpg" alt="" class="wp-image-5046"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Brian Nasajon","title":"Chef/Owner","place":"Beaker \u0026amp; Gray","city":"Miami","parse":"Brian Nasajon, Chef/Owner, Beaker and Gray, Miami"} -->
<div class="wp-block-swank-chef"><strong>Brian Nasajon</strong><br/><em>Chef/Owner</em><br/>Beaker &amp; Gray<br/>Miami<br/></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5165,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/Akino-West-150x150.jpg" alt="" class="wp-image-5165"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Akino West","title":"Owner/Chef","place":"Rosie\'s","city":"Miami","parse":"Akimo West, Owner/Chef, Rosie\'s, Miami"} -->
<div class="wp-block-swank-chef"><strong>Akino West</strong><br/><em>Owner/Chef</em><br/>Rosie\'s<br/>Miami<br/></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":4191,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2021/09/Jenniffer-Woo_Lucky-150x150.jpg" alt="" class="wp-image-4191"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":"Jenniffer Woo","title":"Pastry Chef","place":"Lucky Shuck","city":"Jupiter","parse":"Jenniffer Woo, Pastry Chef, Lucky Shuck, Jupiter"} -->
<div class="wp-block-swank-chef"><strong>Jenniffer Woo</strong><br/><em>Pastry Chef</em><br/>Lucky Shuck<br/>Jupiter<br/></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":777,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2017/09/UPROOT-150x150.png" alt="" class="wp-image-777"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":""} -->
<div class="wp-block-swank-chef"><strong></strong><br/><em></em></div>
<!-- /wp:swank/chef -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":4584,"sizeSlug":"thumbnail","linkDestination":"none","align":"left"} -->
<figure class="wp-block-image alignleft size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2022/08/nobo-brewing-company-crop-150x150.png" alt="" class="wp-image-4584"/></figure>
<!-- /wp:image -->

<!-- wp:swank/chef {"chef":""} -->
<div class="wp-block-swank-chef"><strong></strong><br/><em></em></div>
<!-- /wp:swank/chef --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Participating Restaurants</strong></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"sponsors"} -->
<div class="wp-block-columns sponsors"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5043,"sizeSlug":"large","linkDestination":"none","className":"short"} -->
<figure class="wp-block-image size-large short"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/BandG_Logo-Big-1024x380.png" alt="" class="wp-image-5043"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5044,"sizeSlug":"large","linkDestination":"none","className":"short20"} -->
<figure class="wp-block-image size-large short20"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/Ocean-Social-Logo-1024x620.jpg" alt="" class="wp-image-5044"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5167,"sizeSlug":"full","linkDestination":"none","className":"short20"} -->
<figure class="wp-block-image size-full short20"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/08/Rosies.png" alt="" class="wp-image-5167"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":4197,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2021/09/lucky-shuck.jpg" alt="" class="wp-image-4197"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>Supporting Sponsors</strong></p>
<!-- /wp:paragraph -->

<!-- wp:columns {"className":"sponsors"} -->
<div class="wp-block-columns sponsors"><!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5318,"scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","className":"short"} -->
<figure class="wp-block-image aligncenter size-full short"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/09/rockaway-pr.jpg" alt="" class="wp-image-5318" style="object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"id":5335,"scale":"cover","sizeSlug":"thumbnail","linkDestination":"none"} -->
<figure class="wp-block-image size-thumbnail"><img src="https://www.swankspecialtyproduce.com/wp-content/uploads/2023/09/Brustman-Carrino-PR-150x150.jpg" alt="" class="wp-image-5335" style="object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:block {"ref":2295} /-->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>For sponsorship opportunities, call Jodi Swank at&nbsp;<a href="tel:(561)%20202-5648" target="_blank" rel="noreferrer noopener">561-202-5648</a>.</strong></p>
<!-- /wp:paragraph -->';
    $new['post_status'] = 'publish';
    $post_id = wp_insert_post($new);
    $cddate = rsvpmaker_date('Y-m-d H:i:s',$t);
    $end = rsvpmaker_date('Y-m-d H:i:s',$t + HOUR_IN_SECONDS);
    rsvpmaker_add_event_row ($post_id, $cddate, $end, 'set');

}