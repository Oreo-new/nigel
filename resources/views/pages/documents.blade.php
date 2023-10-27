<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <div class="text-lg w-full">
                {!! $page->full_text !!}
            </div>
            <div class="documents">
                @if($documents)
                    @foreach($documents as $item)
                    <div class="flex mt-8 relative mb-10">
                        <a href="{{ $item->pdf ?  asset('storage/'.$item->pdf ) : $item->external_link; }} " target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-red-600 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                            </svg>
                        </a>
                        <div>
                            <div class="flex items-center">
                                <a href="{{ $item->pdf ?  asset('storage/'.$item->pdf ) : $item->external_link ;}} " target="_blank">
                                     <h4 class="mr-4 hover:decoration-1 hover:underline hover:decoration-red-600 transition-colors">{{$item->name}}</h4>     
                                </a>
                            </div>
                            
                            {!!$item->description!!}

                            @if($item->pdf)
                                <a href="{{asset('storage/'.$item->pdf)}}" download="{{$item->name}}" class="flex items-end absolute left-2 hover:text-red-600 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 hover:text-red-600 transition-colors">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                    </svg>
                                    <span class="text-[10px]">DOWNLOAD</span>
                                </a>
                            @else
                            <a href="{{asset($item->external_link)}}"  class="flex items-end absolute left-2 hover:text-red-600 transition-colors">
                                <span class="text-xs">Visit link</span>
                            </a>
                            @endif
                            
                        </div>
                       
                    </div>
                    
                    @endforeach
                    
                @endif
                
               
            </div>
        </div>
    </div>
</x-app-layout>