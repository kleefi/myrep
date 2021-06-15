<?php
/*
Template Name: Fiber Broadband
*/
?>

    <?php get_header(); ?>

    <?php
    $base_url = get_option('siteurl');
    $template_url = get_template_directory_uri();
    $theme_url = $template_url."/assets/";
    $public_url = $template_url."/public/";

    $dginit = \Main\Init::get_instance();
    ?>

    <?php if (have_posts()): ?> 
    <?php while ( have_posts() ) : the_post(); ?>

    <?php
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
    ?>

    <div class="jumbotron jumbotron--product bare--header">
        <div class="container">
            <div class="jumbotron__header">
                <h1><?= get_the_title() ?></h1>
            </div>
        </div>
    </div>

    <div class="container jumbotron__distract">
        <div class="jumbotron__content">
            <div class="content cover" style="background-image: url('<?= $featured_img_url ?>');border: 2px solid #993090;"></div>
        </div>
    </div>

    <!-- MAIN BLOCK -->
    <main class="main fiber-broadband">

        <?php 
        get_template_part( 'part-templates/page-layout'); 
        ?>
        
          <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                         <div class="set-banner"><a href="https://myrepublic.co.id/online-promo/"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/Internet-Only.gif" target="_blank"></a></div>
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                        <div class="set-banner"><a href="https://myrepublic.co.id/online-promo/"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/Internet-Only-ES.gif" target="_blank"></a></div> 
                        <?php } ?>
                        
        

        
        
        
        
        
        <!-- QUIZ COMPONENT -->
        <?php get_template_part( 'part-templates/package-builder'); ?>
        
        <!-- BANNER COMPONENT -->
        <div class="main__banner bg--gradient">
<!-- 			add class cta for CTA - edited by charles simanjuntak -->
            <div class="container cta">
                <div class="main__header">
                    <h2><?= __("Give us a call",'myrepublic_theme') ?> <strong>1500-818</strong></h2>
                </div>
                <div class="main__btn">
                    <a href="tel:0211500818">
                        <i class="fas fa-phone"></i>
                        <?= __("1500-818",'myrepublic_theme') ?>
                    </a>
                    <a href="javascript:void(0)" data-toggle='modal' data-target='#scheduleCall'>
                        <i class="fas fa-clock"></i>
                        <?= __("Schedule a call",'myrepublic_theme') ?>
                    </a>
                </div>
            </div>
        </div>

    </main>

    <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>
