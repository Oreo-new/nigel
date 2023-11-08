<div class="aside md:w-2/6 lg:w-1/5 border-r lg:my-5 hidden md:block">
    <div class="author md:pt-8 lg:pt-8 flex flex-wrap pb-5 items-center">
        <img src="{{ asset('images/nigel.webp') }}" alt="Nigel Southway" class="rounded-full border-red-600 border-2 md:w-[77px] md:height-[77px]  lg:w-[70px] lg:height-[70px]">
        <div class="auhtor-desc pl-0  lg:pl-2 pr-4 md:mt-2 lg:mt-0">
           <h2 class="uppercase font-bold text-xl"> <a href="/">Nigel Southway</a> </h2>
           <span class="text-neutral-400 font-bold uppercase text-sm">Advocate / Author</span>
        </div>
    </div>
    <div class="navigation">
        <x-search />
        <ul class="mr-4">
            @foreach ($menus as $item)
                @if($item->name == 'Home')
               
                @else
                <li class="flex py-2 md:pl-0 lg:px-4 {{ bodyClass()  == $item->url ? 'active' : ''; }}">
                    @if($item->svg)
                        <a href="{{'/'.$item->url}}" class="w-full flex" >{!!$item->svg!!} <span class="hover:text-red-600 transition-colors">{{$item->name}}</span></a>
                    @else   
                        <a href="{{'/'.$item->url}}" class="hover:text-red-600 transition-colors">{{$item->name}}</a>
                    @endif
               </li>
                @endif
            @endforeach
        </ul>
        
    </div>

    <!--- this is the menu button on responsive side--->
                
        

   
</div>


<div class="absolute right-0 md:hidden py-2 z-30" x-data="{showMenu : false}" >
    <button @click.prevent="showMenu = !showMenu" class="py-4 flex justify-between" id="toggleBody">
        <svg x-show="!showMenu" class="w-8 h-8 z-30 mr-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="#000">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
        <svg x-show="showMenu" class="w-8 h-8 z-30 mr-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="#000"><path d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
    <div class="absolute top-0 bg-gray-400 right-0 w-[300px] sm:w-64  pt-4 shadow space-y-6"  x-show="showMenu" 
                    x-transition:enter="transform transition-transform duration-300"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition-transform duration-300"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full">

    <!-- Your content here -->
    <div class="navigation-mobile mt-12">

        <div class="author flex flex-wrap pb-5">
            <img src="{{ asset('images/nigel.webp') }}" alt="Nigel Southway" class="rounded-full border-red-600 border-2 mx-auto">
            <div class="auhtor-desc w-full ">
               <h2 class="uppercase font-bold text-xl text-center"> <a href="/">Nigel Southway</a> </h2>
               <span class="text-black font-bold uppercase text-sm text-center w-full mx-auto block">Advocate / Author</span>
            </div>
        </div>

        <div class="ml-4">
            <x-search />
        </div>
        
        <ul class="mx-4 mb-5">
            @foreach ($menus as $item)
                @if($item->name == 'Home')
               
                @else
                <li class="flex py-2 px-4 {{ bodyClass()  == $item->url ? 'active' : ''; }}">
                    @if($item->svg)
                        <a href="{{'/'.$item->url}}" class="w-full flex text-white" >{!!$item->svg!!} <span class="hover:text-red-600 transition-colors text-white">{{$item->name}}</span></a>
                    @else   
                        <a href="{{'/'.$item->url}}" class="hover:text-red-600 transition-colors text-white">{{$item->name}}</a>
                    @endif
               </li>
                @endif
            @endforeach
        </ul>
    </div>
    </div>
</div>
<script>
    // Get a reference to the button element
    var toggleButton = document.getElementById('toggleBody');
  
    // Add an event listener to the button
    toggleButton.addEventListener('click', function() {
      // Get a reference to the body element
      var body = document.body;
  
      // Toggle the 'body-class' class on the body
      body.classList.toggle('stop');
    });
  </script>
  
  </body>
  </html>
  

  