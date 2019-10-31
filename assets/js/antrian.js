$(document).ready(function () { 
    
    function startClock() {
          /* Url */
          var url = $("#url").val();
          $.ajax({
            type: "post",
            url: url+'getorderajax',
            dataType: "json",
            success: function (response) {
                console.log(response);
                // return false;
                /* If success */
                if (response.success == 1) {
                    $(".menus").remove();
                    response.data.forEach(element => {
                        ab = '';
                        for (let index = 0; index < response.detail.length; index++) {
                            const elements = response.detail[index];
                            if (elements.id_order == element.id_order) {
                                ab += '<button type="button" class="list-group-item">'+elements.produk+'<span class="badge badge-danger ml-auto">'+elements.qty+'</span></button>'
                            }
                        }

                        $(".ord_belum_selesai").append(
                            '<div class="col-md-4 col-sm-4 p-20 menus" id="m_ord_'+element.id_order+'">'+
                                '<h4 class="card-title">#'+element.id_order+' <a id="'+element.id_order+'" class="btn btn-danger text-white finishing"><i class="fa fa-clock-o"></i></a></h4>'+
                                '<div class="list-group">'+ab+'</div>'  
                           +'</div>'
                        );
                    });
                   
               
                } else {
                    $(".menus").remove();
                    console.log('Failed')
                }
            }
        });   
  

        setTimeout(startClock, 1000);
    }
      
    function startClock2() {
        /* Url */
        var url = $("#url").val();
        $.ajax({
          type: "post",
          url: url+'dashorderselesai',
          dataType: "json",
          success: function (response) {
              console.log(response);
              // return false;
              /* If success */
              if (response.success == 1) {
                $(".menus2").remove();
                  response.data.forEach(element => {
                      $(".selesai_ord").append(
                          '<div class="col-md-4 col-sm-4 p-20 menus2" id="selesai_'+element.id_order+'">'+
                              '<h4 class="card-title">#'+element.id_order+' <a id="'+element.id_order+'" class="btn btn-info text-white takeorder"><i class="fa fa-cutlery"></i></a></h4></div>'
                      );
                  });
                 
             
              } else {
                $(".menus2").remove();
                  console.log('Failed')
              }
          }
      });   


      setTimeout(startClock2, 1000);
    }

    function startClock3() {
        /* Url */
        var url = $("#url").val();
        $.ajax({
          type: "post",
          url: url+'orderdiambil2',
          dataType: "json",
          success: function (response) {
              console.log(response);
              // return false;
              /* If success */
              if (response.success == 1) {
                $(".menus3").remove();
                  response.data.forEach(element => {
                      $(".selesai_ord2").append(
                          '<div class="col-md-4 col-sm-4 p-20 menus3" id="selesai_'+element.id_order+'">'+
                              '<h4 class="card-title">#'+element.id_order+' <a id="'+element.id_order+'" class="btn btn-success text-white takeorder"><i class="fa fa-check-circle-o"></i></a></h4></div>'
                      );
                  });
                 
             
              } else {
                  console.log('Failed')
              }
          }
      });   


      setTimeout(startClock3, 1000);
    }

    startClock();
    startClock2();
    startClock3();

      $('.el-element-overlay').on('click','.finishing',function () { 


           /* Url */
           var url = $("#url").val();
           let ids = $(this).attr('id');
           let data = {"idorder":ids};
           $.ajax({
             type: "post",
             url: url+'orderselesai',
             data:data,
             dataType: "json",
             success: function (response) {
                 console.log(response);
                 // return false;
                 /* If success */
                 if (response.success == 1) {
                     $("#m_ord_"+ids).remove();
                 } else {
                     console.log('Failed')
                 }
             }
         });  


       });


       $('.el-element-overlay').on('click','.takeorder',function () { 
        /* Url */
        var url = $("#url").val();
        let ids = $(this).attr('id');
        let data = {"idorder":ids};
        $.ajax({
          type: "post",
          url: url+'orderdiambil',
          data:data,
          dataType: "json",
          success: function (response) {
              console.log(response);
              // return false;
              /* If success */
              if (response.success == 1) {
                  $("#selesai_"+ids).remove();
              } else {
                  console.log('Failed')
              }
          }
      });  


    });

 })