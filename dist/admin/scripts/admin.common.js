$(document).ready(function(){
	var selectLang = $(".wcifx-change-lang");
	$(".input-lang").not(".id").hide();
	selectLang.change(function(){
		var langID = $(this).val();
		$(".input-lang").hide();
		$(".input-lang." + langID).not(".wcifx-editor").show();
		if($(".wcifx-editor").length >0 ){ //tinymce editor
			var editor_id = $(".wcifx-editor." + langID).attr('id');
			$(".mce-tinymce.mce-container").hide();
			$(".wcifx-editor." + langID).prev('.mce-container').show();
		}
	});

	if($('.wcifx-datatable').length>0){
        $.each($('.wcifx-datatable'), function(){
            var func = $(this).attr('data-controller');
            var meth = $(this).attr('data-method');
            var dataTbl = $(this).dataTable({
                "processing" : true,
                'serverSide' : true,
                'aaSorting'  :[],
                'ajax' : {
                    'url' : ADMIN_URL+"/"+func+"/"+meth,
                    'type': 'POST',
                    'data': CSRF_DATA
                    }
            });
        });            
    }
});    