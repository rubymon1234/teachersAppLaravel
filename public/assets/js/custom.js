var customJS;

jQuery(document).ready(function($) {

    customJS = {

        common: {
            commonJS: function() {
                $(".user-img").each(function() {
                    var imgPath = $(this).find(".user-img img").attr('src');
                    $(this).find(".user-img ").css('background-image', 'url("' + imgPath + '")');
                });

            }

        }
    }
});