<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <title>Rest_api</title>
</head>

<body>
    <div class=" w-screen h-screen flex flex-col justify-center items-center">
        <form id="todo-form">
            <div class="flex flex-col justify-center items-center gap-10">
                <h3 class="text-2xl">My Todos</h3>
                <input type="text" name="title" id="title" class="w-64 p-2 outline-none rounded bg-gray-100" placeholder="Add a todo">
                <input type="text" name="description" id="description" class="w-64 p-2 outline-none rounded bg-gray-100" placeholder="Description">
                <button type="submit" name="submit" class="bg-blue-400 text-lg w-64 p-2 rounded">ADD</button>
            </div>
        </form>
        <span id="form-status" style="display: none;"></span>
        <span id="loader" style="display: none;">Loading</span>
        <table id="todo-table" class="mt-10">
            <thead>
                <tr>
                <th class="p-2">ID</th>
                <th class="p-2">TITLE</th>
                <th class="p-2">DESCRIPTION</th>
                <th class="p-2">ACTION</th>
                </tr>
            </thead>
            <tbody id="tbody-rows">

            </tbody>
        </table>
    </div>
    <script src="./main.js"></script>
</body>

</html>