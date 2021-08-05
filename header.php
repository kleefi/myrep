<?php
$base_url = get_option('siteurl');
$template_url = get_template_directory_uri();
$theme_url = $template_url."/assets/";
$public_url = $template_url."/public/";
$dginit = \Main\Init::get_instance();
?>

<!DOCTYPE html>
<html lang="<?= ICL_LANGUAGE_CODE ?>">	

<head>	
	<!--<meta name="generator" content="qTranslate-X 3.4.6.8" />-->
	<!-- Anti-flicker snippet (recommended)  -->
    <style>.async-hide { opacity: 0 !important} </style>
    <script>(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;h.start=1*new Date;
     h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
     (a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);h.timeout=c;
     })(window,document.documentElement,'async-hide','dataLayer',4000,
     {'OPT-T5Q9C52':true});
	</script>
	
	<script src="https://www.googleoptimize.com/optimize.js?id=OPT-T5Q9C52"></script>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-64601008-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-64601008-1');
    </script>
	
    <title><?php wp_title(''); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#84329b">
    <meta property="og:image" content="<?= $base_url ?>/wp-content/uploads/2019/02/Myrep-twett.png">
	<meta property="fb:app_id" content="1143824419302004" />
    <meta property="fb:pages" content="1437260566588938" /> 
	
    <!-- ====== FAVICON ====== -->
    <link href="<?= $theme_url ?>images/icon/favicon.png" rel="icon">
    <link rel='stylesheet' type='text/css' href='<?= $theme_url ?>css/critical.min.css'>
    <link rel="stylesheet" type="text/css" href="<?= $public_url ?>jquery/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $public_url ?>selectize/selectize.default.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $public_url ?>jquery/jquery.datetimepicker.min.css">
    <link rel='stylesheet' type='text/css' href='<?= $template_url ?>/style.css'>
    <link rel='stylesheet' type='text/css' href='<?= $theme_url ?>css/app.min.css?v=200213'>
    <!-- <link rel='stylesheet' type='text/css' href='<?= $theme_url ?>css/app.css?v=191003'> -->
    <link rel='stylesheet' type='text/css' href='<?= $theme_url ?>css/app-fix.css?v=200213'>
	


	<script src='<?= $public_url ?>jquery/jquery.min.js'></script>
	<?php wp_head(); ?>
	

	<style>
        .sleep {
        display: none;
        }
    </style>
    
    <script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if(event.detail.contactFormId == '193452') {
     location = 'https://myrepublic.co.id/online-promo/?utm_source=website&utm_medium=welcomebanner&utm_campaign=welcomeform';
    window.open( location , '_blank' );
    }
}, false );
</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '992579824814358'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=992579824814358&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->

<!--<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
  location = 'https://order.myrepublic.net.id/?source=popup';
window.open( location , '_blank' );
}, false );
</script-->

</head>
<body <?php body_class(); ?> >	
    <?php
    $business_link = get_field('business_link', 'option');
    $label_my_account = get_field('label_my_account', 'option');
    $my_account_link = get_field('my_account_link', 'option');
    $label_subscribe_now = get_field('label_subscribe_now', 'option');
    $subscribe_now_link = get_field('subscribe_now_link', 'option');
    $call_center = get_field('call_center', 'option');
    $list_languages = apply_filters( 'wpml_active_languages', NULL, 'orderby=id&order=desc' );
    ?>

    <div class="meganavbar__overlay"></div>

    <header class="header" id="fixedScroll">
        <nav class="menu">
            <!-- MENU COMPONENT -->
            <div class="menu__small bg-color-tematik">
				
				 <!--CUSTOM TEMATIK HEADER-->
              <div class="tematik-head">
                <!--<div class="tematik-head-set"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/web-CNY21-ATAS-grafik.png"></div>-->
              </div>
              <!--CUSTOM TEMATIK HEADER-->
				
                <div class="container">
                    
        <div class="absolute-head" style="position: absolute;left: 0px;display:none;">
            <div class="tematik-head-center"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/tematik-header-natal.png"></div>
            <div class="tematik-head-center-set" style="display:none;"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/web-CNY21-ATAS-grafik.png" style=""></div>
        </div>
                    
                    <?php
                    /*
                    <div class="menu__option">
						<?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
							<a href="<?= $base_url ?>" class="current">
								<?= __('Residensial','myrepublic_theme') ?>
							</a>
							<a href="<?= $business_link ?>">
								<?= __('Bisnis','myrepublic_theme') ?>
							</a>
						<?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
							<a href="<?= $base_url ?>" class="current">
								<?= __('Residential','myrepublic_theme') ?>
							</a>
							<a href="<?= $business_link ?>">
								<?= __('Business','myrepublic_theme') ?>
							</a>
						<?php } ?>
                    </div>
                    */
                    ?>

                    <ul class="menu__list nav-new">
                        <?php
                        /*
                        <li class="">
                            <a href="tel:<?= str_replace(' ', '', $call_center) ?>">
                                <i class="fas fa-phone"></i>
                                <?= $call_center ?>
                            </a>
                        </li>

                        <?php
                        // check if the repeater field has rows of data
                        if(get_field('country_region', 'option')):
                        ?>
                        <li class="meganavbar">
                            <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
								<a href="#">
									<?= __('Negara','myrepublic_theme') ?>
								</a>
							<?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
								<a href="#">
									<?= __('Country','myrepublic_theme') ?>
								</a>
							<?php } ?>
							                            
                            <ul class="meganavbar__menu set">
                            <?php
                            while ( has_sub_field('country_region', 'option') ) :
                                $country = get_sub_field('country');
                                $url = get_sub_field('url');
                                $image = get_sub_field('image');
                            ?>
                                <li>
                                    <a href="<?= $url ?>" target="_blank">
                                        <img src="<?= $image ?>" alt="<?= $country ?>">
                                        <?= $country ?>
                                    </a>
                                </li>
                            <?php
                            endwhile;
                            ?>
                            </ul>
                        </li>
                        <?php
                        endif;
                        ?>
                        */
                        ?>
                        
                        
                        
                        
                        
                        <li class="meganavbar">
                            <a href="javascript:void(0)">
                               <?php 
                                $pilihbahasa  = (strtoupper(ICL_LANGUAGE_CODE) == "ID") ? "Bahasa" : "English";
                                echo  '<img src="https://myrepublic.co.id/wp-content/uploads/2019/02/'.$pilihbahasa.'.png">' .$pilihbahasa  
                                ?>
                            </a>
                            <ul class="meganavbar__menu lang newset">
                            <?php
                            $active_language = icl_get_languages('skip_missing=0&orderby=code');
                          foreach ($active_language as $key => $value) {
                              $bahasanya  = (strtoupper($value['language_code']) == "ID") ? "Bahasa" : "English";
  echo '<li><a href="'.$value['url'].'"><img class="img-size" src="https://myrepublic.co.id/wp-content/uploads/2019/02/'.$bahasanya.'.png">'.$bahasanya.'</a></li>';
                            }
                            ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- MENU COMPONENT -->
            <div class="menu__main">
                <div class="container">
                    <a href="<?= $base_url ?>" class="menu__brand">
                        <img src="<?= $theme_url ?>images/icon/my-republic-brand.png" alt="myrepublic">
                    </a>
                    <?php
                    $cur_lang = ICL_LANGUAGE_CODE;
                    if($cur_lang != "id")
                    {
                        $menu_name_header = 'Header Menu - English';
                    }
                    else
                    {
                        $menu_name_header = 'Header Menu';
                    }
                    $dg_menu = $dginit->setup_menu->do_list(array("name" => $menu_name_header));
                    ?>
                    <ul class="menu__list">
                    <?php
                    $display_list_header = $dginit->setup_menu->display_list_header($dg_menu);
                    echo $display_list_header;
                    ?>
                    </ul>
                    <div class="menu__btn">
                        
                        
                    <!--BUTTON SUBSCRIBE-->
                         <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                          <a href="<?= $subscribe_now_link ?>" target="_blank"  class="bg-primary">Daftar Sekarang</a>
                          
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                          <a href="<?= $subscribe_now_link ?>" target="_blank"  class="bg-primary">Subscribe Now</a>
                        <?php } ?>               
                    <!--BUTTON SUBSCRIBE-->

                       <!-- <a href="<?= $subscribe_now_link ?>" target="_blank"  class="bg-primary"> 
                           <?php //echo __('Subscribe Now!','myrepublic_theme') ?>
                            <?php echo __($label_subscribe_now,'myrepublic_theme'); ?>
                        </a>-->
                       <!-- <a href="<?= $my_account_link ?>" class="bg-primary">
                            <?php //echo __('MyAccount','myrepublic_theme') ?>
                            <?php echo __($label_my_account,'myrepublic_theme'); ?>
                        </a>-->
                    </div>
                    
                    <div class="menu__hamburger">
                        <a href="#" id="hamburgerClick">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
