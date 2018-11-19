<% include PageBanner %>
<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <div class="row">
        <% loop $Children %>
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="page-summary <% if $LandingPageSummaryImage %>with-image<% end_if %>">
              <a class="page-summary-image" href="$Link">
                <% if LandingPageSummaryImage %>
                  $LandingPageSummaryImage
                <% end_if %>
              </a>
              <a class="page-summary-title" href="$Link"><h3>$Title</h3></a>
              <p>$LandingPageSummary</p>
            </div>
          </div>
        <% end_loop %>
      </div>
    </div>
  </div>
</div>
