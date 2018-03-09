<?php
echo "<pre>";
//print_r($user);
echo "</pre>";
 ?>
<?php if(empty($todo->id) || $todo->user_id === $user->id || $user->hasPermission(\Models\Entities\User::DELETE_TODO)) : ?>
<form class="form" method="POST" action="">
  <ul>
    <li><span class="<?=htmlspecialchars($class); ?>">
        <?=htmlspecialchars($msg); ?></span>
    </li>
    <li><input type="hidden" name="id" value="<?=isset($todo->id)? htmlspecialchars($todo->id) :''; ?>"></li>
    <li>
      <label>Task Name:</label>
      <input type="text" name="task" value="<?=isset($todo->task)? htmlspecialchars($todo->task):''; ?>">
    </li>
    <li>
      <label>Description:</label>
      <textarea name="description"><?=isset($todo->description)? htmlspecialchars($todo->description):''; ?></textarea>
    </li>
    <li>
      <label>Date</label>
      <input type="date" name="date" placeholder="2017-01-01" value="<?=isset($todo->date)?htmlspecialchars($todo->date):''; ?>" >
    </li>
    <li>
      <label class="reminder">Reminder
          <input type="radio" name="reminder" value="1" >No
          <input type="radio" name="reminder" value="2" checked="checked">Yes
      </label>
    </li>
    <!--li>
      <p>Select categories for this Todo task: </p>
      <div class="categories">
      <?//php foreach ($categories as $category): ?>
        <input type="checkbox" name="category[]" value="<?//=$category->id?>" />
        <label><?//=$category->name?></label>
      <?//php endforeach; ?>
      </div>
    </li-->
    <li>
      <input type="submit" value="Add Task" />
    </li>
  </ul>
</form>
<?php else: ?>
<p>You may only edit Todo Task  that you posted</p>
<?php endif; ?>
