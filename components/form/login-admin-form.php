<form action="controllers/config/p_login.php" method="post">
    <div class="form-group">
        <label>Username</label>
        <input name="username" type="text" class="form-control" value="<?php if(isset($_COOKIE['username'])) { echo $_COOKIE['username']; } ?>"" placeholder="Username" required="">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" placeholder="Password" required="">
    </div>
    <div class="checkbox">
        <label class="pull-right">
            <input type="checkbox" name="ingat" value="1" <?php if(isset($_COOKIE['username'])) { ?> checked <?php } ?>> Remember Me
        </label>
    </div>
    <button name="login" type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
</form>
