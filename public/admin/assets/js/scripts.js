(function (window, undefined) {
    "use strict";

    // visa quetions scripts
    $(document).on("click", ".visa-repeated-btn", function () {
        var repeated_el = $(this).closest(".repeated-dev-box").find(".repeated-el").eq(0);
        var repeated_el_dev = $(this).closest(".repeated-dev-box").find(".repeated-dev").eq(0);
        var clone = repeated_el.clone();
        clone.find(".visa-question").val("");
        clone.find(".visa-question-select").hide();
        repeated_el_dev.append(clone);
    });

    $(document).on("click", ".repeated-close-btn", function () {
        var elementsNumber = $(".repeated-el").length;
        if (elementsNumber <= 1) {
            alert("يجب ان يكون هناك سؤال واحد علي الاقل");
        } else {
            $(this).closest(".repeated-el").remove();
        }
    });

    $(document).on("change", ".visa-question-type", function () {
        var el = $(this);
        if (el.val() == "select") {
            el.parent().find(".visa-question-select").show();
        } else {
            el.parent().find(".visa-question-select").hide();
        }
    });




    // for rating only
    $('.rating-read-only').raty({
        readOnly: function() {
          return true;
        }
      });
    
    

      // data table and sortable
      $(function () {
        $("#table").DataTable();
    
        $( ".sortable" ).sortable({
          items: "tr",
          cursor: 'move',
          opacity: 0.6,
          update: function() {
              sendOrderToServer();
          }
        });
    
        function sendOrderToServer() {
          var order = [];
          var token = $('meta[name="csrf-token"]').attr('content');
          $('tr.row1').each(function(index,element) {
            order.push({
              id: $(this).attr('data-id'),
              position: index+1
            });
          });
    
          $.ajax({
            type: "POST", 
            dataType: "json", 
            url: "/dashboard/countries-sortable",
                data: {
              order: order,
              _token: token
            },
            success: function(response) {
                if (response.status == "success") {
                  console.log(response);
                } else {
                  console.log(response);
                }
            }
          });
        }
      });
    



})(window);
