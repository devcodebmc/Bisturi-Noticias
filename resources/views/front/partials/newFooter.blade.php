<footer class="uk-background-muted uk-padding">
  <div class="uk-container">
    <div class="uk-grid-large uk-child-width-auto uk-child-width-1-5@l uk-child-width-1-3@s" uk-grid>
        @foreach ($categories as $category)
            <div>
                <h4 class="side-title">{{ $category->name }}</h4>
                <ul class="uk-list">
                    @foreach($category->subcategories as $subcategory) 
                        <li>
                            <a class="blue-links" href="#">{{ $subcategory->name }}</a>
                        </li> 
                    @endforeach
                </ul>
            </div>
        @endforeach
        <div class="uk-width-1-2@m">
            <h3 class="uk-text-bold side-title uk-margin-remove-bottom" style="color: #74899c">
                BN Noticias
            </h3>
            <p class="uk-text-small uk-text-left uk-margin-remove-top new-desc" style="letter-spacing: 1px;">
                Somos un medio de comunicación con las noticias más relevantes de México y del mundo.
            </p>
            <div class="uk-flex uk-flex-center">
                @include('front.components.socials', ['location' =>'footer'])
            </div>
        </div>
    </div>
    <div class="uk-text-center uk-margin-small-top">
        © 2025 
        <a class="blue-links" href="https://www.bydsolutions.com/" target="_blank" 
            rel="noopener noreferrer">
            ByD Solutions
        </a> 
        💻
    </div>
  </div>
</footer>
