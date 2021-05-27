<div class="mt-8">
    <div class="container grid grid-cols-3 gap-8">
        <div class="col-span-2">
            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>
            <h1 class="text-3xl text-gray-600 font-bold mt-4">
                {{$current->name}}
            </h1>
            @if ($current)
            <div class="text-sm text-gray-600">
                {{$current}}
            </div>
            @endif

            <div>
                <p>xx{{$current->name}}</p>
                <p>indice: {{$this->index}}</p>
                <p>
                    @if ($this->previous)
                    <p>previous: {{$this->previous->id}}</p>
                    @endif
                    @if ($this->next->id)
                    <p>next : {{$this->next->id}}</p>
                    @endif

            </div>

        </div>
        <div class="card">
            <div class="card-body">
                <h1>
                    {{$course->title}}
                </h1>
                <div class="flex item-center">
                    <figure>
                        <img class="rounded-full w-12 h-12" src="{{$course->teacher->profile_photo_url}}"
                            alt="{{$course->teacher->name}}">
                    </figure>
                    <div>
                        <p class="">{{$course->teacher->name}}</p>
                        <p class="text-xs text-blue-500">{{'@'.Str::slug($course->teacher->name,'')}}</p>
                    </div>

                </div>
                <ul>
                    @foreach ($course->sections as $section )
                    <li class="font-bold">{{$section->name}}
                        <ul>
                            @foreach ($section->lessons as $lesson )
                            <li class="font-light text-gray-300 text-xs">
                                <a class="cursor-pointer" wire:click="changeLesson({{$lesson->id}})">
                                    {{$lesson->id}}
                                    @if ($lesson->completed)
                                    completado
                                    @endif
                                </a>
                            </li>
                            @endforeach
                        </ul>

                    </li>
                    @endforeach
                </ul>

            </div>

        </div>
    </div>

</div>
