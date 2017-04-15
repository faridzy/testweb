$(function(){
	var boxNested = $('.wcifx-menu-nested'); 
	boxNested.nestedSortable({
				forcePlaceholderSize: true,
				handle: 'div',
				helper:	'clone',
				items: 'li',
				opacity: .6,
				placeholder: 'placeholder',
				revert: 250,
				tabSize: 25,
				tolerance: 'pointer',
				toleranceElement: '> div',
				maxLevels: 2,
				isTree: true,
				expandOnHover: 700,
				startCollapsed: false
			});
			var acc = document.getElementsByClassName("accordion");
            var i;
            $('.accordion').click(function(ev){
            	ev.preventDefault();
            	this.classList.toggle("active");
                var panel = this.nextElementSibling;
                  if (panel.style.maxHeight){
                  panel.style.maxHeight = null;
                } else {
                  panel.style.maxHeight = panel.scrollHeight + 'px';
                }
            });

			$('.expandEditor').attr('title','Click to show/hide item editor');
			$('.disclose').attr('title','Click to show/hide children');
			$('.deleteMenu').attr('title', 'Click to delete item.');
		
			boxNested.on('click' , '.disclose', function() {
				$(this).closest('li').toggleClass('mjs-nestedSortable-collapsed').toggleClass('mjs-nestedSortable-expanded');
				$(this).toggleClass('ui-icon-plusthick').toggleClass('ui-icon-minusthick');
			}).on('click' , '.expandEditor, .itemTitle', function(){
				var id = $(this).attr('data-id');
				$('#menuEdit'+id).toggle();
				$(this).toggleClass('ui-icon-triangle-1-n').toggleClass('ui-icon-triangle-1-s');
			}).on('click','.deleteMenu' , function(){
				var id = $(this).attr('data-id');
				var newItem = $(this).parents('.menuDiv').find('input[name="item_new_'+id+'"]');
				if(newItem.length == 0){
					var delEl = $('<input type="hidden" name="item_delete[]" value="'+id+'">');
					$(this).parents('.wcifx-menu-nested').append(delEl);
				}
				$('#menuItem_'+id).remove();
			});

			$('.item-add-custom').click(function(ev){
				ev.preventDefault();
				var myForm	= $(this).parents('form');
				var myData 	= myForm.serialize();
					myData += '&type=custom&item_id=' + tempItemId();
				myAjax(ADMIN_URL+'/settings/ajax-menu-item-add' , myData).done(function(res){
					if(res.success){
						boxNested.append(res.data)
						$(".wcifx-change-lang").trigger('change');
						myForm.trigger('reset');
					}
				}).fail(function(err){
					console.log(err.responseText)
				});
			});
			$(".item-add-page").click(function(ev){
				ev.preventDefault();
				var myForm	= $(this).parents('form');
				var myData 	= myForm.serialize();
					myData += '&type=page&item_id=' + tempItemId();
				myAjax(ADMIN_URL+'/settings/ajax-menu-item-add' , myData).done(function(res){
					if(res.success){
						boxNested.append(res.data)
						$(".wcifx-change-lang").trigger('change');
						myForm.trigger('reset');
					}
				}).fail(function(err){
					console.log(err.responseText)
				});
			});

			$('#save-menu').click(function(ev){
				ev.preventDefault();
				arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
				var postData = [];

				$.each(arraied , function(k , v){
					if(v.item_id != null){
						var itemData = {'item_id':v.item_id , 'parent_id':v.parent_id}; 
						postData.push(itemData);
					}
				});
				$("input[name='menu_data']").val(JSON.stringify(postData));

				$('#btn-menu-save').trigger('click');
			});
			function tempItemId(){
				var arraied = $('ol.sortable').nestedSortable('toArray', {startDepthCount: 0});
				var listId 	= [];
				$.each(arraied , function(k , v){
					listId.push(v.item_id);
				});
				if(listId.length >0){
					return parseInt(Math.max.apply(Math,listId)) + 1;
				}else{
					return 1;
				}
			}

});