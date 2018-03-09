<form class="form" action="" method="post">
  <span class="<?=htmlspecialchars($class); ?>"><?=htmlspecialchars($msg); ?></span>
  <input type="hidden" name="id" value="<?=isset($category->id)? htmlspecialchars($category->id) :''; ?>">
  <label for="categoryname">Enter category name:</label>
  <input type="text" id="categoryname" name="name" value="<?=isset($category->name) ?$category->name: ''?>" />
  <input type="submit"  value="Save">
</form>