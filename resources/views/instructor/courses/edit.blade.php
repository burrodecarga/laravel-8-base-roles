<x-app-layout>
    <div class="container py-8 grid grid-cols-5">
        <aside class="shadow-sm border-2 mx-2 p-2 rounded">
            <h1 class="font-bold text-lg mb-4">Edición de Curso</h1>
            <ul class="text-sm text-gray-600">
                <li class="leading-7 mb-1 border-l-4 border-indigo-500 pl-2">
                    <a href="">Información del curso</a> </li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Lecciones del curso</a> </li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Metas del curso</a> </li>
                <li class="leading-7 mb-1 border-l-4 border-transparent pl-2">
                    <a href="">Estiudiantes del curso</a> </li>
            </ul>
        </aside>
        <div class="col-span-4 card bg-green-500 shadow-sm border-2 mx-2">
            <div class="card-body text-gray-600">
                <h1 class="text-2xl font-bold">Información del curso</h1>
                <hr class="mt-2 mb-6">
                {!!Form::model($course,['route'=>['instructor.courses.update',$course,'method'=>'put','files'=>true]]) !!}
                @include('instructor.partials.form')

                <div class="flex justify-end">
                    <a class="px-6 py-4 btn-danger mr-3 cursor-pointer" href="{{ route('instructor.courses.index') }}">back</a>

                    {!! Form::submit('Actualizar información',['class'=>'btn btn-primary cursor-pointer']) !!}
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>


    <x-slot name="js">
                <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
                <script src="{{ asset('js/instructor/courses/form.js')}}"></script>
    </x-slot>


</x-app-layout>
