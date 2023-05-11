<?php
get_header();

$fields = get_fields();

get_template_part('partials/sections/home', 'video-bg', [
    'video' => $fields['video_bg'],
    'logo' => $fields['logo_first_screen'],
    'title' => $fields['title_sc1'],
    'btn_link' => $fields['button_sc1']['button_link_sc1'],
    'btn_name' => $fields['button_sc1']['button_name_sc1'],
    'images' => $fields['image_restrictions'],
]);

get_template_part('partials/sections/home', 'slots', [
    'title' => $fields['name_section_sc2'],
    'text' => $fields['description_section_sc2'],
    'slots' => $fields['slots_sc2']
]);

get_template_part('partials/sections/home', 'action', [
    'title' => $fields['title_block_action'],
    'text' => $fields['description_block_action'],
    'logo' => $fields['logo_slot_action'],
    'btn_name' => $fields['button_action']['name'],
    'btn_link' => $fields['button_action']['link'],
    'logo_company' => $fields['logo_company_action'],
]);

get_template_part('partials/sections/home', 'tourney');

get_template_part('partials/sections/home', 'tips', [
    'title' => $fields['title_block_tips'],
    'btn_name' => $fields['button__tips']['name'],
    'btn_link' => $fields['button__tips']['link'],
    'list' => $fields['info_list_tips'],
    'title_desc' => $fields['title_description_tips'],
    'text_desc' => $fields['text_description_tips'],
]);

get_template_part('partials/sections/home', 'pages');

get_template_part('partials/sections/home', 'latest-news');

get_template_part('partials/sections/home', 'works', [
    'title' => $fields['title_block_works'],
    'list' => $fields['list_works']
]);

get_template_part('partials/sections/home', 'content', [
    'id' => 'play',
    'title' => $fields['title_play'],
    'text' => $fields['text_play']
]);

get_template_part('partials/sections/home', 'content', [
    'id' => 'want',
    'title' => $fields['title_want'],
    'text' => $fields['text_want']
]);

get_template_part('partials/sections/home', 'faq', [
    'title' => $fields['title_faq'],
    'list' => $fields['faq_list']
]);

?>



<?php get_footer(); ?>
