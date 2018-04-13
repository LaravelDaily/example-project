
<div class="form-group">
    <label for="name">Name</label>
    <input name="name" type="text" id="name" placeholder="Name" class="form-control {{ $errors->has('name') ? 'is-invalid' : null }}" value="{{ isset($author) ? $author->name : null }}">
    @if($errors->has('name'))
        <p class="invalid-feedback">
            {{ $errors->first('name') }}
        </p>
    @endif
</div>

<div class="form-group">
    <label for="lastname">Lastname</label>
    <input name="lastname" type="text" id="lastname" placeholder="Lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : null }}" value="{{ isset($author) ? $author->lastname : null }}">
    @if($errors->has('lastname'))
        <p class="invalid-feedback">
            {{ $errors->first('lastname') }}
        </p>
    @endif
</div>