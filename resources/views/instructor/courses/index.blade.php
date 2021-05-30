<x-instructor-layout>
    <h1 class="text-2xl font-bold">Listado de cursos : <strong class="text-xl">{{auth()->user()->name}}</strong></h1>
    <hr class="mt-2 mb-6">
    @livewire('instructor.courses-index')
</x-instructor-layout>
