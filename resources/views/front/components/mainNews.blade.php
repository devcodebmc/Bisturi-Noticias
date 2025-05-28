
<div class="uk-position-relative uk-margin-large-top">
    <!-- Slider - Versión desktop -->
    
    <!-- Título de la categoría  exepto en /-->
    @if (Route::current()->getName() != "index")
        <div class="uk-width-1-1@m">
            <h4 class="side-title uk-text-left">
                {{ $article->category->name }}
            </h4>
        </div> 
    @endif

    <div class="uk-visible@m">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow>
          <div class="uk-slideshow-items uk-border-rounded">
              @foreach ($article->images as $image)
              <div>
                  <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}" 
                    title="{{ $article->title }}"
                    class="uk-display-block">
                      <img src="{{ asset('storage/'.$article->user->name.'/'.$image->name) }}" 
                          alt="{{ $article->title }}" 
                          class="uk-cover"
                          uk-cover>
                      <canvas width="600" height="400"></canvas>
                  </a>
              </div>
              @endforeach
          </div>
          <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
        </div>
        
        <!-- Card superpuesta semitransparente - Desktop -->
        <div class="uk-position-bottom-center uk-position-medium">
            <div class="uk-card uk-card-default uk-border-rounded uk-box-shadow-large" style="background-color: rgba(255,255,255,0.8); backdrop-filter: blur(2px);">
                <div class="uk-card-body">
                    <div class="uk-flex uk-flex-between uk-flex-wrap">
                        <ul class="uk-comment-meta uk-subnav uk-margin-remove-top">
                            <li>
                                <a class="uk-text-capitalize" href="{{ route('categories', ['categorySlug' => $article->category->slug]) }}">
                                    <span class="side-title">{{ $article->category->name }}</span>
                                </a>
                            </li>  
                            <li class="font-codec">{{ $article->created_at->diffForHumans() }}</li>
                        </ul>     
                        
                        <ul class="uk-subnav uk-margin-remove-top">
                            @include('front.partials.sharelinks')
                        </ul>        
                    </div>
                    
                    <h1 class="uk-card-title uk-text-bold uk-margin-small-top uk-margin-small-bottom">
                        <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}"
                           class="blue-links"
                           title="{{ $article->title }}">
                            {{ Str::limit($article->title, 100) }}
                        </a>
                    </h1>
                    
                    <div class="uk-flex uk-flex-between uk-flex-middle">
                        <p class="uk-text-emphasis new-desc uk-margin-remove uk-width-expand">
                            {{ Str::limit($article->summary, 150) }}
                        </p>
                        <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}"
                           title="{{ $article->summary }}"
                           uk-tooltip="pos: top-right; offset: 10"
                           class="uk-link-reset uk-margin-left"
                           uk-icon="icon: arrow-right; ratio: 1.5">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Versión móvil (sin espacios) -->
    <div class="uk-hidden@m">
        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow>
            <div class="uk-slideshow-items uk-border-rounded">
                @foreach ($article->images as $image)
                <div>
                    <img src="{{ asset('storage/'.$article->user->name.'/'.$image->name) }}" 
                         alt="{{ $article->title }}" 
                         class="uk-cover"
                         uk-cover>
                    <canvas width="600" height="400"></canvas>
                </div>
                @endforeach
            </div>
            <a class="uk-position-center-left uk-position-small uk-hidden-hover" href uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-small uk-hidden-hover" href uk-slidenav-next uk-slideshow-item="next"></a>
        </div>
        
        <!-- Card unida a la imagen -->
        <div class="uk-card uk-card-default uk-border-rounded uk-box-shadow-small">
            <div class="uk-card-body">
                <div class="uk-flex uk-flex-between uk-flex-wrap">
                    <ul class="uk-comment-meta uk-subnav uk-margin-remove-top">
                        <li>
                            <a class="uk-text-capitalize" href="{{ route('categories', ['categorySlug' => $article->category->slug]) }}">
                                <span class="side-title">{{ $article->category->name }}</span>
                            </a>
                        </li>  
                        <li class="font-codec">{{ $article->created_at->diffForHumans() }}</li>
                    </ul>     
                    
                    <ul class="uk-subnav uk-margin-remove-top">
                        @include('front.partials.sharelinks')
                    </ul>        
                </div>
                
                <h1 class="uk-card-title uk-text-bold uk-margin-small-top uk-margin-small-bottom">
                    <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}"
                       class="blue-links"
                       title="{{ $article->title }}">
                        {{ Str::limit($article->title, 100) }}
                    </a>
                </h1>
                
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <p class="uk-text-emphasis new-desc uk-margin-remove uk-width-expand">
                        {{ Str::limit($article->summary, 150) }}
                    </p>
                    <a href="{{ route('showArticle', ['category' => $article->category->slug, 'slug' => $article->slug]) }}"
                       title="Leer más"
                       class="uk-link-reset uk-margin-left"
                       uk-icon="icon: arrow-right; ratio: 1.5">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- @push('js')
<script>
    let mytags = document.getElementsByClassName('tags');
    let twitter = document.querySelector('.twitter');
    let newtags = [];
    let url = ';'
    function newTags(){
        for (var i = 0; i < mytags.length; i++) {
            newtags.push(mytags[i].value);
        }
        newtags = newtags.toString();
        url = `https://twitter.com/intent/tweet?url={{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}&text={{ $article->title }}&via=BisturiNoticias&hashtags=${newtags}`
        
        twitter.setAttribute('href',url);

    }

    newTags();
</script>  
@endpush  --}}


 @push('ogf')
    <meta property="og:locale" content="es_MX">
        <meta property="og:type" content="article"> 
        <meta property="og:title" content="{{ $article->title }}"> 
        @if ( empty($article->excerpt) )
            <meta property="og:description" content="{{ $article->summary }}">
        @else
            <meta property="og:description" content="{{ $article->excerpt }}">
        @endif
        <meta property="og:url" content="{{ Request::root().'/'.$article->category->slug.'/'.$article->slug }}">
        @if ( Route::current()->getName() == "index" )
            <meta property="og:site_name" content="Bisturí Noticias">  
        @else
            <meta property="og:site_name" 
                    content="Bisturí Noticias | {{ $article->category->name }}">
        @endif
        <meta property="article:publisher" content="https://www.facebook.com/bisturibnnoticias/">
        <meta property="og:image" 
                content="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}">
        <meta property="og:image:height" content="600">
        <meta property="og:image:width" content="1200">
        <meta property="fb:app_id" content="1963124430785043" />
        
@endpush 

@push('ogt')
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:creator" content="@BisturiNoticias">
<meta name="twitter:site" content="@BisturiNoticias">
<meta name="twitter:title" content="{{ Str::limit($article->title, 70) }}">
<meta name="twitter:description" content="{{ $article->summary }}">
<meta name="twitter:image" 
        content="{{ asset('storage' . '/' . $article->user->name . '/'. $image->name ) }}">
<meta name="twitter:image:alt" content="{{ $article->title }}">
@endpush

