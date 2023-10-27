<x-app-layout>
    <div class="w-full">
        <x-header />
        <div class="main pt-6">
            @if($news->isEmpty() && $articles->isEmpty() && $documents->isEmpty())
                <h1 class="text-2xl font-semibold underline underline-offset-4">No Search Results for "{{$searchkey}}"</h1>
            @endif
            <h1 class="text-[32px] font-semibold underline underline-offset-4">Search Results for "{{$searchkey}}"</h1>
            
            
            <div class="mt-10 w-full flex">
                <div class="w-full">
                    @if(!$news->isEmpty())
                        <div class="mb-5">
                            <h3 class="text-[30px] text-gray-600 font-bold">News page results</h3>
                        </div>
                        @foreach($news  as $item)
                            <div class="article-item w-full mb-3">
                                <div class="head border-b border-gray-200">
                                    <h4 class="text-xl font-bold hover:text-red-600 transition-colors "> <a href="/news/{{$item->slug}} ">{{$item->title}}</a></h4>
                                    <div class="flex items-center my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        <span class="text-sm mr-4">Posted On</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>
                                        <span class="text-sm mr-4">{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y g:i A') }} </span>
                                    
                                    </div>
                                </div>
                                <div class="article-intro mt-4">
                                    {!!$item->intro_text!!} 
                                    <button class="mt-2 text-sm rounded-md text-center py-1 px-4 text-white bg-red-600 hover:bg-red-800 transition-colors">
                                       <a href="/news/{{$item->slug}} ">Read more..</a> 
                                    </button>
                                </div>
                            </div>
                        @endforeach
                        
                    @endif
                    @if(!$articles->isEmpty())
                        <div class="mb-5">
                            <h3 class="text-[30px] text-gray-600 font-bold">TBM Articles page results</h3>
                        </div>
                        @foreach($articles  as $item)
                            <div class="article-item w-full mb-3">
                                <div class="head border-b border-gray-200">
                                    <h4 class="text-xl font-bold hover:text-red-600 transition-colors "> <a href="/tbm-articles/{{$item->slug}} ">{{$item->title}}</a></h4>
                                    <div class="flex items-center my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        <span class="text-sm mr-4">Posted On</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>
                                        <span class="text-sm mr-4">{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y g:i A') }} </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>
                                        <span class="text-sm mr-4">Author: {{$item->user->name}} </span> 
                                    </div>
                                </div>
                                <div class="article-intro mt-4">
                                    {!!$item->intro_text!!} 
                                    <button class="mt-2 text-sm rounded-md text-center py-1 px-4 text-white bg-red-600 hover:bg-red-800 transition-colors">
                                       <a href="/tbm-articles/{{$item->slug}} ">Read more..</a> 
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    @if(!$documents->isEmpty())
                        <div class="mb-5 mt-10">
                            <h3 class="text-[30px] text-gray-600 font-bold">Document page results</h3>
                        </div>

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
                                            <h4 class="mr-4 hover:decoration-1 hover:underline hover:decoration-red-600 transition-colors font-bold">{{$item->name}}</h4>     
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
    </div>
</x-app-layout>