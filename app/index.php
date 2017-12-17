<?php
   include ('config.php');
   session_start();

   if(isset($_SESSION['login_user'])){
       if($_SESSION['login_role'] == "Student"){
             header("location: student/dashboard/");
         } else if($_SESSION['login_role'] == "Instructor"){
             //header("location: Instructor/home.php");
           header("location: instructor/home.php");
         }
   }

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
       
      $sql = "SELECT u.userID, u.firstName, u.lastName, r.role FROM user u
        JOIN user_role r ON u.userID = r.userID
        WHERE u.username = '$myusername' and u.password = '$mypassword'";
       
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         $_SESSION['login_userID'] = $row['userID'];
         $_SESSION['login_role'] = $row['role'];
         $_SESSION['login_fName'] = $row['firstName'];
         $_SESSION['login_lName'] = $row['lastName'];
         
         if($_SESSION['login_role'] == "Student"){
             header("location: student/dashboard/");
         } else if($_SESSION['login_role'] == "Instructor"){
             // header("location: instructor/home.php");
           header("location: instructor/home.php");
         }
         
      }else {
         $error = "Your Username or Password is invalid";
      }
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CIS 101 Portal: Log In</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="/stylesheets/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
        <script type="text/javascript">
          var auth2 = auth2 || {};

          (function() {
            var po = document.createElement('script');
            po.type = 'text/javascript'; po.async = true;
            po.src = 'https://plus.google.com/js/client:plusone.js?onload=startApp';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(po, s);
          })();
          </script>
    </head>
    
<body class="login-container">

   <div class="top-nav">
     <div>
        <img src="/assets/Pace_logo.png">
        <h2>Introduction to <br />Computing</h2>
    </div>
  </div>
    

  <div class="login-container--main">
    
    <div class="login-form">

        <div class="login-form--sign-links">
<!--
          <a class="login-button" href="#">Sign up</a>
-->
        
          <a class="login-button active" href="#">Sign In</a>
        </div>

      <div class="login-form--content active">
        
        <h2>Log Into Your Account</h2>

        <form action = "" method = "post">

        <input type="text" placeholder="PACE UNIVERSITY ID" name="username" required>
        <input type="password" placeholder="PASSWORD" name="password" required>

        <br />

        <button id="sub" type="submit" class="button button--teal">Sign In</button>

      </form>

        <hr />

        <p>Or sign in using one of these other services:</p>

        <div class="login-form--social">
          
          <div class="login-form--social__button">
            <button onClick="signInClick()">
              <img src="/assets/signin/google-logo.png" > Continue with Google
            </button>
          </div>

        </div>

      </div>
    </div>
  </div>
     <div id="authOps" style="display:none;text-align: -webkit-center;padding-top:6%;">
        <button id="disconnect" style="padding-top:40px;">Disconnect</button>
      </div>
    
    <!-- Google Authentication --->
 <script type="text/javascript">
   var helper = (function() {
   var authResult = undefined;

  return {
    /**
     * Hides the sign-in button and connects the server-side app after
     * the user successfully signs in.
     *
     * @param {Object} authResult An Object which contains the access token and
     *   other authentication information.
     */
    onSignInCallback: function(authResult) {
      $('#authResult').html('Auth Result:<br/>');
      for (var field in authResult) {
        $('#authResult').append(' ' + field + ': ' + authResult[field] + '<br/>');
      }
      if (authResult['access_token']) {
        // The user is signed in
        this.authResult = authResult;

        // After we load the Google+ API, render the profile data from Google+.
        gapi.client.load('plus','v1',this.renderProfile);

        // After we load the profile, retrieve the list of activities visible
        // to this app, server-side.
        helper.activities();
      } else if (authResult['error']) {
        // There was an error, which means the user is not signed in.
        // As an example, you can troubleshoot by writing to the console:
        console.log('There was an error: ' + authResult['error']);
        $('#authResult').append('Logged out');
        $('#authOps').hide('slow');
        $('#gConnect').show();
      }
    },
    /**
     * Retrieves and renders the authenticated user's Google+ profile.
     */
    renderProfile: function() {
      var request = gapi.client.plus.people.get( {'userId' : 'me'} );
      request.execute(function(profile) {
          $('#profile').empty();
          if (profile.error) {
            $('#profile').append(profile.error);
            return;
          }
          $('#profile').append(
              $('<p>Hello ' + profile.displayName + '!<br />Email ID: ' +
              profile.emails[0].value + '</p>'));
         var reauthorize = profile.emails[0].value;
              
          $.post('googleAuth.php', {email:profile.emails[0].value, id: profile.id},
                function(data){
                  if(data == 'Student'){
                      window.location.href = "/student/dashboard/";
                  } else if (data == 'Instructor'){
                       window.location.href = "/instructor/home.php";
                  }else{
                      window.alert("Invalid credentials!");
                  }
                });
        });
        
      $('#authOps').show('slow');
      $('#gConnect').hide();
    },
    /**
     * Calls the server endpoint to disconnect the app for the user.
     */
    disconnectServer: function() {
      // Revoke the server tokens
      $.ajax({
        type: 'POST',
        url: $(location).attr('origin') + '/signin.php/disconnect',
        async: false,
        success: function(result) {
          console.log('revoke response: ' + result);
          $('#authOps').hide();
          $('#profile').empty();
          $('#visiblePeople').empty();
          $('#authResult').empty();
          $('#gConnect').show();
        },
        error: function(e) {
          console.log(e);
        }
      });
    },
    /**
     * Calls the server endpoint to connect the app for the user. The client
     * sends the one-time authorization code to the server and the server
     * exchanges the code for its own tokens to use for offline API access.
     * For more information, see:
     *   https://developers.google.com/+/web/signin/server-side-flow
     */
    connectServer: function(code) {
      $.ajax({
        type: 'POST',
        url: $(location).attr('origin') + '/signin.php/connect?state=<?php echo $state ?>',
        contentType: 'application/octet-stream; charset=utf-8',
        success: function(result) {
          console.log(result);
          helper.activities();
          onSignInCallback(auth2.currentUser.get().getAuthResponse());
        },
        processData: false,
        data: code
      });
    },
    /**
     * Calls the server endpoint to get the list of activities visible to this
     * app.
     * @param success Callback called on success.
     * @param failure Callback called on error.
     */
    activities: function(success, failure) {
      success = success || function(result) { helper.appendActivity(result); };
      $.ajax({
        type: 'GET',
        url: $(location).attr('origin') + '/signin.php/activities',
        contentType: 'application/octet-stream; charset=utf-8',
        success: success,
        error: failure,
        processData: false
      });
    },
    /**
     * Displays visible People retrieved from server.
     *
     * @param {Object} activities A list of Google+ activity resources.
     */
    appendActivity: function(activities) {
      $('#activities').empty();

      $('#activities').append('Number of activities retrieved: ' +
          activities.items.length + '<br/>');
      for (var activityIndex in activities.items) {
        activity = activities.items[activityIndex];
        $('#activities').append('<hr>' + activity.object.content + '<br/>');
      }
    },
  };
})();

    /**
     * Perform jQuery initialization and check to ensure that you updated your
     * client ID.
     */
    $(document).ready(function() {
      $('#disconnect').click(helper.disconnectServer);
      if ($('[data-clientid="967888206440-iar7bmcsk8bkctnul9518igotevdmchp.apps.googleusercontent.com"]').length > 0) {
        alert('This sample requires your OAuth credentials (client ID) ' +
            'from the Google APIs console:\n' +
            '    https://code.google.com/apis/console/#:access\n\n' +
            'Find and replace YOUR_CLIENT_ID with your client ID and ' +
            'YOUR_CLIENT_SECRET with your client secret in the project sources.'
        );
      }
    });

    /**
     * Called after the Google client library has loaded.
     */
    function startApp() {
      gapi.load('auth2', function(){

        // Retrieve the singleton for the GoogleAuth library and setup the client.
        gapi.auth2.init({
            client_id: '967888206440-iar7bmcsk8bkctnul9518igotevdmchp.apps.googleusercontent.com',
            cookiepolicy: 'single_host_origin',
            fetch_basic_profile: false,
    //        scope: ['https://www.googleapis.com/auth/plus.login', 'https://www.googleapis.com/auth/plus.profile.emails.read']
            scope: 'https://www.googleapis.com/auth/plus.profile.emails.read'
    //        scope: 'https://www.googleapis.com/auth/plus.login'
          }).then(function (){
                auth2 = gapi.auth2.getAuthInstance();
                auth2.then(function() {
                    var isAuthedCallback = function () {
                      onSignInCallback(auth2.currentUser.get().getAuthResponse())
                    }
                    helper.activities(isAuthedCallback);
                  });
              });
      });
    }

    /**
     * Either signs the user in or authorizes the back-end.
     */
    function signInClick() {
      var signIn = function(result) {
          auth2.signIn().then(
            function(googleUser) {
              onSignInCallback(googleUser.getAuthResponse());
            }, function(error) {
              alert(JSON.stringify(error, undefined, 2));
            });
        };

      var reauthorize = function() {
          auth2.grantOfflineAccess().then(
            function(result){
              helper.connectServer(result.code);
            });
        };

      helper.activities(signIn, reauthorize);
    }

    /**
     * Calls the helper method that handles the authentication flow.
     *
     * @param {Object} authResult An Object which contains the access token and
     *   other authentication information.
     */
    function onSignInCallback(authResult) {
      helper.onSignInCallback(authResult);
    }
</script>

</body>

</html>
    