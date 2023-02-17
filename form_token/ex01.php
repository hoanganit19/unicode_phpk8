<?php
session_start();
$token = md5(uniqid());
$_SESSION['csrf_token'] = $token;
?>
<form action="login.php" method="post">
    <div>
        <input type="email" name="email" placeholder="Email..." />
    </div>
    <div>
        <input type="password" name="password" placeholder="Password..." />
    </div>
    <input type="hidden" name="_token" value="<?php echo $token; ?>">
    <button type="submit">Submit</button>
</form>

<?php