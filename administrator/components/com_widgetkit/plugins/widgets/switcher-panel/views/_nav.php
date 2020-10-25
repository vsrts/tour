<?php

// Nav
$tabs_center = '';
$nav_item = '';

if ($settings['nav'] == 'tabs') {

    // Positon
    $nav = '{wk}-tab';

    // Alignment Right
    $nav .= ($settings['alignment'] == 'right') ? ' {wk}-tab-flip' : '';

    // Alignment Justify
    $nav .= ($settings['alignment'] == 'justify') ? ' {wk}-tab-grid' : '';
    $nav_item = ($settings['alignment'] == 'justify') ? ' class="{wk}-width-1-' . count($items) . '"' : '';

    // Alignment Center
    if ($settings['alignment'] == 'center') {
        $tabs_center = '{wk}-tab-center';
    }

    $javascript = 'tab';

} else {

    switch ($settings['nav']) {
        case 'text':
            $nav = '{wk}-subnav';
            break;
        case 'lines':
            $nav = '{wk}-subnav {wk}-subnav-line';
            break;
        case 'nav':
            $nav = '{wk}-subnav {wk}-subnav-pill';
            break;
        case 'thumbnails':
            $nav = '{wk}-thumbnav';
            $nav_item = ($settings['alignment'] == 'justify') ? ' class="{wk}-width-1-' . count($items) . '"' : '';
            break;
    }

    // Alignment
    $nav .= ($settings['alignment'] != 'justify') ? ' {wk}-flex-' . $settings['alignment'] : '';

    $javascript = 'switcher';

}

// Animation
$animation = ($settings['animation'] != 'none') ? ',animation:\'' . $settings['animation'] . '\'' : '';

// Disable swiping
$swiping = ($settings['disable_swiping']) ? ',swiping:false' : '';

?>

<?php if ($tabs_center) : ?>
<div class="<?php echo $tabs_center; ?>">
<?php endif ?>

<ul class="<?php echo $nav; ?>" data-{wk}-<?php echo $javascript; ?>="{connect:'#wk-<?php echo $settings['id']; ?>'<?php echo $animation; ?><?php echo $swiping; ?>}">
<?php foreach ($items as $item) : ?>
    <?php

        // Alternative Media Field
        $field = 'media';
        if ($settings['thumbnail_alt']) {
            foreach ($item as $media_field) {
                if (($item[$media_field] != $item['media']) && ($item->type($media_field) == 'image')) {
                    $field = $media_field;
                    break;
                }
            }
        }

        // Thumbnails
        $thumbnail = '';
        if ($settings['nav'] == 'thumbnails' &&  ($item->type($field) == 'image' || $item[$field . '.poster'])) {

            $attrs           = array();
            $width           = ($settings['thumbnail_width'] != 'auto') ? $settings['thumbnail_width'] : $item[$field . '.width'];
            $height          = ($settings['thumbnail_height'] != 'auto') ? $settings['thumbnail_height'] : $item[$field . '.height'];

            $attrs['alt']    = strip_tags($item['title']);
            $attrs['width']  = $width;
            $attrs['height'] = $height;

            if ($settings['thumbnail_width'] != 'auto' || $settings['thumbnail_height'] != 'auto') {
                $thumbnail = $item->thumbnail($item->type($field) == 'image' ? $field : $field . '.poster', $width, $height, $attrs);
            } else {
                $thumbnail = $item->media($item->type($field) == 'image' ? $field : $field . '.poster', $attrs);
            }
        }

    ?>
    <li<?php echo $nav_item; ?>><a href=""><?php echo ($thumbnail) ? $thumbnail : $item['title']; ?></a></li>
<?php endforeach; ?>
</ul>

<?php if ($tabs_center) : ?>
</div>
<?php endif ?>
