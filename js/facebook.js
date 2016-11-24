(function(d){
   var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   ref.parentNode.insertBefore(js, ref);
 }(document));

window.fbAsyncInit = function() {
    FB.init({
      appId      : '104900733331053',
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    var permissions = [
      'email',
      'user_birthday',
      ].join(',');

    var fields = [
      'id',
      'name',
      'gender',
      'email',
      ].join(',');

    $('#fb-login').click(function(){    
        FB.login(function(response) { 
            if(response.authResponse) {	
                FB.api('/me', {fields: fields}, function(details) {
                    var userinfo = JSON.stringify(details, null, '\t');
                    //console.log(userinfo);
                    $.ajax({
                        type : 'post',
                        url  : 'fblogin.php',
                        data : {userdetail: userinfo},
                        success : function( data ){  
                            if( data == 'success'){
                                    top.location = 'fbdashboard.php';
                            }else{   
                                FB.logout(function(response) {});
                            }
                        }
                    });
                });	   
            }
        }, {scope: permissions});
    });
};