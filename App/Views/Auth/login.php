<h1>Login</h1>
<style>
    h3 {
        color: red;
    }
</style>
<?php 
if (isset($_SESSION['messages'])){
    echo '<h3>' . $_SESSION['messages'] . '</h3>';
}

?>
<form action="/loginu" method="POST">
    <input type="email" name="email" placeholder="Email: ">
    <input type="password" name="password" placeholder="Password: ">
    <input type="submit" name="ok" value="Login">
</form>