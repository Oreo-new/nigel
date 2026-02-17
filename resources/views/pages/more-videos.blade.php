<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <div class="text-lg w-full">
                {!! $page->full_text !!}
            </div>
            <div class="videos">
                @if($videos)
                    @foreach($videos as $item)
                    <div class="flex flex-wrap lg:flex-nowrap my-8 items-center">
                        <div class="w-full lg:w-1/2 mt-8">
                            <div class="videoWrap">
                                {!!$item->video_link!!}
                            </div>
                        </div>
                        <div class="video-desc w-full lg:w-1/2 pl-0 lg:pl-4 mt-6 lg:mt-0">
                            <h3 class="text-xl mb-4 font-bold">{{$item->title}}</h3>
                            {!!$item->description!!}
                        </div> 
                    </div>
                    
                    @endforeach
                    
                @endif
                
               
            </div>
        </div>
    </div>
</x-app-layout>
