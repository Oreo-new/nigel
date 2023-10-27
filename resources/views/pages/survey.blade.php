<x-app-layout>
    <div class="w-full">
        <x-header />
       
        <div class="main pt-6">
            <h1 class="text-2xl font-semibold mb-5"> {{$page->title}} </h1>
            <div class="text-lg w-full intro">
                {!! $page->full_text !!}
            </div>
            <div class="flex mt-8">
                <div class="w-full">
                    <form action="/send-survey" method="POST" id="survey" class="mt-4 w-4/6">
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

                        @php
                            $counter = 1;
                        @endphp
                        @if(!$questions->isEmpty())
                            @foreach ($questions as $survey )
                                <div class="row mb-10">
                                    <label class="text-lg">{{$counter++ .'. '. $survey->question}}</label>
                                    <div class="mb-5 mt-3">
                                        <input type="radio" name="q.{{$survey->id}}" value="yes"> YES
                                        <span class="mr-8"></span>
                                        <input type="radio" name="q.{{$survey->id}}" value="no"> NO
                                    </div>
                                </div>   
                            @endforeach
                        @endif
        
                        <div class="mb-4 w-1/2">
                            <label for="name" class="block text-gray-600 mr-2 mb-2">Name: </label>
                            <input type="text" name="name" id="name" class="w-full border border-gray-300 p-2" required>
                        </div>
        
                        <div class="mb-4 w-1/2">
                            <label for="address" class="block text-gray-600 mr-2 mb-2">Address: </label>
                            <input type="text" name="address" id="address" class="w-full border border-gray-300 p-2" required>
                        </div>
        
                        <div class="mb-4 w-1/2">
                            <label for="email" class="block text-gray-600 mr-2 mb-2">Email: </label>
                            <input type="email" name="email" id="email" class="w-full border border-gray-300 p-2" required>
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