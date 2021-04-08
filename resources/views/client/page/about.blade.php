@extends('client.layout.master')
@section('title', 'E-Book | Home ')
@section('headname','Dashboard')
@section('content')

<section class="breadcrumb-section">
	<h2 class="sr-only">Site Breadcrumb</h2>
	<div class="container">
		<div class="breadcrumb-contents">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
					<li class="breadcrumb-item active">About us</li>
				</ol>
			</nav>
		</div>
	</div>
</section>
<section class="inner-page-sec-padding-bottom">
            <div class="container">
                <div class="blog-post post-details mb--50">
                    <div class="blog-content mt--30">
                        <header>
                            <h3 class="blog-title"> About us</h3>
                            <div class="post-meta">
                                <span class="post-author">
                                    <i class="fas fa-user"></i>
                                    <span class="text-gray">Posted by : </span>
                                    admin
                                </span>

                                @foreach($aboutus as $aboutdetails)

                                <span class="post-separator">|</span>
                                <span class="post-date">
                                <i class="far fa-calendar-alt"></i>
                                <span class="text-gray">On : </span>
                                {{$aboutdetails->created_at}}       </span>
                            </div>
                        </header>
                        <article>
                        
                            <h3 class="d-none sr-only">blob-article</h3>
                            <p class="p-0">{{$aboutdetails->about}}</p>

                            @endforeach

                            
                            <!-- <blockquote>
                                <p>Quisque semper nunc vitae erat pellentesque, ac placerat arcu consectetur. In
                                    venenatis elit ac
                                    ultrices convallis.
                                    Duis est nisi, tincidunt ac urna sed, cursus blandit lectus. In ullamcorper sit amet
                                    ligula ut
                                    eleifend. Proin dictum
                                    tempor ligula, ac feugiat metus. Sed finibus tortor eu scelerisque scelerisque.</p>
                            </blockquote>
                            <p>Aenean et tempor eros, vitae sollicitudin velit. Etiam varius enim nec quam tempor, sed
                                efficitur ex
                                ultrices.
                                Phasellus pretium est vel dui vestibulum condimentum. Aenean nec suscipit nibh.
                                Phasellus nec lacus id
                                arcu facilisis
                                elementum. Curabitur lobortis, elit ut elementum congue, erat ex bibendum odio, nec
                                iaculis lacus sem
                                non lorem. Duis
                                suscipit metus ante, sed convallis quam posuere quis. Ut tincidunt eleifend odio, ac
                                fringilla mi
                                vehicula nec. Nunc
                                vitae lacus eget lectus imperdiet tempus sed in dui. Nam molestie magna at risus
                                consectetur, placerat
                                suscipit justo
                                dignissim. Sed vitae fringilla enim, nec ullamcorper arcu.
                                </p>
                            <p>
                            Suspendisse turpis ipsum, tempus in nulla eu, posuere pharetra nibh. In dignissim vitae
                                lorem non
                                mollis. Praesent
                                pretium tellus in tortor viverra condimentum. Nullam dignissim facilisis nisl, accumsan
                                placerat justo
                                ultricies vel.
                                Vivamus finibus mi a neque pretium, ut convallis dui lacinia. Morbi a rutrum velit.
                                Curabitur sagittis
                                quam quis
                                consectetur mattis. Aenean sit amet quam vel turpis interdum sagittis et eget neque.
                                Nunc ante quam,
                                luctus et neque a,
                                interdum iaculis metus. Aliquam vel ante mattis, placerat orci id, vehicula quam.
                                Suspendisse quis eros
                                cursus, viverra
                                urna sed, commodo mauris. Cras diam arcu, fringilla a sem condimentum, viverra facilisis
                                nunc.
                                Curabitur vitae orci id
                                nulla maximus maximus. Nunc pulvinar sollicitudin molestie.
                                </p> -->
                        </article>
                    </div>
                </div>
            </div>
        </section>

@endsection