<extends:layout.base title="[[ToDo List]]"/>

<stack:push name="styles">
    <link rel="stylesheet" href="/styles/tasks.css"/>
</stack:push>

<define:body>
    <h1 class="main-title">Tasks</h1>
        <form action="/tasks" method="post">
            <input type="hidden" name="userId" value="{{ $userId }}" />
            <input type="text" name="task" />
            <input type="submit" />
        </form>
        <div class="box">
            <div class="items">
                @foreach($tasks as $task)
                    @if($task->getFinishedAt())
                        <div class="item">
                            <input type="checkbox" id="task{{ $task->getId() }}" name="task{{ $task->getId() }}" checked />
                            <label for="task{{ $task->getId() }}"><del> {{ $task->getDescription() }} </del></label>
                        </div>
                    @else
                        <div class="item">
                            <input type="checkbox" id="task{{ $task->getId() }}" name="task{{ $task->getId() }}" />
                            <label for="task{{ $task->getId() }}">{{ $task->getDescription() }}</label>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
</define:body>
