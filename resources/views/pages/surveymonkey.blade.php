<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <h1 class="text-2xl font-semibold mb-5"> {{$page->title}} </h1>
            <div class="text-lg w-full intro">
                {!! $page->full_text !!}
            </div>
            <div class="flex ">
                <div class="w-full">
                    <script>(function(t,e,s,n){var o,a,c;t.SMCX=t.SMCX||[],e.getElementById(n)||(o=e.getElementsByTagName(s),a=o[o.length-1],c=e.createElement(s),c.type="text/javascript",c.async=!0,c.id=n,c.src="https://widget.surveymonkey.com/collect/website/js/tRaiETqnLgj758hTBazgd91TQdxY6KZDChl0Or6sLKsC45i3TCNVoKwvJyX2niXe.js",a.parentNode.insertBefore(c,a))})(window,document,"script","smcx-sdk");</script>
                </div>
            </div>
                
        </div>
    </div>
</x-app-layout>

