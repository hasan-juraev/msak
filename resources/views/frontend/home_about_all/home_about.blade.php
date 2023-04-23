@php
    $about = App\Models\AboutPage::find(1);
    $multi_images = App\Models\MultiImage::all();

@endphp

<section id="aboutSection" class="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">               
                        
                <ul class="about__icons__wrap">
                    @foreach($multi_images as $image)
                    <li>
                        
                        <img class="light" src="{{ asset($image->multi_image) }}" alt="XD">
                      
                    </li>
                    @endforeach
                   
                </ul>                     
                
            </div>

            <div class="col-lg-6">
                <div class="about__content">
                    <div class="section__title">
                        <span class="sub-title">01 - About</span>
                        <h2 class="title">{{ $about->title }}</h2>
                    </div>
                    <div class="about__exp">
                        <div class="about__exp__icon">
                            <img src="assets/img/icons/about_icon.png" alt="">
                        </div>
                        <div class="about__exp__content">
                            <p>{{ $about->short_title }} </p>
                        </div>
                    </div>
                    
                    <!-- <form method="get" action="tips_for_muslims.pdf">
                    <button type="submit">Download!</button>
                    </form> -->
                   <a href="tips_for_muslims.pdf" download="tips_for_muslims.pdf" class="btn">Download tips for Muslims</a>
      

                </div>
            </div>
        </div>
    </div>
</section>