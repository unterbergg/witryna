<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Witryna_#2
 */

get_header();
?>

<div class="single">
    <section class="section section_of-2">
        <div class="center-wrapper">
            <div class="column_of-2">
                <?php
                    $links = get_field('after_hed_links');
                    $flag = -1;
                    $cur = -1;
                ?>
                <?php for($i = 0; $i < 2; $i++) :?>
                    <?php
                        while ($flag == $cur) {
                            $cur = random_int(0,count($links) - 1);
                        }
                        $first = $links[$cur];
                        $flag = $cur;
                    ?>
                    <a href="<?php echo $first['link'];?>" class="card">
                        <div class="card-image">
                            <?php if($first['image']):?>
                                <img src="<?php echo $first['image']['url'];?>">
                            <?php else:?>
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                            <?php endif;?>
                        </div>
                        <div class="content">
                            <div class="title">
                                <?php echo $first['title'];?>
                            </div>
                        </div>
                    </a>
                <?php endfor;?>
            </div>
        </div>
    </section>
    <section class="section single-content">
        <div class="center-wrapper">
            <div class="article-section">
                <div class="article-wrapper">
                    <div class="article__heading">
                        <div class="article__image"
                             <?php if(get_the_post_thumbnail()):?>
                                style="background-image: url('<?php echo get_the_post_thumbnail_url();?>')"
                             <?php endif;?>
                        >
                            <div class="article__title">
                                <?php echo get_the_title();?>
                            </div>
                        </div>
                    </div>
                    <div class="article__content">
                        <?php the_content();?>
                        <?php if(get_field('sourse')):?>
                            <?php $link = get_field('sourse');?>
                            <div class="article__navigation">
                                <div class="article-source">
                                    <span class="article-source__label">Sumber:</span>
                                    <a href="<?php echo $link['url'];?>" target="<?php echo $link['target'];?>"
                                       class="article-source__link">
                                        <?php echo $link['title'];?>
                                    </a>
                                </div>
                            </div>
                        <?php endif;?>

                        <div class="read-also">
                            <div class="read-also__title">Direkomendasikan</div>
                            <div class="linc-wrapper">
                                <?php
                                    $links = get_field('other_posts');
                                    $flag = -1;
                                    $cur = -1;
                                ?>
                                <?php for($i = 0; $i < 3; $i++) :?>
                                    <?php
                                    while ($flag == $cur) {
                                        $cur = random_int(0,count($links) - 1);
                                    }
                                    $first = $links[$cur];
                                    $flag = $cur;
                                    ?>
                                    <a href="<?php echo $first['link'];?>" class="card">
                                        <div class="card-image">
                                            <?php if($first['image']):?>
                                                <img src="<?php echo $first['image']['url'];?>">
                                            <?php else:?>
                                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                                            <?php endif;?>
                                        </div>
                                        <div class="content">
                                            <div class="title">
                                                <?php echo $first['title'];?>
                                            </div>
                                        </div>
                                    </a>
                                <?php endfor;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar">
                    <?php
                        $sidebarPosts = get_field('sidebar_posts');
                        $j = 0;
                    ?>
                    <?php if($j+2 < count($sidebarPosts)):?>
                        <div class="line line_of-2">
                            <?php for ($j; $j < 2; $j++):?>
                                <a href="<?php echo $sidebarPosts[$j]['link'];?>" class="card">
                                    <div class="card-image">
                                        <?php if($sidebarPosts[$j]['image']):?>
                                            <img src="<?php echo $sidebarPosts[$j]['image']['url'];?>"
                                                 alt="<?php echo $sidebarPosts[$j]['image']['alt'];?>"
                                            >
                                        <?php else:?>
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                                        <?php endif;?>
                                    </div>
                                    <div class="content">
                                        <div class="title">
                                            <?php echo $sidebarPosts[$j]['title'];?>
                                        </div>
                                        <div class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span class="date">
                                                <?php echo $sidebarPosts[$j]['date'];?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php
                            ?>
                            <?php endfor;?>
                        </div>
                    <?php endif;?>
                    <?php if($j+2 < count($sidebarPosts)):?>
                        <div class="line line_of-1">
                            <?php for ($j; $j < 4; $j++):?>
                                <a href="<?php echo $sidebarPosts[$j]['link'];?>" class="card">
                                    <div class="card-image">
                                        <?php if($sidebarPosts[$j]['image']):?>
                                            <img src="<?php echo $sidebarPosts[$j]['image']['url'];?>"
                                                 alt="<?php echo $sidebarPosts[$j]['image']['alt'];?>"
                                            >
                                        <?php else:?>
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                                        <?php endif;?>
                                    </div>
                                    <div class="content">
                                        <div class="title">
                                            <?php echo $sidebarPosts[$j]['title'];?>
                                        </div>
                                        <div class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span class="date">
                                                <?php echo $sidebarPosts[$j]['date'];?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php endfor;?>
                        </div>
                    <?php endif;?>
                    <?php if($j+2 < count($sidebarPosts)):?>
                        <div class="line line_of-2">
                            <?php for ($j; $j < 6; $j++):?>
                                <a href="<?php echo $sidebarPosts[$j]['link'];?>" class="card">
                                    <div class="card-image">
                                        <?php if($sidebarPosts[$j]['image']):?>
                                            <img src="<?php echo $sidebarPosts[$j]['image']['url'];?>"
                                                 alt="<?php echo $sidebarPosts[$j]['image']['alt'];?>"
                                            >
                                        <?php else:?>
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                                        <?php endif;?>
                                    </div>
                                    <div class="content">
                                        <div class="title">
                                            <?php echo $sidebarPosts[$j]['title'];?>
                                        </div>
                                        <div class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span class="date">
                                                <?php echo $sidebarPosts[$j]['date'];?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php endfor;?>
                        </div>
                    <?php endif;?>
                    <?php if($j+2 < count($sidebarPosts)):?>
                        <div class="line line_of-1">
                            <?php for ($j; $j < 8; $j++):?>
                                <a href="<?php echo $sidebarPosts[$j]['link'];?>" class="card">
                                    <div class="card-image">
                                        <?php if($sidebarPosts[$j]['image']):?>
                                            <img src="<?php echo $sidebarPosts[$j]['image']['url'];?>"
                                                 alt="<?php echo $sidebarPosts[$j]['image']['alt'];?>"
                                            >
                                        <?php else:?>
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                                        <?php endif;?>
                                    </div>
                                    <div class="content">
                                        <div class="title">
                                            <?php echo $sidebarPosts[$j]['title'];?>
                                        </div>
                                        <div class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span class="date">
                                                <?php echo $sidebarPosts[$j]['date'];?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php endfor;?>
                        </div>
                    <?php endif;?>
                    <?php if($j+2 < count($sidebarPosts)):?>
                        <div class="line line_of-2">
                            <?php for ($j; $j < 10; $j++):?>
                                <a href="<?php echo $sidebarPosts[$j]['link'];?>" class="card">
                                    <div class="card-image">
                                        <?php if($sidebarPosts[$j]['image']):?>
                                            <img src="<?php echo $sidebarPosts[$j]['image']['url'];?>"
                                                 alt="<?php echo $sidebarPosts[$j]['image']['alt'];?>"
                                            >
                                        <?php else:?>
                                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2FEQjYeVYv86TI-kFJ0T4mu52NIKwfTz50Q&usqp=CAU">
                                        <?php endif;?>
                                    </div>
                                    <div class="content">
                                        <div class="title">
                                            <?php echo $sidebarPosts[$j]['title'];?>
                                        </div>
                                        <div class="post-date">
                                            <i class="far fa-calendar-alt"></i>
                                            <span class="date">
                                                <?php echo $sidebarPosts[$j]['date'];?>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            <?php endfor;?>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>
    <?php
        $term_obj_list = get_the_terms($post->ID, 'category');
        $exclude = [];
        array_push($exclude, get_the_ID());
        $args = array(
            'posts_per_page' => 7,
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
        var type = 'outer';
    </script>
    <?php //endif; ?>
</div>

<?php
get_footer();
