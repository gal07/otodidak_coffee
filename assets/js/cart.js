/**
     * add item to cart
     */
    $(".order").on("click",function () { 
        /* Url */
        var url = $("#url").val();
        /* Data */
        var data = {
            nama:$(this).attr('nmprod'),
            idproduk:$(this).attr('idprod'),
            harga:$(this).attr('hrgprod'),
        }
        $.ajax({
            type: "post",
            url: url+'addtocart',
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);
            }
        });
    })