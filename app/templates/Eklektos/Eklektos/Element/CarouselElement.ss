<% if $ShowTitle %>
  <h2 class="list-element__title">$Title</h2>
<% end_if %>
<div class="slick-carousel-container">
  <span class="slick-carousel-arrow-left"></span>
  <span class="slick-carousel-arrow-right"></span>
  <div class="slick-carousel mb-5" data-slick='{"slidesToShow": $CarouselColumns, "slidesToScroll": 1, "dots": true}'>
  <% loop $Carousel %>
    <div class="slick-slide">
    <% if $Image %>
    <%--<a href="$Image.url" class="slick-slide-content slick-expand-indicator">--%>
    <a class="popup popup-image popup-indicator" href="$Image.url">
      $Image
      <% if $Title || $Caption %>
      <div class="slick-overlay">
        <h5 class="slick-title">$Title</h5>
        <p class="slick-caption">$Caption</p>
      </div>
      <% end_if %>
    </a>
    <% else_if $YouTubeID %>
    <a class="popup popup-youtube <% if not $YouTubeImage %>popup-no-image<% end_if %>" href="http://www.youtube.com/watch?v=$YouTubeID">
      $YouTubeImage
    </a>
    <% else_if $VimeoID %>
    <a class="popup popup-vimeo <% if not $VimeoImage %>popup-no-image<% end_if %>" href="https://vimeo.com/$VimeoID">
      $VimeoImage
    </a>
    <% end_if %>
    </div>
  <% end_loop %>
  </div>
</div>
