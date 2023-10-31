<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <div class="text-lg w-full intro">
                {!! $page->full_text !!}
            </div>
            <div class="flex lg:flex-nowrap flex-wrap pl-5">
                <div class="home-image w-full lg:w-5/12">
                    @if($document->main_image)
                         <img src="{{ asset('/storage/'. $document->main_image) }}" alt="Nigel Southway Book - Take Back Manufacturing" class="w-full">
                    @endif
                </div>
                <div class="w-full lg:w-7/12  ml-0 lg:ml-5 mt-8 lg:mt-0">
                    <h2 class="text-2xl font-bold mb-5">{{$document->title }}</h2>
                    {!! $document->description !!}

                    @if($page->page_icons)
                        <div class="mt-16">
                            <h4 class="text-2xl font-bold mb-5">Socials</h4>
                            <div class="flex mb-10 lg:mb-5 ">
                                @foreach($page->page_icons as  $item)
                                    <a href="{{$item['url']}}" class="mr-3" target="_blank">
                                        <img class="w-[54px] h-[54px]" src="{{asset('storage/'.$item['icon'])}} " alt="Nigel Southway socials">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>