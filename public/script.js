const taskListBtns = document.querySelector('[data-task-list-btns]')
const form = document.querySelector('[data-form]')

if(taskListBtns) {
  let isAddTask = false
  
  if(!isAddTask) {
    taskListBtns.children[1].style.display = 'none'
    form.style.display = 'none'
  }
  
  taskListBtns.children[0].addEventListener('click', () => {
    isAddTask = true
    if(isAddTask) {
      taskListBtns.children[1].style.display = 'block'
      form.style.display = 'block'
      taskListBtns.children[0].style.display = 'none'
    }
  })
  
  taskListBtns.children[1].addEventListener('click', () => {
    isAddTask = false
    if(!isAddTask) {
      taskListBtns.children[1].style.display = 'none'
      form.style.display = 'none'
      taskListBtns.children[0].style.display = 'block'
    }
  })

  form.addEventListener('submit', () => {
    isAddTask = false
    form.style.display = 'none'
  })
}
