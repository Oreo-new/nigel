<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main mt-4 pt-6">
            
            <div class="w-full flex">
                <div class="w-9/12">
                    @if($article)
                        <div class="article-item w-full mb-3">
                            <div class="head border-b border-gray-200">
                                <h4 class="text-xl font-bold transition-colors "> {{$article->title}}</h4>
                                <div class="flex items-center my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    <span class="text-sm mr-4">Posted On</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                    <span class="text-sm mr-4">{{ \Carbon\Carbon::parse($article->created_at)->format('F j, Y g:i A') }} </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                    </svg>
                                    <span class="text-sm mr-4">Author: {{$article->author_name}} </span> 
                                </div>
                            </div>
                            <div class="article-intro mt-4">
                                @if($article->image)
                                    <div class="article-img mb-6 w-full flex justify-center">
                                        <img src="{{asset('storage/'.$article->image)}}" alt="Tke Back Manufacturing article - {{$article->title}}" class="min-w-[250px] w-[250px]">
                                    </div>
                                @endif
                                {!!$article->full_text!!} 
                            </div>
                        </div>  
                    @endif
                </div>
                <div class="w-3/12">
                    <x-latest-article />
                </div>
            </div>
            @if(!$comments->isEmpty())

                <div class="mt-8">
                    <h4 class="text-xl">{{$comments->count()}} Comments for {{$article->title}}</h4>

                    <!--- Start of comment box form -->

                     @foreach($comments as $item)
                        @php
                            $originalDate = $item->created_at;
                            $carbonDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $originalDate);
                            $formattedDate = $carbonDate->format('F j, Y \a\t g:i a');
                        @endphp
                        <div class="shadow p-4 my-4  w-4/6 relative">
                            <div class="flex items-center">
                                <div class="bg-gray-400 mr-3">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 p2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg> 
                                </div>
                                <div>
                                    <p class="w-full capitalize">{{$item->name}} says:</p>
                                    <p class="w-full">{{$formattedDate}}</p>
                                </div>
                            </div>
                            <div class="comment-content mt-2">
                                <p>{{ $item->comment }}</p>
                                 
                            </div>
                            <!--- this is reply div -->
                                @if($item->replies)
                                    @foreach($item->replies as $reply)
                                        <div class="mt-4 pl-4 bg-gray-300 rounded py-4 replies">
                                            <div class="flex items-center">
                                                <div class="bg-gray-400 mr-3">
                                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 p2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg> 
                                                </div>
                                                <div>
                                                    <p class="w-full capitalize">{{$reply->name}} Replies:</p>
                                                    <p class="w-full">{{$formattedDate}}</p>
                                                </div>
                                            </div>
                                            <div class="comment-content mt-2">
                                                <p class="text-black">{{ $reply->comment }}</p>   
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            <!--- this is reply form -->
                                <div x-data="{ showReplyForm: false }" class="reply-form">
                                    <button @click="showReplyForm = !showReplyForm" class="flex mt-4 items-center">

                                        <span x-show="!showReplyForm" class="text-xs text-neutral-600 mr-1 ">Reply to this comment: </span> 
                                        <svg x-show="!showReplyForm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-neutral-600 ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l6-6m0 0l-6-6m6 6H9a6 6 0 000 12h3" />
                                        </svg>
                                        <span x-show="showReplyForm" class="text-xs text-neutral-600 mr-1 ">Close</span> 
                                        <svg x-show="showReplyForm" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-neutral-600 ">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                          
                                    </button>
                                
                                    <div x-show="showReplyForm">
                                        <div>

                                             <form action="{{route('comments') }}" method="POST" class="mt-5 p-8 bg-gray-300">
                                                @csrf
                                                
                                                <input type="hidden" name="parent_id" value="{{ $item->id }}" />
                                                <input type="hidden" name="article_id" value="{{ $article->id }}" />
                                                <div class="mb-4">
                                                    <label for="name" class="block text-gray-600 text-sm mr-2 mb-2">Name:<span class="text-red-600"> *</span> </label>
                                                    <input type="text" name="name" id="name" class="w-full border border-gray-300 p-1" required>
                                                </div>
                                    
                                                <div class="mb-4">
                                                    <label for="email" class="block text-gray-600 text-sm mr-2 mb-2">Email: </label>
                                                    <input type="email" name="email" id="email" class="w-full border border-gray-300 p-1" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="comment" class="block text-gray-600 text-sm mr-2 mb-2">Comments:<span class="text-red-600"> *</span>  </label>
                                                    <textarea name="comment" id="comment" rows="4" class="w-full border border-gray-300 p-1" required></textarea>
                                                </div>
                                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded transition-colors hover:bg-red-700">Submit reply</button>
                                            </form>
                                        </div>
                                       
                                    </div>
                                </div>
                            <!--- this is reply form -->
                        </div>
                     @endforeach
                </div>
            @endif
            <div class="mt-8">
                <p class="text-2xl font-bold">Leave Comments here.</p>

                 <p class="text-sm text-neutral-500">Your email address will not be published. Required fields are marked *</p>
            </div>
            <form action="{{route('comments') }}" method="POST" class="mt-4 w-4/6 p-8 bg-gray-300">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}" />
                {{-- <input type="hidden" name="parent_id" value="{{ $comment->id }}" /> --}}
                <div class="mb-4">
                    <label for="name" class="block text-gray-600 mr-2 mb-2">Name:<span class="text-red-600"> *</span> </label>
                    <input type="text" name="name" id="name" class="w-full border border-gray-300 p-1" required>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-600 mr-2 mb-2">Email: </label>
                    <input type="email" name="email" id="email" class="w-full border border-gray-300 p-1" required>
                </div>

                <div class="mb-4">
                    <label for="comment" class="block text-gray-600 mr-2 mb-2">Comments:<span class="text-red-600"> *</span>  </label>
                    <textarea name="comment" id="comment" rows="4" class="w-full border border-gray-300 p-1" required></textarea>
                </div>

                {{-- Add Google reCAPTCHA here --}}
                
                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded transition-colors hover:bg-red-700">Post Comment</button>
            </form>
        </div>
    </div>
</x-app-layout>