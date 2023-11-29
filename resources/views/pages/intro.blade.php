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
<script>
    // Get a reference to all iframes within elements with the class "videowrap"
    var iframes = document.querySelectorAll('.videoWrapper iframe');
  
    // Loop through the selected iframes and set their width and height to "100%"
    for (var i = 0; i < iframes.length; i++) {
      iframes[i].width = "100%";
    }
</script>