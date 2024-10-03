<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script><!-- lax cdn  --> --}}
<!-- <script src="js/lax.min.js"></script> -->

<!-- or via CDN -->
<script src="https://cdn.jsdelivr.net/npm/lax.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ url('js/script.js') }}"></script>


<script>
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

    // $(document).ready(function() {
    //     $('.increment').click(function() {
    //         var counter = $(this).parent().find('.count')
    //         var count = parseInt(counter.text()) || 1
    //         count++
    //         counter.text(count)
    //     })

    //     $('.decrement').click(function() {
    //         var counter = $(this).parent().find('.count')
    //         var count = parseInt(counter.text()) || 1
    //         count--
    //         counter.text(count)
    //     })
    // })
    window.onload = function() {
        lax.init()

        // Add a driver that we use to control our animations
        lax.addDriver('scrollY', function() {
            return window.scrollY
        })

        // Add animation bindings to elements

        lax.addElements('.letter-x', {
            scrollY: {
                translateY: [
                    [-400, 0, 100],
                    [300, 0, 100]
                ],
                scale: [
                    [1, 'screenHeight'],
                    [1, 2]
                ],
                opacity: [
                    [0, 'screenHeight/2', 'screenHeight'],
                    [1, 1, 0]
                ]
            }
        })
        lax.addElements('.letter-l', {
            scrollY: {
                translateY: [
                    [-400, 0],
                    [100, 0]
                ],
                translateX: [
                    [0, 'screenHeight'],
                    [0, 400]
                ],
                opacity: [
                    [0, 'screenHeight/2'],
                    [1, 0]
                ]
            }
        })
        lax.addElements('.letter-a', {
            scrollY: {
                translateY: [
                    [-400, 0],
                    [200, 0]
                ],
                translateX: [
                    [0, 'screenHeight'],
                    [0, -400]
                ],
                opacity: [
                    [0, 'screenHeight/2'],
                    [1, 0]
                ]
            }
        })
        lax.addElements('.oooh', {
            scrollY: {
                translateX: [
                    ['elInY', 'elOutY'],
                    [0, 'screenWidth-1']
                ]
            }
        })
        lax.addElements('.aaah', {
            scrollY: {
                translateX: [
                    ['elInY', 'elOutY'],
                    [0, '-screenWidth+100']
                ]
            }
        })

        lax.addElements('.bottombutton', {
            scrollY: {
                'background-position': [
                    ['elInY', 'elOutY'],
                    [0, 400],
                    {
                        cssFn: function(val) {
                            return `${val}px 0`
                        }
                    }
                ],
                scale: [
                    ['elInY', 'elCenterY'],
                    [3, 1]
                ]
            }

        })
    }
</script>


