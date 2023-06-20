<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
          
          @foreach ($todos as $todo)
          <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{$todo->title}}</h2>
              <p>{{$todo->body}}</p>
              @if (!$todo->isDone())
                <x-nav-link :href="route('todos.edit', [
                  'todo' => $todo->id,
                ])">
                  Edit
                </x-nav-link>
                <x-nav-link :href="route('todos.destroy', [
                  'todo' => $todo->id,
                ])">
                  Done
                </x-nav-link>
              @endif
            </div>
          </div>
          @endforeach

    </div>
  </div>
</x-app-layout>