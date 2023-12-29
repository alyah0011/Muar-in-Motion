<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<style>
    .lists-container {
        display: flex;
        flex-wrap: wrap;
        gap: 16px;
        justify-content: flex-start;
        margin-left: 2%;
        margin-top: 1%;
    }

    .list {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 16px;
        width: 22%;;
        margin: 8px;
        box-sizing: border-box;
        background-color: #f5f5f5;
    }

    .content {
        margin-left: 15px;
    }

    .spc { 
        display: flex;
        justify-content: space-between;
    }

    #createListBtn {
        border-radius: 10px;
        margin-left: 2.5%;
        margin-top: 1%;
        width: 120px;
        background-color: #1310A2;
        color: #fff;
        padding: 10px 20px;
        cursor: pointer;
    }

    #createListForm{
        margin-left: 2.5%;
        margin-top: 1%;
    }

    #inLButton, #inTButton {
        background-color: #1310A2;
        color: #fff;
        padding: 10px 20px;
        border-radius: 10px;
    }

    #inLButton{
        margin-left: 3%;
    }

    #inTButton{
        margin-top: 2%;
    }

    /* Add some media queries for responsiveness */
    @media (max-width: 768px) {
        .list {
            width: 100%;
        }
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Lists') }}
        </h2>
        <br>
        <p>See your to-do lists</p>
    </x-slot>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">
        <div class="content">
            <div id="createListBtn" onclick="toggleForm()">Create List</div>

            <form id="createListForm" action="{{ route('todo.createList') }}" method="post" style="display: none;">
                @csrf
                <label for="tdl_title">List Name:</label>
                <input type="text" name="tdl_title" required>

                <label for="tdl_date">Date:</label>
                <input type="date" name="tdl_date" required>

                <button id="inLButton" type="submit">Create List</button>
            </form>

            <div class="lists-container">
                @foreach($lists as $list)
                    <div class="list">
                        <div class="spc">
                            <strong>{{ $list->tdl_title }}</strong>

                            <button onclick="confirmDelete('{{ $list->tdl_id }}')" style="color: grey;">
                                <strong> X </strong>
                            </button>

                        </div>

                        <p>Date: {{ $list->tdl_date }}</p>

                        <br>
                        @if(count($list->tasks) > 0)
                            <ul>
                                @foreach ($list->tasks as $task)
                                    <li>
                                    <input type="checkbox" id="task_{{ $task->task_id }}" {{ $task->completed ? 'checked' : '' }} onchange="updateTaskStatus('{{ $task->task_id }}')">

                                        {{ $task->task_name }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p></p>
                        @endif

                        <button onclick="toggleTaskForm('{{ $list->tdl_id }}')">+ Add Task</button>

                        <form id="addTaskForm{{ $list->tdl_id }}" action="{{ route('todo.addTask', ['tdl_id' => $list->tdl_id]) }}" method="post" style="display: none;">
                            @csrf
                            <label for="task_name{{ $list->tdl_id }}">Task Name:</label>
                            <input type="text" name="task_name" id="task_name{{ $list->tdl_id }}" required maxlength="23">
                            <button id="inTButton" type="submit">Add Task</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <script>

        function toggleForm() {
            var form = document.getElementById('createListForm');
            form.style.display = (form.style.display === 'none') ? 'block' : 'none';
        }

        function toggleTaskForm(tdlId) {
            var form = document.getElementById('addTaskForm' + tdlId);
            form.style.display = (form.style.display === 'none') ? 'block' : 'none';
        }


        function updateTaskStatus(taskId) {
            console.log('Task ID:', taskId);

            if (!taskId) {
                console.error('Task ID is undefined or empty.');
                return;
            }

            // Get the CSRF token from the meta tag
            var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            // Send an AJAX request to update the task status
            fetch('/update-task-status/' + taskId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({}),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Task status updated successfully, you can update the UI if needed
                    console.log('Task status updated successfully');
                } else {
                    console.error('Failed to update task status:', data.error || 'Unknown error');
                }
            })
            .catch(error => {
                console.error('Error updating task status:', error);
            });
        }
    </script>

    <script>
        function confirmDelete(tdlId) {
            if (confirm('Are you sure you want to delete this list?')) {
                // Get the CSRF token from the meta tag
                var csrfToken = document.querySelector('meta[name="csrf-token"]').content;

                // Send an AJAX request to delete the list
                fetch('/delete-list/' + tdlId, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // List deleted successfully, you can update the UI if needed
                        console.log('List deleted successfully');
                        // Reload the page or update the UI as needed
                        location.reload();
                    } else {
                        console.error('Failed to delete list:', data.error || 'Unknown error');
                    }
                })
                .catch(error => {
                    console.error('Error deleting list:', error);
                });
            }
        }

    </script>






</x-app-layout>
