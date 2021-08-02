<div class="modal fade " id="add_content" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form method="post" action="{{ route('admin.grade.add') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ getLanguage('add-new') }} {{ getLanguage('grade') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Full Grade{{ getLanguage('title') }}</label>
                        <input type="text" name="title" value="" id="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Short Grade title</label>
                        <input type="text" name="subtitle" value="" id="subtitle" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="remarks">{{ getLanguage('remarks') }}:</label>
                        <textarea  name="remarks" id="remarks" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="title">{{getLanguage('student')}} {{getLanguage('information-1')}}</label>
                        <table class="table table-bordered">
                            <tr>
                                <th>{{ getLanguage('ethnicity') }}</th>
                                <th>{{ getLanguage('male') }} {{ getLanguage('total') }}</th>
                                <th>{{ getLanguage('female') }} {{ getLanguage('total') }}</th>
                            </tr>
                            @if($ethnicities->isNotEmpty())
                            @foreach($ethnicities as $ethnicity)
                                <tr>
                                    <td>{{$ethnicity->title}}</td>
                                    <td><input type="number" name="ethnicity[male][{{$ethnicity->id}}]" class="form-control"></td>
                                    <td><input type="number" name="ethnicity[female][{{$ethnicity->id}}]" class="form-control"></td>
                                </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td>{{getLanguage('class-warning')}}.</td>
                                    <td><a target="_blank" href="{{ route('admin.ethnicitys') }}">Add New Ethnicity?</a></td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
