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
      <% loop $PopularLinks %>
        <li><a href="$Link">$Title</a></li>
      <% end_loop %>
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
<div class="container mt-5 mb-5">
  <div class="row">
    <div class="col-8">
      <div class="row">
      <% loop $CardItems %>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
          <div class="card mb-4">
            <% if $Link %>
            <a href="$Link">
              <img class="card-img-top" src="$Image.Link" alt="Card image cap">
            </a>
            <% else %>
              <img class="card-img-top" src="$Image.Link" alt="Card image cap">
            <% end_if %>
            <div class="card-body">
              <h4 class="card-title">$Title</h4>
              <p class="card-text">$Content</p>
              <% if $Link %>
                <a href="$Link">
                <% if $LinkTitle %>
                  $LinkTitle
                <% else %>
                  $InternalURL.title
                <% end_if %>
                </a>
              <% end_if %>
            </div>
          </div>
        </div>
      <% end_loop %>
      </div>
    </div>
    <div class="col-4">
      <h2 class="news-heading">News</h2>
      <% loop BlogPosts %>
        <div class="news-post">
          <a href="$Link"><h4 class="news-post-heading">$Title</h4></a>
          <span class="news-post-date">$PublishDate</span>
        </div>
      <% end_loop %>
    </div>
  </div>
</div>
