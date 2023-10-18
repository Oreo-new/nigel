<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-8">
            <div class="flex pl-5">
                <div class="videoWrapper">
                    @if($page->video_link)
                        <iframe width="100%" height="100%" src="{{$page->video_link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    @endif
                </div>
               
            </div>
        </div>
    </div>
</x-app-layout>