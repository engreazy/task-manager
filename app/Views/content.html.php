<article class="tasklist">
  <ul id="result">
  <?php foreach ($todo as $item): ?>
      <li>
      <div class="pin"></div>
        <div><?=$item->getUser()->name;?></div>
        <!--h3>Task <?= $item->id?></h3-->
        <h4><?=$item->task ?></h4>
        <div><?=$item->description?></div>
        <div>Due Date</div>
        <div><?=$item->date?></div>
        <?php if ($user): ?>
        <?php if($item->user_id === $user->id || $user->hasPermission(\Models\Entities\User::EDIT_TODO)): ?>
          <div class="button" >
            <a href="?route=todo/edit&id=<?= $item->id?>">edit</a> &nbsp;&nbsp;
              <?php endif; ?>
            <?php if ($user->id === $item->user_id || $user->hasPermission(\Models\Entities\User::DELETE_TODO)): ?>
            <button class="action" value="<?= $item->id?>">delete</button>
          </div>
        <?php endif; ?>
        <?php endif; ?>
        </li>
  <?php endforeach; ?>
  </ul>
  <div class="modal">
    <div class="modal-content">
      <p>Delete Entry</p>
      <span class="close">X</span>
      <p>Are you Sure you want to delete this entry?</p>
      <form action="?route=todo/delete" method="post" id="deleteEntry">
        <input type="hidden" name="id" value="" id="delete">
        <input type="submit" value="Delete">
        <button type="button" id="cancel">Cancel</button>
      </form>
    </div>
  </div>
</article>
<?php
//calculate the number of pages
$numPages = ceil($totalTask/10);
?>
<input type="hidden" id="total" value="<?=$numPages ?>"/>
<input type="hidden" id="current" value="<?=$currentPage ?>"/>
<div id="paginationContainer">

Select page:
<a id="prev" style="padding: 0.5em;cursor: pointer;">-previous</a>
<a  id="next" style="padding: 0.5em;cursor: pointer;">next>></a>
</div>
<script src="js/script.js"></script>