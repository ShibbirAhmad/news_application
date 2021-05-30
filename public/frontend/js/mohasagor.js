/*! 
  Custom Js 
  Author: Khokon Ahmed
  Copy-right : 2018 
  softwarefirmbd.com
 */


 // dropdown Hove Menu 

 $(document).ready(function() {
            $('.navbar .dropdown').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });
        });


// Sticky Navbar
 $(document).ready(function() {
  var stickyToggle = function(sticky, stickyWrapper, scrollElement) {
    var stickyHeight = sticky.outerHeight();
    var stickyTop = stickyWrapper.offset().top;
    if (scrollElement.scrollTop() >= stickyTop){
      stickyWrapper.height(stickyHeight);
      sticky.addClass("is-sticky");
    }
    else{
      sticky.removeClass("is-sticky");
      stickyWrapper.height('auto');
    }
  };
  
  $('[data-toggle="sticky-onscroll"]').each(function() {
    var sticky = $(this);
    var stickyWrapper = $('<div>').addClass('sticky-wrapper');
    sticky.before(stickyWrapper);
    sticky.addClass('sticky');
    
    // Scroll & resize events
    $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function() {
      stickyToggle(sticky, stickyWrapper, $(this));
    });
    // On page load
    stickyToggle(sticky, stickyWrapper, $(window));
  });
});


 // Slider 

  jssor_slider2_init = function () {
            var options = {
                $AutoPlay: 1,         
                $DragOrientation: 3    
            };

            var jssor_slider2 = new $JssorSlider$('slider2_container', options);
            function ScaleSlider() {

                //reserve blank width for margin+padding: margin+padding-left (10) + margin+padding-right (10)
                var paddingWidth = 20;

                //minimum width should reserve for text
                var minReserveWidth = 225;

                var parentElement = jssor_slider2.$Elmt.parentNode;

                //evaluate parent container width
                var parentWidth = parentElement.clientWidth;

                if (parentWidth) {

                    //exclude blank width
                    var availableWidth = parentWidth - paddingWidth;

                    //calculate slider width as 70% of available width
                    var sliderWidth = availableWidth * 0.7;

                    //slider width is maximum 600
                    sliderWidth = Math.min(sliderWidth, 600);

                    //slider width is minimum 200
                    sliderWidth = Math.max(sliderWidth, 200);
                    var clearFix = "none";

                    //evaluate free width for text, if the width is less than minReserveWidth then fill parent container
                    if (availableWidth - sliderWidth < minReserveWidth) {

                        //set slider width to available width
                        sliderWidth = availableWidth;

                        //slider width is minimum 200
                        sliderWidth = Math.max(sliderWidth, 200);

                        clearFix = "both";
                    }

                    //clear fix for safari 3.1, chrome 3
                    var toClearElment = $Jssor$.$GetElement("clearFixDiv");
                    toClearElment && (toClearElment.style["clear"] = clearFix);

                    jssor_slider2.$ScaleWidth(sliderWidth);
                }
                else
                    $Jssor$.$Delay(ScaleSlider, 30);
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);

            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
           
        };

        // Js init cell

        jssor_slider2_init();



       // Clock 

        function digi() {
		  var date = new Date(),
		      hour = date.getHours(),
		      minute = checkTime(date.getMinutes()),
		      ss = checkTime(date.getSeconds());

		  function checkTime(i) {
		    if( i < 10 ) {
		      i = "0" + i;
		    }
		    return i;
		  }

		if ( hour > 12 ) {
		  hour = hour - 12;
		  if ( hour == 12 ) {
		    hour = checkTime(hour);
		  document.getElementById("tt").innerHTML = hour+":"+minute+":"+ss+" AM";
		  }
		  else {
		    hour = checkTime(hour);
		    document.getElementById("tt").innerHTML = hour+":"+minute+":"+ss+" PM";
		  }
		}
		else {
		  document.getElementById("tt").innerHTML = hour+":"+minute+":"+ss+" AM";;
		}
		var time = setTimeout(digi,1000);
		}



      