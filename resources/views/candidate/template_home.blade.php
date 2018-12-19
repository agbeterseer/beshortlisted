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
<!-- @foreach($resumelist as $resume)
<img alt="Clouds" class="normalwidth" src="/uploads/ResumeTemplates/{{$resume->template_link}}">
@endforeach -->
<!--    <section class="section" >
        <div class="background-overlay grid-overlay-0" style="background-color: rgba(0,0,0,1);"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="portfolio-container element-top-0 element-bottom-0 text-light">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portfolio-header clearfix">
                                    <div class="portfolio-filters pull-right"></div>
                                </div>
                            </div>
                        </div>
                        <div class="portfolio masonry no-transition magnific-all" data-col-lg="4" data-col-md="4" data-col-sm="3" data-col-xs="2" data-layout="fitRows" data-padding="0">

      <div class="masonry-item portfolio-item filter-gallery filter-nature filter-people" data-comments="0" data-date="2015-07-09T12:43:42+00:00" data-menu-order="0" data-title="Clouds">
                <div class="figure element-top-0 element-bottom-0 portfolio-os-animation image-filter-grayscale image-filter-onhover from-top text-center figcaption-middle normalwidth" data-os-animation="fadeIn" data-os-animation-delay="0s">
                <a class="figure-image" data-links="" href="{{ url('/index')}}" target="_self" title="Clouds"> 
                <img alt="Clouds" class="normalwidth" src="assets/images/photography/Fresher-Resume-Sample-For-IT-Jobs.png">
                                        <div class="figure-overlay grid-overlay-10">
                                            <div class="figure-overlay-container">
                                                <div class="figure-caption">
                                                <button type="submit" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                    <h3 class="figure-caption-title bordered bordered-small">Close (X)</h3>
                                                    <p class="figure-caption-description"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
@foreach($resumelist as $resume)
                            <div class="masonry-item portfolio-item filter-gallery filter-nature filter-people" data-comments="0" data-date="2015-07-09T12:43:42+00:00" data-menu-order="0" data-title="Clouds">
                                <div class="figure element-top-0 element-bottom-0 portfolio-os-animation image-filter-grayscale image-filter-onhover from-top text-center figcaption-middle normalwidth" data-os-animation="fadeIn" data-os-animation-delay="0s">
                            <a class="figure-image" data-links="" href="{{$resume->url}}" target="_self" title="{{$resume->display_name}}"> <img alt="{{$resume->display_name}}" src="/uploads/ResumeTemplates/{{$resume->template_link}}">
                                        <div class="figure-overlay grid-overlay-10">
                                            <div class="figure-overlay-container">
                                                <div class="figure-caption">
                                                    <h3 class="figure-caption-title bordered bordered-small">
                                                    {{$resume->display_name}}
                                                    </h3>
                                                    <p class="figure-caption-description"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
@endforeach



 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
                   <!-- Main Section -->
            <div class="careerfy-main-section">
                <div class="container">
               
                    <div class="row">

                        <div class="col-md-12">
                            <!-- Fancy Title -->
                            <section class="careerfy-fancy-title">
                                <h2>CHOSE FROM OUR TEMPLATES</h2>
                                <!-- <p>A better candidates are there. We'll help you find them to use.</p> -->
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
                         <!--   <div class="careerfy-blog-grid-text">
                             <div class="careerfy-blog-tag"> <a href="#">{{$resume->display_name}}</a> </div>
                                            <a href="#" class="careerfy-read-more careerfy-bgcolor">Generate</a>
                                        </div> -->
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
                          <!--               <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">Title</a> </div>
                                 
                                            <a href="#" class="careerfy-read-more careerfy-bgcolor">Fresher</a>
                                        </div> -->
                                    </li>
                                           @endif
                                    @endforeach
      
                                </ul>
                            </div>


            <!--                 <div class="careerfy-blog careerfy-blog-grid">
       <div class="container">
                                <h2> Creative Templates</h2>
                            </div>
                                <ul class="row">
                                    <li class="col-md-4">
                                        <figure><a href="#"><img src="{{asset('/img/extra-images/blog-grid-1.jpg')}}" alt=""></a></figure>
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">Title</a> </div>
                         
                                            <a href="#" class="careerfy-read-more careerfy-bgcolor">Fresher</a>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <figure><a href="#"><img src="{{asset('/img/extra-images/blog-grid-2.jpg')}}" alt=""></a></figure>
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">Title</a> </div>
                     
                                            <a href="#" class="careerfy-read-more careerfy-bgcolor">Experienced</a>
                                        </div>
                                    </li>
                                    <li class="col-md-4">
                                        <figure><a href="#"><img src="{{asset('/img/extra-images/blog-grid-3.jpg')}}" alt=""></a></figure>
                                        <div class="careerfy-blog-grid-text">
                                            <div class="careerfy-blog-tag"> <a href="#">Title</a> </div>
                                 
                                            <a href="#" class="careerfy-read-more careerfy-bgcolor">Creative</a>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->

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