$('.product-slides').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
})

$(document).ready(function () {
    $('.increment').click(function () {
      var counter = $(this).parent().find('.count');
      var count = parseInt(counter.text()) || 0;
      count++;
      counter.text(count);
      $('#qty').attr('value', count);  // Update hidden input field
    });

    $('.decrement').click(function () {
      var counter = $(this).parent().find('.count');
      var count = parseInt(counter.text()) || 0;

      if (count > 1) {
        count--;
      } else {
        count = 1;  // Ensure it doesn't go below 1
      }

      counter.text(count);
      $('#qty').attr('value', count);  // Update hidden input field
    });


    function updateTotalPrice() {
        var total = 0;

        // Loop through each product and calculate the total price
        $('.product').each(function () {
            var quantity = $(this).find('.input_qty').val();
            var pricePerUnit = $(this).find('.input_qty').data('product-price');
            var productTotal = quantity * pricePerUnit;
            total += productTotal;

            // Update the individual product total price display
            $(this).find('.cart-price').text(productTotal.toFixed(2));
        });

        // Update the total price display
        $('#total-price').text(total.toFixed(2));
    }

    // Listen for changes on any quantity input field
    $('.input_qty').on('input', function () {
        updateTotalPrice();
    });


  });
