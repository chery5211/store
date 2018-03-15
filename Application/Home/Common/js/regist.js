

	
function checkpass(){

    var a=document.getElementById('b1').value;
    var c=document.getElementById('b2');
    var b=a.length;
        

    if(b==0){
                c.innerHTML="密码不能为空";  
            }else if(b<5){
                c.innerHTML="密码不能小于6"; 
            } 
          else{
              c.innerHTML="";
          
                  return true;
            }

	}

      
function recheckpass(){
            var a=document.getElementById('b1').value;
            var d=document.getElementById('d1').value;
            var c=document.getElementById('d2');

            if (!(a==d)){
                  c.innerHTML="俩次输入的密码不一致";
            }
            else{
                  c.innerHTML=" ";
            
                  return true;
            }

}
function checkname(){
    var a=document.getElementById('c1').value;
    var c=document.getElementById('c2');

    var b=a.length;

      if (b==0){
                c.innerHTML="用户名不能为空"; 

      }else{
        c.innerHTML=" ";
       
            return true;
      }
      


}

//校验邮件
// function checkMail(){
//       var reg = /^\w+@\w+(\.\w+)+$/i;

//       return check("email",reg,"mailspan","邮件地址正确","邮件地址错误");
// }




      function checkForm(){
                        if( checkpass() && recheckpass()  && checkname() && ch() )
                        {
                    
                           return true;
                        }
                             
                        return false;
                  }

//异步验证


   function ch(){

     var name = $('input[name=username]').val();
            
            
            var data = {'name':name};
            var success = function(response){
                if(response.errno == 1){
                   $('#c2').text(response.errmsg);
                   return false;

                }else{
              
                    return true;
                }

            }
            $.post(url,data,success,"json");
   }


   //异步删除评论

   function delCom(id){

      var url=delComment;
      var cons={'id':id}
      var call=function(response){
           if(response.errno == 1){
                  alert("删除成功");
                  $('.info'+id).remove();
                }else{
                  alert("删除失败");
                }
      };

      $.post(url,cons,call,"json");
   }


//异步取消收藏

function cancel(id){
       var url=cancelUrl;
      var cons={'id':id}
       var call=function(response){
           if(response.errno == 1){
                  alert("删除成功");
                  $('#s'+id).remove();
                }else{
                  alert("删除失败");
                }
      };

      $.post(url,cons,call,"json");
}


  function save(id){
        var url=updateUrl;
        var username=$('input[name=user]').val();
        var email=$('input[name=email]').val();
        var pass=$('input[name=pass]').val();
        var cons={'username':username,'email':email,'pass':pass}
       var call=function(response){
          if(response.errno == 1){
                  alert("修改成功");
                  $('.input-text').attr("disabled",true);
                  window.reload();
                }else{
                  alert("修改失败");
                }
       }

        $.post(url,cons,call,"json");
    }
     