<div id="carousel" class="carousel carousel-fade slide bg-inverse d-print-none" data-ride="carousel">
  <div class="carousel-overlay">
    <div class="container">
      <% if $SiteConfig.AlertToggle %>
        <% with $SiteConfig %>
          <div class="alert alert-$AlertType alert-dismissible fade show" role="alert">
            <span class="alert-title">$AlertTitle</span>
            <% if $AlertBody %><span class="alert-body">$AlertBody</span><% end_if %>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <% end_with %>
      <% end_if %>
      <% if $PopularLinks %>
      <div class="popular-links">
        <h5 class="popular-links-heading">Popular links</h5>
          <ul>
          <% loop $PopularLinks %>
            <li><a href="$Link">$Title</a></li>
          <% end_loop %>
        </ul>
      </div>
      <% end_if %>
    </div>
  </div>
  <% if $SliderIndicators == 1 %>
  <ol class="carousel-indicators">
    <% loop $SliderItems %>
      <li data-target="#carousel" data-slide-to="$Pos(0)" <% if $First %>class="active"<% end_if %>></li>
    <% end_loop %>
  </ol>
  <% end_if %>
  <div class="carousel-inner" role="listbox">
  <% loop $SliderItems %>
    <div class="carousel-item <% if $First %>active<% end_if %>">
      $Image.ReponsiveHomePageSlider
      <div class="carousel-caption">
        <h3>$Title</h3>
        <p>$Caption</p>
      </div>
    </div>
  <% end_loop %>
  </div>
  <% if $SliderArrows == 1 %>
  <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
  <% end_if %>
</div>

<div class="container mt-5 mb-5">
  <div class="row">
    <% if $ShowNewsOnHomePage %>
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
    <% else %>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <% end_if %>
      <div class="row">
        <% loop $CardItems %>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12">
            <div class="card mb-4">
              <% if $Link %>
              <a href="$Link">
                <div class="card-img-holder">
                  <img class="card-img-top" src="$Image.Link" alt="Card image cap">
                </div>
              </a>
              <% else %>
                <img class="card-img-top" src="$Image.Link" alt="Card image cap">
              <% end_if %>
              <div class="card-body">
                <h4 class="card-title">$Title</h4>
                <p class="card-text">$Content</p>
                <% if $Link %>
                  <a href="$Link" class="btn btn-card-theme">
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
    <% if $ShowNewsOnHomePage %>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <h2 class="news-heading">Latest News</h2>
      <% loop BlogPosts %>
        <div class="news-post">
          <a href="$Link"><h4 class="news-post-heading">$Title</h4></a>
          <span class="news-post-date">$PublishDate</span>
        </div>
      <% end_loop %>
    </div>
    <% end_if %>
  </div>
</div>
