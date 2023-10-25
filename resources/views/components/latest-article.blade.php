<div class="pl-8 pr-4 pt-4">
    @if(!$latest->isEmpty())
        <h4 class="text-xl">Recent Post</h4>
        <div class="mt-5">
            @foreach($latest as $article)
                <p class="text-red-600 hover:underline transition-all mb-3"><a href="{{'/tbm-articles'.'/'.$article->slug}}">{{$article->title}}</a> </p>
            @endforeach
        </div>
    @endif

    @if(!$groupedArticles->isEmpty())
    <h4 class="text-xl mt-8 mb-5">Recent Post</h4>
    @foreach ($groupedArticles as $yearMonth => $articles) 
   
        @php
            list($year, $month) = explode('-', $yearMonth);
        @endphp
                
            <p class="text-red-600 hover:underline transition-all mb-3"> <a href="{{'/archived/'.$month.'-'.$year}}"> {{ $month }}  {{ $year }} </a></p>
        
        
        
    @endforeach
    @endif
</div>