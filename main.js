$("#todo-form").submit(function (e) {
  e.preventDefault()
  console.log("clicked")
  const data = $("#todo-form").serializeArray()
  console.log("data:", data)
  // console.log("todo without strigyfy", todo)
  // console.log("todo", JSON.stringify(todo))
  const todo = {} //{title:"google",description:"hello"}

  data.forEach(function (item) {
    todo[item.name] = item.value
  })

  $.ajax({
    url: "http://localhost/rest-api/todos/api/todos/",
    method: "POST",
    data: JSON.stringify(todo),
    beforeSend: function () {
      $("#form-status").show()
      $("#form-status").html("Adding Todo..")
    },
    success: function (data) {
      $("#form-status").html("Todo added...")
      setTimeout(function () {
        $("#form-status").hide()
      }, 3000)
      console.log("data inserted")
    },
  }).done(function () {
    $("#todo-form").trigger("reset")
    getTodos()
  })
})

function getTodos() {
  $.ajax({
    url: "http://localhost/rest-api/todos/api/todos/",
    method: "GET",
    beforeSend: function () {
      $("#loader").show()
    },
    success: function () {
      $("#loader").hide()
    },
  }).done(function (data) {
    console.log(data)
    $("#tbody-rows").html("")
    JSON.parse(data).map((todo) => {
      $("#tbody-rows").append(`
          <tr class="p-2 bg-gray-200">
              <td class="p-2">${todo.id}</td>
              <td class="p-2">${todo.title}</td>
              <td class="p-2">${todo.description}</td>
              <td class="p-2"><a href='./update.php?id=${todo.id}'>Update</a>|<a  href='./delete.php?id=${todo.id}'>Delete</a></td>
          </tr>
      `)
    })
  })
}

$(document).ready(function () {
  getTodos()
})
