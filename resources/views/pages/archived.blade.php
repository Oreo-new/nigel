<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <h1 class="text-2xl font-semibold"> {{$date}} articles </h1>
            <div class="text-lg w-full intro">
            </div>
            
            <div class="mt-10 w-full flex">
                <div class="w-9/12">
                    @if(!$sortedArticles->isEmpty())

                        @foreach($sortedArticles  as $item)
                            <div class="article-item w-full mb-3 mt-10">
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
                        <div class="article-pagination mt-10">
                            {!! $sortedArticles->render() !!}
                        </div>
                        
                    @endif
                </div>
                <div class="w-3/12">
                    <p>sample</p>
                </div>
            </div>

       
        </div>
    </div>
</x-app-layout>