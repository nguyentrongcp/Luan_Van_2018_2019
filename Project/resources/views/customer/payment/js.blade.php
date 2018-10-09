@push('script')
    <script>
        M.textareaAutoResize($('#note'));

        $(document).ready(function(){
            $('#payment-otp-modal').modal({
                dismissible: false
            });
        });
    </script>
@endpush