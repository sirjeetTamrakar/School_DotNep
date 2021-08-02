
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title mt-0">Log Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <h3>{{ class_basename($log->subject) }}&nbsp;{{ $log->description }}</h3>
            @if(isset($log->changes['attributes']) && isset($log->changes['old']))
                <h4>New Data</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>Key</td>
                        <td>Value</td>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($log->changes['attributes'] as $keys=>$value)
                        <tr>
                            <td>{{$keys}}</td>
                            <td>{{$value}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
                <br>
                <h4>Old Data</h4>
                <table class="table table-bordered">

                    <thead>
                    <tr>
                        <td>Key</td>
                        <td>Value</td>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($log->changes['old'] as $keys=>$value)
                        <tr>
                            <td>{{$keys}}</td>
                            <td>{{$value}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            @elseif(isset($log->changes['attributes']) && !isset($log->changes['old']))
                <h4>Value</h4>
                <table class="table table-bordered">

                    <thead>
                    <tr>
                        <td>Key</td>
                        <td>Value</td>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($log->changes['attributes'] as $keys=>$value)
                        <tr>
                            <td>{{$keys}}</td>
                            <td>{{$value}}</td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            @else
                <span>No Additional Details.</span>
            @endif
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
