<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Adventures deals bucket list | FateCrew.com</title>

    <script src="/javascripts/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/stylesheets/redmond/jquery-ui-1.8.20.custom.css">

    <script src="/javascripts/ui/jquery.ui.core.js"></script>
    <script src="/javascripts/ui/jquery.ui.widget.js"></script>
    <script src="/javascripts/ui/jquery.ui.position.js"></script>
    <script src="/javascripts/ui/jquery.ui.tooltip.js"></script>
    <script src="/javascripts/ui/jquery.ui.datepicker.js"></script>
    <link rel="stylesheet" href="http://view.jqueryui.com/master/themes/base/jquery.ui.all.css">


    <!-- Included CSS Files -->
    <link rel="stylesheet" href="/stylesheets/foundation.css">
    <link rel="stylesheet" href="/stylesheets/app.css">
    <link rel="stylesheet" href="/stylesheets/presentation.css">
    <link href="/stylesheets/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="fb-root"></div>
    <script>
    $("#nl_yes").click(function(e) {
        e.preventDefault();
         console.log('CALLED 1');
         signUp();
         console.log('CALLED LAST');
    });
    $("#nl_no").click(function(e) {
        e.preventDefault();
      window.location = "/dock" 
    });

    function signUp(){
        console.log('CALLED 2');
        $.ajax({
            url: "/user/fackbook_newsletter",
            type: "POST",
            data: ({
                user_name: $("#username").val(response.username)
            }),

        }).done(function(output) {
            console.log('CALLED 3');
            console.log(output);
            
            //window.location = "/dock" 

        });

    }

        window.fbAsyncInit = function() {
            FB.init({
                appId: '360920813983587', // App ID
                channelUrl: '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
                status: true, // check login status
                cookie: true, // enable cookies to allow the server to access the session
                xfbml: true // parse XFBML
            });
            // Additional initialization code here
            $("#fb_login").click(function() {
                $(".form").hide();
                $(".loader").show();
                FB.login(function(response) {
                    if (response.authResponse) {
                        FB.api('/me?fields=username,first_name,last_name,email,gender,location ,birthday,id,picture', function(response) {
                            //console.log(response);
                            //alert(response.location.name);
                            //alert(response.birthday);

                            // update user name input user_name: response.username,
                            $("#username").val(response.username);
                            $.ajax({
                                url: "/user/fackbook_create",
                                type: "POST",
                                data: ({
                                    user_name: response.username,
                                    first_name: response.first_name,
                                    last_name: response.last_name,
                                    email: response.email,
                                    gender: response.gender,
                                    facebook_id: response.id,
                                    location: response.location.name,
                                    dob: response.birthday,
                                    pic: response.picture
                                }),

                            }).done(function(output) {
                                console.log(output);

                                // check if the user is in the database

                                if(output == "user exists"){
                                   window.location = "/dock" 
                                }else{ 
                                    $("#sign_up").reveal('animation:fadeAndPop');
                                }

                                
                            });
                        });
                    } else {
                        console.log('User cancelled login or did not fully authorize.');
                    }
                }, {
                    scope: 'email,user_birthday'
                });


            });
        };
        // Load the SDK Asynchronously
        (function(d) {
            var js, id = 'facebook-jssdk',
                ref = d.getElementsByTagName('script')[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement('script');
            js.id = id;
            js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js";
            ref.parentNode.insertBefore(js, ref);
        }(document));
    </script>
    <div class="logo"><img src="../../images/logo.png" width="232" height="225" />
    </div>
    <input type="hidden" id="username">
    <div id="sign_up" class="reveal-modal medium">
        <h2>Stay Informed</h2>
        <p>Would you like stay up to date with the lates offers?</p>
        <?=anchor( "/", "OK ", "class='success button large' id='nl_yes'")?>
            <?=anchor( "/", "No thanks", "id='nl_no'")?>

                <a class="close-reveal-modal">&#215;</a>
    </div>
    <img class="loader" src="/images/ajax-loader.gif" style="display:none;" />
    <div class="form">

        <? if($this->session->flashdata('msg')){?>
        <div class="alert-box alert">
            <?php echo $this->session->flashdata('msg'); ?></div>
        <? } ?>
        <div class='large secondary button strech' id='fb_login'><img src='../../images/facebook_login_icon.jpg' width='23' height='22' />Login with Facebook »</div>

        <?=anchor( "/register", "Or, classic registration »", "class='large secondary button strech'")?>
            <div class="login_form">
                <?php echo form_open( 'user/login'); ?>
                <label for="email">Email:</label>
                <input name="email" type="text" />
                <label for="pwd">Password:</label>
                <input name="pwd" type="password" />
                <?php echo form_submit( 'submit', 'Login', 'class="tiny button"'); ?>
                <?=anchor( "/", "forgotten password")?>
                    <?php echo form_close(); ?>
            </div>

            <?=anchor( "/", "Back to home page »", "class='large secondary button strech'")?>
    </div>
    <script src="/javascripts/modernizr.foundation.js"></script>
    <script src="/javascripts/foundation.js"></script>
    <script src="/javascripts/jquery.foundation.reveal.js"></script>
    <script src="/javascripts/app.js"></script>
</body>

</html>