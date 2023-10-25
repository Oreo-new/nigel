<div aria-label="breadcrumb">
    <ul class="breadcrumb flex mt-5">
      <li class="breadcrumb-item text-neutral-400 text-xs uppercase pr-2 relative">Home</li>
        @foreach($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item text-neutral-400 text-xs uppercase px-2 relative">
                @if($breadcrumb['url'])
                    {{ $breadcrumb['label'] }}
                @else
                    {{ $breadcrumb['label'] }}
                @endif
            </li>
        @endforeach
    </ul>
</div>
