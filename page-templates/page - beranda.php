<?php
/*
Template Name: Beranda
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

    <?php 
    set_query_var( 'cat_slider', "home" );
    get_template_part( 'part-templates/slider'); 
    ?>

    <main class="main">

        <?php 
        get_template_part( 'part-templates/page-layout'); 
        ?>

        <!-- QUIZ COMPONENT -->
        <?php get_template_part( 'part-templates/package-builder'); ?>

        <!-- BANNER COMPONENT -->
        <div class="main__banner bg--gradient">
            <div class="container cta">
                <div class="main__header">
                    
                     <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                          <!-- <h2><?= __("Hubungi Kami",'myrepublic_theme') ?> <strong>1500-818</strong></h2> -->
                          <h2><?= __("Hubungi Kami",'myrepublic_theme') ?> <strong><a href="https://api.whatsapp.com/send/?phone=6288981500818&text=Halo+MyRepublic" target="_blank" style="color:#fff;">08898-1500818</a></strong></h2>
                     <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                         <!-- <h2><?= __("Give us a call",'myrepublic_theme') ?> <strong>1500-818</strong></h2> -->
                         <h2><?= __("Give us a call",'myrepublic_theme') ?> <strong><a href="https://api.whatsapp.com/send/?phone=6288981500818&text=Halo+MyRepublic" target="_blank">08898-1500818</a></strong></h2>
                     <?php } ?>
                     
           
                </div>
                <div class="main__btn">
                    <!-- <a href="tel:0211500818"> -->
                    <a href="https://api.whatsapp.com/send/?phone=6288981500818&text=Halo+MyRepublic" target="_blank">
                        <!-- <i class="fas fa-phone"></i> -->
                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                        <?= __("08898 1500818",'myrepublic_theme') ?>
                    </a>
                    <a class="hidden" href="javascript:void(0)" data-toggle='modal' data-target='#scheduleCall'>
                        <i class="fas fa-clock"></i>
                          <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                         <?= __("Jadwalkan panggilan",'myrepublic_theme') ?>
                     <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                          <?= __("Schedule a call",'myrepublic_theme') ?>
                     <?php } ?>
                     
                      
                    </a>
                </div>
            </div>
        </div>

    </main>


    <?php endif; ?>

<?php get_footer(); ?>
