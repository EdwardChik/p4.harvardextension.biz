<!-- form to check entered verification key against stored value in databaes for this user -->
<form method='POST' action='/users/p_signup_verify'>

    Enter your verification code here: <br>
    <input type='text' name='email_verify'>
    <br><br>

    <button type="submit" class="btn btn-default navbar-btn">Verify E-mail</button>

</form>