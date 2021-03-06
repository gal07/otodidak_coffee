$(document).ready(function(){
    "use strict";
    let opp = ordid();
    $("#idord").text(opp);
    $("#orderid").val(opp);

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
                     var bayar = parseInt($("#bayarfield").val(''));
                     var kembalian = $("#kembalian_field"); 
                     kembalian.val('');
                     $("#totalPrices").text('Rp. 0');
                
                 } else {
                     alert('Failed')
                 }
             }
         });

      })

      $("#form_order").submit(function (e) {
		e.preventDefault();
        /* Url */
        var url = $("#url").val();

        var orderid = $("#orderid").val();
        var total = parseInt($("#bayarfield_hidden").val());
        var bayar = parseInt($("#bayarfield").val());
        var kembalian = $("#kembalian_field");
        let yt = bayar-total;
        let data = {
            total:total,
            bayar:bayar,
            kembalian:yt,
            orderid:orderid
        }

        
        $.ajax({
            type: "post",
            url: url+'cekcart',
            dataType: "json",
            success: function (response) {
                if ( response.success == 1) {

                    /* jika bayar lebih kecil dari total */
                    if (bayar < total) {
                        swal("Error", "Uang Yang Dibayarkan Kurang", "error");   
                    } else {

                        swal({   
                            title: "Tekan yes untuk melanjutkan order",   
                            text: "Pastikan Pesanan Tidak Salah",   
                            type: "warning",   
                            showCancelButton: true,   
                            confirmButtonColor: "#1e88e5",   
                            confirmButtonText: "Ya, Order",  
                            cancelButtonColor: "#e52424", 
                            cancelButtonText: "Batalkan",   
                            closeOnConfirm: false,   
                            closeOnCancel: false 
                        }, function(isConfirm){   
                            if (isConfirm) {     
                                $.ajax({
                                    type: "post",
                                    url: url+'order',
                                    data:data,
                                    dataType: "json",
                                    success: function (response) {
                                        window.open(url+'cetak?idorder='+orderid, '_blank');
                                        console.log(response);
                                        // return false;
                                        /* If success */
                                        if (response.success == 1) {
                        
                                            swal({   
                                                title: "Order Berhasil Dibuat",
                                                type: "success",
                                                text: "Pesanan Sedang Di Proses",   
                                                timer: 1000,   
                                                showConfirmButton: false 
                                            });
                        
                                            /* Remove table item */
                                            $("table#adrs tbody tr").remove();     
                                            /* add table price */
                                            var bayar = parseInt($("#bayarfield").val(''));
                                            var kembalian = $("#kembalian_field"); 
                                            kembalian.val('');
                                            $("#totalPrices").text('Rp. 0');

                                            let ad = ordid();
                                            $("#idord").text(ad);
                                            $("#orderid").val(ad);
                                       
                                        } else {
                                            alert('Failed')
                                        }
                                    }
                                });   
                            } else {     
                                swal("Batal", "Pesanan Dibatalkan", "error");   
                            } 
                        });
                        
                    }

                   

                    
                } else {


                    swal("Error", "Tidak ada menu yang dipilih", "error");   

                    
                }
            }
        });        
       

     })


     $(".deletes").on("click",function () {
         /* Url */
        var url = $("#url").val();
        var id = $(this).attr("idord");
        var data = {
            "idorder":id
        };
        swal({   
            title: "Apakah Anda Ingin Menghapus Order Ini ?",   
            text: "Pastikan Keputusan Anda",   
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#1e88e5",   
            confirmButtonText: "Ya",  
            cancelButtonColor: "#e52424", 
            cancelButtonText: "Batalkan",   
            closeOnConfirm: false,   
            closeOnCancel: false 
        }, function(isConfirm){   
            if (isConfirm) {     
                $.ajax({
                    type: "post",
                    url: url+'hapusorder',
                    data:data,
                    dataType: "json",
                    success: function (response) {
                        console.log(response);
                        // return false;
                        /* If success */
                        if (response.success == 1) {
                            $("#c_"+id).remove();
                            swal({   
                                title: "Order Berhasil Dihapus",
                                type: "success",
                                text: "Data Tidak Bisa Di Restore",   
                                timer: 1000,   
                                showConfirmButton: false 
                            });
                       
                        } else {
                            alert('Failed')
                        }
                    }
                });   
            } else {     
                swal("Batal", "Dibatalkan", "error");   
            } 
        });

      })

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function ordid() {
        let id = Math.floor(Math.random() * 100000) + 1;
        return id; 
    }

})
