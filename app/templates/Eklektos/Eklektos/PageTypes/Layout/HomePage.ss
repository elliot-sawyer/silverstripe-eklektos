<div id="carousel" class="carousel carousel-fade slide bg-inverse d-print-none" data-ride="carousel">
  <ol class="carousel-indicators">
    <% loop $CarouselItems %>
      <li data-target="#carousel" data-slide-to="$Pos(0)" <% if $First %>class="active"<% end_if %>></li>
    <% end_loop %>
  </ol>
  <div class="container">
    <div class="popular-links">
      <h5 class="popular-links-heading">Popular links</h5>
      <ul>
        <li><a href="#" class="">Link one</a></li>
        <li><a href="#" class="">Link two</a></li>
        <li><a href="#" class="">Link three</a></li>
        <li><a href="#" class="">Link four</a></li>
        <li><a href="#" class="">Link five</a></li>
      </ul>
    </div>
  </div>
  <div class="carousel-inner" role="listbox">
  <% loop $CarouselItems %>
    <div class="carousel-item <% if $First %>active<% end_if %>">
      $Image.ReponsiveHomePageCarousel
      <div class="carousel-caption">
        <h3>$Title</h3>
        <p>$Caption</p>
      </div>
    </div>
  <% end_loop %>
  </div>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container mt-4 mb-4">
  <div class="row">
    <div class="col-8">
      <h2>Heading</h2>
    </div>
    <div class="col-4">
      <h2>News</h2>
      test
    </div>
  </div>
</div>
