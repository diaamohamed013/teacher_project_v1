
@if (session('status'))
    <div class="row notify">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h2 class="text-sm">{{ Session::get('status') }}</h2>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif


@if (session('error'))
    <div class="row notify">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h2 class="text-sm">{{ Session::get('error') }}</h2>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
@endif
