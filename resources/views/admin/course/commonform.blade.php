@if(isset($course))

<div class="form-group mt-2">
    <label for="">Course Title</label>
    <input type="text" name="title" class="form-control" value="{{ $course->title ?? "" }}" placeholder="Course Title ...">
    {{-- @if($errors->has('title'))
    <div class="error">{{ $errors->first('firstname') }}</div>
    @endif --}}
</div>
<div class="form-group mt-2">
    <label for="">Course Featured Image</label><br>
    <img src="{{ asset($course->image) }}" height="200px" width="200px" alt="" id="course_image"><br><br>
    <input type="file" name="course_image" class="form-control" id="course_img">
</div>
<div class="form-group mt-2">
    <label for="">Course Description</label>
    <textarea name="description" id="summernote">
        {!! $course->description !!}
    </textarea>
</div>

@else

<div class="form-group mt-2">
    <label for="">Course Title</label>
    <input type="text" name="title" class="form-control" placeholder="Course Title ...">
</div>
<div class="form-group mt-2">
    <label for="">Course Featured Image</label><br>
    <img src="" alt="" id="course_image" height="100px" width="100px"><br>
    <input type="file" name="course_image" class="form-control" id="course_img">
</div>
<div class="form-group mt-2">
    <label for="">Course Description</label>
    <textarea name="description" id="summernote"></textarea>
</div>

@endif
