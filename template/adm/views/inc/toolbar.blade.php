<div class="row mb15 toolbar">
  <div class="col-md-9">
    @if (isset($_add_new))
    <a class="btn btn-success btn-quirk @if (isset($_ajax)) btn-form @endif" href="{{ $_add_new }}">Add New</a>
    @endif
    <input type="submit" value="Delete Checked" class="btn btn-small btn-quirk btn-danger delete">
  </div>
  <div class="col-md-3">
    <div class="input-group">
      {{ Form::text('search', Request::get('search'), ['class' => 'form-control', 'placeholder' => 'Search for...']) }}
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit">Go!</button>
      </span>
    </div>
  </div>
</div>