<x-app-layout>
    <section class="py-6 bg-gray-700">
        <div class="container grid lg:grid-cols-2 gap-6">
            <figure>
                        <img class="h-60 w-full object-cover "src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}">
            </figure>
            <div class="text-white">
            <h1>{{$course->title}}</h1>
            <h2>{{$course->subtitle}}</h2>
            <p>Nivel : {{$course->level->name}}</p>
            <p>Category : {{$course->category->name}}
            <p>Matriculate : {{$course->students_count}}</p>
            <p>Calificación : {{$course->rating}}</p></div>
        </div>
    </section>
    <div class="container grid grid-cols-1">
        <div class="col-span-2">
            <section class="card">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo que aprenderás</h1>
                    <ul class="grid grid-cols-2 gap-y-2 gap-x-6">
                        @foreach ($course->goals as $goal)
                               <li class="text-gray-400 text-base"><i class="fas fa-check text-gray-700 mr-2"></i> {{$goal->name}}</li>
                        @endforeach

                    </ul>
                </div>
            </section>
            <div class="grid grid-cols-2">
            <div>
            <section class="card">
                <div class="card-body">
                <h2 class="font-bold mb-2 text-3xl py-2 px-4">Temario</h2>
                @foreach ($course->sections as $section )
                <article class="mb-4 shadow" @if($loop->first)
                 x-data='{open:true}'
                @else
                x-data='{open:false}'
                @endif>
                    <header class="border border-gray-200 px-4 py-2 cursor-pointer text-gray-200" x-on:click="open = ! open">
                        <h2 class="font-bold text-lg text-gray-600">{{$section->name}}</h2>
                    </header>
                    <div class="bg-white py-2 px-4" x-show="open">
                        <ul class="grid grid-cols-1 gap-2 ">
                            @foreach ($section->lessons as $lesson)
                              <li class="text-gray-700 text-base"><i class="fas fa-play-circle mr-2 text-sm"></i>{{$lesson->name}} </li>
                            @endforeach
                        </ul>
                    </div>
                </article>
                @endforeach

                </div>
            </section>

            <section class="px-4 py-2">
                <h2 class="font-bold text-xl">requeriments</h2>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement )
                    <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @endforeach
                </ul>
            </section>
            <section class="px-4 py-2 bg-white my-10">
                <h2 class="text-3xl">{{__('Description')}}</h2>
                <div class="text-gray-600">
                    <p>{{$course->description}}</p>
                </div>
            </section>
            </div>
             <div class="col-span-1">
            <section class="card">
             <div class="card-body">
                 <div class="flex">
                     <img src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                 </div>
             </div>

            </section>
        </div>
        </div>

    </div>
</x-app-layout>
