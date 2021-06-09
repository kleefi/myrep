<?php
/*
Template Name: Cable-TV
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
            <div class="jumbotron__header ext">
                <h1><?= get_the_title() ?></h1>
            </div>
        </div>
    </div>

    <div class="container jumbotron__distract tvkabel">
        <div class="jumbotron__content">
            <div class="content cover" style="background-image: url('<?= $featured_img_url ?>')"></div>
        </div>
    </div>



    
    <!-- MAIN BLOCK -->
    <main class="main set-channel">

        <?php 
        get_template_part( 'part-templates/page-layout');
        ?>

<!-- -->
 <!--<div class="main__additional bare--spacing">-->
           <!-- <div class="container">
            <?php
            $additional_title = get_field('additional_title');
            $additional_price = get_field('additional_price');
            $additional_subtitle = get_field('additional_subtitle');
            $additional_url = get_field('additional_url');
            $title_package_extra = get_field('title_package_extra');
            $label_title = get_field('label_title');
            $label_link = get_field('label_link');
            ?>
                
            
                
                <div class="special">
                    <div class="special__offer text-center bg--gradient">
                        <h3><?= $additional_title ?></h3>
                        <div class="price">
                            <p><?= $additional_price ?></p>
                            <span><?= $additional_subtitle ?></span>
                        </div>
                        <ul class="d-flex justify-content-between">
                        <?php
                        if( have_rows('additional_tech') ):
                            while ( have_rows('additional_tech') ) : the_row();
                            ?>
                            <li>
                                <p><?= get_sub_field('title'); ?></p>
                                <span><?= get_sub_field('subtitle'); ?></span>
                            </li>
                            <?php
                            endwhile;
                        endif;
                        ?>
                        </ul>
                    </div>
                    <div class="special__button position-absolute">
                        
                        <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                         <a href="<?= $additional_url ?>" class="btn btn-warning text-primary"><?= __('SAYA MAU INI','myrepublic_theme') ?></a>
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                         <a href="<?= $additional_url ?>" class="btn btn-warning text-primary"><?= __('I WANT THIS','myrepublic_theme') ?></a>  
                        <?php } ?>
                        
                
                        <a href="<?= $additional_url ?>" class="btn btn-warning text-primary"><?= __('SAYA MAU INI','myrepublic_theme') ?></a>
                    </div>
                </div>
                <?php
                /*if(!empty($banner_image))
                {
                ?>
                <div class="text-center">
                    <a href="<?= $banner_url ?>">
                        <img src="<?= $banner_image ?>" alt="<?= $title_package_extra ?>">
                    </a>
                </div>
                <?php
                }*/
                ?>
                
                </div>-->





                <div id="advancetv"></div>
                
                <!--<div class='img-smartv'>
                    <img src="https://myrepublic.co.id/wp-content/uploads/2019/02/Adv-TV-for-web-DEC20-min.png">
                </div>-->
                
                <div class="boxed">
                   <!-- <h2><?= $title_package_extra ?></h2>-->
                    
                    <!--Deskripsi paket add-on--
                         <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                            <div class="desc-addon" style="display: block;margin: auto;list-style: none;padding-bottom: 41px;font-size: 16px;font-weight: 500;line-height: 26px;">
                             TV kabel terbaik keluarga MyRepublic juga memberikan pilihan paket TV kabel terbaik untuk paket add on HD Movies, Sports HD,Golf Channel HD yang khusus kita siapkan untuk para pelanggan setia MyRepublic, 
                             dengan kualitas HD yang siap menghibur, mengedukasi dan memanjakan mata anda dan keluarga dengan harga yang terjangkau.
                            </div>
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                            <div class="desc-addon" style="display: block;margin: auto;list-style: none;padding-bottom: 41px;font-size: 16px;font-weight: 500;line-height: 26px;">
                             Still need more? We also offer an excellent selection of add-on TV channel packs. From movies to sports and more, add packages for an affordable price and get the full meal deal!
                             <!--The best cable TV from MyRepublic also provides the best cable TV package options for add on packages HD Movies, Sports HD, Golf Channel HD which we specially prepare for our loyal customers, 
                             with HD quality that is ready to entertain, educate and pamper your eyes with an affordable price.-->
                            </div>
                        <?php } ?>               
                    <!--Deskripsi paket add-on-->
                    
                    
    <!--Paket Addon-->
    <!--<div class="col-sm-12 paket-add">
       <!--<h1><span>Pilihan Paket</span>Add-On</h1>
       <div class="col-sm-12"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/Combo-forweb-addon1-min.png"></div>
       <div class="col-sm-12"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/Combo-forweb-addon2-min.png"></div>
       <div class="col-sm-12"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/Combo-forweb-addon3-min.png"></div>
    </div>-->
    
     <!--Untuk info berlangganan paket--
                         <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                            <div class="ext">Untuk info berlangganan paket COMBO Internet + TV mohon hubungi <a href="tel:1500 818 " style="color: #a14e9e;text-decoration: underline;">1500 818</a></div>
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                        <div class="ext">For information about subscribing Combo Internet+TV package, please contact <a href="tel:1500 818 " style="color: #a14e9e;text-decoration: underline;">1500 818</a></div>
                        <?php } ?>               
     Untuk info berlangganan paket-->
                    
                    
    <!--Paket Addon-->
                    
                    
                    
                    <ul class="row">
                    <?php
                    /*
                    if( have_rows('product_extra') ):
                    while ( have_rows('product_extra') ) : the_row();
                    ?>
                        <li class="col-md-4">
                            <div class="bg--gradient card card--additional">
                                <div class="card__header">
                                    <h3><?= get_sub_field('title'); ?></h3>
                                    <div class="card__tag">
                                        <p><?= get_sub_field('price'); ?></p>
                                        <span>per bulan NETT</span>
                                    </div>
                                </div>
                                <div class="card__content">
                                    <?= get_sub_field('content'); ?>
                                </div>
                            </div>
                        </li>
                    <?php
                    endwhile;
                    endif;
                    */
                    ?>

                    <?php
                     /*
                    if( have_rows('product_type') ):
                    while ( have_rows('product_type') ) : the_row();
                        $highlight_product = get_sub_field('product');
                        $product_subtitle = get_field('product_subtitle', $highlight_product->ID);
                        $product_harga = get_field('product_price', $highlight_product->ID);
                        $product_link = get_field('product_link', $highlight_product->ID);
                        $product_img = get_the_post_thumbnail_url($highlight_product->ID, 'full');
                    ?>

                    <li class="col-md-3">
                            <div class="bg--gradient card card--additional">
                                <div class="card__header">
                                    <h3><?= $highlight_product->post_title ?></h3>
                                    <div class="card__tag">
                                        <p><?= $product_harga ?></p>
                                        <span><?= $product_subtitle ?></span>
                                    </div>
                                </div>
                                <div class="card__content">
                                    <?= $highlight_product->post_content ?>
                                </div>
                            </div>
                        </li>
                    <?php
                    endwhile;
                    endif;
                    */
                    ?>
                        
                    </ul>
                </div>
                <?php
                if(!empty($label_title))
                {
                ?>
                <div class="text-center new">
                    <!--<p>Paket SmarTV+ Hanya bisa dipesan jika bundling dengan paket internet</p>-->
                </div>
            
            <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
       <!--     
            <div class="wrap-center-frm white">
<div class="col-sm-12">
<div class="rowset-bank nonset">
      <p>Syarat & Ketentuan</p>
  <button type="button-satu" class="btn btn-lg btn-info collapsed" data-toggle="collapse" data-target="#demo-satu"><i class="fas fa-arrow-circle-down"></i></button>
  <div id="demo-satu" class="collapse">
<ul id="wrapset-term" style="padding:10px;">
                    <li>Paket berlaku selama persediaan masih ada</li>
                    <li>Wajib bundling dengan paket internet MyRepublic</li>
                    <li>Harga NETT sudah termasuk biaya pajak 10%</li>
                    <li>Jika lebih dari 1 TV tambah biaya sewa STB Rp. 44.000/bln</li>
                    <li>Maksimum 2 STB dalam 1 lokasi</li>
                    <li>Paket / channel dapat berubah sewaktu waktu</li>
</ul>
</div>
</div>
</div>

</div>
         -->   
        
                
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                        
                        
 <!--                       
<div class="wrap-center-frm white">
<div class="col-sm-12">
<div class="rowset-bank nonset">
      <p>Term & Condition:</p>
  <button type="button-satu" class="btn btn-lg btn-info collapsed" data-toggle="collapse" data-target="#demo-satu"><i class="fas fa-arrow-circle-down"></i></button>
  <div id="demo-satu" class="collapse">
<ul id="wrapset-term" style="padding:10px;">
                    <li>The package is valid as long as supplies last</li>
                    <li>Bundling with MyRepublic Internet Package is required</li>
                    <li>Nett Price include 10% Gov Tax</li>
                    <li>If more than 1 TV, the STB rental fee is Rp. 44,000 / month</li>
                    <li>Maksimum 2 STB dalam 1 lokasi</li>
                    <li>Packages / channels may change at any time</li>
</ul>
</div>
</div>
</div>

</div>
-->



                        
                
                
                        <?php } ?>
            
            
            
                    
            
                <!--<div class="text-center">
                    <a href="<?= $label_link ?>"><?= $label_title ?></a>
                </div>-->
                <?php
                }
                ?>
            </div>
<!-- -->



        <section id="channels" class="section section--banner">
            
            <div class="section__fluid cover" style="/*background-image: url('<?= $theme_url ?>images/click--bg.png')*/">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-2 click">
                        <?php
                        $args = array(
                            'taxonomy' => 'category-dg_channel'
                        );
                        $channel_quality = array();
                        $dg_taxonomy = $dginit->setup_taxonomy->do_list($args);
                        foreach($dg_taxonomy as $key => $value)
                        {
                            if($value->slug == "channel-quality")
                            {
                                $channel_quality[] = $value;
                                continue;
                            }

                            $class = "";
                            if($key == 0)
                                $class = "active";
                        ?>
                            <div class="click__link <?= $class ?>" data-target="<?= $value->slug ?>"><?= $value->name ?></div>
                        <?php
                        }
                        ?>
                        </div>
                        <div class="col-sm-10 click__container">
                        <?php
                        foreach($dg_taxonomy as $key => $value)
                        {
                            $class = "";
                            if($key == 0)
                                $class = "active";
                        ?>
                            <div class="click__draw <?= $class ?>" data-target="<?= $value->slug ?>"><?= $value->name ?></div>
                            <div class="click__content" id="<?= $value->slug ?>">
                                <div class="filter__header nav justify-content-end">
                                <?php
                                foreach($channel_quality[0]->children as $key_ => $value_)
                                {
                                    $class_ = "";
                                    if($key_ == 0)
                                        $class_ = "active";
                                ?>
                                    <a href="#local<?= $value_->slug ?>_<?= $value->slug ?>" class="btn btn-link <?= $class_ ?>" data-toggle="tab" aria-controls="true"><?= $value_->name ?></a>
                                <?php
                                }
                                ?>
                                </div>
                                <div class="tab-content">
                                <?php
                                foreach($channel_quality[0]->children as $key_ => $value_)
                                {
                                    $class_ = "";
                                    if($key_ == 0)
                                        $class_ = " show active ";
                                ?>
                                    <ul id="local<?= $value_->slug ?>_<?= $value->slug ?>" class="filter__body clearfix tab-pane fade <?= $class_ ?>">
                                    <?php
                                    $args = array(
                                            'post_type' => 'dg_channel',
                                            'orderby' => 'date',
                                            'order' => 'DESC',
                                            'posts_per_page' => -1,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => $value->taxonomy,
                                                    'field' => 'term_id',
                                                    'terms' => $value->term_id,
                                                    'operator' => 'IN',
                                                ),
                                                array(
                                                    'taxonomy' => $value->taxonomy,
                                                    'field' => 'term_id',
                                                    'terms' => $value_->term_id,
                                                    'operator' => 'IN',
                                                ),
                                            )
                                        );
                                    $dg_channel = $dginit->setup_post_type->do_list($args);

                                    while ( $dg_channel->have_posts() ) : $dg_channel->the_post();
                                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                        $nomor_channel = get_field('nomor_channel');
                                    ?>
                                        <li class="filter__item">
                                            <a href="javascript:void(0)" class="d-block" data-toggle="modal" data-target="#channelModal" data-image_channel="<?= $featured_img_url ?>" data-title_channel="<?= get_the_title() ?>" data-nomor_channel="<?= $nomor_channel ?>" data-content_channel="<?= get_the_content() ?>">
                                                <img src="<?= $featured_img_url ?>" alt="<?= get_the_title() ?>">
                                            </a>
                                        </li>
                                    <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                    </ul>
                                <?php
                                }
                                ?>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white">
            <div class="set-centerdwn game">
    <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                <div class="" style="font-size: 16px;font-weight: 500;padding-bottom: 38px;line-height: 28px;text-align:        center;">Dapatkan segera dan lihat daftar channel TV terbaru dari TV kabel terbaik keluarga MyRepublic.
Anda dapat mencari melalui list channel TV berdasarkan waktu atau saluran dan mencari acara TV
favorit Anda dan keluarga.</div>            
                <tr>
                                <div class="dwn-center" style="width: 50%;margin: auto;padding-bottom: 65px;">
                           <a class="btn btn-primary" style="width: 100%;background: #1fb2de;border: none;box-shadow: none;" href="https://myrepublic.co.id/wp-content/uploads/2019/02/MyRepublic-SmarTV-channel-list.pdf" download><i class="fa fa-download" style="padding-right:12px;"></i>Klik untuk download list nomer channel</a></div>
                        </tr>
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                <div class="" style="padding-bottom: 38px;line-height: 28px;text-align:         center;font-size: 16px;font-weight: 500;">Get it right away and see the latest list of TV channels from the best cable TV family MyRepublic. You can search through the TV channel list by time or channel and find your favorite TV shows and family.
<!--Get it right away and see the list of the latest TV channels from the best cable TV family from MyRepublic. You can search through the TV channel list by time or channel and find your favorite TV shows--></div>
                            <tr>
                                <div class="dwn-center" style="width: 50%;margin: auto;padding-bottom: 65px;">
                            <a class="btn btn-primary" style="width: 100%;background: #1fb2de;border: none;box-shadow: none;" href="https://myrepublic.co.id/wp-content/uploads/2019/02/MyRepublic-SmarTV-channel-list.pdf" download><i class="fa fa-download" style="padding-right:12px;"></i>Click to download the channel number list</a></div>
                        </tr>
                        <?php } ?>
        </div>
            </div>
        </section>

       
    
        
                        
        <div id="programs" class="main__program">
            <div class="container">
                <h2>Upcoming Programs</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="filmSatu">
                                <div class="card card--program">
                                <?php
                                $args = array(
                                        'post_type' => 'dg_program',
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'posts_per_page' => 1,
                                    );
                                $dg_program = $dginit->setup_post_type->do_list($args);

                                while ( $dg_program->have_posts() ) : $dg_program->the_post();
                                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                                    $channel_tv = get_field('channel_tv');
                                    $channel_on_air = get_field('channel_on_air');
                                ?>
                                    <div class="card__background">
                                        <img src="<?= $featured_img_url ?>" alt="<?= get_the_title() ?>">
                                    </div>
                                    <div class="card__absolute animated slideInUp bare-delay--quarter">
                                        <h4><?= get_the_title() ?></h4>
                                        <div class="channel">
                                            <span><?= $channel_tv ?></span>
                                        </div>
                                        <div class="airtime">
                                            <span><?= $channel_on_air ?></span>
                                        </div>
                                        <div class="content_program">
                                            <?= the_content() ?>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 position-relative">
                        <div id="carouselSlider" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators pagination">
                                <?php
                                $counter2_ = 1;
                                $args = array(
                                    'post_type' => 'dg_program',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => -1,
                                );
                                $dg_program = $dginit->setup_post_type->do_list($args);

                                $count_part = ceil($dg_program->post_count / 10);

                                for ($i=0; $i < $count_part; $i++)
                                {
                                    $class2__ = "";
                                    if($i == 0)
                                        $class2__ = " active ";
                                ?>
                                <li class="pagination__link <?= $class2__ ?>" data-target="#carouselSlider" data-slide-to="<?= $i ?>"><?= $counter2_ ?></li>
                                <?php
                                    $counter2_++;
                                }
                                ?>
                            </ol>
                            <div class="carousel-inner">
                            <?php
                            $counter = 1;
                            $counter_ = 1;
                            while ( $dg_program->have_posts() ) : $dg_program->the_post();
                                $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

                                $channel_tv = get_field('channel_tv');
                                $channel_on_air = get_field('channel_on_air');

                                $class__ = "";
                                if($counter_ == 1)
                                    $class__ = " active ";

                                if($counter == 1)
                                {
                                ?>
                                <div class="carousel-item <?= $class__ ?>">
                                    <ul class="list list--program nav">   
                                <?php
                                }
                            ?>
                                <li>
                                    <a href="#filmSatu" class="card card--program--child <?= $class__ ?> select_program_tv" data-toggle="tab" aria-controls="filmSatu" aria-selected="true" data-image_program="<?= $featured_img_url ?>" data-title_program="<?= get_the_title() ?>" data-nomor_program="<?= $channel_tv ?>" data-content_program="<?= get_the_content() ?>" data-date_program="<?= $channel_on_air ?>">
                                        <img src="<?= $featured_img_url ?>" alt="<?= get_the_title() ?>">
                                    </a>
                                </li>
                            <?php
                                if($counter == 10 || $dg_program->post_count ==  $counter_)
                                {
                                    $counter = 1;
                                ?>
                                    </ul>   
                                </div>
                                <?php
                                }
                                else
                                {
                                    $counter++;
                                }
                                $counter_++;
                            endwhile;
                            wp_reset_postdata();
                            ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselSlider" role="button" data-slide="prev">
                                <i class="fas fa-caret-left"></i>
                            </a>
                            <a class="carousel-control-next" href="#carouselSlider" role="button" data-slide="next">
                                <i class="fas fa-caret-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- BANNER COMPONENT -->
        <div class="main__banner bg--gradient">
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
