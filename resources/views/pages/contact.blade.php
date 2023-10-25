<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <h1 class="text-2xl font-semibold mb-5"> {{$page->title}} </h1>
            <div class="text-lg w-full intro">
                {!! $page->full_text !!}
            </div>
            <div class="flex mt-10">
                <div class="w-1/2">
                    @if($page->image)
                    <img class="mx-auto" src="{{ asset('storage/'.$page->image) }}" alt="Nigel Southway book - Take Back Manufaturing">
                    @endif
                   
                    @if($page->page_icons)
                        <div class="mt-8">
                            <h4 class="text-2xl font-bold mb-5 text-center">Socials</h4>
                            <div class="flex justify-center">
                                @foreach($page->page_icons as  $item)
                                    <a href="{{$item['url']}}" class="mr-3" target="_blank">
                                        <img src="{{asset('storage/'.$item['icon'])}} " alt="Nigel Southway socials">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="w-1/2">
                    <form action="/contact-us" method="POST" id="contact" class="mt-4 w-4/6">
                        @csrf

                        @if(session('success'))
                            <div class="bg-green-300 shadow py-2 px-4 mb-5" style="w-full">
                                {!! session('success') !!}
                            </div>
                        @endif
                        @if(session('failure'))
                        <div class="bg-red-300 text-white shadow py-2 px-4 mb-5" style="w-full">
                                {!! session('failure') !!}
                            </div>
                        @endif
        
                        <div class="mb-4">
                            <label for="name" class="block text-gray-600 mr-2 mb-2">Name: </label>
                            <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2" required>
                        </div>
        
                        <div class="mb-4">
                            <label for="company" class="block text-gray-600 mr-2 mb-2">Company: </label>
                            <input type="text" name="company" id="company" class="w-full border border-gray-300 p-2" required>
                        </div>
        
                        <div class="mb-4">
                            <label for="address" class="block text-gray-600 mr-2 mb-2">Address: </label>
                            <input type="text" name="address" id="address" class="w-full border border-gray-300 p-2" required>
                        </div>
        
                        <div class="mb-4">
                            <label for="email" class="block text-gray-600 mr-2 mb-2">Email: </label>
                            <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2" required>
                        </div>
        
                        <div class="mb-4">
                            <label for="message" class="block text-gray-600 mr-2 mb-2">Message: </label>
                            <textarea name="message" id="message" rows="4" class="w-full border border-gray-300 p-2" required></textarea>
                        </div>

                        <div class="g-recaptcha mt-6 mb-6" data-sitekey="6LcXrcYoAAAAAL-yKmkaGAmTE-XN16y7ySceYbhc"></div>
                        @if($errors->has('g-recaptcha-response')) 
                        <p class="mt-2 text-sm text-red-500">
                            {{ $errors->first('g-recaptcha-response') }}
                        </p>
                        @endif
        
                        {{-- Add Google reCAPTCHA here --}}
                        
                        <button type="submit" class="bg-red-500 text-white p-2 rounded transition-colors hover:bg-red-700">Submit</button>
                    </form>
                </div>
            </div>
            

            
        </div>
    </div>
</x-app-layout>