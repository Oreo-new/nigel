<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <h1 class="text-2xl font-semibold mb-5"> {{$page->title}} </h1>
            <div class="text-lg w-full intro">
                {!! $page->full_text !!}
            </div>
            <div class="flex mt-8">
                <div class="w-full">
                    <ul>
                        @foreach ($surveys->data as $survey)
                            <li>{{ $survey->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
                
        </div>
    </div>
</x-app-layout>
