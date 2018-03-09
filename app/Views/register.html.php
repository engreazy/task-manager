<form class="form" method="POST" action="">
  <ul>
    <li><span class="<?=isset($class)?htmlspecialchars($class):''; ?>">
        <?=isset($msg)?htmlspecialchars($msg):''; ?></span>
    </li>
    <li><input type="hidden" name="id" value="<?=isset($id)?htmlspecialchars($id):''; ?>"></li>
    <li>
        <label>username:</label>
        <input type="text" name="name" value="<?=isset($name)?htmlspecialchars($name):''; ?>">
    </li>
    <li>
        <label>email:</label>
        <input type="text" name="email" placeholder="example@doe.com" value="<?=isset($email)?htmlspecialchars($email):''; ?>">
    </li>
    <li>
        <label>password</label>
        <input type="text" name="password" value="<?=isset($password)?htmlspecialchars($password):''; ?>" >
    </li>
    <li>
        <input type="submit" value="Register Account"/>
    </li>
  </ul>
</form>
