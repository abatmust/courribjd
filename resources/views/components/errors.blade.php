@if($errors->any())
    <div class="row">
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Alert!</strong> {{$error}}.
            </div>
        @endforeach
    </div>
@endif
