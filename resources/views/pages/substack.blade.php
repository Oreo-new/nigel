<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <h1 class="text-2xl font-semibold">{{$page->title}}</h1>
            <div class="text-lg w-full intro">
                {!! $page->full_text !!}
            </div>
            
            <div class="mt-10 w-full flex">
                <div class="w-full">
                   
                @if($items)
                    <div class="">
                        @foreach($items  as $item)
                            <div class="relative article-item w-full mb-3 mt-10 transition-all bg-gray-100 hover:bg-gray-200 shadow">
                                <div class="head p-4 border-gray-200">
                                    
                                    <h4 class="text-xl font-bold hover:text-red-600 transition-colors flex items-center"> 
                                            
                                        <a href="{{$item['link']}}" target="_blank">{{$item['title']}}</a>
                                    </h4>
                                    <span class="text-sm text-red-600">{{Str::limit($item['date'], 17)}}</span>
                                    <div class="flex items-center my-2">
                                        
                                        <p>
                                            {!! $item['description'] !!}
                                        </p>
                                    
                                    </div>
                                    <button class="mt-1 text-sm rounded-md text-center py-1 px-4 text-white bg-red-600 hover:bg-red-800 transition-colors">
                                        <a href="{{$item['link']}}" target="_blank">Read more..</a> 
                                    </button>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute bottom-4 right-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 19.5v-.75a7.5 7.5 0 00-7.5-7.5H4.5m0-6.75h.75c7.87 0 14.25 6.38 14.25 14.25v.75M6 18.75a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </div>
                            </div>
                        @endforeach
                    </div>

                        
                        
                    @endif 
                   
                </div>
            </div>

       
        </div>
    </div>
</x-app-layout>