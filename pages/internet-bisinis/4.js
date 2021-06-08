<script type="text/javascript">
function scroll_to_div(div_id)
{
 $('html,body').animate(
 {
  scrollTop: $("#"+div_id).offset().top
 },
 'slow');
}
</script>


<script>
$(document).ready(function() {
$(".downbutton").click(function() {
     $('html, body').animate({
         scrollTop: $(".up").offset().top
     }, 1500);
 });
});
$(document).ready(function() {
$(".up").click(function() {
     $('html, body').animate({
         scrollTop: $(".downbutton").offset().top
     }, 1000);
 });
});
</script>
