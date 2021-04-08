@if ($books->count()>0)
							
@foreach ($books as $book)
<div class="col-lg-4 col-sm-6">
    <div class="product-card card-style-list">
        <div class="product-grid-content">
            <div class="product-header">
                <a href="#" class="author">
                {{$book->author->firstName}} {{$book->author->lastName}}
                </a>
            <h3><a href="{{route('productdetail',['book_id'=>$book->id])}}">{{$book->title}}</a></h3>
            </div>
            <div class="product-card--body">
                <div class="card-image">
                <img src="{{asset("uploads/images/".$book->image)}}" alt="{{$book->title}}">
                    <div class="hover-contents">
                        <a href="{{route('productdetail',['book_id'=>$book->id])}}" class="hover-image">
                            <img src="{{asset("uploads/images/".$book->image)}}" alt="{{$book->title}}">
                        </a>
                        <div class="hover-btns">
                        <a href="{{route('/cart')}}" class="single-btn">
                                <i class="fas fa-shopping-basket"></i>
                            </a>
                        <a href="{{route('/whishlist')}}" class="single-btn">
                                <i class="fas fa-heart"></i>
                            </a>
                            <a href="compare.html" class="single-btn">
                                <i class="fas fa-random"></i>
                            </a>
                            <a href="#" data-toggle="modal" data-target="#quickModal"
                                class="single-btn">
                                <i class="fas fa-eye"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="price-block">
                    <span class="price">
                        @if ($book->discount>0)
                            
                        ${{$book->price-($book->discount/100)*$book->price}}
                        @else
                        ${{$book->price}}

                        @endif
                    </span>
                    @if ($book->discount>0)
                    <del class="price-old">${{$book->price}}</del>
                    <span class="price-discount">{{$book->discount}}%</span>
                    @endif

                </div>
            </div>
        </div>
        <div class="product-list-content">
            <div class="card-image">
                <img src="{{asset("uploads/images/".$book->image)}}" alt="">
            </div>
            <div class="product-card--body">
                <div class="product-header">
                    <a href="#" class="author">
                {{$book->author->firstName}} {{$book->author->lastName}}
                        
                    </a>
                <h3><a href="{{route('productdetail',['book_id'=>$book->id])}}" tabindex="0">{{$book->title}}</a></h3>
                </div>
                <article>
                    <h2 class="sr-only">Card List Article</h2>
                    <p>{{substr($book->description,0,20)}}..</p>
                </article>
                <div class="price-block">
                    <span class="price">
                        @if ($book->discount>0)
                            
                        ${{$book->price-($book->discount/100)*$book->price}}
                        @else
                        ${{$book->price}}

                        @endif
                    </span>
                    @if ($book->discount>0)
                    <del class="price-old">${{$book->price}}</del>
                    <span class="price-discount">{{$book->discount}}%</span>
                    @endif
                </div>
                <div class="rating-block">
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star star_on"></span>
                    <span class="fas fa-star "></span>
                </div>
                <div class="btn-block">
                    <a href="#" class="btn btn-outlined">Add To Cart</a>
                    <a href="#" class="card-link"><i class="fas fa-heart"></i> Add To
                        Wishlist</a>
                    <a href="#" class="card-link"><i class="fas fa-random"></i> Add To
                        Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>	
@endforeach

@endif