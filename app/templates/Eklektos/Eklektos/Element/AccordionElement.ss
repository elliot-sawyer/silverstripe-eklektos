<% if $ShowTitle %>
  <h2 class="list-element__title">$Title</h2>
<% end_if %>
<div id="accordion" class="mb-5" role="tablist">
  <% loop $Accordion %>
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
