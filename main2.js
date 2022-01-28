const formTodo = document.querySelector("#form-todo")

let API = `http://localhost/rest-api/todos/api` //base url

const PostData = async ({ formData }) => {
  // console.log(formData)
  const plainData = Object.fromEntries(formData.entries(formData));
  const DataJsonString = JSON.stringify(plainData);

  await fetch(`${API}/todos/`, {
    method: 'POST',
    body: DataJsonString,
  }).then(response => {console.log(response)})
}

formTodo.addEventListener('submit', async (e) => {
  e.preventDefault()
  //console.log("working")
  const form = e.currentTarget

  try {
    const formData = new FormData(form)
    //console.log(formData)
    const responseData = await PostData({formData})
    console.log(responseData)
  //  window.location = window.location
  } catch (err) {
    console.log(err)
  }
})

const getAllTodos = async ()=>{
    const response = await fetch(`${API}/todos/`);
    const data = await response.json();
    console.log(data)
    return data
}

getAllTodos();