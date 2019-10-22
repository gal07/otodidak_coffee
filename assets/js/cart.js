$(document).ready(function(){ 

    $("#bayarfield").on("keyup",function () { 
        console.log($(this).val())
        var bayar = parseInt($(this).val());
        var total = parseInt($("#bayarfield_hidden").val());
        var kembalian = $("#kembalian_field");

        /* Proses */
        let jumlah = bayar-total;
        kembalian.val(jumlah);
     })

      /**
     * change qty in view cart
     */
    $(".count").on("change",function() {
        var id = $(this).attr('id').substring(2);
        var qty = $(this).val();
        var hrg = $(this).attr('harga');
        var total = hrg*qty;
       
           /* Url */
           var url = $("#url").val();
           /* Data */
           var data = {
               id:id,
               id_produk:$(this).attr("iprd"),
               quantity:qty,
               harga:$(this).attr("harga"),
           }
           $.ajax({
               type: "post",
               url: url+'cartupdate',
               data: data,
               dataType: "json",
               success: function (response) {
                   console.log(response);
                   if (response.success == 1) {
                    var totalhargas=0;
                    /* Remove TR cart */
                    // $("table#adrs tbody tr").remove();
                    for (let i = 0; i < response.data.length; i++) {
                        totalhargas += parseInt(response.data[i].total);
                    }
                      /* append new table price with data */   
                    $("#total_item_"+id).text("Rp. "+numberWithCommas(total));                     
                    $("#totalPrices").text("Rp. "+numberWithCommas(totalhargas));
                } else {
                       alert('Failed');
                   }
               }
           });
    })


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
                /* Remove TR cart */
                $("table#adrs tbody tr").remove();
                let totalhargas = 0;
                for (let i = 0; i < response.data.length; i++) {
                    totalhargas += parseInt(response.data[i].total);
                    /* append new table with data */  
                    $("table#adrs").append( '<tr id="'+response.data[i].id+'">'+
                    '<td><small>'+response.data[i].nama_produk+'</small></td>'+'<td class="text-center"><small>'+response.data[i].quantity+'</small></td>'+'<td><small id="total_item_'+response.data[i].id+'">Rp. '+numberWithCommas(response.data[i].total)+'</small></td>'+'<td><button type="button" title="Remove" class="btn btn-xs btn-danger remove hapusCart" cartid="'+response.data[i].id+'"><i class="fa fa-times"></i></button></td></tr>');
                }

                var bayar = parseInt($("#bayarfield").val());
                var kembalian = $("#kembalian_field");
                let yt = bayar-totalhargas; 
                
                $("#totalPrices").text("Rp. "+numberWithCommas(totalhargas));
                $("#bayarfield_hidden").val(totalhargas);
                kembalian.val(yt);
                console.log(response);
            }
        });
    })

    $("table#adrs").on("click",'.hapusCart',function () { 
        /* Url */
        var url = $("#url").val();
        /* Id cart */
        var id = $(this).attr('cartid');
        /* Data */
        var data = {
            idproduk:id,
        }
        $.ajax({
            type: "post",
            url: url+'deletecart',
            data: data,
            dataType: "json",
            success: function (response) {
                console.log(response);
                /* If success */
                if (response.success == 1) {
                    /* For keranjang number */
                    var keranjang = response.data == null ? '0' : response.data.length;
                    var totalhargas=0;
                    /* if data not null keep sum harga */
                    if (response.data != null) {
                        for (let i = 0; i < response.data.length; i++) {
                            totalhargas += parseInt(response.data[i].total);
                            console.log(totalhargas)
                        }
                    }
                    /* Remove table item */
                    $("table#adrs tr#"+id).remove();
                    
                    /* add table price */

                    var bayar = parseInt($("#bayarfield").val());
                    var kembalian = $("#kembalian_field");
                    let yt = bayar-totalhargas;

                    kembalian.val(yt);
                    $("#totalPrices").text("Rp. "+numberWithCommas(totalhargas));
                    $("#bayarfield_hidden").val(totalhargas);
                } else {
                    alert('Failed')
                }
            }
        });
     })


     $("#cancelsMenu").on("click",function () { 

         /* Url */
         var url = $("#url").val();
        
         $.ajax({
             type: "post",
             url: url+'cancelcart',
             dataType: "json",
             success: function (response) {
                 console.log(response);
                 /* If success */
                 if (response.success == 1) {
                     /* Remove table item */
                     $("table#adrs tbody tr").remove();     
                     /* add table price */
                     var bayar = parseInt($("#bayarfield").val(0));
                     var kembalian = $("#kembalian_field"); 
                     kembalian.val(0);
                     $("#totalPrices").text('Rp. 0');
                
                 } else {
                     alert('Failed')
                 }
             }
         });

      })


    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

})
