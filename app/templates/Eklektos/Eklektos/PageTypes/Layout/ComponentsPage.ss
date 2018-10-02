<% include PageBanner %>
<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <h2>Carousel</h2>
          <div id="carousel" class="carousel carousel-fade slide bg-inverse d-print-none mb-5" data-ride="carousel">
            <% if $Indicators == 1 %>
            <ol class="carousel-indicators">
              <% loop $CarouselItems %>
                <li data-target="#carousel" data-slide-to="$Pos(0)" <% if $First %>class="active"<% end_if %>></li>
              <% end_loop %>
            </ol>
            <% end_if %>
            <div class="carousel-inner" role="listbox">
              <% loop $CarouselItems %>
              <div class="carousel-item <% if $First %>active<% end_if %>">
                <img class="d-block img-fluid ml-auto mr-auto" src="$Image.url" alt="" title="">
                <div class="carousel-caption">
                  <h3>$Title</h3>
                  <p>$Caption</p>
                </div>
              </div>
              <% end_loop %>
            </div>
            <% if $Arrows == 1 %>
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
          <h2>Gallery</h2>
          <% if $GalleryItems %>
            <div class="row">
              <% loop $GalleryItems %>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="gallery-image">
                    <div class="gallery-image-border">
                      <a class="gallery-popup" href="<% if $Image %>$Image.Link<% else %>http://placehold.it/800x600<% end_if %>" title="$Caption">
                        <% if $Image %>
                          $Image.Fit(800,600)
                        <% else %>
                          <img src="http://placehold.it/800x600" alt="Placeholder image" title="Placeholder image">
                        <% end_if %>
                      </a>
                      <% if $Title || $Caption %>
                      <div class="gallery-image-description">
                        <span class="gallery-image-title">$Title</span>
                        <span class="gallery-image-caption">$Caption</span>
                      </div>
                      <% end_if %>
                    </div>
                  </div>
                </div>
              <% end_loop %>
            </div>
          <% end_if %>
          <h2>Accordion</h2>
          <div id="accordion" class="mb-4" role="tablist">
          <% loop $AccordionItems %>
            <div class="card">
              <div class="card-header collapsed" role="tab" id="heading{$ID}" data-toggle="collapse" href="#collapse{$ID}" aria-expanded="false" aria-controls="collapse{$ID}">
                <h5 class="mb-0">
                  $Title
                </h5>
              </div>
              <div id="collapse{$ID}" class="collapse" role="tabpanel" aria-labelledby="heading{$ID}" data-parent="#accordion">
                <div class="card-body">
                  $Content
                </div>
              </div>
            </div>
          <% end_loop %>
          </div>
          <h2>Cards</h2>
          <div class="row">
            <% loop $CardItems %>
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="card mb-4">
                  <img class="card-img-top" src="$Image.Link" alt="Card image cap">
                  <div class="card-body">
                    <h4 class="card-title">$Title</h4>
                    <p class="card-text">$Content</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                  </div>
                </div>
              </div>
            <% end_loop %>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
          <h2>Component details</h2>
          <ul>
            <li>Browsers supported</li>
            <li>Userbility supported</li>
            <li>Link to repository</li>
            <li>Options that you can customise</li>
          </ul>
          <p>Notes:</p>
          Responsive images<br/>
          Responsive tables<br/>
          Alert messages<br/>
          Page sharing<br/>
          Page section colours<br/>
          News
          Quicklinks
          Social media icons
          Masonary
        </div>
      </div>
    </div>
  </div>
</div>
