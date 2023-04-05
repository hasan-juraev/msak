<section class="blog">
    <div class="container">
        <div class="row gx-0 justify-content-center">
    @php
        $blogs =  App\Models\Blog::latest()->limit(3)->get();
    @endphp



    @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6 col-sm-9">
                <div class="blog__post__item">
                    <div class="blog__post__thumb">
                        <a href="blog-details.html"><img src="{{ asset($blog->blog_image) }}" alt=""></a>
                        <div class="blog__post__tags">
                            <a href="{{ route('blog.category', $blog['category']['id'] ) }}">{{ $blog['category']['blog_category'] }}</a>
                        </div>
                    </div>
                    <div class="blog__post__content">
                        <span class="date"> {{ $blog->created_at->diffForHumans() }} </span>
                        <h3 class="title"><a href="{{ route('blog.detail',  $blog->id) }}"> {{ $blog->blog_title }} </a></h3>
                        <a href="{{ route('blog.detail',  $blog->id) }}" class="read__more">Read mORe</a>
                    </div>
                </div>
            </div>          
    @endforeach

        <div class="blog__button text-center">
            <a href="{{ route('home.blog') }}" class="btn">more blog</a>
        </div>

    </div>
</section>