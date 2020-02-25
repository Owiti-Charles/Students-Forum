
<div class="ed_transprentbg ed_toppadder100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_heading_top ed_toppadder50">
                    <h3>Latest News & Events</h3>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="ed_populer_areas_slider">
                    <div class="owl-carousel owl-theme">
                        @foreach($news as $new)
                        <div class="item">
                            <div class="ed_item_img">
                                <img src="images/slider/news.jpg" alt="item2" class="img-responsive">
                            </div>
                            <div class="ed_item_description" >
                                <h4 style="color: #1C77D6;">{{$new->title}}</h4>
                                <p>{!! $new->ShortContent !!}</p>
                            <p>Posted on:<style="color:#27015F">{{$new->created_at->toDayDateTimeString()}}</p>
                            </div>
                        </div>
                        @endforeach
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>