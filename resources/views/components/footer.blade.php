  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row  justify-content-between">
        <div class="col-sm-12 col-md-6">
          <img class="w-25 my-3" src="https://i.ibb.co/dQCxfWy/presto.png" alt="">
          <p class="text-justify">{{ __('ui.footerdesc') }}
        </div>
        <div class="col-sm-12 col-md-3 my-3">
          <h6>Social</h6>
          <ul class="list-unstyled">
            <li><a class="facebook" href="#"><i class="fab fa-facebook fa-2x my-2"></i></a></li>
            <li><a class="twitter" href="#"><i class="fab fa-twitter fa-2x my-2"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fab fa-dribbble fa-2x my-2"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fab fa-linkedin fa-2x my-2"></i></a></li>   
          </ul>
        </div>

        <div class="col-sm-12 col-md-3 my-3">
            <h6 class="">Quick Links</h6>
            <ul class="footer-links">
              <li><a href="http://scanfcode.com/about/">{{__('ui.aboutus')}}</a></li>
              <li><a href="http://scanfcode.com/contact/">{{__('ui.contactus')}}</a></li>
              <li><a href="http://scanfcode.com/contribute-at-scanfcode/">{{__('ui.contribute')}}</a></li>
              <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
              <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
              <li><a href="{{route('lavora')}}">{{__('ui.workwhitus')}}</a></li>
            </ul>

        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by <strong>Presto</strong>
          </p>
        </div>

      
      </div>
    </div>
</footer>