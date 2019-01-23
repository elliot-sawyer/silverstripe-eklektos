<% include PageBanner %>
<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <div class="row">
        <% if $Menu(2) %>
          <% include SideBar %>
        <% end_if %>
        <% if $Menu(2) %>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
        <% else %>
        <div class="col-lg-12 col-md-12 col-sm-12">
        <% end_if %>
          $Content
          $Form
          <% if $Gallery %>
            <div class="row">
            <% loop $Gallery %>
              <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="gallery-image">
                  <div class="gallery-image-border">
                    <div class="gallery-popup-holder">
                      <a class="gallery-popup" href="<% if $Image %>$Image.Link<% else %>http://placehold.it/800x600<% end_if %>" title="$Caption">
                        <% if $Image %>
                          $Image.Fit(800,600)
                        <% else %>
                          <img src="http://placehold.it/800x600" alt="Placeholder image" title="Placeholder image">
                        <% end_if %>
                      </a>
                    </div>
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
        </div>
      </div>
    </div>
  </div>
</div>
