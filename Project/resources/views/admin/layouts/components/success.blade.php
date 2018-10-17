@if (Session::has('success'))
    <div class="ml-md-auto col-md-4">
        <div class="alert alert-success" role="alert">
            <div class="container">
                <div class="alert-icon">
                    <i class="fa fa-window-close"></i> {{Session::get('success') }}
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">
                <i class="now-ui-icons ui-1_simple-remove"></i>
              </span>
                </button>
            </div>
        </div>
    </div>
@endif

