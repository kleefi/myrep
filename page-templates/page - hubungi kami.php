<?php
/*
Template Name: Hubungi Kami
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
    
    $contact_number = get_field('contact_number');
    $contact_email = get_field('contact_email');
     $contact_content2 = get_field('contact_content');

    $contact_content = get_the_content();
    ?>
    
    <!-- MAIN BLOCK -->
    <main class="main">
        <div class="container nonepad">
            
            <!-- TITLE COMPONENT -->
            <div class="main__header is-margin">
                <?php
                if(!empty($featured_img_url))
                {
                ?>
                    <img src="<?= $featured_img_url ?>" class="" alt="<?= get_the_title() ?>" ><br/><br/>
                <?php
                }
                ?>
                <h1><?= get_the_title() ?></h1>
                <span><?= apply_filters( 'the_excerpt', $contact_content ) ?></span>
            </div>
            <!-- CONTACT COMPONENT -->
            <div class="contact contact--intro pb-7 padnone">
              
              <!--
                <div class="main__content contact__info">
                    <div>
                        <a href="tel:<?= $contact_number ?>" class="btn btn-primary">
                            <i class="fas fa-mobile-alt"></i>
                            <?= $contact_number ?>
                        </a>
                    </div>
                    <div>
                        <a href="mailto:<?= $contact_email ?>">
                            <?= $contact_email ?>
                        </a>
                    </div>
                </div>-->




            </div>
           
        </div>

        <!--SOSMED LINK-->
        <div class="col-sm-12 hubset">
        <div class="col-sm-12 hub" style="margin: auto;">
            
              <div class="col-sm-2">
    <p><a href="https://api.whatsapp.com/send?phone=62 889-8150-0818&amp;text=Halo MyRepublic!" target="_blank"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/HUBUNGI-KAMI-JUL20-WA-min.png"></a></p>
    <div class="nm1-hub"><a href="https://api.whatsapp.com/send?phone=62 889-8150-0818&amp;text=Halo MyRepublic!" target="_blank">WhatsApp</a></div>
    <!--<div class="nm2-hub">Self service chat</div>-->
    <div class="nm3-hub"><a href="https://api.whatsapp.com/send?phone=62 889-8150-0818&amp;text=Halo MyRepublic!" target="_blank">08898 1500818</a></div>
  </div>
  
  <div class="col-sm-2" style="">
    <p><a href="http://maira.myrepublic.net.id/" target="_blank"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/HUBUNGI-KAMI-JUL20-selfcare.png"></a></p>
    <div class="nm1-hub"><a href="http://maira.myrepublic.net.id/" target="_blank">Self Care</a></div>
    <!--<div class="nm2-hub">Self service chat</div>-->
    
      <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                           <div class="nm3-hub"><a href="http://maira.myrepublic.net.id/" target="_blank">Klik di sini</a></div>
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                            <div class="nm3-hub"><a href="http://maira.myrepublic.net.id/" target="_blank">Click Here</a></div>
                        <?php } ?>
                        
    
    
  </div>

  <div class="col-sm-2">
    <p><a href="https://t.me/myrepublicidbot" target="_blank"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/HUBUNGI-KAMI-JUL20-TELEGRAM-min.png"></a></p>
    <div class="nm1-hub"><a href="https://t.me/myrepublicidbot" target="_blank">Telegram</a></div>
    <!--<div class="nm2-hub">Self service chat</div>-->
    <div class="nm3-hub"><a href="https://t.me/myrepublicidbot" target="_blank"> ID: @myrepublicidbot</a></div>
  </div>
 
 
  <div class="col-sm-2">
    <p><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/HUBUNGI-KAMI-JUL20-email.png" data-toggle="modal" data-target="#myModal" style="cursor: pointer;"></p>
    <div class="nm1-hub" data-toggle="modal" data-target="#myModal" style="cursor: pointer;">Email Service</div>
    
         <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                            <div class="btn btn-info btn-lg new" data-toggle="modal" data-target="#myModal">Klik di sini</div>
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                            <div class="btn btn-info btn-lg new" data-toggle="modal" data-target="#myModal">Click Here</div>
                        <?php } ?>
                    
  </div>
  

<!--   <div class="col-sm-2">
    <p><a href="tel:1500 818"><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/HUBUNGI-KAMI-JUL20-CS.png" style="cursor: pointer;"></a></p>
    <div class="nm1-hub" style="cursor: pointer;"><a href="tel:1500 818 ">Customer Service</a></div> -->
  <!--  <div class="nm2-hub">24/7 jam</div>-->
    <!-- <div class="nm3-hub"><a href="tel:1500 818 ">1500 818</a></div>
  </div>
 -->
 
  
  <!--
  <div class="col-sm-2">
    <p><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/HUBUNGI-KAMI-JUL20-FB.png"></p>
    <div class="nm1-hub">Facebook</div>
    <div class="nm3-hub"><a href="https://www.facebook.com/MyRepublicIndonesia" target="_blank">MyRepublic Indonesia</a></div>
  </div>
  -->
  <!--
  <div class="col-sm-2">
    <p><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/HUBUNGI-KAMI-JUL20-TWT.png"></p>
    <div class="nm1-hub">Twitter</div>
    <div class="nm3-hub"><a href="https://twitter.com/myrepublicID" target="_blank">@myrepublicid</a></div>
  </div>
  -->
<!--
   <div class="col-sm-2">
    <p><img src="https://myrepublic.co.id/wp-content/uploads/2019/02/HUBUNGI-KAMI-JUL20-IG.png"></p>
    <div class="nm1-hub">Instagram</div>
    <div class="nm3-hub"><a href="https://www.instagram.com/myrepublicindonesia" target="_blank">Myrepublicindonesia</a></div>
  </div>

  -->


</div> 
</div>
        <!--SOSMED LINK-->

        <div class="container-fluid py-5 bg--gradient whitebg">
            <div class="container">
                <!-- FORM COMPONENT -->
                <div class="main__header set">
                    <h5 class="text-white colorset">
                        <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                            Butuh bantuan lebih detail ? mohon pilih dan klik tombol dibawah ini
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                            Need more specific solutions ? Please choose and click the button below
                        <?php } ?>
                    </h5>
                </div>
                
                <!--TOMBOL FORM-->
                <!--Hubungi-->
  <!-- Trigger the modal with a button -->
  <div class="col-sm-12 hb">
        <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                              <div class="col-sm-6"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Pelanggan</button></div>
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                            <div class="col-sm-6"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Customer</button></div>
                        <?php } ?>
                        
                          <?php if(ICL_LANGUAGE_CODE == 'id'){ ?>
                                <div class="col-sm-6"><a href="https://order.myrepublic.net.id/"><button type="button" class="btn btn-info btn-lg">Non Pelanggan</button></a></div>
                        <?php }elseif(ICL_LANGUAGE_CODE == 'en'){ ?>
                             <div class="col-sm-6"><a href="https://order.myrepublic.net.id/"><button type="button" class="btn btn-info btn-lg">Non Customer</button></a></div>
                        <?php } ?>


  
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content hub-set">
        <div class="modal-header">
<img src="https://myrepublic.co.id/wp-content/uploads/2019/02/Pop-up-lengkapi-data-min.png">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<h4 class="modal-title">Isi Data</h4>-->
        </div>
        <div class="modal-body">
          <div class="contact contact--enquiry bare--header" style="padding:0%">
            
                    <?= do_shortcode( '[contact-form-7 id="192197" title="Form Submit on Hubungi Kami"]' ) //do_shortcode( '[dg_form_370]' ); ?>
                </div>
        </div>
        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>-->
      </div>
      
    </div>
  </div>
<!--Hubungi-->
 <style>
@media (max-width: 800px) and (min-width: 300px){
    .col-sm-12.hb {
width: 90% !important;
position: absolute;
}
.contact.contact--maps.pb-7.bare--spacing.nonepad {
    margin-top: 56px;
}
.col-sm-12.hb .col-sm-6 {
    max-width: 100%!important;
}
.col-sm-12.hb .col-sm-6 .btn.btn-info.btn-lg {
    font-size: 13px;
}
.btn-group-lg > .btn, .btn-lg {
    position: revert;
}
.col-sm-12.hb .col-sm-6 .btn.btn-info.btn-lg.btn-info {
    width: 86%;
}
#myModal {
    width: 80%;
    left: 10%;
}
}
    .col-sm-12.hub .col-sm-2 {
    height: auto;
}
fieldset {
    border-top: none !important;
    margin: 20px 0;
}
.sethub {
    float: left;
}
.modal-content .wpcf7-form-control.g-recaptcha.wpcf7-recaptcha {
    padding-top: 1px;
    padding-bottom: 30px;
}
.modal-content .hub-set fieldset {
    border: none;
}
.modal-content .hub-set fieldset {
    border-top: none;
    margin: 13px 0;
}
.modal-content.hub-set .col-sm-6 {
    float: left;
}
.modal-content.hub-set .col-sm-12 {
    margin: 0px;
    padding: 0px;
}
.modal-content.hub-set .modal-content{
background-color: #fff0!important;
}
.modal-content.hub-set #cf-accept {
    font-size: 11px;
}
.modal-content.hub-set .close {
    position: absolute;
    top: 70px;
    right: 14px;
}
.col-sm-12.hb .col-sm-6 {
    max-width: 45%;
}
.col-sm-12.hb {
display: flex;
width: 65%;
margin: auto;
padding-bottom:71px;
}
.modal-content.hub-set label {
    font-weight: 500;
    letter-spacing: 0px;
    font-size: 12px;
}
.modal-content.hub-set input.wpcf7-form-control.wpcf7-text {
    border: none;
    border-radius: 6px;
z-index: 99;
position: relative;
}
.modal-header .close {
    padding: 1rem;
    margin: -1rem -1rem -1rem auto;
    color: #fff;
    background-color: #6a2b82;
    border-radius: 0px 27px 0px 0px;
    opacity: 100%;
    font-size: 30px;
}
.modal-content.hub-set .wpcf7-list-item {
    padding-right: 12px;
    padding-left: 13px;
}
.modal-content.hub-set strong {
    padding-left: 18px;
    padding-bottom: 5px;
    display: block;
}
.modal-content div.wpcf7 .wpcf7-submit:disabled {
    cursor: not-allowed;
    width: 62%;
    margin: auto;
        margin-bottom: auto;
    border: 1px solid #fff;
    margin-bottom: 20px;
}
.modal-content.hub-set input.wpcf7-form-control.wpcf7-submit{
    width: 62%;
    margin: auto;
        margin-bottom: auto;
    border: 1px solid #fff;
    margin-bottom: 20px;
}
.modal-content.hub-set .modal-body {
    background-color: #6a2b82;
top: -22px;
}
.modal-content .modal-header {
    border-bottom: 1px solid #833e9d;
    background: none;
    padding: 0px;
    margin: 0px;
    width: 100%;
    display: block;
}
.modal-content .far {
    padding-right: 9px;
padding-left: 5px;
}
.modal-content.hub-set {
    color: #fff;
    border-radius: 27px;
    background-color: #fff0;
border: none;
}
.modal-content legend {
    color: #fff;
    font-size: 23px;
    padding-bottom: 17px;
    font-weight: 800;
    padding-left: 19px;
}
.col-sm-12.hb .col-sm-6 .btn.btn-info.btn-lg {
width: 55%;
margin: auto;
float: none;
display: block;
padding: 10px;
font-weight: 600;
}
.col-sm-12.hb .col-sm-6 .btn.btn-info.btn-lg.btn-info {
    color: #fff;
    background-color: #6a2b82;
    border-color: #6a2b82;
    border-radius: 10px;
}
.col-sm-6-l .price-b {
}
.btnsty {
    margin: auto;
    width: 20%;
    background: linear-gradient(to right,#993090,#662b81);
    border-radius: 5px;
    color: #fff;
    padding: 3px;
margin-top: 17px;
}
.col-sm-12-newbx {
    display: flex;
}
.col-sm-6-l {
  float: left;
  width: 50%;
}
.col-sm-6-r {
  float: right;
  width: 50%;
}
.pulse-button {
    color: #fff;
    font-weight: bold;
    font-size: 15px;
}
button {
  margin: 15px auto;
  font-family: "Montserrat";
  font-size: 16px;
  color: #ffffff;
  cursor: pointer;
  border-radius: 100px;
  padding:15px 56px;
  border: 0px solid #000;   
  }
button.pulse-button {
  animation: borderPulse 1000ms infinite ease-out, colorShift 10000ms infinite ease-in;margin-right: 20px;
margin-left: 20px;
}
button.pulse-button-hover {
  animation: colorShift 10000ms infinite ease-in;
}
button:hover,
button:focus {
  animation: borderPulse 1000ms infinite ease-out, colorShift 10000ms infinite ease-in, hoverShine 200ms;
}
@keyframes colorShift {
  0%, 100% {
      background: #90298d;
  }
  33% {
    background: #faab3b;
  }
}
@keyframes borderPulse {
  0% {
    box-shadow: inset 0px 0px 0px 5px rgba(255, 255, 255,.4), 0px 0px 0px 0px rgba(255,255,255,1);
  }
  100% {
    box-shadow: inset 0px 0px 0px 3px rgba(117, 117, 255,.2), 0px 0px 0px 10px rgba(255,255,255,0);
  }
}

/* Declare shine on hover animation */
@keyframes hoverShine {
  0%{
    background-image: linear-gradient(135deg, rgba(255,255,255,.4) 0%, rgba(255,255,255,0) 50%, rgba(255,255,255,0) 100%);
  }
  50%{
    background-image: linear-gradient(135deg, rgba(255,255,255,0) 0%, rgba(255,255,255,.4) 50%, rgba(255,255,255,0) 100%);
  }
  100%{
    background-image: linear-gradient(135deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0) 50%, rgba(255,255,255,.4) 100%);
  }
}
.pricing.newset .price-x {
    padding-bottom: 34px;
    text-align: center;
    margin: auto;
}
.lineup .pack-price {
    font-size: 14px!important;
}
  .style-bank .col-sm-6 {
}
.wrap-center-frm.promo {
    padding-bottom: 0px;
    background:none;
    width: 100% !important;
    padding-bottom: 2px !important;
}
.style-bank .btn.btn-lg.btn-info {
background-color: #fff;
border: 1px solid #a0a0a0;
}
.style-bank .btn-info {
color: #a0a0a0;
border-color: #84409e;
position: absolute;
top: 46px;
right: 48px;
width: 24px;
height: 27px;
}
.btn-group-lg > .btn, .btn-lg {
padding: 0px 0px;
font-size: 18px;
line-height: 1.3333333;
border-radius: 6px;
text-align: center;
width: 4%;
margin: auto;
right: 34px;
position: absolute;
top: 8px;
}
.style-bank-p{
  position: absolute;top:0px;
}
.style-bank-img {
  width: 100%;
  height: auto;
  padding-right: 12px;
}
.style-bank-img img {
  max-width: 25%;
  height: auto;
}
.rowset-bank{
box-shadow: 0 5px 25px 2px rgba(53,64,90,.2);
background-color: #fff;
padding: 10px 32px 10px 32px;
border-radius: 5px;
color: #000;
font-size: 14px;
}
.wrap-center-frm {
    padding-bottom:50px;
    width: 46%;
    margin: auto;
}
.wpcf7-form-control.wpcf7-text.wpcf7-validates-as-required {
    width: 100%;
    line-height: 31px;
}
.modal-content.hub-set input.wpcf7-form-control.wpcf7-submit {
    width: 62%;
    margin: auto;
        margin-bottom: auto;
    margin-bottom: auto;
    border: 1px solid #fff;
    margin-bottom: 20px;
    line-height: 40px;
    border-radius: 17px;
    color: #fff;
    font-weight: bold;
    font-size: 17px;
    text-transform: uppercase;
    background:linear-gradient(90deg, #464646 20%, #464646 20%, #464646 80%);
}
.btn.btn-info.btn-lg.new {
    float: left;
    display: contents;
    color: #aa54a0;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
}
.modal-content.hub-set .wpcf7-mail-sent-ok {
    border: 2px solid #398f14!important;
    background-color: #398f14!important;
    border-radius: 10px!important;
    padding: 12px 12px 12px 12px!important;
    margin: auto!important;
    width: 90%!important;
    text-align: center!important;
}
</style>

                <!--TOMBOL FORM-->
                
                
                <div class="contact contact--enquiry bare--header" style="padding:0%">
                    <?= do_shortcode( $contact_content2 ) //do_shortcode( '[dg_form_370]' ); ?>
                </div>
            </div>
        </div>
         <!-- MAPS COMPONENT -->
            <div class="contact contact--maps pb-7 bare--spacing nonepad">
                <div class="contact__row row">
                    <div class="col-lg-8">
                        <div id="map_canvas">
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="maps__listing cover cover--on cover--bottom" style="background-image: url('<?= $theme_url ?>images/maps-listing-bg.jpg');">
                            <form class="main__form bare--form form--maps mt-0" action="" method="" id="form_location_search">
                                <div class="form__flex">
                                    <div class="d-flex align-items-center w-100">
                                        <input type="text" name="location_search" id="location_search" class="form-control w-100" placeholder="Where to find us...">
                                        <input type="submit" name="" id="" value="" class="cover">
                                    </div>
                                </div>
                            </form>
                            <ul class="list list--maps" id="location_list">
                            <?php

                            $args = array(
                                'post_type' => 'dg_location',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'ASC',
                            );
                            $dg_location = $dginit->setup_post_type->do_list($args);

                            $maps_location_arr = array();
                            while ( $dg_location->have_posts() ) : $dg_location->the_post();
                                $location_city = get_field('location_city');
                                $maps_location = get_field('maps_location');
                                if(!empty($maps_location['lat']) && !empty($maps_location['lng']))
                                    $maps_location_arr[] = array($maps_location['lat'],$maps_location['lng']);
                            ?>
                                
                                <li class="list_map_location" data-search_loc="<?= strtolower(get_the_title()) .' '. strtolower(get_the_content()). ' ' . strtolower($location_city) ?>" data-map_lat="<?= $maps_location['lat'] ?>" data-map_lng="<?= $maps_location['lng'] ?>">
                                    <div class="list__item">
                                        <a href="javascript:void(0)" class="list__link" onclick="center_map_location('<?= $maps_location['lat'] ?>','<?= $maps_location['lng'] ?>')"></a>
                                        <h6><?= get_the_title() ?></h6>
                                        <?php the_content(); ?>
                                        <strong><?= $location_city ?></strong>
                                    </div>
                                </li>
                            <?php
                            endwhile;
                            wp_reset_postdata();
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </main>


    <?php endwhile; ?>
    <?php endif; ?>

    <script type="text/javascript">
        var maps_location_arr = <?= json_encode($maps_location_arr) ?>
    </script>
    
    


    <style>
    
@media (max-width: 800px) and (min-width: 300px){
    .main__header.set {
   display: flex;
width: 100%;
}
}

    .page-template-page-hubungikami .main > .container h2 {
    padding-top: 27px;
}
    .container.nonepad {
    padding-bottom: 0px;
}
    .container-fluid.py-5.bg--gradient.whitebg .wpcf7-response-output.wpcf7-display-none.wpcf7-mail-sent-ok {
   background-color: #662b81;
border: 1px solid #2d1139;
text-align: center;
width: 100%;
margin: auto;
    margin-top: auto;
line-height: 30px;
border-radius: 10px;
margin-top: 30px;
}
    .contact.contact--maps.pb-7.bare--spacing.nonepad {
    padding: 0px !important;
}
.contact.contact--maps.pb-7.bare--spacing.nonepad .contact__row.row {
    margin: 0px;
}
    .text-white.colorset {
    color: #797979 !important;
    width: 54%;
    margin: auto;
    line-height: 29px;
}
        .container-fluid.py-5.bg--gradient.whitebg {
    background: white !important;
    color: #000;
}
.nm1-hub {
  font-size:16px;
  font-weight: 600;
 color: #606060;
}
.nm2-hub {
  font-size: 13px;
  font-weight: 500;
  color: #686868;
}
.nm3-hub {
  font-weight: 500;
    font-size: 13px;
  color: #686868;
}
.col-sm-12.hub .col-sm-2 {
    float: left;
}
.col-sm-12.hub {
text-align: center;
width: 80%;
margin: auto;
float: none;
padding-bottom: 0px;
display: flex;
}
.col-sm-12.hub .col-sm-2 img {
   max-width: 40%;
margin: auto;
text-align: center;
}
.nm3-hub a {
    color: #aa54a0;
}
.container-fluid.py-5.bg--gradient.whitebg .main__header {
    position: initial;
}
@media (max-width: 600px) and (min-width: 300px){
    .col-sm-12.hub .col-sm-2 {
    width: 50%;
    float: left;
}
.contact.contact--intro.pb-7.padnone {
    padding-bottom: 1px !important;
}
.col-sm-12.hub {
width: 100%;
display: block;
padding: 0px;
}
.text-white.colorset {
    width: 100%;
    display: flex;
}
.form-group {
    padding: 0px;
}
.form-group.ck {
    padding-top: 0px !important;
}
}
@media (max-width: 1000px) and (min-width: 300px){
    .col-sm-12.hub .col-sm-2 {
    width: 50%;
    float: left;
    padding-bottom: 41px;
}
}
@media (max-width: 1200px) and (min-width: 1000px){
    .col-sm-12.hub .col-sm-2 {
    width: 33%;
    float: left;
  
    padding-bottom: 41px;
}
}
    </style>

<?php get_footer(); ?>
