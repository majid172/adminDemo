@php
    $element = getContent('feature.element',false,4);
@endphp
<section class="my-lg-14 my-8">
    <div class="container">
        <div class="row">
            @foreach($element as $data)
                <div class="col-md-6 col-lg-3">
                    <div class="mb-8 mb-xl-0">
                        <div class="mb-6">
                            <img src="{{getImage(getFilePath('frontend').'/feature/'.@$data->data_values->icon )}}" alt="" /></div>
                        <h3 class="h5 mb-3">{{$data->data_values->title}}</h3>
                        <p>{{$data->data_values->description}}</p>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
