<div class="form-group">
    <input type="text" class="form-control" name="category" value="{{$category-> category ?? ''}}" placeholder="Наименование жанра">
</div>

<div class="form-group">
    <select name="paren_id" class="form-control">
        <option value="0">-- без родительской категории --</option>
        @include('layouts.genres')
    </select>
</div>

<hr>
<button type="submit" class="btn btn-primary">Save</button>
