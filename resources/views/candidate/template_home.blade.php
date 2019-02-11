<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <title> Resume Templates</title>
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
       @include('partials.job_board_header')
       <style type="text/css">
    body{background-color: #ffffff;}
</style>
    </head>
    <body class="transparent-header transparent-menu-below pace-on pace-minimal">
        <!-- SubHeader -->
<!--         <div class="careerfy-job-subheader careerfy-subheader-without-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </div> -->
              @include('partials.job_menu')
        <!-- SubHeader -->
  
                   <!-- Main Section ->


                            <!--  Fancy Title -->
                             <!--  Fancy Title -->
                                         <div class="careerfy-main-section">
                <div class="container">
               
                    <div class="row">

                        <div class="col-md-12">
                            <section class="careerfy-fancy-title">
                                <h2>SAMPLE TEMPLATE</h2> 
                            </section>
                            <!-- Blog -->
                            <div class="careerfy-blog careerfy-blog-grid">
                            <div class="container">
                                <h2> Freshers Template</h2>
                            </div>
                                <ul class="row">
                                @foreach($resumelist as $resume)
                                @if($resume->category === 'fresher')
                                    <li class="col-md-4">
                                        <figure>  <a class="figure-image" data-links="" href="{{$resume->url}}" target="_self" title="{{$resume->display_name}}"> <img src="/uploads/ResumeTemplates/{{$resume->template_link}}" alt="" style="height:351px; width: 100; "></a></figure> 
                                    </li>
                                    @endif
                                    @endforeach
                               
                                </ul>
                            </div>
<hr>
        <div class="careerfy-blog careerfy-blog-grid">
       <div class="container">
                                <h2> Experienced Templates</h2>
                                <hr>
                            </div>
                                <ul class="row">
                                     @foreach($resumelist as $resume)
                                @if($resume->category === 'experienced')
                                    <li class="col-md-4">
              <figure>  <a class="figure-image" data-links="" href="{{$resume->url}}" target="_self" title="{{$resume->display_name}}"> <img src="/uploads/ResumeTemplates/{{$resume->template_link}}" alt="" style="height:351px; width: 100; "></a></figure>
          
                                    </li>
                                           @endif
                                    @endforeach
      
                                </ul>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
                    <!-- Footer -->
               @include('partials.job_footer')
        <!-- Footer -->
            <!-- Main Section -->
     <script src="{{ asset('css/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
        var oxyThemeData = {
            navbarHeight: 100,
            navbarScrolled: 60,
            navbarScrolledPoint: 20,
            menuClose: 'off',
            scrollFinishedMessage: 'No more items to load.',
            hoverMenu:
            {
                hoverActive: false,
                hoverDelay: 1,
                hoverFadeDelay: 200
            },
            siteLoader: 'on'
        };
    </script>
    <script src="{{asset('js/theme.min.js')}}"></script>
    <script src="{{asset('js/revolution.min.js')}}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery('#homepage-slider').revolution(
            {
                jsFileLocation: '/scripts/',
                extensions: 'revolution-extensions/',
                sliderType: "standard",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation:
                {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    onHoverStop: "off",
                    touch:
                    {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows:
                    {
                        style: "hesperiden",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        tmp: '',
                        left:
                        {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        },
                        right:
                        {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        }
                    }
                },
                gridwidth: 960,
                gridheight: 600,
                lazyType: "none",
                minHeight: 600,
                shadow: 0,
                spinner: "spinner1",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "on",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks:
                {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        });
    </script>
    </body>
    </html>