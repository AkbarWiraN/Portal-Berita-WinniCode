<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="{{asset('./output.css')}}" rel="stylesheet" />
	<link href="{{asset('./main.css')}}" rel="stylesheet" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
		rel="stylesheet" />
	<!-- CSS -->
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
</head>

<body class="font-[Poppins] pb-[83px]">
    <x-navbar/>
	<nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
            @foreach($categories as $item_category)
			<a href="{{route('front.category', $item_category->slug)}}" class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
				<div class="w-6 h-6 flex shrink-0">
					<img src="{{Storage::url($item_category->icon)}}" alt="icon" />
				</div>
				<span>{{$item_category->name}}</span>
			</a>
			@endforeach
	</nav>
	<header class="flex flex-col items-center gap-[50px] mt-[70px]">
		<div id="Headline" class="max-w-[1130px] mx-auto flex flex-col gap-4 items-center">
			<p class="w-fit text-[#A3A6AE]">{{$articleNews->created_at->format('M d, Y')}} • {{$articleNews->category->name}}</p>
			<h1 id="Title" class="font-bold text-[46px] leading-[60px] text-center two-lines">{{$articleNews->name}}</h1>
			<div class="flex items-center justify-center gap-[70px]">
				<a id="Author" href="{{route('front.author', $articleNews->author->slug)}}" class="w-fit h-fit">
					<div class="flex items-center gap-3">
						<div class="w-10 h-10 rounded-full overflow-hidden">
							<img src="{{Storage::url($articleNews->author->avatar)}}" class="object-cover w-full h-full" alt="{{$articleNews->author->name}}">
						</div>
						<div class="flex flex-col">
							<p class="font-semibold text-sm leading-[21px]">{{$articleNews->author->name}}</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">{{$articleNews->author->occupation}}</p>
						</div>
					</div>
				</a>
				<!-- <div id="Rating" class="flex items-center gap-1">
					<div class="flex items-center">
						<div class="w-4 h-4 flex shrink-0">
							<img src="assets/images/icons/Star 1.svg" alt="star">
						</div>
						<div class="w-4 h-4 flex shrink-0">
							<img src="assets/images/icons/Star 1.svg" alt="star">
						</div>
						<div class="w-4 h-4 flex shrink-0">
							<img src="assets/images/icons/Star 1.svg" alt="star">
						</div>
						<div class="w-4 h-4 flex shrink-0">
							<img src="assets/images/icons/Star 1.svg" alt="star">
						</div>
						<div class="w-4 h-4 flex shrink-0">
							<img src="assets/images/icons/Star 1.svg" alt="star">
						</div>
					</div>
					<p class="font-semibold text-xs leading-[18px]">(12,490)</p>
				</div>
			</div> -->
		</div>
		<div class="w-full h-[500px] flex shrink-0 overflow-hidden">
			<img src="{{Storage::url($articleNews->thumbnail)}}" class="object-cover w-full h-full" alt="cover thumbnail">
		</div>
	</header>
	<section id="Article-container" class="max-w-[1130px] mx-auto flex gap-20 mt-[50px]">
		<article id="Content-wrapper">
			{!! $articleNews->content !!}
		</article>
		<div class="side-bar flex flex-col w-[300px] shrink-0 gap-10">
			<div class="ads flex flex-col gap-3 w-full">
				<a href="{{$bannerads->link}}">
					<img src="{{Storage::url($bannerads->thumbnail)}}" class="object-contain w-full h-full" alt="ads" />
				</a>
				<!-- <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
							src="assets/images/icons/message-question.svg" alt="icon" /></a>
				</p> -->
			</div>
			<div id="More-from-author" class="flex flex-col gap-4">
				<p class="font-bold">More From Author</p>
				@forelse($author_news as $item_news)
				<a href="{{route('front.details', $item_news->slug)}}" class="card-from-author">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[14px] flex gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
						<div class="w-[70px] h-[70px] flex shrink-0 overflow-hidden rounded-2xl">
							<img src="{{Storage::url($item_news->thumbnail)}}" class="object-cover w-full h-full"
								alt="thumbnail">
						</div>
						<div class="flex flex-col gap-[6px]">
							<p class="line-clamp-2 font-bold">
								{{substr($item_news->name, 0, 60)}}{{strlen($item_news->name) > 60 ? '...' : ''}}
							</p>
							<p class="text-xs leading-[18px] text-[#A3A6AE]">{{$item_news->created_at->format('M d, Y')}} • {{$item_news->category->name}}</p>
						</div>
					</div>
				</a>
				@empty
				<p>Belum ada artikel terbaru lainnya</p>
				@endforelse

			</div>
			<!-- <div class="ads flex flex-col gap-3 w-full">
				<a href="">
					<img src="assets/images/iklans/banner1.png" class="object-contain w-full h-full" alt="ads" />
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
					Our Advertisement <a href="{{$bannerads->link}}" class="w-[18px] h-[18px]"><img
							src="{{Storage::url($bannerads->thumbnail)}}" alt="icon" /></a>
				</p>
			</div> -->
		</div>
	</section>
	<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px]">
		<div class="flex flex-col gap-3 shrink-0 w-fit">
			<a href="{{$bannerads->link}}">
				<div class="w-[900px] h-[120px] flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
					<img src="{{Storage::url($bannerads->thumbnail)}}" class="object-cover w-full h-full" alt="ads" />
				</div>
			</a>
			<!-- <p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1">
				Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img
						src="assets/images/icons/message-question.svg" alt="icon" /></a>
			</p> -->
		</div>
	</section>
	<section id="Up-to-date" class="w-full flex justify-center mt-[70px] py-[50px] bg-[#F9F9FC]">
		<div class="max-w-[1130px] mx-auto flex flex-col gap-[30px]">
			<div class="flex justify-between items-center">
				<h2 class="font-bold text-[26px] leading-[39px]">
					Other News You <br />
					Might Be Interested
				</h2>
			</div>
			<div class="grid grid-cols-3 gap-[30px]">
				@forelse($articles as $article)
				<a href="{{route('front.details', $article->slug)}}" class="card">
				<div
					class="flex flex-col gap-4 p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white">
					<div class="thumbnail-container h-[200px] relative rounded-[20px] overflow-hidden">
						<div
							class="badge absolute left-5 top-5 bottom-auto right-auto flex p-[8px_18px] bg-white rounded-[50px]">
							<p class="text-xs leading-[18px] font-bold">{{$article->category->name}}</p>
						</div>
						<img src="{{Storage::url($article->thumbnail)}}" alt="thumbnail photo"
							class="w-full h-full object-cover" />
					</div>
					<div class="flex flex-col gap-[6px]">
						<h3 class="text-lg leading-[27px] font-bold">{{substr($article->name, 0, 50)}}{{strlen($article->name) > 50 ? '...' : ''}}</h3>
						<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$article->created_at->format('M d, Y')}}</p>
					</div>
				</div>
				</a>
				@empty
				<p>Belum ada data lainnya</p>
				@endforelse
				<!-- <a href="details.html" class="card-news">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
						<div
							class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<p
								class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
								SPORT</p>
							<img src="assets/images/thumbnails/th-cyclist.png" class="object-cover w-full h-full"
								alt="thumbnail" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px]">Bersepeda dapat membuat diri menjadi lebih baik
								lagi</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
				<a href="details.html" class="card-news">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
						<div
							class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<p
								class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
								ENTERTAINMENT</p>
							<img src="assets/images/thumbnails/camp.png" class="object-cover w-full h-full"
								alt="thumbnail" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px]">Beberapa artis ini merayakan ultah di tengah
								hutan raya</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a>
				<a href="details.html" class="card-news">
					<div
						class="rounded-[20px] ring-1 ring-[#EEF0F7] p-[26px_20px] flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white">
						<div
							class="thumbnail-container w-full h-[200px] rounded-[20px] flex shrink-0 overflow-hidden relative">
							<p
								class="badge-white absolute top-5 left-5 rounded-full p-[8px_18px] bg-white font-bold text-xs leading-[18px]">
								POLITIC</p>
							<img src="assets/images/thumbnails/th-demonstration.png" class="object-cover w-full h-full"
								alt="thumbnail" />
						</div>
						<div class="card-info flex flex-col gap-[6px]">
							<h3 class="font-bold text-lg leading-[27px]">Terjadi demo pada ibu kota jakarta membuat
								macet parah</h3>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">12 Jun, 2024</p>
						</div>
					</div>
				</a> -->
			</div>
		</div>
	</section>

	<script src="{{asset('customjs/two-lines-text.js')}}"></script>
	<script src="https://cdn.tailwindcss.com"></script>
</body>

</html>