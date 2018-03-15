$(function(){




	//异步提交评论数据
	$('.sub').click(function(){
		

	
		var gid=$('input[name=goods_id]').val();
		var content=$('#content').val();
		var urls=commenturl;



		//评论内容为空时不作处理
		if (content == '') {
			return false;
		}
		//提取评论数据
		var cons = {
			"content" : content,
			"gid":gid
		};

		var call=function (data){
		
			if (data != '') {
				alert('评论成功');
				$('#content').val("");
			
			} else {
				alert('评论失败，请登录后重试...');
			}
		};

		$.post(urls,cons,call,"html");

	});


	//异步获取评论列表

	$('.getRe').click(function(){

			//清除评论列表里面的div  以免出现叠加
		$('#rinfo div').remove();
		$('#rinfo hr').remove();
		var gid=$('input[name=goods_id]').val();
		var url=getComment;
		var cons={"gid":gid};

		var call=function(data){
			 if (data) {
		
				$('#rinfo').find('h2').after(data);

			 }else{

			 }
		}

		$.post(url,cons,call,"html");
	});

	//异步删除评论



});