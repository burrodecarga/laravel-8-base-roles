<x-app-layout>
    <section class="bg-cover" style="background-image: url({{asset('img/home/resume.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <h1 class="text-white font-bold text-4xl">Cursos</h1>
                <p class="text-white text-lg mt-2 mb-4">Con tegnologia digital</p>
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input
                        class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                        type="search" name="search" placeholder="Search">
                    <button type="submit"
                        class="absolute right-0 top-0  py-2 px-4 mt-2 bg-blue-600 hover:bg-blue-400 text-white rounded">
                        search
                    </button>
                </div>
            </div>
        </div>
    </section>

    @livewire('course-index')

</x-app-layout>
