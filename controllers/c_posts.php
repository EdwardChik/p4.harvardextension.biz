<?php
class posts_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            die("<!DOCTYPE html><html><head><meta charset='utf-8'><title>Woof Woof Woof</title></head><body>Woof Woof Woof requires registration for access, please <a href='/users/login'>login</a> to proceed.</body></html>");
        }
    }

    # add new post
    public function add() {

        # Setup view
        $this->template->content = View::instance('v_posts_add');
        $this->template->title   = "New Woof";

        # Render template
        echo $this->template;
    }

    # processes adding of new post, including instantiating data values for fields not specified by the user such as timestamps
    public function p_add() {

        # Associate this post with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Insert
        # Note we didn't have to sanitize any of the $_POST data because we're using the insert method which does it for us
        DB::instance(DB_NAME)->insert('posts', $_POST);

        # increment post total by 1
        $post_total = $this->user->post_total + 1;

        $where_condition = 'WHERE user_id = '.$_POST['user_id'];

        # update post total for this user in database
        DB::instance(DB_NAME)->update_row('users', Array("post_total" => $post_total), $where_condition);

        # Send them back
        Router::redirect("/posts");
    }

    # deletes a post
    public function delete($post_id) {

        # Delete this post
        $where_condition = 'WHERE post_id = '.$post_id;
        DB::instance(DB_NAME)->delete('posts', $where_condition);

        # decrement post total by 1
        $post_total = $this->user->post_total - 1;
        $user_id = $this->user->user_id;

        $where_condition = 'WHERE user_id = '.$user_id;

        # update post total for this user in database
        DB::instance(DB_NAME)->update('users', Array("post_total" => $post_total), $where_condition);

        # Send them back
        Router::redirect("/posts");
    }

    # shows main overview of posts
    public function index() {

        # Set up the View
        $this->template->content = View::instance('v_posts_index');
        $this->template->title   = "Your Followed Posts";

        # Query
        $q = 'SELECT 
                posts.content,
                posts.created,
                posts.post_id,
                posts.user_id AS post_user_id,
                users_users.user_id AS follower_id,
                users.first_name,
                users.last_name
            FROM posts
            INNER JOIN users_users 
                ON posts.user_id = users_users.user_id_followed
            INNER JOIN users 
                ON posts.user_id = users.user_id
            WHERE users_users.user_id = '.$this->user->user_id;

        # Run the query, store the results in the variable $posts
        $posts = DB::instance(DB_NAME)->select_rows($q);

        # Reverse order to display newest posts first
        $posts = array_reverse($posts, true);

        # Pass data to the View
        $this->template->content->posts = $posts;

        # Render the View
        echo $this->template;
    }

    # lists all registered users from the database
    public function users() {

        # Set up the View
        $this->template->content = View::instance("v_posts_users");
        $this->template->title   = "All Users";

        # Build the query to get all the users
        $q = "SELECT *
            FROM users";

        # Execute the query to get all the users. 
        # Store the result array in the variable $users
        $users = DB::instance(DB_NAME)->select_rows($q);

        # Build the query to figure out what connections does this user already have? 
        # I.e. who are they following
        $q = "SELECT * 
            FROM users_users
            WHERE user_id = ".$this->user->user_id;

        # Execute this query with the select_array method
        # select_array will return our results in an array and use the "users_id_followed" field as the index.
        # This will come in handy when we get to the view
        # Store our results (an array) in the variable $connections
        $connections = DB::instance(DB_NAME)->select_array($q, 'user_id_followed');

        # Pass data (users and connections) to the view
        $this->template->content->users       = $users;
        $this->template->content->connections = $connections;

        # Render the view
        echo $this->template;
    }
    
    # follows a user, will display their posts for logged in user
    public function follow($user_id_followed) {

        # Prepare the data array to be inserted
        $data = Array(
            "created" => Time::now(),
            "user_id" => $this->user->user_id,
            "user_id_followed" => $user_id_followed
            );

        # Do the insert
        DB::instance(DB_NAME)->insert('users_users', $data);

        # Send them back
        Router::redirect("/posts/users");
    }

    # unfollows a user, will not display their posts for logged in user
    public function unfollow($user_id_followed) {

        # Delete this connection
        $where_condition = 'WHERE user_id = '.$this->user->user_id.' AND user_id_followed = '.$user_id_followed;
        DB::instance(DB_NAME)->delete('users_users', $where_condition);

        # Send them back
        Router::redirect("/posts/users");
    }

} # end of the class