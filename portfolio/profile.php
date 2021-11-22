<?php include '../view/header.php'; ?>

<div class="hbar">
        <a class="hbar-item hbar-color" href="../index.php" >Home</a>
        <a class="hbar-item hbar-color" href="../investor_login/portfolio.php" >Portfolio</a>
        <a class="hbar-item hbar-color" href="../investor_login/index.php">Login</a>
        <a class="hbar-item hbar-color" href="../investor_register/index.php">Register</a>
        <a class="hbar-item hbar-color" href="../investor_contactus/index.php">Contact Us</a>
</div>

<main>
    <form action="../portfolio/index.php" method="post">
        <input type="hidden" name="action" value="logout">
        <input id="right-pos" type="submit" value="Logout">
    </form>

<h1>Welcome to investor <?php echo $investor['name']; ?></h1>
    
       
    <form action="../portfolio/index.php" method="post" id="aligned">
        <label>Name : </label> 
        <input type="text" name="name" value=<?php echo $investor['name']; ?>>
        <input type="hidden" name="id" value="<?php echo $investor['investor_id']; ?>">
        <input id="aligned_right" name="action" type="submit" value="nameUpdate">
    </form>

    <form action="../portfolio/index.php" method="post" id="aligned">
        <label>Gender : </label> 
        <input type="text" name="gender" value=<?php echo $investor['gender']; ?>>
        <input type="hidden" name="id" value="<?php echo $investor['investor_id']; ?>">
        <input id="aligned_right" name="action" type="submit" value="genderUpdate">
    </form>   

    <form action="../portfolio/index.php" method="post" id="aligned">
        <label>Email : </label> 
        <input type="text" name="email" value=<?php echo $investor['email']; ?>>
        <input type="hidden" name="id" value="<?php echo $investor['investor_id']; ?>">
        <input id="aligned_right" name="action" type="submit" value="emailUpdate">
    </form>   
    

    
    <form action="../portfolio/index.php" method="post" id="aligned">
        <label>Current Password : </label> 
        <input type="text" name="cpassword" value=<?php echo ""; ?>><br><br>
        <label>New Password : </label> 
        <input type="text" name="npassword" >
        <input type="hidden" name="password" value="<?php echo $investor['password']; ?>">
        <input type="hidden" name="id" value="<?php echo $investor['investor_id']; ?>">
        <input id="aligned_right" name="action" type="submit" value="passwordUpdate">
    </form>
  
    <form action="../portfolio/index.php" method="post" id="aligned">
        <label>Date of Birth : </label> 
        <input type="date" name="dob" value=<?php echo $investor['birth_date']; ?>>
        <input type="hidden" name="id" value="<?php echo $investor['investor_id']; ?>">
        <input id="aligned_right" name="action" type="submit" value="birthdateUpdate">
    </form>
    
    
    <br>
    <a href="../portfolio/courseinfo.php">My Courses</a>


</main>
<?php include '../view/footer.php'; ?>
