<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-2@l" 
     uk-lightbox="animation: fade" 
     uk-grid>
    @foreach ($lastNewPhoto as $lastPhoto)
        @foreach ($lastPhoto->images as $key => $image)
            @if ($key >= 0)
            <div>
                <a class="uk-inline uk-display-block" 
                   href="{{ asset('storage'.'/'.$lastPhoto->user->name.'/'.$image->name) }}" 
                   data-caption="{{ $lastPhoto->title }}">
                    <div class="uk-cover-container uk-border-rounded">
                        <img src="{{ asset('storage'.'/'.$lastPhoto->user->name.'/'.$image->name) }}" 
                             class="uk-cover"
                             loading="lazy"
                             style="object-fit: cover;"
                             width="1800" 
                             height="1200" 
                             alt="{{ $lastPhoto->title }}"
                             uk-cover>
                        <canvas width="600" height="400"></canvas>
                    </div>
                </a>
            </div>
            @endif
        @endforeach
    @endforeach
</div>