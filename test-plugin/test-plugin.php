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
}