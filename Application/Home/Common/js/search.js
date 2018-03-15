$(function(){

	//异步搜索

	$('.se').click(function(){

		 var content=$('input[name=keyword]').val();
		//评论内容为空时不作处理
		if (content == '') {
			alert('商品名称为空');
			return false;	
		}

		
        
		  var url=searchUrl+'/key/'+content;
		
	
		  window.location.href=url;
		
	});


});