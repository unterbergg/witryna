<?php
/**
 * Template name: Home Page
 */

get_header();
?>

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
                        'posts_per_page' => 3
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
                        'post__not_in' => $exclude
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
                        'post__not_in' => $exclude
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
    <section class="section section-bg" id="other">
        <div class="center-wrapper">
            <?php if(get_field('title_other')):?>
                <div class="section-headline"><?php echo get_field('title_other');?></div>
            <?php endif;?>
            <?php
                $args = array(
                    'posts_per_page' => 26
                );
                $posts = new WP_Query( $args );
            ?>
            <div class="line line_of-3">
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="column_of-6">
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="section decorated-bottom">
        <div class="center-wrapper">
            <div class="line line_of-4">
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="section section-bg">
        <div class="center-wrapper">
            <div class="line line_of-3">
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="column_of-6">
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="section decorated-bottom">
        <div class="center-wrapper">
            <div class="line line_of-4">
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="card">
                    <div class="card-image">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                    </div>
                    <div class="content">
                        <div class="title">Saat Liburan Bareng, Atta Dan Aurel Sekamar Atau Pisah?</div>
                        <div class="post-date">
                            <i class="far fa-calendar-alt"></i>
                            <span class="date">13 oktober</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <?php if (  $posts->max_num_pages > 1 ) : ?>
        <script>
            var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
            var true_posts = '<?php echo serialize($posts->query_vars); ?>';
            var current_page = <?php echo (get_query_var('paged')) ? get_query_var('paged') : 1; ?>;
            var max_pages = '<?php echo $posts->max_num_pages; ?>';
        </script>
    <?php endif; ?>
</div>


<?php get_footer(); ?>
