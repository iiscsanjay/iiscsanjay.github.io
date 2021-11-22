<?php include '../view/header.php'; ?>

<div class="hbar">
        <a class="hbar-item hbar-color" href="../index.php" >Home</a>
        <a class="hbar-item hbar-color" href="../login/index.php">Login</a>
        <a class="hbar-item hbar-color" href="../contact/index.php">Contact ME</a>
</div>
<main >
    <h1>Login Page</h1>
    
    <form action="../login/" method="post" id="aligned">
        <input type="hidden" name="action" value="validate_login_info">
        
        <label>Email:</label>
        <input type="text" name="email"><br>
       
        <label>Password:</label>
        <input type="text" name="password"><br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Login"><br>
    </form>
    
</main>
<?php include '../view/footer.php'; ?>
