@if(isset($popup))
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Pop-up Title</label>
            <input type="text" name="title" value="{{ $popup->title }}" class="form-control" placeholder="Pop-up Title....">
        </div>
        <div class="form-group">
            <label for="">Pop-up Images</label><br>
            <img src="{{ asset($popup->image) }}" height="100px" width="100px" alt=""><br><br>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Pop-up status</label>
            <select name="status" id="" class="form-control">
                <option> Select one</option>

                <option value="active" @if ($popup->status == "active")
                    selected
                @endif> Active</option>
                <option value="inactive" @if ($popup->status == "inactive")
                    selected
                @endif>InActive</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Pop-up Link</label>
            <input type="text" name="link" class="form-control" value="{{ $popup->link }}" placeholder="Pop-up Link....">
        </div>
        <div class="form-group">
            <label for="">Pop-up position</label>
            <input type="number" name="position" class="form-control" value="{{ $popup->position }}" placeholder="Pop-up Postion....">
        </div>
    </div>

</div>
@else
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Pop-up Title</label>
            <input type="text" name="title" class="form-control" placeholder="Pop-up Title....">
        </div>
        <div class="form-group">
            <label for="">Pop-up Images</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Pop-up status</label>
            <select name="status" id="" class="form-control">
                <option> Select one</option>
                <option value="active"> Active</option>
                <option value="inactive">InActive</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Pop-up Link</label>
            <input type="text" name="link" class="form-control" placeholder="Pop-up Link....">
        </div>
        <div class="form-group">
            <label for="">Pop-up position</label>
            <input type="number" name="position" class="form-control" placeholder="Pop-up Postion....">
        </div>
    </div>

</div>
@endif
