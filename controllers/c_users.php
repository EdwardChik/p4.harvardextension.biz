<?php
class users_controller extends base_controller {

    public function index() {
        echo "This is the index page";
    }


    public function signup($error = NULL) {
        # Setup view
            $this->template->content = View::instance('v_users_signup');
            $this->template->title   = "Sign Up for Woof Woof Woof";

            # Pass data to the view
            $this->template->content->error = $error;

        # Render template
            echo $this->template;
    }


    public function p_signup() {
        # checks if entered e-mail address already exists in users table
        $q = "SELECT user_id
            FROM users 
            WHERE email = '".$_POST['email']."'";            

        # Sanitizes the user entered data to prevent attacks (such as SQL injection)    
        $user_id = DB::instance(DB_NAME)->select_row($q);
    
        # If we don't have a user_id match, that means this e-mail address is available
        if(!$user_id) {

            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $email = $_POST['email'];
            $location = $_POST['location'];
            $biography = $_POST['biography'];
            $password = $_POST['password'];

            # validation of form completion
            if(!$first_name || !$last_name || !$email || !$location || !$biography || !$password) {

                # Send user back to the signup page
                Router::redirect("/users/signup/error");

            } else {

                # More data we want stored with the user
                $_POST['created']  = Time::now();
                $_POST['modified'] = Time::now();

                # Encrypt the password  
                $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

                # Create an encrypted token via their email address and a random string
                $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

                # Create an encrypted verification token via their email address and a random string
                # $_POST['email_verify'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

                # Initializes status as pending
                # $_POST['status'] = "pending";

                # Insert this user into the database
                $user_id = DB::instance(DB_NAME)->insert('users', $_POST);

                # Prepare the data array to be inserted
                $data = Array(
                    "created" => Time::now(),
                    "user_id" => $user_id,
                    "user_id_followed" => $user_id
                    );

                # Do the insert
                DB::instance(DB_NAME)->insert('users_users', $data);


                # Build a multi-dimension array of recipients of this email
                # $to[] = Array("name" => $_POST['first_name']." ".$_POST['last_name'], "email" => $_POST['email']);

                # Build a single-dimension array of who this email is coming from
                # note it's using the constants we set in the configuration above)
                # $from = Array("name" => APP_NAME, "email" => APP_EMAIL);

                # Subject
                # $subject = "Welcome to Woof Woof Woof!";

                # You can set the body as just a string of text
                # $body = "Hi ".$_POST['first_name']." ".$_POST['last_name'].", this is just a message to confirm your registration at Woof Woof Woof. Now that you have signed up, you're almost ready to woof with your friends! Your verification code is: ".$_POST['email_verify'];

                # With everything set, send the email
                # $email = Email::send($to, $from, $subject, $body, true);

                # Send them to the main page - or wherver you want them to go
                Router::redirect("/");

            }

        } else {

            # Send them back to the signup page
            Router::redirect("/users/signup/error");
        }

    }




/*    public function signup_verify() {
        # Setup view
            $this->template->content = View::instance('v_users_signup_verify');
            $this->template->title   = "Verify Account for Woof Woof Woof";

        # Render template
            echo $this->template;
    }

    public function p_signup_verify() {
        # checks if entered e-mail address already exists in users table
        $q = "SELECT user_id
            FROM users
            WHERE email_verify = ".$_POST['email_verify'];

        # Sanitizes the user entered data to prevent attacks (such as SQL injection)    
        $user_id = DB::instance(DB_NAME)->select_row($q);
    
        # If there is a user_id match, set the account status to active
        if($user_id) {

            $where_condition = "WHERE user_id = ".$user_id;

            # update the account status time for the user
            DB::instance(DB_NAME)->update_row('users', Array("status" => "active"), $where_condition);


            # Build a multi-dimension array of recipients of this email
            $to[] = Array("name" => $this->user->first_name." ".$this->user->last_name, "email" => $this->user->email);

            # Build a single-dimension array of who this email is coming from
            # note it's using the constants we set in the configuration above)
            $from = Array("name" => APP_NAME, "email" => APP_EMAIL);

            # Subject
            $subject = "Your Woof Woof Woof Account is Verified!";

            # You can set the body as just a string of text
            $body = "Hi ".$_POST['first_name']." ".$_POST['last_name'].", thank you for verifying your account with Woof Woof Woof! We are thrilled to have you with us, go ahead and start woofing with your friends!"];

            # With everything set, send the email
            $email = Email::send($to, $from, $subject, $body, true); 

            # Send them to the main page - or wherver you want them to go
            Router::redirect("/");

        } else {
            echo "This verification code was not found.";

            # Send them back to the signup page
            Router::redirect("/users/signup");
        }

    } */




    public function login($error = NULL) {
        # Set up the view
        $this->template->content = View::instance("v_users_login");
        $this->template->title   = "Login to Woof Woof Woof";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render the view
        echo $this->template;
    }


    public function p_login() {
        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token
            FROM users 
            WHERE email = '".$_POST['email']."' 
            AND password = '".$_POST['password']."'";

        $token = DB::instance(DB_NAME)->select_field($q);

        # If we didn't find a matching token in the database, it means login failed
        if(!$token) {

            # Send them back to the login page
            Router::redirect("/users/login/error");

        # But if we did, login succeeded! 
        # } elseif (isset{$token) AND ) {
        #   # code...
        } else {

            $status = "SELECT status
                FROM users 
                WHERE email = '".$_POST['email']."' 
                AND password = '".$_POST['password']."'";

            # if a match for the token is found
            if($status == 'pending') {
                # ask user to try verification again
                echo "You must verify your account before logging in, <a href='/users/verify'>click here</a> to try again.";

            } else {
                /* 
                Store this token in a cookie using setcookie()
                Important Note: *Nothing* else can echo to the page before setcookie is called
                Not even one single white space.
                param 1 = name of the cookie
                param 2 = the value of the cookie
                param 3 = when to expire
                param 4 = the path of the cookie (a single forward slash sets it for the entire domain)
                */
                setcookie("token", $token, strtotime('+1 year'), '/');

                # store current time
                $current_time = Time::now();

                # locates user_id for row in users that matched authorization token
                $user = "SELECT user_id
                    FROM users 
                    WHERE email = '".$_POST['email']."' 
                    AND password = '".$_POST['password']."'";

                $user_id = DB::instance(DB_NAME)->select_field($user);    

                # update the last_login time for the user
                $update = DB::instance(DB_NAME)->update_row('users', Array("last_login" => $current_time), "WHERE user_id = ".$user_id);

                # Send them to the main page - or wherver you want them to go
                Router::redirect("/");

            }
        }
    }


    public function logout() {
        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/");
    }


    public function profile() {
        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect('/users/login');
        }

        # If they weren't redirected away, continue:

        # Setup view
        $this->template->content = View::instance('v_users_profile');
        $this->template->title   = "Profile for ".$this->user->first_name;

        # Render template
        echo $this->template;
    }


    public function profile_edit() {
        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # store current time
        $_POST['modified'] = Time::now();

        # Update this profile
        $where_condition = 'WHERE user_id = '.$_POST['user_id'];
        $update = DB::instance(DB_NAME)->update_row('users', $_POST, $where_condition);

        # Send them back
        Router::redirect("/users/profile");
    }


    public function reset() {
        # Setup view
            $this->template->content = View::instance('v_users_reset');
            $this->template->title   = "Reset Password for Woof Woof Woof";

        # Render template
            echo $this->template;
    }


    public function p_reset() {
        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Search the db for this email
        $q = "SELECT user_id 
            FROM users 
            WHERE email = '".$_POST['email']."'";
        
        $user_id = DB::instance(DB_NAME)->select_field($q);
        
        # False will indicate a user was not found for this email
        if(!$user_id) {

            # Send them back to the password reset page
            Router::redirect("/users/reset");
        } else {

            # Generate a new password; this is what we'll send in the email
            $new_password = Utils::generate_random_string();

            # Encrypt the password  
            $hashed_password = sha1(PASSWORD_SALT.$new_password);     

            # store current time
            $current_time = Time::now();
            
            # Update database with new hashed password
            $update = DB::instance(DB_NAME)->update('users', Array("password" => $hashed_password, "modified" => $current_time), "WHERE user_id = ".$user_id);

            # Success
            if($update) {
                # return $new_password;

                # Send them to the main page - or wherver you want them to go
                Router::redirect("/");

                # For now, just confirm they've signed up - 
                # You should eventually make a proper View for this
                echo "Your password has been changed to " . $new_password;
            } else 
                return false;

        }
    }

} # end of the class