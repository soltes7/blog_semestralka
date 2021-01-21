<div class="form-group text-danger">
    @foreach($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>
<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ old('title', @$model->title) }}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content" placeholder="Content">{{ old('content', @$model->content) }}</textarea>
    </div>
    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="URL" value="{{ old('url', @$model->url) }}">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>
</form>
