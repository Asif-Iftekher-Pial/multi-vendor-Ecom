 <!-- jQuery (Necessary for All JavaScript Plugins) -->
 <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
 <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
 <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
 <script src="{{ asset('frontend/js/jquery.easing.min.js') }}"></script>
 <script src="{{ asset('frontend/js/default/classy-nav.min.js') }}"></script>
 <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
 <script src="{{ asset('frontend/js/default/scrollup.js') }}"></script>
 <script src="{{ asset('frontend/js/waypoints.min.js') }}"></script>
 <script src="{{ asset('frontend/js/jquery.countdown.min.js') }}"></script>
 <script src="{{ asset('frontend/js/jquery.counterup.min.js') }}"></script>
 <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
 <script src="{{ asset('frontend/js/jarallax.min.js') }}"></script>
 <script src="{{ asset('frontend/js/jarallax-video.min.js') }}"></script>
 <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
 <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
 <script src="{{ asset('frontend/js/wow.min.js') }}"></script>
 <script src="{{ asset('frontend/js/default/active.js') }}"></script>
 <script src="{{ asset('frontend/js/bootstrap-notify.min.js') }}"></script>
 {{-- autosearch --}}
 <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

 @yield('front_end_script')
 {{-- bootstrap notify 
     tutorial-https://www.youtube.com/watch?v=RCCj-SBX_Ow&list=PLIFG3IUe1Zxo8Zvju3_kJJvoKSaIP_SC_&index=35 
     https://github.com/mouse0270/bootstrap-notify--}}

<script>
    @if (Session::has('success'))
        $.notify("{{ Session::get('success') }}",{
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            }
        });
    @endif
    @php
        Session::forget('success')
    @endphp


    @if (Session::has('error'))
        $.notify("{{ Session::get('error') }}",{
            animate: {
                enter: 'animated fadeInRight',
                exit: 'animated fadeOutRight'
            }
        });
    @endif
    @php
        Session::forget('error')
    @endphp
    
</script>

 <script>
    setTimeout(function() {
        $('#alert').slideUp();
    }, 4000);
</script>


