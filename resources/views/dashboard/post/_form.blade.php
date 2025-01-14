@csrf
<label for="">Title</label>
<input type="text" name="title" value="{{ old('title', $post->title ?? '') }}">

<label for="">Slug</label>
<input type="text" name="slug" value="{{ old('slug', $post->slug ?? '') }}">

<label for="">Content</label>
<textarea name="content">{{ old('content', $post->content ?? '') }}</textarea> 

<label for="">Categoria</label>
<select name="category_id">
    @foreach ($categories as $title => $id)
        <option value="{{ $id }}" {{ (old('category_id', $post->category->id ?? '') == $id) ? 'selected' : '' }}>
            {{ $title }}
        </option>
    @endforeach
</select>

<label for="">Description</label>
<textarea name="description">{{ old('description', $post->description ?? '') }}</textarea>

<label for="">Posted</label>
<select name="posted">
    <option value="not" {{ old('posted', $post->posted ?? '') == 'not' ? 'selected' : '' }}>Not</option>
    <option value="yes" {{ old('posted', $post->posted ?? '') == 'yes' ? 'selected' : '' }}>Yes</option>
</select>

@if (isset($task)  && $task == 'edit')
    <label for="">Image</label>
    <input type="file" name="image">
@endif
<button type="submit">Send</button>
