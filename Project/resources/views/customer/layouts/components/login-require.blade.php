<div id="login-require" class="modal">
    <div class="modal-content">
        <div class="col s12 center-align require-modal-content">
            <span>Bạn cần đăng nhập để sử dụng chức năng này.</span>
        </div>

        <div class="col s12 center-align">
            <a id="login-require-action" class="waves-effect waves-light btn modal-close">Đăng nhập ngay</a>
        </div>
    </div>
</div>

<style>
    .require-modal-content {
        font-size: 18px;
        margin-bottom: 20px;
    }
    @media only screen and (min-width: 601px) {
        #login-require {
            width: 484px;
        }
        #login-require {
            /*left: calc((100% - 484px) / 2);*/
        }
    }
    
</style>

@push('script')
    <script>
        $('#login-require-action').on('click', function () {
            $('#login-require').modal('close');
            $('#login-modal').modal('open');
        });
    </script>
@endpush