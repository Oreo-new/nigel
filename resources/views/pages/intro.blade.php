<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-8">
            <div class="flex pl-0 md:pl-5 mt-10 md:mt-0">
                <div class="videoWrapper">
                    @if($page->video_link)
                        {!!$page->video_link !!}
                    @endif
                </div>
               
            </div>
        </div>
    </div>
</x-app-layout>
