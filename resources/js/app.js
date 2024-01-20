jQuery(document).ready(function() {
    console.log("loaded js");

    jQuery('.auth_btn_trigger').click(function(e) {
        console.log("auth btn clicked");
        e.stopPropagation();
        openModal('signupmodal');
    });

    jQuery('.cart_btn_trigger').click(function(e) {
        console.log("cart btn clicked");
        e.stopPropagation();
        openModal('cartmodal');
    });


    jQuery(window).click(function() {
        console.log("window clicked");
        // Check if the clicked element is inside any modal

        // Check if the clicked element is inside any modal or its specific child elements
        if (jQuery(e.target).closest('.modal, .exclude-click').length) {
            // Clicked outside any modal or its specific child elements, close all modals
            closeModals();
        }
    });
    $('.add-to-wishlist-btn').on('click', function() {
        var productId = $(this).data('product-id');
        console.log(productId);
        // Make an AJAX request to add the product to the wishlist
        $.ajax({
            type: 'POST',
            url: ajaxurl, // WordPress AJAX handler
            data: {
                action: 'add_to_wishlist',
                product_id: productId,
            },
            success: function(response) {
                var result = JSON.parse(response);

                // Output the result message (you can customize this part)
                alert(result.message);
            },
            error: function(error) {
                // Handle the error
                console.error('Error:', error);
            }
        });
    });
});

function openModal(id) {
    // Close all modals before opening the selected one
    closeModals();
    // Show your modal code here
    jQuery('#' + id).toggleClass('hidden');
    // You can use a library like Bootstrap or create your own modal implementation
    // Replace this with your actual modal logic
    // alert('Product added to cart!');
}

// Close all modals
function closeModals() {
    jQuery('.modal').addClass('hidden');
}
