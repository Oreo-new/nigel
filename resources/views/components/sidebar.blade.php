<div class="aside w-1/5 border-r my-5">
    <div class="author pt-8 flex pb-5">
        <img src="{{ asset('images/nigel.webp') }}" alt="Nigel Southway" class="rounded-full border-red-600 border-2">
        <div class="auhtor-desc pl-4 pr-4">
           <h2 class="uppercase font-bold text-xl">Nigel Southway</h2>
           <span class="text-neutral-400 font-bold uppercase text-sm">The Author</span>
        </div>
    </div>
    <div class="navigation">
        <x-search />
        <ul class="mr-4">
            @foreach ($menus as $item)
                @if($item->name == 'Home')
               
                @else
                <li class="flex py-2 px-4 {{ bodyClass()  == $item->url ? 'active' : ''; }}">
                    @if($item->svg)
                        <a href="{{$item->url}}" class="w-full flex" >{!!$item->svg!!} {{$item->name}}</a>
                    @else   
                        <a href="{{$item->url}}">{{$item->name}}</a>
                    @endif
               </li>
                @endif
            @endforeach
        </ul>
        
    </div>
   
</div>