<script type="text/javascript">
    $(document).on('click', '.add_to_cart', function(e) {
        e.preventDefault();
        let product_id = $(this).data('product-id');
        let quantity = $(this).data('quantity');

        let token = "{{ csrf_token() }}";
        let route_path = "{{ route('buyer.cart.store') }}";

        $.ajax({
            url: route_path,
            type: "POST",
            dataType: "JSON",
            data: {
                product_id: product_id,
                quantity: quantity,
                _token: token
            },
            beforeSend: function() {
                $('#add_to_cart' + product_id).html('<i class="fe fe-loader"></i>')
            },
            complete: function() {
                $('#add_to_cart' + product_id).html('<i class="fe fe-shopping-cart"></i>')
            },
            success: function(data) {
                console.log(data)
                $('body #navbar').html(data['header'])
            }
        });
    });
</script>
