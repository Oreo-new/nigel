<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <div class="text-lg w-full intro">
                {!! $page->full_text !!}
            </div>
            <div class="flex flex-wrap lg:flex-nowrap pl-5 mt-10">
                <div class="home-image w-full lg:w-5/12">
                    @if($document->main_image)
                         <img src="{{ asset('/storage/'. $document->main_image) }}" alt="Nigel Southway Book - Take Back Manufacturing" class="w-full">
                    @endif
                </div>
                <div class="w-full lg:w-7/12 ml-0 lg:ml-5">
                    <h2 class="text-2xl font-bold mb-5">{{$document->title }}</h2>
                    {!! $document->description !!}
                </div>
            </div>
            <div class="w-full">
                @if($page->page_icons)
                        <div class="mt-16">
                            <h4 class="text-[30px] font-bold mb-5 text-center">Now Available</h4>
                            <div class="flex flex-wrap md:flex-nowrap justify-center ">
                                @foreach($page->page_icons as  $item)
                                    <a href="{{$item['url']}}" class="mx-2 py-2" target="_blank">
                                        <img src="{{asset('storage/'.$item['icon'])}} " alt="Nigel Southway socials" class="w-24 lg:w-32 h-24 lg:h-32 border rounded transition duration-300 ease-in-out hover:scale-110">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
            </div>
        </div>
    </div>
</x-app-layout>