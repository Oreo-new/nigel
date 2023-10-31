<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <div class="flex pl-0 lg:pl-5 flex-wrap">
                <div class="home-image w-full lg:w-5/12">
                   <img src="{{ asset('/storage/'. $page->image) }}" alt="Nigel Southway Book - Take Back Manufacturing" class="w-full mx-auto">
                   @if($page->page_icons)
                        <div class="mt-4 hidden lg:block">
                            <div class="flex justify-center">
                                @foreach($page->page_icons as  $item)
                                    <a href="{{$item['url']}}" class="mr-3" target="_blank">
                                        <img class="w-[54px] h-[54px]" src="{{asset('storage/'.$item['icon'])}} " alt="Nigel Southway socials">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="w-full lg:w-7/12">
                    {!! $page->full_text !!}

                    @if($page->links)
                        <div class="home-buttons flex flex-wrap md:flex-nowrap mt-10 md:mt-16">
                            @foreach($page->links as  $item)
                                <button class="rounded bg-red-600 text-center px-10 md:px-6 lg:px-10 py-3 text-white text-sm font-bold mr-5 mb-5">
                                    <a href="{{$item['url']}}" target="_blank">
                                        {{$item['link_name']}}
                                    </a>
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>