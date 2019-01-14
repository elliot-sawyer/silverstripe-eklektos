<div class="container-full page-background">
  <div class="container">
    <div class="page">
      <div class="row">
        <% if $UserformContactDetail || $Address || $Heading || $Sidebar %>
        <div class="col-md-12 col-lg-6">
        <% else %>
        <div class="col">
        <% end_if %>
          $Content
          $Form
          $PageComments
        </div>
        <% if $UserformContactDetail || $Address || $Heading || $Sidebar %>
        <div class="col-md-12 col-lg-5 offset-lg-1">
          <div class="contact-sidebar">
            <ul class="contact-sidebar-info<% if $Icons %> contact-sidebar-icons<% end_if %>">
              <% loop $UserformContactDetail %>
                <% if Type == Number %>
                <li class="contact-sidebar-phone">
                  <strong>$Label</strong><br/>
                  $Number
                </li>
                <% else %>
                <li class="contact-sidebar-email">
                  <strong>$Label</strong><br/>
                  <a href="mailto:$Email">$Email</a><br/>
                </li>
                <% end_if %>
              <% end_loop %>
              <% if $Address %>
              <li class="contact-sidebar-address">
                <strong>Address</strong><br/>
                $Address<br/>
              </li>
              <% end_if %>
            </ul>
            $Heading
            $Sidebar
          </div>
        </div>
        <% end_if %>
      </div>
    </div>
  </div>
</div>
