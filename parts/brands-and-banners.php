<?php 
global $front_page;
global $stock; 
?>
<!-- начало блок-банер наши акции и наши бренды -->
<div class="shares-and-brands-banner">
    <div class="wrapper">
        <div class="shares-and-brands-banner-wrapper">
            <div class="shares-banner">
                <div class="button2" onclick="openSharesBrands(this)"></div>
                <div class="body-shares-banner-wrapper" id="body-shares-banner-wrapper">
                    <div class="body-shares-banner">

                        <?php while($stock->have_posts()) : $stock->the_post(); ?>
                            <div class="div">
                                <a href="<?php the_permalink(); ?>">
                                    <span> <?php the_title(); ?> </span>
                                    <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'prod_page' )[0];?>" alt="<?php the_title(); ?>">
                                </a>
                            </div>
                        <?php endwhile; wp_reset_query(); ?> 
                        
                    </div>

                    <div class="body-shares-banner body-shares-banner-slider">
                        <div class="owl-carousel owl-theme body-shares-bannerSlider">

                            <?php while($stock->have_posts()) : $stock->the_post(); ?>
                                <div class="div">
                                    <a href="<?php the_permalink(); ?>">
                                        <span> <?php the_title(); ?> </span>
                                        <img src="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id(), 'prod_page' )[0];?>" alt="<?php the_title(); ?>">
                                    </a>
                                </div>
                            <?php endwhile; wp_reset_query(); ?>

                        </div>
                    </div>
                </div>
                <div class="button1"></div>
            </div>
            <div class="clear"></div>
            <div class="brands-banner">
                <div class="button2" onclick="openSharesBrands(this)"></div>
                <div class="body-brands-banner-wrapper" id="body-brands-banner-wrapper">
                    <div class="body-brands-banner">
                        <div class="ourBrend-slider-banner-wrapper">
                            <div class="owl-carousel owl-theme ourBrend-slider-banner">
                                <?php $brands = get_field('brand', $front_page); foreach($brands as $brand){ ?>
                                    <div class="item">
                                        <img src="<?php echo $brand['url']; ?>" alt="img" style="width: 39%;">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>		
                    </div>
                </div>
                <div class="button1"></div>
            </div>
        </div>
    </div>
</div>
<!-- конец блок-банер наши акции и наши бренды -->