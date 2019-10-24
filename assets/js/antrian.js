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
                        $(".el-element-overlay").append(
                            '<div class="col-md-4 col-sm-4 p-20 menus" id="'+element.id_order+'">'+
                                '<h4 class="card-title">#'+element.id_order+' <a class="btn btn-danger text-white"><i class="fa fa-clock-o"></i></a></h4>'
                            +'</div>'
                        );
                    });
                   
               
                } else {
                    console.log('Failed')
                }
            }
        });   
  

        setTimeout(startClock, 3000);
      }
  
      startClock();

 })