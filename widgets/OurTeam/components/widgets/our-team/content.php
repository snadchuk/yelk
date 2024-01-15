<?php
$our_team = $settings ?? array();
$our_team_list = $our_team["team"];
?>

<div class="our-team">
    <h2><?php echo esc_html($our_team["widget_section_name"] ?? ''); ?></h2>

    <?php
    if ('yes' === $our_team['show_slider']) : ?>
    <div class="our-team__container our-team__container--flex"
         data-slider="team-slider"
         data-slider-cnt="<?php echo $our_team["team_count"]["size"] ?>">
        <?php else : ?>
        <div class="our-team__container our-team__container--grid">
            <?php
            endif;
            foreach ($our_team_list as $our_team_item) : ?>
                <div>
                    <?php if (empty($our_team_item["image"]["id"])) : ?>
                        <img src="<?php echo $our_team_item["photo"]["url"]; ?>" alt="placeholder">
                    <?php else :
                        echo wp_get_attachment_image($our_team_item["photo"]["id"], "full");
                    endif;
                    ?>
                    <p><?php echo $our_team_item["name"] ?? ''; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


