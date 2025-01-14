@csrf
<label for="">Title</label>
<input class="form-control" name="title" value="{{ old('title', $post->title ?? '') }}">

<label for="">Slug</label>
<input class="form-control" name="slug" value="{{ old('slug', $post->slug ?? '') }}">

<label for="">Content</label>
<textarea class="form-control" name="content">{{ old('content', $post->content ?? '') }}</textarea> 

<label for="">Categoria</label>
<select class="form-control" name="category_id">
    @foreach ($categories as $title => $id)
        <option  class="form-control" value="{{ $id }}" {{ (old('category_id', $post->category->id ?? '') == $id) ? 'selected' : '' }}>
            {{ $title }}
        </option>
    @endforeach
</select>

<label for="">Description</label>
<textarea class="form-control" name="description">{{ old('description', $post->description ?? '') }}</textarea>

<label for="">Posted</label>
<select name="posted" class="form-control">
    <option value="not" {{ old('posted', $post->posted ?? '') == 'not' ? 'selected' : '' }}>Not</option>
    <option value="yes" {{ old('posted', $post->posted ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
</select>

@if (isset($task)  && $task == 'edit')
    <label for="">Image</label>
    <input class="form-control" type="file" name="image">
@endif
<button class="btn btn-success mt-2" type="submit">Send</button>
