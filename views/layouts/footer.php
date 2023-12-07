
<div class="footer">
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-logo-column"><a href="/" aria-current="page" class="w-inline-block w--current"><img
                            src="https://assets.website-files.com/5e7ff3ec0c4ef4c974fa99e3/5e7ff57adad44d1f072965b6_logo.svg"
                            alt="Acme Outdoors Logo"></a></div>
            <div><a href="https://twitter.com/webflow" target="_blank" class="social-footer-link w-inline-block"><img
                            src="https://assets.website-files.com/5e7ff3ec0c4ef4c974fa99e3/5e8407a25b6234aeec960fb9_Twitter_Social_Icon_Rounded_Square_White.svg"
                            width="30" alt="Twitter Logo"></a><a href="https://www.facebook.com/webflow"
                                                                 class="social-footer-link w-inline-block"><img
                            src="https://assets.website-files.com/5e7ff3ec0c4ef4c974fa99e3/5e8407aa3fb6cf5576f1658b_Facebook%20Logo.svg"
                            width="30" alt="Facebook Logo"></a><a href="https://www.instagram.com/webflow/"
                                                                  target="_blank"
                                                                  class="social-footer-link w-inline-block"><img
                            src="https://assets.website-files.com/5e7ff3ec0c4ef4c974fa99e3/5e840774014326b74bbeeeb6_Insta.svg"
                            width="30" alt="Instagram Logo"></a></div>
        </div>
        <div class="footer-bottom-wrapper">
            <div class="small footer-small">Made In <a href="https://webflow.com" target="_blank">Webflow</a>. © 2020.
</div>
        </div>
    </div>
</div>
<script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5e7ff3ec0c4ef4c974fa99e3"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
<script src="https://assets.website-files.com/5e7ff3ec0c4ef4c974fa99e3/js/webflow.56d8ed5b7.js"
        type="text/javascript"></script>
<a class="w-webflow-badge" href="https://webflow.com?utm_campaign=brandjs"><img
            src="https://d3e54v103j8qbb.cloudfront.net/img/webflow-badge-icon.f67cd735e3.svg" alt=""
            style="margin-right: 8px; width: 16px;"><img
            src="https://d1otoma47x30pg.cloudfront.net/img/webflow-badge-text.6faa6a38cd.svg" alt="Made in Webflow"></a>
<deepl-input-controller></deepl-input-controller>
<script>
    $(document).ready(function (){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/addAjax/"+id, {}, function (data) {
                $("#cart-count").html(data);
                });
            });
    });
</script>


