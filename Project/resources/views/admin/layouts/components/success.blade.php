@if (session()->get('success') != '')
        <script>
            $.toast({
                heading: 'Thông báo',
                text: '{{ Session()->get('success') }}',
                icon: 'success',
                position: 'bottom-right',
                loader: false
            });
        </script>
@endif