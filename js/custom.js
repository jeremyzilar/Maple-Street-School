(function($){
  jQuery(document).ready(function() {


    // function scroll(){
    //   var h = $('#head').height();
    //   console.log(h);
    //   // window.scrollTo(0, $('#blog').offset().top);
    //   window.scrollBy(0, h);
    // };
    // scroll();

    // $wh = $(window).height();
    // $ww = $(window).width();
    // $('#head').height($wh - 300).width($ww);
    // $( window ).resize(function() {
    //   $wh = $(window).height();
    //   $ww = $(window).width();
    //   $('#head').height($wh - 300).width($ww);
    // });










    // Relative Dates and Time using Moment.js ===========================================================================
    // http://momentjs.com/docs/#/displaying/format/
    function realTime(el){
      $(el).each(function(){
        var utc = $(this).text();
        var date = moment($(this).attr('title')).format('LLLL');
        moment(utc).format();

        var t = moment(utc).fromNow();
        moment.lang('en', {
          relativeTime : {
            future: "in %s",
            past:   "%s ago",
            s:  "seconds",
            m:  "a minute",
            mm: "%d minutes",
            h:  "1 hour",
            hh: "%d hours",
            d:  "1 day",
            dd: "%d days",
            M:  "1 month",
            MM: "%d months",
            y:  "a year",
            yy: "%d years"
          }
        });
        $(this).html(t);
        $(this).attr('title', date);
      });
    };
    realTime('.entry .rel_time span');
		

    // Twitter Button - - - - - - - - - - - - - - - - - - - - -
    $('.btn-twitter').click(function(e) {
			e.preventDefault();
			var msg = $(this).attr('data-msg');
			var now = new Date().valueOf();
			setTimeout(function () {
			   if (new Date().valueOf() - now > 100) return;
			   var twitterUrl = "https://twitter.com/share?text="+msg;
			   window.open(twitterUrl, '_blank');
			}, 50);
			window.location = "twitter://post?message=" + msg;
    });



		// $twt = $('.btn-twitter').hide();
		// if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i))) {
		// 	$twt.show();
		// }
		//

    // Infinite Scroll — brought to you by Jet Pack plugin.
    // Adding classes to existing markup to help style the 'load more' button
    // var $infinite_handle = $('#infinite-handle');
    // var $infinite_handle_label = $infinite_handle.find('span');
    // $infinite_handle.addClass('container').wrapInner('<div class="row" />');
    // $infinite_handle_label.wrap('<div class="doc col-lg-7 col-md-8 col-sm-9 col-md-offset-2 col-sm-offset-3" />').addClass('btn').text('show more');

  });

})(jQuery);
