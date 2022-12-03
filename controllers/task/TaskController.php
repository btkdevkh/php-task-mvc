<?php

require_once('controllers/Controller.php');
require_once('models/task/TaskModel.php');

class TaskController extends Controller {
  protected $taskModel;

  public function __construct() {
    $this->taskModel = new TaskModel();
  }
  public function index() {
    $title = 'Home';
    $tasks = $this->getTasks();
    $this->view('home', compact('title', 'tasks'));
  }

  public function getTasks() {
    $result = $this->taskModel->getTasks();
    return $result;
  }

  public function addTask() {
    if(empty($_POST['name']) || empty($_POST['date'])) {
      $error = "Please fill all fields";
      header('Location:' . URLROOT . '/?error=' . $error);
    }

    $name = htmlentities($_POST['name']);
    $date = htmlentities($_POST['date']);
    $completed = htmlentities($_POST['completed']) === 'on' ? 1 : 0;

    $this->taskModel->addTask($name, $date, $completed);
    header('Location:' . URLROOT);
  }

  public function toggleTask($_, $id) {
    if($id) {
      $task = $this->taskModel->getTask($id);
      $completed = $task->completed === 1 ? 0 : 1;
      $this->taskModel->toggleTask($completed, $id);
      header('Location:' . URLROOT);
    }
  }

  public function deleteTask($_, $id) {
    if($id) {
      $this->taskModel->deleteTask($id);
      header('Location:' . URLROOT);
    }
  }

  public function about() {
    $title = 'About';
    $this->view('about', compact('title'));
  }
}
