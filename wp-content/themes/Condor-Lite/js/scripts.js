/*-----------------------------------------------------------------------------------*/
/*	IMAGE HOVER
/*-----------------------------------------------------------------------------------*/

jQuery(function() {
jQuery("ul.grid li img, .gallery img, #thumbs span img, .post-thumb img, .project img, .homepage_post img, .gallery_third img, .recent_post img, .img-project img, .img-project-two-columns img, .img-one-fourth img, .img-gallery-two-columns img, .img-one-third img, .img-post-two-columns img, .img-post-one-column img, .flickr img, #carousel li img, .widget li img").css("opacity","1.0");
jQuery("ul.grid li img, .gallery img, #thumbs span img, .post-thumb img, .project img, .homepage_post img, .gallery_third img, .recent_post img, .img-project img, .img-project-two-columns img, .img-one-fourth img, .img-gallery-two-columns img, .img-one-third img, .img-post-two-columns img, .img-post-one-column img, .flickr img, #carousel li img, .widget li img").hover(function () {
jQuery(this).stop().animate({ opacity: 0.5 }, "fast");  },
function () {
jQuery(this).stop().animate({ opacity: 1.0 }, "slow");  
}); 

});