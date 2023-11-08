<x-layout>
  <div class="w-full max-w-xl bg-gray-800 px-6 py-10 rounded shadow">
    <h2 class="font-medium text-3xl">Posts</h2>
    <ul class=mt-4>
      @forelse ($posts as $post)
        <li class="my-1">{{ $post->title }}</li>
      @empty
          <p>No hay posts creados</p>
      @endforelse
    </ul>
  </div>

  <div class="w-full max-w-xl bg-gray-800 px-6 py-10 rounded shadow">
    <h2 class="font-medium text-3xl">Crear un post</h2>

    <form method="POST" action="/post">
      @csrf

      <div class=mt-4>
        <label for="title" class="block font-medium leading-6 text-gray-100">Título</label>
        <div class="mt-2">
          <input
            value="{{ old('title') }}"
            type="text"
            name="title"
            id="title"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 text-sm leading-6"
          >
        </div>
        @error('title')
          <p class="text-red-400">{{ $message }}</p>
        @enderror
      </div>
      <div class=mt-4>
        <label for="content" class="block font-medium leading-6 text-gray-100">Contenido</label>
        <div class="mt-2">
          <textarea
            cols="30"
            rows="10"
            name="content"
            id="content"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 text-sm leading-6"
          >{{ old('content') }}</textarea>
        </div>
        @error('content')
          <p class="text-red-400">{{ $message }}</p>
        @enderror
      </div>

      <div class=mt-4>
        <label for="publication_date" class="block font-medium leading-6 text-gray-100">Fecha de publicación</label>
        <div class="mt-2">
          <input
            value="{{ old('publication_date')}}"
            type="date"
            name="publication_date"
            id="publication_date"
            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 text-sm leading-6"
          >
        </div>
        @error('publication_date')
          <p class="text-red-400">{{ $message }}</p>
        @enderror
      </div>

      <div class="mt-8">
        <div class="flex items-center">
          <input
            @checked(old('allow_comments'))
            type="checkbox"
            name="allow_comments"
            id="allow_comments"
            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600"
          >
          <label for="allow_comments" class="ml-2 block font-medium leading-6 text-gray-100">Permitir comentarios</label>
        </div>
        @error('allow_comments')
          <p class="text-red-400">{{ $message }}</p>
        @enderror
      </div>

      <button type="submit" class="mt-6 rounded bg-gray-700 py-3 px-12">Crear</button>
    </form>
  </div>
</x-layout>