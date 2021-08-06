    <?php
    $base_url = get_option('siteurl');
    $template_url = get_template_directory_uri();
    $theme_url = $template_url."/assets/";
    $public_url = $template_url."/public/";

    $sosmed_facebook = get_field('facebook', 'option');
    $sosmed_youtube = get_field('youtube', 'option');
    $sosmed_instagram = get_field('instagram', 'option');
    $sosmed_twitter = get_field('twitter', 'option');
    $sosmed_linkedin = get_field('linkedin', 'option');
    $sosmed_telegram = get_field('telegram', 'option');

    $dginit = \Main\Init::get_instance();
    ?>

    <?php
    $cur_lang = ICL_LANGUAGE_CODE;
    if($cur_lang != "id")
    {
        $menu_name_header = 'Header Menu Mobile - English';
        $menu_name_footer = 'Footer Menu - English';
    }
    else
    {
        $menu_name_header = 'Header Menu Mobile';
        $menu_name_footer = 'Footer Menu';
    }

    $popup_image = get_field("popup_image_".$cur_lang, 'option');
    $popup_link = get_field("popup_link_".$cur_lang, 'option');
    $popup_date = get_field("popup_date", 'option');
    $popup_hide = get_field("popup_hide", 'option');
    $popup_date_var = strtotime($popup_date); // input
    // $current_date_var = strtotime(date('d/m/Y')); //today date
    $current_date_var = strtotime(date("Y-m-d")); //today date

    $dg_menu = $dginit->setup_menu->do_list(array("name" => $menu_name_footer));
    $dg_menu_header = $dginit->setup_menu->do_list(array("name" => $menu_name_header));
    ?>

    <?php

    $business_link = get_field('business_link', 'option');
    $my_account_link = get_field('my_account_link', 'option');
    $subscribe_now_link = get_field('subscribe_now_link', 'option');
    $call_center = get_field('call_center', 'option');

    ?>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-fixed" style="display:none;">
        <div class="footer-tematik-right" style=""><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/web-CNY21-BAWAH-kanan.png"></div>
        <div class="footer-tematik-left" style=""><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/web-CNY21-BAWAH-kiri.png"></div>
       </div>
       <div class="footer-tematik" style="position: absolute;right: 0px;top: 0px;">
            <!--<div class="footer-tematik-center"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/TEMATIK-FOOTER-RIGHT-min.png"></div>-->
        </div>
        <div class="container">
          <!-- add branch link to WA telesales - edited by charles simanjuntak -->
          <ul class="footer__list footer__branch kiri">

          <h2 class="judul-cakupan">Area Cakupan MyRepublic</h2>
   
            <li><a href="http://bit.ly/myrepBali" target="_blank">Bali</a></li> | 
            <li><a href="http://bit.ly/myrepBdg" target="_blank">Bandung</a></li> | 
            <li><a href="http://bit.ly/myrepBks" target="_blank">Bekasi</a></li> | 
            <li><a href="http://bit.ly/myrepBgr" target="_blank">Bogor</a></li> | 
            <li><a href="http://bit.ly/myrepCbr" target="_blank">Cibubur</a></li> | 
            <li><a href="http://bit.ly/myrepDpk" target="_blank">Depok</a></li> |      
            <li><a href="http://bit.ly/myrepJkt" target="_blank">Jakarta</a></li> | 
            <li><a href="http://bit.ly/myrepMlg" target="_blank">Malang</a></li> | 
            <li><a href="http://bit.ly/myrepMdn" target="_blank">Medan</a></li> | 
            <li><a href="http://bit.ly/myrepPlg" target="_blank">Palembang</a></li> | 
            <li><a href="http://bit.ly/myrepSmrg" target="_blank">Semarang</a></li> | 
            <li><a href="http://bit.ly/myrepSby" target="_blank">Surabaya</a></li> | 
            <li><a href="http://bit.ly/myrepTgrg" target="_blank">Tangerang</a></li>
          </ul>
          </br>
            <ul class="footer__list">
            <?php
            $display_list_footer = $dginit->setup_menu->display_list_footer($dg_menu);
            echo $display_list_footer;
            ?>
            </ul>
            <div class="footer__brand">
                <a style="padding-bottom: 24px;display: block;" href="<?= $base_url ?>">
                    <img src="<?= $theme_url ?>images/icon/my-republic-brand.png" alt="myrepublic">
                </a>
            
                <ul>
                    <li>
                        <a href="<?= $sosmed_facebook ?>" target="_blank">
                            <img src="<?= $theme_url ?>images/icon/facebook-logo.png" alt="facebook">
                        </a>
                    </li>
                    <li>
                        <a href="<?= $sosmed_twitter ?>" target="_blank">
                            <img src="<?= $theme_url ?>images/icon/twitter.png" alt="twitter">
                        </a>
                    </li>
                    <li>
                        <a href="<?= $sosmed_instagram ?>" target="_blank">
                            <img src="<?= $theme_url ?>images/icon/instagram.png" alt="instagram">
                        </a>
                    </li>
                    <li>
                        <a href="<?= $sosmed_youtube ?>" target="_blank">
                            <img src="<?= $theme_url ?>images/icon/youtube.png" alt="youtube">
                        </a>
                    </li>
                    <li>
                        <a href="<?= $sosmed_linkedin ?>" target="_blank">
                            <img src="<?= $theme_url ?>images/icon/linkedin.png" alt="linkedin">
                        </a>
                    </li>
                    <li>
                        <a href="<?= $sosmed_telegram ?>" target="_blank">
                            <img src="<?= $theme_url ?>images/icon/Telegram.png" alt="telegram">
                        </a>
                    </li>
                </ul>
                    <p>
                    &copy; <?= date("Y"); ?> MyRepublic Indonesia
                </p>
<!--active wa button on bottom when on mobile version - edited by charles simanjuntak -->
				<div class="wa-mobile blinking"><a href="https://api.whatsapp.com/send/?phone=6288981500818&text=%5B%5D+Halo+MyRepublic%21&app_absent=0" target="_blank">Klik Untuk Berlangganan</a></div>
            </div>
        </div>
        <div class="footer__bottom bg--gradient">
            
        
                <div class="tematik-bottom-fot-setleft"><img src="<?= $theme_url ?>images/member-sinarmas-logo.png" alt="Sinar Mas"></div>
			<div class="tematik-bottom-fot-setright"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/Group-30-1.png" style=""></div>  
			
<!--                 <div class="tematik-bottom-fot-setright"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/logo-awards-terbaru.png" style=""></div>   -->
<!-- 			<div class="tematik-bottom-fot-setright"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/logo-awards-1.png" style=""></div>   -->
                <!-- <div class="tematik-bottom-fot-setright"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/LOGO-IDPBA-2020-BOLD-01.png" style=""></div>   -->
            </div>
            
            
            <div class="container-up">  
                <a href="javascript:void(0)" id="goingTop"><i class="fas fa-chevron-circle-up" title="<?= __('Back to top','myrepublic_theme') ?>"></i><!-- <span><?= __('Back to top','myrepublic_theme') ?></span> --></a>
            </div>


       
    </footer>

    <div id="hamburger" class="hamburger">
        <div class="hamburger__dialog">
            <div class="hamburger__content">
                <div class="hamburger__header">
                    <div class="hamburger__option">
                        <a href="<?= $base_url ?>" class="current">
                            <?= __('Personal','myrepublic_theme') ?>
                        </a>
                        <a href="<?= $business_link ?>">
                            <?= __('Business','myrepublic_theme') ?>
                        </a>
                    </div>
                    <ul class="hamburger__list" data-widget='tree'>
                        <li>
<!-- 							change phone number manually 1500 8180 to 1500 818 - edited by charles simanjuntak -->
<!--                             <a href="tel:<?= str_replace(' ', '', $call_center) ?>" > --><a href="tel:1500818">
                                <i class="fas fa-phone"></i>
<!--                                 <?= $call_center ?> -->1500 818
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle='modal' data-target='#countryModal'>
                                <?= __('Country','myrepublic_theme') ?>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" data-toggle='modal' data-target='#langModal'>
                                <?= strtoupper(ICL_LANGUAGE_CODE)  ?>
                            </a>
                        </li>
                    </ul>
                </div>
                <ul class="hamburger__list" data-widget='tree'>
                <?php
                $display_list_mobile = $dginit->setup_menu->display_list_mobile($dg_menu_header);
                echo $display_list_mobile;
                ?>
                </ul>
                <div class="hamburger__btn">
                    <a href="<?= $subscribe_now_link ?>" class="bg-primary">
                        <?= __('Subscribe Now','myrepublic_theme') ?>!
                    </a>
                    <a href="<?= $my_account_link ?>" class="bg-primary">
                        <?= __('MyAccount','myrepublic_theme') ?>
                    </a>
                </div>
                <div class="hamburger__footer">
                    <ul>
                    <?php
                    $display_list_footer = $dginit->setup_menu->display_list_footer($dg_menu);
                    echo $display_list_footer;
                    ?>
                    </ul>
                    <!-- 
                    <p>
                        &copy; 2018 MyRepublic Indonesia
                    </p>
                    <ul>
                        <li>
                            <a href="<?= $sosmed_facebook ?>" target="_blank">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $sosmed_twitter ?>" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $sosmed_instagram ?>" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $sosmed_youtube ?>" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal--hamburger fade" id="countryModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"><?= __('Choose Your Country','myrepublic_theme') ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <ul class="modal-body">
                <?php
                // check if the repeater field has rows of data
                if(get_field('country_region', 'option')):
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
                endif;
                ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="modal modal--hamburger fade" id="langModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel"><?= __('Change Your Languange','myrepublic_theme') ?></h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <ul class="modal-body">
                <?php
                $active_language = icl_get_languages('skip_missing=0&orderby=code');
                foreach ($active_language as $key => $value) {
                    echo '<li><a href="'.$value['url'].'">'.strtoupper($value['language_code']).'</a></li>';
                }
                ?>
                </ul>
            </div>
        </div>
    </div>

    <div class="modal modal--call fade" id="scheduleCall" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="title">
                        <h2>JADWALKAN TELEPON</h2>
                        <span>Pilih waktu terbaik untuk kami bisa menghubungi Anda</span>
                    </div>
                    <?php //echo do_shortcode('[dg_form_394]') ?>
                    <?php echo do_shortcode('[contact-form-7 id="187316" title="Schedule A Call"]') ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal--channel fade" id="channelModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>-->
                <div class="modal-body row">
                    <div class="col-lg-5">
                        <div class="modal-image">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="modal-text">
                            <div class="d-flex align-items-center">
                                <h6></h6>
                                <span class="numb"></span>
                            </div>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if($current_date_var >= $popup_date_var && $popup_hide == "show")
    {
    ?>
    <div id="promoteModal" class="modal modal--promote fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <!--POP UP CONTEN-->
                    <div class="popup-conten">
                        <div class="popup-conten-set" style="text-align: center;"></div>
                        
                        <div class="box-promo" style="background-color: #ffffff;border: 3px solid #ca9b4c;color: #fff;max-width:74%;margin: auto;padding: 19px;border-radius: 9px;">
   <div class="popup-img"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/WF-Maira-FEB21.png" style="max-width:65%;text-align: center;margin: auto;
    display: block;"><div class="box-promo-set">
    <h1 style="font-size: 12px;letter-spacing: 0px;text-align: center;color: #717171;font-weight: 800;">Lengkapi data ini <br>Maira akan segera hubungi kamu</h1>
    <p style="font-size: 11px;text-align: center;"><?php echo do_shortcode( '[contact-form-7 id="193452" title="Welcome Form"]' ); ?></p>
  </div></div>
  
</div>


                    </div>
                    <!--POP UP CONTEN-->
                    
                   <!-- <a href="<?= $popup_link ?>">
                        <img src="<?= $popup_image['url'] ?>" alt="<?= $popup_image['title'] ?>">
                    </a>-->
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    
    <script src='<?= $public_url ?>bootstrap/bootstrap.bundle.min.js'></script>
    <script src="<?= $public_url ?>jquery/jquery.fancybox.min.js"></script>
    <script src="<?= $public_url ?>selectize/selectize.min.js"></script>
    <script src="//www.google.com/recaptcha/api.js"></script>
    <script src="<?= $public_url ?>jquery/jquery.datetimepicker.full.min.js"></script>

    <script src="<?= $public_url ?>slick/slick.min.js"></script>
    

    <script>

        (function($) {

            if ( $( ".page-template-page-beranda" ).length ) {
                $('#promoteModal').modal('show');
            }

            if ( $( ".single-dg_career" ).length ) {
                var posisi = $(".single-dg_career .main__header h2").text();
                $(".wpcf7-form input[name='posisi2']").val(posisi);
            } 

            $(".click__content .filter__body .filter__item > a").on( "click", function() {
                var image_channel = $(this).data("image_channel");
                var title_channel = $(this).data("title_channel");
                var nomor_channel = $(this).data("nomor_channel");
                var content_channel = $(this).data("content_channel");

                $("#channelModal .modal-body .modal-image img").attr("src", image_channel);
                $("#channelModal .modal-text h6").text(title_channel);
                $("#channelModal .modal-text span.numb").text(nomor_channel);
                $("#channelModal .modal-text p").text(content_channel);
            });

            $("a.select_program_tv").on( "click", function() {
                var image_program = $(this).data("image_program");
                var title_program = $(this).data("title_program");
                var nomor_program = $(this).data("nomor_program");
                var date_program = $(this).data("date_program");
                var content_program = $(this).data("content_program");

                $("#filmSatu .card__background img").attr("src", image_program);
                $("#filmSatu .card__absolute h4").text(title_program);
                $("#filmSatu .card__absolute .channel").text(nomor_program);
                $("#filmSatu .card__absolute .airtime").text(date_program);
                $("#filmSatu .card__absolute .content_program").text(content_program);
            });

            $("#prov, #kec, #kel").selectize({
                create: true,
                sortField: {
                    field: 'text'
                }
            });

            jQuery.datetimepicker.setLocale('id');

            $(".date").datetimepicker({
                timepicker: false,
                format: 'd/m/Y'
            });

            $(".time").datetimepicker({
                datepicker: false,
                format: 'H:i'
            })
            
            $("#offering").selectize({
                create: true,
                sortField: {
                    field: 'text'
                }
            });

            // body...
            $("#swipeMain").slick({
                arrows: true,
                dots: true,
                autoplay: true,
                autoplaySpeed: 5000,
                responsive: [{
                    breakpoint: 992,
                    settings: {
                        arrows: false
                    }
                }]
            });

            $('.fancybox').fancybox({
                openEffect  : 'none',
                closeEffect : 'none'
            })

            $("#department, #location").selectize({
                create: true,
                sortField: {
                    field: 'text'
                }
            });

            if ($(".page-thanks").length) {
                $("html, body").animate({
                    scrollTop: $("#page-thanks").offset().top - 150
                }, 2000);
            };

            if ($("#onQuiz").length) {
                $("#onQuiz").on('click', function(event) {
                    event.preventDefault();
                    /* Act on the event */
                    $("#intro").removeClass('active').addClass('sleep');
                    $("#start").removeClass('sleep').addClass('active');
                });
            };


            if ($(".tax-category-dg_help").length) {
                
                if ($(".current_tab_active").length > 0) {
                    
                    if ( $('.current_tab_active').parents('.treeview__menu').length ) 
                    {
                        $('.current_tab_active').parents('.treeview__menu').show();
                        $('.current_tab_active').parents('.treeview').addClass("tree__open");
                    }
                }
            }

            $( "#promo_copy_code" ).on( "click", function() {
                var promo_code_value = $( "#promo_code_value" ).text();
                
                var dummy = document.createElement('input'),
                text = window.location.href;

                document.body.appendChild(dummy);
                dummy.value = promo_code_value;
                dummy.select();
                document.execCommand('copy');
                document.body.removeChild(dummy);

            });

            $( ".sort_berita" ).on( "change", function() {
                $( "#sort_form_berita" ).submit();
            });

            $( ".sort_promo" ).on( "change", function() {
                $( "#sort_form_promo" ).submit();
            });

            $( ".sort_promo_type" ).on( "change", function() {
                $( "#sort_form_promo_type" ).submit();
            });


            $(document).ready(function () {

                $( "#form_location_search" ).submit(function( event ) {
                    event.preventDefault();

                    var search_val = $( "#form_location_search" ).find("#location_search").val().toLowerCase();
                    if(search_val != "")
                    {
                        $( "#location_list > li" ).each(function( index ) {
                            $( this ).show();
                            var data_search_loc = $( this ).data("search_loc");
                            if(data_search_loc.indexOf(search_val) != -1){
                                // console.log(str2 + " found");
                            }
                            else{
                                $( this ).hide();
                            }
                        });
                    }
                    else
                    {
                        $( "#location_list > li" ).each(function( index ) {
                            $( this ).show();
                        });
                    }
                });
            });

        })(jQuery);

    </script>
    <script src='<?= $theme_url ?>js/app.js'></script>

    <?php wp_footer(); ?>

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5c7def0d2e5076cc"></script>-->


    <style type="text/css" media="screen">
    #map_canvas
    {
        height: 100%;
    }   
    </style>

    <?php
    /* <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCxRz0NulC2N1_CZoCqAal_iwELZPU6azQ"></script> */
    ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkaqZIwSan_ijmtDQwiqKBHWQeef8mvxI"></script>

    <script>
    if ($("#map_canvas").length) {

        var map;
        var marker;
        function initialize() {
            var jakarta = { lat: -6.172275, lng: 106.827762 };
            map = new google.maps.Map(document.getElementById('map_canvas'), {
              zoom: 12,
              center: jakarta
            });

            var locations_ = maps_location_arr;
            $.each(locations_, function (i, elem) {             
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(elem[0], elem[1]),
                    map: map
                });
            });
        }

        function center_map_location(newLat,newLng) {
            map.setCenter(new google.maps.LatLng(newLat, newLng));
            map.setZoom(16);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    }
    </script>

</body>
</html>
