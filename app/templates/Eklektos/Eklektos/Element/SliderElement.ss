<% if $ShowTitle %>
  <h2 class="list-element__title">$Title</h2>
<% end_if %>
<div id="carousel" class="carousel carousel-fade slide bg-inverse d-print-none mb-5" data-ride="carousel">
  <% if $SliderIndicators == 1 %>
  <ol class="carousel-indicators">
    <% loop $SliderItems %>
      <li data-target="#carousel" data-slide-to="$Pos(0)" <% if $First %>class="active"<% end_if %>></li>
    <% end_loop %>
  </ol>
  <% end_if %>
  <div class="carousel-inner" role="listbox">
    <% loop $Slider %>
    <div class="carousel-item <% if $First %>active<% end_if %>">
      <img class="d-block img-fluid ml-auto mr-auto" src="$Image.url" alt="" title="">
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
