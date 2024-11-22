<?php include("head.php"); ?>
<h1>Dit is de homepage</h1>
<h3>Login</h3>
<?php if (!isset($_SESSION['user'])) { ?>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <input name="naam" type="text">
        <input name="password" type="password">
        <input name="knop" type="submit">
    </form>
<?php } else { ?>
    <h3>Dit is een kop h3</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ligula quam, consectetur quis nulla a, placerat accumsan libero. Sed vel lobortis ipsum, ut porta quam. Nam et lacus eu felis fermentum interdum non eu lorem. Sed eu venenatis nisi. Proin varius tellus et quam dapibus varius. In hac habitasse platea dictumst. Pellentesque vitae rutrum lacus. Aliquam auctor nisi lacus, vitae cursus leo sollicitudin et. Aliquam luctus dapibus leo a euismod. Maecenas efficitur, libero a blandit fringilla, augue dui tempor sapien, quis faucibus arcu lacus non elit. Integer interdum sem vel aliquam consectetur. Pellentesque eget metus quis sem eleifend dapibus at efficitur est. Donec consectetur, libero tempus accumsan maximus, justo ex posuere ex, facilisis tempor augue lorem sed leo.</p>
<?php } ?>
<?php include("foot.php"); ?>