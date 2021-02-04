<?php
/**
 * The template for displaying category page
 */

get_header();
?>
<?php //dd(get_queried_object());?>
<div class="homepage">
    <section class="section decorated-bottom">
        <div class="center-wrapper">
            <?php if(get_field('title')):?>
                <div class="section-headline"><?php echo get_field('title');?></div>
            <?php endif;?>
            <div class="line line_of-3">
                <?php
                    $exclude = [];
                    $args = array(
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => get_queried_object()->term_id
                            )
                        )
                    );
                    $posts = new WP_Query( $args );
                ?>
                <?php if ( $posts->have_posts() ) : ?>
                    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <a href="<?php the_permalink();?>" class="card">
                            <div class="card-image">
                                <?php if(get_the_post_thumbnail_url()):?>
                                    <img src="<?php echo get_the_post_thumbnail_url();?>">
                                <?php else:?>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                                <?php endif;?>
                            </div>
                            <div class="content">
                                <div class="title"><?php the_title();?></div>
                                <div class="post-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <span class="date"><?php echo get_the_date("j F");?></span>
                                </div>
                            </div>
                        </a>
                        <?php array_push($exclude, get_the_ID())?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </div>
            <div class="line line_of-4">
                <?php
                    $args = array(
                        'posts_per_page' => 4,
                        'post__not_in' => $exclude,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => get_queried_object()->term_id
                            )
                        )
                    );
                    $posts = new WP_Query( $args );
                ?>
                <?php if ( $posts->have_posts() ) : ?>
                    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <a href="<?php the_permalink();?>" class="card">
                            <div class="card-image">
                                <?php if(get_the_post_thumbnail_url()):?>
                                    <img src="<?php echo get_the_post_thumbnail_url();?>">
                                <?php else:?>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                                <?php endif;?>
                            </div>
                            <div class="content">
                                <div class="title"><?php the_title();?></div>
                                <div class="post-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <span class="date"><?php echo get_the_date("j F");?></span>
                                </div>
                            </div>
                        </a>
                        <?php array_push($exclude, get_the_ID())?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </div>
        </div>
    </section>
    <section class="section section_of-6">
        <div class="center-wrapper">
            <div class="column_of-6">
                <?php
                    $args = array(
                        'posts_per_page' => 6,
                        'post__not_in' => $exclude,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => get_queried_object()->term_id
                            )
                        )
                    );
                    $posts = new WP_Query( $args );
                ?>
                <?php if ( $posts->have_posts() ) : ?>
                    <?php while ( $posts->have_posts() ) : $posts->the_post(); ?>
                        <a href="<?php the_permalink();?>" class="card">
                            <div class="card-image">
                                <?php if(get_the_post_thumbnail_url()):?>
                                    <img src="<?php echo get_the_post_thumbnail_url();?>">
                                <?php else:?>
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                                <?php endif;?>
                            </div>
                            <div class="content">
                                <div class="title"><?php the_title();?></div>
                            </div>
                        </a>
                        <?php array_push($exclude, get_the_ID())?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif;?>
            </div>
        </div>
    </section>
    <?php
        $args = array(
            'posts_per_page' => 13,
            'post__not_in' => $exclude,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => get_queried_object()->term_id
                )
            )
        );
        $posts = new WP_Query( $args );

    ?>
    <?php if( $posts->have_posts() ) :?>
        <?php
            $maxCount = $posts->post_count;
            $i = 0;
            $exit = false;
        ?>
        <section class="section section-bg" id="other">
            <div class="center-wrapper">
                <?php if(get_field('title_other')):?>
                    <div class="section-headline"><?php echo get_field('title_other');?></div>
                <?php endif;?>

                <?php if($i+3 <= $maxCount && !$exit):?>
                    <div class="line line_of-3">
                        <?php for ($i; $i < 3; $i++):?>
                            <?php $buf = $posts->posts[$i];?>
                            <a href="<?php echo get_the_permalink($buf->ID);?>" class="card">
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
                                    <div class="post-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <span class="date"><?php echo get_the_date("j F",$buf->ID);?></span>
                                    </div>
                                </div>
                            </a>
                        <?php endfor;?>
                    </div>
                <?php else:?>
                    <?php $exit = true;?>
                <?php endif;?>
                <?php if($i+6 <= $maxCount && !$exit):?>
                    <div class="column_of-6">
                        <?php for ($i; $i < 9; $i++):?>
                            <?php $buf = $posts->posts[$i];?>
                            <a href="<?php echo get_the_permalink($buf->ID);?>" class="card">
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
                                </div>
                            </a>
                        <?php endfor;?>
                    </div>
                <?php else:?>
                    <?php $exit = true;?>
                <?php endif;?>
            </div>
        </section>
        <?php if($i+4 <= $maxCount && !$exit):?>
            <section class="section decorated-bottom">
                <div class="center-wrapper">
                    <div class="line line_of-4">
                        <?php for ($i; $i < 13; $i++):?>
                            <?php $buf = $posts->posts[$i];?>
                            <a href="<?php echo get_the_permalink($buf->ID);?>" class="card">
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
                                    <div class="post-date">
                                        <i class="far fa-calendar-alt"></i>
                                        <span class="date"><?php echo get_the_date("j F",$buf->ID);?></span>
                                    </div>
                                </div>
                            </a>
                        <?php endfor;?>
                    </div>
                </div>
            </section>
        <?php else:?>
            <?php $exit = true;?>
        <?php endif;?>

    <?php endif;?>
    <?php //if (  $posts->max_num_pages > 1 ) : ?>
    <script>
        var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
        var true_posts = '<?php echo serialize($posts->query_vars); ?>';
        var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
        var max_pages = '<?php echo $posts->max_num_pages; ?>';
        var type = 'inner';
    </script>
    <?php //endif; ?>
</div>


<?php get_footer(); ?>
