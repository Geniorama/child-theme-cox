<?php

if (!function_exists('cox_grid_projects_func')) {
    add_shortcode('cox_grid_projects', 'cox_grid_projects_func');
    function cox_grid_projects_func($atts)
    {
        $atts = shortcode_atts(
            array(
                'post_type' => 'cox_projects',
                'posts_per_page' => 5,
                'enableLinks' => false
            ),
            $atts,
            'cox_grid_posts'
        );

        $current_language = pll_current_language();

        $args = array(
            'post_type' => $atts['post_type'],
            'posts_per_page' => $atts['posts_per_page'],
            'lang' => $current_language
        );

        $query = new WP_Query($args);

        if ($query->have_posts()):
            $icon_arrow_src = get_stylesheet_directory_uri() . '/inc/assets/img/flecha-arriba-azul.svg';
            ob_start();
            $post_count = 0;
            remove_filter('the_excerpt', 'limit_excerpt_with_dots');
?>
            <!-- Styles grid projects -->
            <style>
                .cox-grid-projects {
                    display: flex;
                    flex-direction: column;
                    width: 100%;
                    overflow: hidden;
                    gap: 30px;
                }

                .cox-grid-projects-item {
                    display: flex;
                    flex-direction: column;
                    font-family: var(--e-global-typography-primary-font-family), Sans-serif;
                    line-height: 1.2em;
                    color: black;
                    box-sizing: border-box;
                    transition: .3s;
                }

                .cox-grid-projects-link:hover {
                    opacity: .6;
                }

                .cox-grid-projects-thumbnail {
                    height: 200px;
                    overflow: hidden;
                    background: #F8F8F8;
                }

                .cox-grid-projects-thumbnail-img {
                    width: 100%;
                    height: 100% !important;
                    transition: .5s;
                    object-fit: cover;
                }

                .cox-grid-projects-link:hover .cox-grid-projects-thumbnail-img {
                    transform: scale(1.1) rotate(-1deg);
                }

                .cox-grid-projects-content {
                    background-color: #f2f2f2;
                    padding: 2em;
                }

                .cox-grid-projects-content-heading {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .cox-grid-projects-title {
                    color: var(--e-global-color-primary);
                    font-size: 26px;
                    font-weight: bold;
                }

                .cox-grid-projects-arrow {
                    width: 20px;
                    display: inline-block;
                }

                .cox-grid-projects-excerpt {
                    font-size: 16px;
                    margin-top: 1em;
                }


                @media screen and (min-width: 1200px) {
                    .cox-grid-projects {
                        display: grid;
                        height: auto;
                        gap: 1px;
                        grid-template-columns: repeat(7, 1fr);
                        grid-template-rows: repeat(2, 1fr);
                    }

                    .cox-grid-projects-item {
                        grid-column: span 2;
                        grid-row: span 1;
                        overflow: hidden;
                    }

                    .cox-grid-projects-item:first-child {
                        grid-column: 1 / span 3;
                        grid-row: 1 / span 2;
                    }

                    .cox-grid-projects-thumbnail {
                        height: 50%;
                    }

                    .cox-grid-projects-content {
                        height: 50%;
                    }

                    .cox-grid-projects-item:first-child .cox-grid-projects-thumbnail,
                    .cox-grid-projects-item:first-child .cox-grid-projects-content {
                        height: 50%;
                    }

                }
            </style>
            <div class="cox-grid-projects">
                <?php while ($query->have_posts()): $query->the_post();
                    $post_count++; ?>
                    <?php if ($atts['enableLinks']): ?>
                        <a href="<?php the_permalink(); ?>" class="cox-grid-projects-item cox-grid-projects-link">
                            <div class="cox-grid-projects-thumbnail">
                                <?php
                                if (has_post_thumbnail()) {
                                    echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'cox-grid-projects-thumbnail-img'));
                                }
                                ?>
                            </div>

                            <div class="cox-grid-projects-content">
                                <div class="cox-grid-projects-content-heading">
                                    <h3 class="cox-grid-projects-title"><?php the_title(); ?></h3>
                                    <img src="<?php echo $icon_arrow_src; ?>" alt="" class="cox-grid-projects-arrow">
                                </div>

                                <?php echo do_shortcode('[show_project_info]'); ?>

                                <div class="cox-grid-projects-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </a>
                    <?php else: ?>
                        <div class="cox-grid-projects-item">
                            <div class="cox-grid-projects-thumbnail">
                                <?php
                                if (has_post_thumbnail()) {
                                    echo get_the_post_thumbnail(get_the_ID(), 'full', array('class' => 'cox-grid-projects-thumbnail-img'));
                                }
                                ?>
                            </div>

                            <div class="cox-grid-projects-content">
                                <div class="cox-grid-projects-content-heading">
                                    <h3 class="cox-grid-projects-title"><?php the_title(); ?></h3>
                                </div>

                                <?php echo do_shortcode('[show_project_info]'); ?>

                                <div class="cox-grid-projects-excerpt">
                                    <?php
                                    the_excerpt();
                                    ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
<?php
        endif;
        wp_reset_postdata();
        return ob_get_clean();
    }
}
