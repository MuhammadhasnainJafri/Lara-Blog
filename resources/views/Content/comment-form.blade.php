

            <div class="row comment-respond">

                <!-- START respond -->
                <div id="respond" class="column">

                    <h4 class="align-center">
                    Add Comment 
                    
                    </h4>

                    
<form name="contactForm" id="contactForm" method="post" action="/posts/{{$post->id}}/comment" autocomplete="off">
                        @csrf
                        <fieldset>

                            
                            <div class="message form-field">
                                <textarea name="body" id="cMessage" class="h-full-width" placeholder="Your Comment here"></textarea>
                            </div>

                            <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">

                        </fieldset>
                    </form> <!-- end form -->


                </div>
                <!-- END respond-->

            </div> <!-- end comment-respond -->
        