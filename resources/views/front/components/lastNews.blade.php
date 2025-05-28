<div class="uk-padding-small uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-expand@m" uk-grid="masonry: pack">
    <!-- Columna principal -->
    <div>
        @foreach ($lastNewText as $lastnew)
        <div class="uk-card uk-card-default uk-card-hover uk-border-rounded uk-grid-collapse uk-margin-medium-bottom" uk-grid>
            <!-- Imagen -->
            <div class="uk-card-media-left uk-width-1-3@m uk-cover-container uk-border-rounded">
                @if($lastnew->images->isNotEmpty())
                <a href="{{ route('showArticle', ['category' => $lastnew->category->slug, 'slug' => $lastnew->slug]) }}" 
                   class="uk-link-reset" 
                   title="{{ $lastnew->title }}">
                    <img src="{{ asset('storage/'.$lastnew->user->name.'/'.$lastnew->images[0]->name) }}" 
                         alt="{{ $lastnew->title }}"
                         class="last-image" 
                         uk-cover>
                    <canvas width="600" height="400"></canvas>
                </a>
                @endif
            </div>
            
            <!-- Contenido -->
            <div class="uk-width-2-3@m">
                <div class="uk-card-body">
                    <!-- Metadatos -->
                    <div class="uk-flex uk-flex-middle uk-margin-small-bottom">
                        <a class="uk-text-capitalize uk-link-reset uk-text-small uk-text-bold" 
                           href="{{ route('categories', ['categorySlug' => $lastnew->category->slug]) }}"
                           title="{{ $lastnew->category->name }}">
                            {{ $lastnew->category->name }}
                        </a>
                        <span class="uk-margin-small-left uk-text-muted uk-text-small">
                            {{ $lastnew->created_at->diffForHumans() }}
                        </span>
                    </div>
                    
                    <!-- Título -->
                    <h3 class="uk-card-title uk-margin-remove-top">
                        <a href="{{ route('showArticle', ['category' => $lastnew->category->slug, 'slug' => $lastnew->slug]) }}" 
                           class="blue-links" 
                           title="{{ $lastnew->title }}">
                           {{ Str::limit($lastnew->title, 70) }}
                        </a>
                    </h3>
                    
                    <!-- Resumen -->
                    <p class="uk-text-muted new-desc">{{ Str::limit($lastnew->summary, 115) }}</p>
                </div>
            </div>
        </div>
        @endforeach
        
        <!-- Paginación -->
        <div class="uk-margin-top">
            {{ $lastNewText->links('vendor.pagination.new-pagination') }}
        </div>
    </div>

    <!-- Sidebar -->
    <div class="uk-width-1-3@m">
        <div class="uk-card uk-card-default">
            @include('front.components.sideColumn')
        </div>
    </div>
</div>