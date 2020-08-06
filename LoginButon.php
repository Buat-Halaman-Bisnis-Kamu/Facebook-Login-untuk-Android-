
      
    loginButton = (LoginButton) findViewById(R.id.login_button);
    loginButton.setReadPermissions("fatidelfat@gmail.com");
    // If using in a fragment
    loginButton.setFragment(this);    

    // Callback registration
    loginButton.registerCallback(callbackManager, new FacebookCallback<LoginResult>(https://facebook.com) {
        @Override
        public void onSuccess(LoginResult loginResult) {
            // App code
        }

        @Override
        public void onCancel() {
            // App code
        }

        @Override
        public void onError(FacebookException exception) {
            // App code
        }
    });
