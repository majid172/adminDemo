@php
    $content = getContent('category.content',true);
    $categories = \App\Models\Category::get();
@endphp
<section class="mb-lg-10 mt-lg-14 my-8">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-6">
                <h3 class="mb-0">{{__($content->data_values->heading)}}</h3>
            </div>
        </div>
        <div class="category-slider">
            @foreach($categories as $category)
                <div class="item">
                    <a href="{{route('user.shop.list')}}" class="text-decoration-none text-inherit">
                        <div class="card card-product mb-lg-4">
                            <div class="card-body text-center py-8">
                                <img src="{{getImage(getFilePath('category').'/'.$category->path.'/'.$category->image)}}"
                                     alt="Grocery Ecommerce"
                                     class="mb-3 img-fluid" />
                                <div class="text-truncate">{{__($category->cat_name)}}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
