  <div class="row">
    <div class="col-md-10">

      <div class="form-group">
        <label>Username: </label>
        {{ Form::text('username', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
      </div>

      <div class="form-group">
        <label>E-mail address: </label>
        {{ Form::text('usermail', null, ['class' => 'form-control', 'disabled' => 'disabled']) }}
      </div>

      <div class="form-group">
        <label>Change password: </label>
        {{ Form::password('password', ['class' => 'form-control']) }}
      </div>

      <div class="form-group">
        <label>Confirm password: </label>
        {{ Form::password('confirm_password', ['class' => 'form-control']) }}
      </div>
      
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label>Profile Image: </label>
        {{ Form::file('avatar', ['id' => 'image']) }}
        @if (!empty($form->avatar_url))
        <img class="img-responsive mb15 preview" src="{{ $form->avatar_url }}">
        @else
        <img class="img-responsive mb15 preview">
        @endif
      </div>
    </div>
  </div>
    <hr>

    <div class="form-group">
      <label>Fullname: </label>
      {{ Form::text('fullname', null, ['class' => 'form-control']) }}
    </div>    

    <div class="form-group">
      <label>Mobile phone: </label>
      {{ Form::text('usercell', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      <label>Address: </label>
      {{ Form::text('address', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      <label>City: </label>
      {{ Form::text('city', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
      <label>Status: </label>
      {{ Form::select('status', ['active' => 'Active', 'trial' => 'Trial', 'suspended' => 'Suspended'], null, ['class' => 'form-control', 'style' => 'width: 100%']) }}
    </div>

    <div class="form-group">
      <label>Bio: </label>
      {{ Form::text('bio', null, ['class' => 'form-control']) }}
    </div>