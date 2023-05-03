<?php
/*
Template Name: Portfolio Cases
*/

get_header();
?>

<section id="portfolio_cases" style="height: 80vh;">

    


<div class="popup_main">  

                        <h2 style="text-align: center;">
                        Open video streame|chat Youtube
                    </h2>
                <a class="open_popup play-video">
                    <img style="width:100px; height:100px;display: block;margin: 0 auto;border-radius: 50%;" width="50px" height="50px" data-src="https://www.pngplay.com/wp-content/uploads/5/Video-Chat-Blue-Icon-PNG.png" class="lozad" />
                </a>
                <div class="popup_body">
                    <div class="popup_back stop-video">
                    <!-- <i class="fa-solid fa-xmark"></i> -->
                    </div>
                     
                    <div class="popup_contain" style="top: 10%; left:10%;">
                        <div class="popup_close stop-video">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <h4  style="text-align: center; font-weight: bold;">Можемо тут розмістити чат, його код (треба щоб у відкритому вигляді, не іконкою) </h4>
                        
                        <div style="width: 20%; height: 50%;background: gray; margin:auto;"></div>
                        <div style="width: 20%; height: 20%; margin:auto;">
                        <iframe width="260" height="100%" src="https://www.youtube.com/embed/jfKfPfyJRdk" title="YouTube video player" frameborder="0"></iframe>
                        </div>



                    </div>
                                
                </div>

            </div>



            <!-- <div class="popup_main">  
                        <h2 style="text-align: center;">
                        Open video streame|chat Twitch
                    </h2>
                <a class="open_popup play-video">
                    <img style="width:100px; height:100px;display: block;margin: 0 auto;border-radius: 50%;" width="50px" height="50px" data-src="https://www.pngplay.com/wp-content/uploads/5/Video-Chat-Blue-Icon-PNG.png" class="lozad" />
                </a>
                <div class="popup_body">
                    <div class="popup_back stop-video">
                    </div>
                    <div class="popup_contain" style="top: 10%; left:10%;">
                        <div class="popup_close stop-video">
                            <i class="fa-solid fa-xmark"></i>
                        </div>
                        <h4  style="text-align: center; font-weight: bold;">Можемо тут розмістити чат, його код (треба щоб у відкритому вигляді, не іконкою) </h4>
                        <div style="width: 20%; height: 50%;background: gray; margin:auto;"></div>
                        <div style="width: 20%; height: 20%; margin:auto;">
                        <iframe src="https://player.twitch.tv/?channel=romanlviv&parent=rhelpers.com" frameborder="0" allowfullscreen="true" width="260" height="100%" scrolling="no"></iframe>
                        </div>
                    </div>
                </div>
            </div> -->







<script>
//cv popup
jQuery(".open_popup").click(function () {
   jQuery(this).parent(".popup_main").children(".popup_body").addClass("popup_body_show");
   jQuery("body").addClass("body_no_scroll");
});
jQuery(".popup_close").click(function () {
   jQuery(".popup_body").removeClass("popup_body_show");
   jQuery("body").removeClass("body_no_scroll");
});
jQuery(".popup_back").click(function () {
   jQuery(".popup_body").removeClass("popup_body_show");
   jQuery("body").removeClass("body_no_scroll");
});

// pause video in portfolio popup
jQuery(document).ready(function() {
   jQuery(".popup_contain iframe").addClass("frame-video");
   jQuery("iframe").each(function() {
       jQuery(this).attr("src", jQuery(this).attr("src") + "?enablejsapi=1&amp;version=3&amp;playerapiid=ytplayer");
   });

   jQuery(".popup_close.stop-video").click(function(){
       jQuery(this).next().find(".frame-video")[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
   });

   jQuery(".popup_back.stop-video").click(function(){
       jQuery(this).next().find(".frame-video")[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
       
   });
});


</script>

</section>
<?php
get_footer();
?>