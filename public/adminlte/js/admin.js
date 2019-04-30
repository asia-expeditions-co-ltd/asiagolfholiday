function readURL(input,img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            var imag = $('#'+img).attr('src', e.target.result);
            if (imag) {
           		$(this).hide();
            }else{
           		$(this).show();
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(function(){
    $("#choosImg, #blah").click(function(){
    	 $("#imgInp").click();
    });
    $("#imgInp").change(function(){
        readURL(this, 'blah');
        $("#blah").show();
    });

    $("#choosFlag, #blahFlag").click(function(){
        $("#imgFlag").click();
    });

    $("#imgFlag").change(function(){
      readURL(this, "blahFlag");
        $("#blahFlag").show();
    });

    $("#uploadSlide, #ImgShow").click(function(){
        $("#slideImg").click();
    });
    $("#slideImg").change(function(){
        readURL(this, "ImgShow");
        $("#ImgShow").show();
    });
})

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
          var filesAmount = input.files.length;
          for (i = 0; i < filesAmount; i++) {
              var reader = new FileReader();
              $(".item_Image").remove();
              reader.onload = function(event) {
                $($.parseHTML('<img class=\"item_Image\" title="Click remove this">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
              }
              reader.readAsDataURL(input.files[i]);
          }        
        }
    };

    $("#choosGallery").click( function (){
      $('#gallery').click();
    });
    
    $('#gallery').on('change', function() {
        imagesPreview(this, 'div.placeImage');
    });




});




$(document).ready(function(){
  // $(".btnSl").click(function(){
  //   $("#productList").append('<tr><td><a href="javascript:void(0)" class="choosSlide"></a><input class="addSlide form-control" type="file" name="slide[]" class="form-control"></td><td><textarea class="form-control" name="intro[]"></textarea></td><td><input type="text" name="title[]" class="form-control" placeholder="Slide Title"></td><td><a href="javascript:void(0)" class="remCF "><i class="fa fa-trash btn btn-danger"></i></a></td></tr>');
  // });
  // $("#productList").on('click','.remCF',function(){
  //     $(this).parent().parent().remove();
  // });

  // $(".choosSlide").click(function(){
  //     $(".addSlide").click();
  // });

  $(".btnEdit").click(function (){
      $("#title").val($(this).attr('data-title'));
      $("#old_image").val($(this).attr('data-img'));
      $("#ImgShow").attr('src', '/photos/share/'+$(this).attr('data-img'));
      $("#ImgShow").show();
      $("#btnPublish").val('Update');
      $("#eid").val($(this).attr('data-id'));
  });
}); 

