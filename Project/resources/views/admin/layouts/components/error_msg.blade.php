@if(session()->get('error') != '')
    @push('script')
        <script>
            $.toast({
                heading: 'Lỗi!',
                text: '{{ session()->get('error') }}',
                icon: 'error',
                position: 'bottom-right',
                loader: false
            });
        </script>
    @endpush
@endif