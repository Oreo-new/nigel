<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-16">
            <div class="flex pl-5">
                <div class="home-image w-5/12">
                   <img src="{{ asset('/storage/'. $page->image) }}" alt="Nigel Southway Book - Take Back Manufacturing" class="w-full">
                </div>
                <div class="w-7/12">
                    {!! $page->full_text !!}

                    @if($page->links)
                        <div class="home-buttons flex mt-16">
                            @foreach($page->links as  $item)
                            <button class="rounded bg-red-600 text-center px-10 py-3 text-white text-sm font-bold mr-5">
                                <a href="{{$item['url']}}">
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