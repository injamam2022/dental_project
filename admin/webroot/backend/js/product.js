 //var base_url = $("#base_url").val();


    
  function subcat()
  {  var base_url = $("#base_url").val();
     var sub_cat=$('#pro_sub_cat_id').val();
    
      var arr=sub_cat.split(',');
      var scat=arr[1];
      //alert(scat);
      $('#cat_id').html('<option selected disabled value="0">Select Category</option>');
        $.ajax({
                type: "POST",
                url: base_url+'Productmanagement/cat',
                dataType: "json",
                data: {scat,scat},
                success: function(data) {
                console.log(data);
                //var res = JSON.stringify(data);
              
               for (var i=0;i<data.length;i++) {
                 $('#cat_id').append('<option value="'+data[i].cat_name+','+data[i].cat_id+'">'+data[i].cat_name+'</option>');
                 
                }

                }

            });
  }

  
