<div><span class="<?=htmlspecialchars($variables['class']); ?>">
    <?=htmlspecialchars($variables['msg']); ?></span>
</div>
<form method="post" action="" class="form">
  <ul>
    <li>
      <label for="email">Your email address</label>
      <input type="text" id="email" name="email">
    </li>
    <li>
      <label for="password">Your password</label>
      <input type="password" id="password" name="password">
    </li>
    <li>
      <input type="submit" name="login" value="Log in">
    </li>
  </ul>
</form>
<div class="home">
<p>Don't have an account? <a href="?route=user/register">Click here to register an account</a></p>
</div>