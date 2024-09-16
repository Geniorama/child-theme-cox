<?php

if(!function_exists('cox_grid_posts_func')){
    add_shortcode( 'cox_grid_posts', 'cox_grid_posts_func' );

    function cox_grid_posts_func($atts){
        $atts = shortcode_atts( array(
          'post_type' => 'post',
          'posts_per_page' => 3 
        ), 
        $atts, 'cox_grid_posts' );

        $args = array(
            'post_type' => $atts['post_type'],
            'posts_per_page' => $atts['posts_per_page']
        );

        $query = new WP_Query($args);

        if($query->have_posts()):
        $icon_arrow_src = get_stylesheet_directory_uri() . '/inc/assets/img/flecha-arriba-azul.svg';
        ob_start();
        ?>
            <!-- Styles grid posts -->
            <style>
                .cox-grid-posts{
                    display: flex;
                    flex-direction: column;
                    overflow: hidden;
                    gap: 30px;
                }

                .cox-post-arrow{
                    width: 30px;
                }

                .cox-post-thumbnail{
                    height: 230px;
                }

                .cox-post-content{
                    height: 50%;
                    width: 100%;
                    padding: 2em;
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                }

                .cox-post-thumbnail-img{
                    width: 100%;
                    height: 100% !important;
                    object-fit: cover;
                }

                .cox-post-item{
                    grid-column: span 1;
                    background-color: #F2F2F2;
                    position: relative;
                    display: flex;
                    flex-direction: column;
                    color: black;
                    font-family: var( --e-global-typography-primary-font-family ), Sans-serif;
                    line-height: 1em;
                    transition: .3s;
                }

                .cox-post-item:hover{
                    opacity: .7;
                }

                .cox-post-date{
                    font-size: 16px;
                    font-weight: bold;
                    display: inline-block;
                    margin-bottom: .8em;
                }

                .cox-post-title{
                    font-size: 20px;
                    font-weight: bold;
                }

                .cox-post-excerpt{
                    font-size: 16px;
                    font-weight: 500;
                    line-height: 1.2em;
                }

                .cox-post-container-arrow{
                    text-align: right;
                }

                @media screen and (min-width: 1200px){
                    .cox-grid-posts{
                        display: grid;
                        grid-template-columns: repeat(4, 1fr);
                        height: 700px;
                        gap: 0px;
                    }

                    .cox-post-content{
                        height: 50%;
                    }

                    .cox-post-thumbnail{
                        height: 50%;
                    }
                    .cox-post-item:first-child{
                        grid-column: 1 / span 2;
                    }

                    .cox-post-item:first-child .cox-post-thumbnail{
                        height: 100%;
                    }

                    .cox-post-item:first-child .cox-post-content{
                        width: 50%;
                        background-color: turquoise;
                        position: absolute;
                        right: 0;
                        bottom: 0;
                        color: var( --e-global-color-primary );
                    }

                    .cox-post-item:nth-child(3){
                        flex-direction: column-reverse;
                    }
                }
            </style>
            <div class="cox-grid-posts">
                <?php while($query->have_posts()): $query->the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="cox-post-item">
                        <div class="cox-post-thumbnail">
                            <?php 
                            if(has_post_thumbnail()) {
                                echo get_the_post_thumbnail( get_the_ID(), 'full', array('class' => 'cox-post-thumbnail-img'));
                            } 
                            ?>
                        </div>
                        <div class="cox-post-content">
                            <div class="cox-post-container-content">
                                <span class="cox-post-date"><?php echo get_the_date(); ?></span>
                                <h3 class="cox-post-title"><?php the_title(); ?></h3>
                                <div class="cox-post-excerpt"><?php the_excerpt(); ?></div>
                            </div>
                            <div class="cox-post-container-arrow">
                                <img src="<?php echo $icon_arrow_src ?>" alt="" class="cox-post-arrow">
                            </div>
                        </div>
                        </a>
                <?php endwhile; ?>
            </div>
        <?php
        endif;
        wp_reset_postdata();
        return ob_get_clean();
    }
}