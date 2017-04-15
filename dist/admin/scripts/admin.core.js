function myAjax(myUrl , myData , myDataType){
    myDataType = typeof myDataType === 'undefined' ? "JSON" : myDataType;
    return $.ajax({
        method  : "POST",
        url     : myUrl,
        data    : myData,
        dataType: myDataType,
        cache   : false
    });
}
Dropzone.autoDiscover = false;
$(document).ready(function(){
    $.ajaxSetup({
        data: CSRF_DATA
    });
    $.each($(".list-sortable") , function(){
        $(this).sortable();
    });
    tinymce.init({
        selector: ".wcifx-editor",
        hidden_input: false,
        plugins : "paste,table,directionality,preview,iespell,wordcount,style",
        height : "360"
    });
    if($(".wcifx-upload").length>0){
        $.each($(".wcifx-upload"), function(){
            var dataUrl  = $(this).attr('data-url');
            var dataName = $(this).attr('data-name');
            var ths      = $(this);
            if($(this).attr('is-large') == '1'){
                var isLarge = true;
            }
            $(this).dropzone({
                url      : ADMIN_URL+"/"+dataUrl,
                params   : CSRF_DATA,
                success : function(ev , resp){
                    obj = JSON.parse(resp);
                    imgName = obj.data.size_medium;                        
                    if(isLarge){
                        imgName = obj.data.size_large;                        
                    }
                    origImg = obj.data.file_name;
                    pathImg  = obj.data.image_path;
                    fullPath  = BASE_URL+pathImg+'/'+imgName;
                    imgBox = '<div class="avatar">';
                        imgBox += '<img src="'+fullPath+'" alt="Avatar" class="img-avatar img-responsive">';
                        imgBox += '<button class="btn btn-primary btn-avatar del-img-dz">Remove Image</button>';
                        imgBox += '<input type="hidden" name="'+dataName+'" value="'+origImg+'">';
                    imgBox += '</div>';
                    ths.parent().append(imgBox);
                    ths.addClass('hidden');
                    this.removeFile(ev);
                },
                error : function(err){
                },
                sending :function(file, xhr, formData) {
                    formData.append(CSRF_NAME,CSRF_VALUE);
                }
            });
        });
        $(".form-group").delegate('.del-img-dz', 'click', function(e){
            e.preventDefault();
            $(this).parent().siblings().removeClass('hidden');
            $(this).parent().remove();
        });
    }
});