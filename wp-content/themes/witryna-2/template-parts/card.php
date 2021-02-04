<?php
    $link = ($type == 'inner') ? get_the_permalink($buf->ID) : get_field('sourse', $buf->ID)['url'];
?>
<a href="<?php echo $link;?>" class="card">
    <div class="card-image">
        <?php if(get_the_post_thumbnail_url($buf->ID)):?>
            <img src="<?php echo get_the_post_thumbnail_url($buf->ID);?>">
        <?php else:?>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
        <?php endif;?>
    </div>
    <div class="content">
        <div class="title">
            <?php echo get_the_title($buf->ID);?>
        </div>
        <?php if($date):?>
            <div class="post-date">
                <i class="far fa-calendar-alt"></i>
                <span class="date"><?php echo get_the_date("j F",$buf->ID);?></span>
            </div>
        <?php endif;?>
    </div>
</a>
