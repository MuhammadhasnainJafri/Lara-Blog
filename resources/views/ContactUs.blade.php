@extends('layouts.app')

@section('content')

<section class="s-content site-page">
    <div class="row">
        <div class="column large-12">

            <section>

                <div class="s-content__media">
                    @if (session('message'))
                        
                    
                    
                        <h3 class='text-success bg-light align-center p-3'>{{session('message')}}</h3>
                    
                    @endif
                    <img src="images/thumbs/contact/contact-1050.jpg" 
                         srcset="images/thumbs/contact/contact-2100.jpg 2100w, 
                                 images/thumbs/contact/contact-1050.jpg 1050w, 
                                 images/thumbs/contact/contact-525.jpg 525w" sizes="(max-width: 2100px) 100vw, 2100px" alt="">
                </div> <!-- end s-content__media -->

                <div class="s-content__primary">

                    <h1 class="s-content__title">Get In Touch With Us.</h1>	

                    <p class="lead">
                    If you have any query feel free to contact us.We are waiting for your response.
                    
                    </p>

                    <hr>

                    <div class="row block-large-1-2 block-tab-full s-content__blocks">
                        <div class="column">
                            <h4>Where to Find Us</h4>
                            <p>
                            Jinnah Hostel, PMAS Arid agriculture university ,Rawalpindi<br>
                            pakistan
                            </p>
                        </div>

                        <div class="column">
                            <h4>Contact Info</h4>
                            <p>
                            mhasnainjafri0099@gmail.com<br>
                            
                            Phone: (+92) 344 6800893
                            </p> 
                        </div>
                    </div> <!-- end s-content__blocks -->

                    <form name="cForm" id="cForm" class="s-content__form" method="post" action="ContactUs">
                        @csrf
                        <fieldset>

                            <div class="form-field">
                                <input name="name" type="text" id="cName" class="h-full-width" placeholder="Your Name" value="">
                            </div>
                            <div class="form-field">
                                <input name="email" type="email" id="cEmail" class="h-full-width" placeholder="Your Email" value="">
                            </div>
                            <div class="form-field">
                                <input name="subject" type="text" class="h-full-width" placeholder="Message subject" value="">
                            </div>

                            <div class="message form-field">
                                <textarea name="message" id="cMessage" class="h-full-width" placeholder="Your Message" ></textarea>
                            </div>

                            <button type="submit" class="submit btn btn--primary btn--medium h-full-width">Submit</button>

                        </fieldset>
                   </form> <!-- end form -->

                </div> <!-- end s-content__primary -->

            </section>

        </div> <!-- end column -->
    </div> <!-- end row -->
</section> <!-- end s-content -->

    
    
@endsection






