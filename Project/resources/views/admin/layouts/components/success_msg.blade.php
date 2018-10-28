@if(session()->get('success') != '')
    @push('script')
        <script>
            $.toast({
                heading: 'Thông báo',
                text: '{{ session()->get('success') }}',
                icon: 'success',
                position: 'bottom-right',
                loader: false
            });
        </script>
    @endpush
@endif