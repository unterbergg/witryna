<?php
/**
 * Template name: Post Preview
 */

get_header();
?>
<?php
    $orig = get_field('original_post');

    $exclude = [];
    array_push($exclude ,$orig->ID);
    $term_obj_list = get_the_terms($orig->ID, 'category');
    $func = function ($n) {
        return $n->term_id;
    };
    $term_obj_list = array_map($func, $term_obj_list);
?>
<div class="single-preview">
    <section class="section single-content section-preview">
        <div class="center-wrapper">
            <div class="article-section">
                <div class="article-wrapper">
                    <a href="<?php echo get_permalink($orig->ID);?>" class="article__heading">
                        <div class="article__image"
                            <?php if(get_the_post_thumbnail($orig->ID)):?>
                                style="background-image: url('<?php echo get_the_post_thumbnail_url($orig->ID);?>')"
                            <?php endif;?>
                        >
                            <div class="article-preview__content">
                                <div class="article-preview__title">
                                    <?php echo get_the_title($orig->ID);?>
                                </div>
                                <div class="article-preview__bottom-panel">
                                    <div class="article-preview__read-more">Selengkapnya</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <?php
                    $args = array(
                        'posts_per_page' => 2,
                        'post__not_in' => $exclude,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => $term_obj_list
                            )
                        )
                    );
                    $posts = new WP_Query( $args );
                ?>
                <?php if( $posts->have_posts() ) :?>
                    <div class="sidebar">
                        <div class="line line_of-2">
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
                                        <div class="title">
                                            <?php the_title();?>
                                        </div>
                                        <div class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span class="date"><?php echo get_the_date("j F");?></span>
                                        </div>
                                    </div>
                                </a>
                                <?php array_push($exclude, get_the_ID())?>
                            <?php endwhile;?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>

    <?php
    $args = array(
        'posts_per_page' => 2,
        'post__not_in' => $exclude,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $term_obj_list
            )
        )
    );
    $posts = new WP_Query( $args );
    ?>
    <?php if( $posts->have_posts() ) :?>

        <section class="section section-bg section_of-2">
            <div class="center-wrapper">
                <div class="column_of-2">
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
                                <div class="title">
                                    <?php the_title();?>
                                </div>
                            </div>
                        </a>
                        <?php array_push($exclude, get_the_ID())?>
                    <?php endwhile;?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </section>

    <?php endif;?>

    <?php
        $args = array(
            'posts_per_page' => 7,
            'post__not_in' => $exclude,
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $term_obj_list
                )
            )
        );
        $posts = new WP_Query( $args );
    ?>
    <?php if( $posts->have_posts() ) :?>
        <?php
            $items = $posts->posts;
            $maxCount = $posts->post_count;
            $i = 0;
            $exit = false;
        ?>
        <?php if($i+3 <= $maxCount && !$exit):?>
            <section class="section decorated-bottom">
                <div class="center-wrapper">
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
                            <?php array_push($exclude, $items[$i]->ID)?>
                        <?php endfor;?>
                    </div>
                </div>
            </section>
        <?php else:?>
            <?php $exit = true;?>
        <?php endif;?>
        <?php if($i+4 <= $maxCount && !$exit):?>
            <section class="section">
                <div class="center-wrapper">
                    <div class="line line_of-4">
                        <?php for ($i; $i < 7; $i++):?>
                            <?php $buf = $posts->posts[$i];?>
                            <a href="<?php get_the_permalink($buf->ID);?>" class="card">
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
                            <?php array_push($exclude, $items[$i]->ID)?>
                        <?php endfor;?>
                    </div>
                </div>
            </section>
        <?php else:?>
            <?php $exit = true;?>
        <?php endif;?>
    <?php endif;?>

    <?php
    $args = array(
        'posts_per_page' => 13,
        'post__not_in' => $exclude,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => 7//$term_obj_list[0]->term_id
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
        <section class="section section-bg">
            <div class="center-wrapper">
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

<?php
get_footer();
