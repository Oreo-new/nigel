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
                    <div class="flex my-8 items-center">
                        <div class="w-1/2">
                            <div class="videoWrap">
                                {!!$item->video_link!!}
                            </div>
                        </div>
                        <div class="video-desc w-1/2 pl-4">
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