<div class="form-group">
    <label for="name">Name</label>
    <input name="name" type="text" id="name" placeholder="Name" class="form-control {{ $errors->has('name') ? 'is-invalid' : null }}" value="{{ isset($book) ? $book->name : null }}">
    @if($errors->has('name'))
        <p class="invalid-feedback">
            {{ $errors->first('name') }}
        </p>
    @endif
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" id="description" cols="30" rows="5" placeholder="Description" class="form-control {{ $errors->has('description') ? 'is-invalid' : null }}"
              value="{{ isset($book) ? $book->description : null }}"></textarea>
    @if($errors->has('description'))
        <p class="invalid-feedback">
            {{ $errors->first('description') }}
        </p>
    @endif
</div>

<div class="form-group">
    <label for="author_id">Author</label>
    <select name="author_id" id="author_id" class="form-control {{ $errors->has('author_id') ? 'is-invalid' : null }}">
        @foreach($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
        @endforeach
    </select>
    @if($errors->has('author_id'))
        <p class="invalid-feedback">
            {{ $errors->first('author_id') }}
        </p>
    @endif
</div>