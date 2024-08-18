

$(document).ready(function() {
    $('.add-to-cart').click(function(e) {
        e.preventDefault();
        var productId = $(this).data('id');

        $.ajax({
            url: 'update_cart.php',
            method: 'POST',
            data: { product_id: productId },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    alert('Error: ' + response.error);
                } else {
                    updateCartDisplay(response);
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });

    function updateCartDisplay(cartData) {
        $('#cart-count').text(cartData.totalItems);
        $('#cart-total').text(cartData.totalPrice.toFixed(2));
        $('#cart-item-count').text(cartData.totalItems);
        $('#cart-subtotal').text(cartData.totalPrice.toFixed(2));

        var cartItemsHtml = '';
        $.each(cartData.items, function(index, item) {
            cartItemsHtml += `
                <li>
                    <div class="cart__item d-flex justify-content-between align-items-center">
                        <div class="cart__inner d-flex">
                            <div class="cart__thumb">
                                <a href="product-details.php?id=${item.id_p}">
                                    <img src="${item.image_url1}" alt="${item.name}">
                                </a>
                            </div>
                            <div class="cart__details">
                                <h6><a href="product-details.php?id=${item.id_p}">${item.name}</a></h6>
                                <div class="cart__price">
                                    <span>$${(item.price * item.Quantity).toFixed(2)}</span>
                                </div>
                            </div>
                        </div>
                        <div class="cart__del">
                            <a href="#" class="remove-cart-item" data-product-id="${item.id_p}"><i class="fal fa-times"></i></a>
                        </div>
                    </div>
                </li>
            `;
        });

        $('#cart-items li:not(:first-child):not(:last-child):not(:nth-last-child(2))').remove();
        $('#cart-items li:first-child').after(cartItemsHtml);
    }

    // Initial cart load
    $.ajax({
        url: 'get_cart_data.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if (!response.error) {
                updateCartDisplay(response);
            }
        }
    });
});
