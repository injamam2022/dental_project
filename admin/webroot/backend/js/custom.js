var js_url = $('#js_url').val();
function catwisesubcat(id){
    $.ajax({
            type: "POST", //request type,
            url:js_url+"Productmanagement/catwisesubcat", //the page containing php script
            dataType: 'json',
            data: {scat:id},
            success: function(data){
             console.log(data);
                var content = '<option value="0">Select</option>';
               if(data.length > 0){
               for (var i=0;i<data.length;i++) {
                   content += '<option value="'+data[i].sub_catid+'">'+data[i].subcat_name+'</option>';
                }
               }
            $("#subcat_id").html(content);
            }
         });
}

function subcat_wise_subsub(id){
    $.ajax({
            type: "POST", //request type,
            url:js_url+"Productmanagement/subcat_wise_subsub", //the page containing php script
            dataType: 'json',
            data: {scat:id},
            success: function(data){
             console.log(data);
                var content = '<option value="0">Select</option>';
               if(data.length > 0){
               for (var i=0;i<data.length;i++) {
                   content += '<option value="'+data[i].super_catid+'">'+data[i].supercat_name+'</option>';
                }
               }
            $("#sub_subcat_id").html(content);
            }
         });
}