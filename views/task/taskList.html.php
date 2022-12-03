<div class="task-list-btns" data-task-list-btns>
  <div class="button">
    <button style="color: white; background: green;">Add</button>
  </div>
  <div class="button">
    <button style="color: white; background: red;">Close</button>
  </div>
  <div class="button">
    <a href="<?= URLROOT ?>/task/about">
      <button style="color: white; background: gray;">About</button>
    </a>
  </div>
</div>

<form action="<?= URLROOT ?>/task/addTask" class="add-task-form" method="post" data-form>
  <input type="text" placeholder="Name" name="name">
  <input type="date" placeholder="Date" name="date">

  <label for="completed">Completed</label>
  <input type="checkbox" id="completed" name="completed">
  <div class="error"><?= isset($_GET['error']) ? $_GET['error'] : '' ?></div>
  
  <input type="submit" value="Submit">
</form>

<div class="task-list">
  <?php foreach($tasks as $task): ?>
    <div class="task-item <?= $task->completed ? 'completed' : '' ?>" :class="task.completed && 'completed'">
      <a href="#">
        <strong><?= $task->name ?></strong> | <small><?= date_format(date_create($task->date), 'd/m/Y')  ?></small>
      </a>
      <div class="buttons">
        <a href="<?= URLROOT ?>/task/toggleTask/<?= $task->id ?>">
          <button class="btn-update <?= $task->completed ? 'completed-btn' : '' ?>">&#10003;</button>
        </a>
        <a href="<?= URLROOT ?>/task/deleteTask/<?= $task->id ?>" onclick="return confirm('You are going to delete this task ?')">
          <button class="btn-delete">X</button>
        </a>
      </div>
    </div>
  <?php endforeach ?>
</div>
