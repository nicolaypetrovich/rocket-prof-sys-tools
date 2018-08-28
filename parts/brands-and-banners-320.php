<?php 
global $front_page; 
global $stock;
?>
<!-- начало блок-банер наши акции и наши бренды мобверсия -->
<div class="shares-and-brands-banner shares-and-brands-banner-320 ">
    <div class="buttons-shares-and-brands-banner-320"><span  onclick="openBrandsMob(this)" class="scroll-down">наши бренды</span><span class="scroll-down" onclick="openSharesMob(this)">наши акции</span></div>
    <div class="wrapper">
        <div class="shares-and-brands-banner-wrapper">
            <div class="shares-banner" id="shares-banner">
                <div class="body-shares-banner-wrapper">
                    <div class="body-shares-banner body-shares-banner-slider">
                        <div class="owl-carousel owl-theme body-shares-bannerSlider">
                            <?php 
                            while($stock->have_posts()) : $stock->the_post(); ?>
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
            </div>
            <div class="clear"></div>
            <div class="brands-banner" id="brands-banner">
                <div class="body-brands-banner-wrapper">
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
            </div>
        </div>
    </div>
</div>
<!-- конец блок-банер наши акции и наши бренды мобверсия -->