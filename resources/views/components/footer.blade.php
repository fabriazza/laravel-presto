  <!-- Site footer -->
  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <img class="w-25 my-3" src="https://i.ibb.co/dQCxfWy/presto.png" alt="">
          <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed facere tempore similique repellat nesciunt ducimus totam dolores ab repellendus! Voluptatem eveniet, ratione enim dicta quae perspiciatis vel est neque atque? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus mollitia distinctio consequatur non, illum accusamus harum recusandae totam, perferendis nihil vero iure vitae dicta qui, dolor officia ullam optio deleniti.
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Categories</h6>
          <ul class="footer-links">
            @foreach ($categories->take(5) as $category)
                <li><a href="{{route('category.index', $category)}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Quick Links</h6>
          <ul class="footer-links">
            <li><a href="http://scanfcode.com/about/">About Us</a></li>
            <li><a href="http://scanfcode.com/contact/">Contact Us</a></li>
            <li><a href="http://scanfcode.com/contribute-at-scanfcode/">Contribute</a></li>
            <li><a href="http://scanfcode.com/privacy-policy/">Privacy Policy</a></li>
            <li><a href="http://scanfcode.com/sitemap/">Sitemap</a></li>
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

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="#"><i class="fab fa-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a class="dribbble" href="#"><i class="fab fa-dribbble"></i></a></li>
            <li><a class="linkedin" href="#"><i class="fab fa-linkedin"></i></a></li>   
          </ul>
        </div>
      </div>
    </div>
</footer>