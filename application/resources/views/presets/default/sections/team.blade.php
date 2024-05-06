@php
   /*
    *   singleQuery True / false
    * By default singleQuery is false , If you want only one row you have to set `True`
    *
    * limit to fetch record of data
    */
    $elements = getContent('team.element',false,10);
    #getContent('data_key','singleQuery true/false','limit');
@endphp
<section class="mt-14">
    <!-- container -->
    <div class="container">
        <div class="row">
            <!-- col -->
            <div class="offset-md-1 col-md-10">
                <div class="mb-11">
                    <!-- heading -->
                    <h2>@lang('Our Leadership')</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mb-14">
    <!-- slider -->
    <div class="team-slider mx-4">
        <!-- item -->
        @foreach($elements as $element)
            <div class="item">
                <div class="bg-light rounded">
                    <!-- text -->
                    <div class="p-6">
                        <h5 class="h6 mb-0">{{__($element->data_values->title)}}</h5>
                        <small>{{__($element->data_values->designation)}}</small>
                    </div>
                    <!-- img -->
                    <img src="{{getImage(getFilePath('frontend').'/team/'.$element->data_values->team_img)}}" alt="" class="img-fluid" />
                </div>
            </div>
        @endforeach


    </div>
</section>
