<?php
class users_controller extends base_controller {

    # displays the default index page
    public function index() {
        echo "This is the index page";
    }


    # loads signup page for a new user
    public function signup($error = NULL) {
        # Setup view
            $this->template->content = View::instance('v_users_signup');
            $this->template->title   = "Woof Gaming: Sign Up";

            # Pass data to the view
            $this->template->content->error = $error;

        # Render template
            echo $this->template;
    }


    # creates new user
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



                # logs user in automatically
                setcookie("token", $_POST['token'], strtotime('+1 year'), '/');

                # Send them to the main page - or wherever you want them to go
                Router::redirect("/");


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


    # logs the user into the app
    public function login($error = NULL) {
        # Set up the view
        $this->template->content = View::instance("v_users_login");
        $this->template->title   = "Woof Gaming: Login";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render the view
        echo $this->template;
    }


    # authenticates login details against the database
    public function p_login() {
        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Hash submitted password so we can compare it against one in the db
        $_POST['login_password'] = sha1(PASSWORD_SALT.$_POST['login_password']);

        # Search the db for this email and password
        # Retrieve the token if it's available
        $q = "SELECT token
            FROM users 
            WHERE email = '".$_POST['login_email']."' 
            AND password = '".$_POST['login_password']."'";

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
                WHERE email = '".$_POST['login_email']."' 
                AND password = '".$_POST['login_password']."'";

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
                    WHERE email = '".$_POST['login_email']."' 
                    AND password = '".$_POST['login_password']."'";

                $user_id = DB::instance(DB_NAME)->select_field($user);    

                # update the last_login time for the user
                $update = DB::instance(DB_NAME)->update_row('users', Array("last_login" => $current_time), "WHERE user_id = ".$user_id);

                # Send them to the main page - or wherever you want them to go
                Router::redirect("/");

            }
        }
    }


    # logs user out of the app
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


    # displays the user's profile
    public function profile() {
        # If user is blank, they're not logged in; redirect them to the login page
        if(!$this->user) {
            Router::redirect('/users/login');
        }

        # If they weren't redirected away, continue:

        # Setup view
        $this->template->content = View::instance('v_users_profile');
        $this->template->title   = "Woof Gaming: Profile for ".$this->user->first_name;

        # Render template
        echo $this->template;
    }


    # allows users to change profile details
    public function profile_edit() {
        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $location = $_POST['location'];
        $biography = $_POST['biography'];

        # validation of form completion
        if(!$first_name || !$last_name || !$location || !$biography) {

            # Send user back to the profile page
            Router::redirect("/users/profile/error");

        } else {

            # store current time
            $_POST['modified'] = Time::now();

            # Update this profile
            $where_condition = 'WHERE user_id = '.$_POST['user_id'];
            $update = DB::instance(DB_NAME)->update_row('users', $_POST, $where_condition);

            # Send them back
            Router::redirect("/users/profile");
        }

    }


    # allows user to reset their password
    public function reset() {
        # Setup view
        $this->template->content = View::instance('v_users_reset');
        $this->template->title   = "Woof Gaming: Reset Password";

        # Render template
        echo $this->template;
    }


    # resets password in users database
    public function p_reset() {
        # Sanitize the user entered data to prevent any funny-business (re: SQL Injection Attacks)
        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        # Encrypt the password  
        $hashed_password = sha1(PASSWORD_SALT.$_POST['password']);

        # Search the db for this email
        $q = "SELECT user_id 
            FROM users 
            WHERE email = '".$_POST['email']."'
            AND password = '".$hashed_password."'";
        
        $user_id = DB::instance(DB_NAME)->select_field($q);
        
        # False will indicate a user was not found for this email
        if(!$user_id || ($_POST['password'] != $_POST['password_confirm']) || ($_POST['new_password'] != $_POST['new_password_confirm'])) {

            # Send them back to the password reset page
            Router::redirect("/users/reset/error");

        } else {

            # Encrypt the password  
            $hashed_new_password = sha1(PASSWORD_SALT.$_POST['new_password']);

            # store current time
            $current_time = Time::now();
            
            # Update database with new hashed password
            $update = DB::instance(DB_NAME)->update('users', Array("password" => $hashed_new_password, "modified" => $current_time), "WHERE user_id = ".$user_id);

            # Success
            if($update) {

                # Create an encrypted token via their email address and a random string
                $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

                # creates replacement cookie for user
                setcookie("token", $_POST['token'], strtotime('+1 year'), '/');

                # Send them to the main page - or wherver you want them to go
                Router::redirect("/users/profile");

                # For now, just confirm they've signed up - 
                # You should eventually make a proper View for this
                echo "Your password has been changed to " . $new_password;

            } else  {           
                return false;
            }
        }
    }


    # loads game for players
    public function game() {
        # Setup view
            $this->template->content = View::instance('v_users_game');
            $this->template->title   = "Woof Gaming: Match Songs with Classic Games!";

            # Pass data to the view
            $this->template->content->error = $error;

        # Render template
            echo $this->template;
    }


    # updates score for players
    public function addScore() {

        # locates games played for the logged in user
        $games_played = "SELECT games_played
            FROM users 
            WHERE user_id = '.$this->user->user_id";

        # increases user tally of games played
        $games_played++;

        # update the last_login time for the user
        $update = DB::instance(DB_NAME)->update_row('users', Array("games_played" => $games_played), "WHERE user_id = ".$user_id);

        # Send them back to the game page
        Router::redirect("/users/game");
    }


    public function leaderboard() {

        # Set up the View
        $this->template->content = View::instance('v_users_leaderboard');
        $this->template->title   = "Woof Gaming: Classic Games Leaderboard!";

        # Build the query to get all the users
        $q = "SELECT *
            FROM users";

        # Execute the query to get all the users. 
        # Store the result array in the variable $users
        $users = DB::instance(DB_NAME)->select_rows($q);

        # Pass data (users and connections) to the view
        $this->template->content->users       = $users;
        $this->template->content->connections = $connections;

        # Render the view
        echo $this->template;
    }


    # posts a new score to the leaderboard
    public function p_leaderboard() {

        # Associate this post with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  = Time::now();

        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('score', $_POST);

        # Send them back
        Router::redirect("/users/game");
    }


} # end of the class