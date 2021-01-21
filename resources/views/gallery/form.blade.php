<div class="form-group text-danger">
    @foreach($errors->all() as $error)
        {{ $error }}<br>
    @endforeach
</div>
<form method="post" action="{{ $action }}">
    @csrf
    @method($method)
    <div class="form-group">
        <input type="text" class="form-control" id="url" name="url" placeholder="URL">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary form-control">
    </div>
</form>
