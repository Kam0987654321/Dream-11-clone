$(document).ready(function(){
	$("#resetpassword_btn").click(function (e){
		$.ajax({
			data : $("#resetpassword").serialize(),
			type : "post",
			url: site_url + 'website/updatePassword',
			success : function(data){
				console.log(data);
					if(data) {
					try {
                      var response = JSON.parse(data);                    
                      if(response.status == '1')
                      {                         
                          alert(response.msg);
                          window.location = site_url +'website/login';
                       } else if(response.status == '2')
	                      {  
	                          alert(response.msg);
	                      } else {
	                      	 alert(response.msg);
	                      }  
                    } catch(e) {
                     
                        alert("Something wrong"); // error in the above string (in this case, yes)!
    
                    }
                  }   
				
			} 
		})
	})

});