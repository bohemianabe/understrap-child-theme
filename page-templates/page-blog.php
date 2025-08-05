<?php
/* Template Name: Blog Landing Page */
get_header(); ?>

<div id="primary" class="content-area mt-4">
  <main id="main" class="site-main">
    <div class="container">
        <div class="row">
        
            <!-- Main Content -->
            <div class="col-md-8">
            <h1><?php // the_title(); ?></h1>

            <?php
            $paged = max(1, get_query_var('paged') ?: get_query_var('page'));

            $args = [
                'post_type'         => 'post',
                'posts_per_page'    => 6,
                'paged'             => $paged,
            ];
            
            $blog_query = new WP_Query($args);

            if ($blog_query->have_posts()) :
                $count = 0;
            ?>

            <?php 
                while ($blog_query->have_posts()) : $blog_query->the_post();
                if ($count % 2 === 0) echo '<div class="row mb-4">';
            ?>

                <div class="col-md-6">
                    <article>
                        <img src="<?= get_the_post_thumbnail_url() ?>" alt="" class="img-fluid mb-2">
                        <h2>
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                    $title = get_the_title();
                                    echo (strlen($title) > 20) ? substr($title, 0, 20) . '...' : $title; 
                                ?>
                            </a>
                        </h2>
                        <div class="mb-4">
                            <?php 
                                $excerpt = get_the_excerpt();
                                echo (strlen($excerpt) > 100) ? substr($excerpt, 0, 100) . '...' : $excerpt; 
                            ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn-tertiary">Read More...</a>
                    </article>
                </div>

            <?php
                $count++;
                if ($count % 2 === 0) echo '</div>';
                endwhile;

                
            if ($count % 2 !== 0) echo '</div>';
            ?>

            <div class="pagination-wrapper mt-4 mb-4">
                <?php 
                    // pagination
                    echo paginate_links([
                        'total'   => $blog_query->max_num_pages,
                        'current' => $paged,
                        'mid_size' => 2,
                        'prev_text' => __('« Prev', 'textdomain'),
                        'next_text' => __('Next »', 'textdomain'),
                    ]);
                  ?>
            </div>

            <?php else : ?>
                <p>No posts found.</p>
            <?php endif;

            wp_reset_postdata(); ?>

            <?php
                // Do the right sidebar check and close div#primary.
                get_template_part( 'global-templates/right-sidebar-check' );
            ?>

            </div>

        </div>
    </div>
  </main>
</div>

<?php get_footer(); ?>
