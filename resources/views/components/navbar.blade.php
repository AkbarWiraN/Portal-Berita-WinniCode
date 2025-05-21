<nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
		<div class="logo-container flex gap-[30px] items-center">
            <a href="/" class="flex shrink-0">
            <img src="https://winnicode.com/mazer/images/nav-banner-logo.png" alt="logo" width="180">
			</a>
			<div class="h-12 border border-[#E8EBF4]"></div>
			<form method="GET" action="{{ route('front.search') }}">
            @csrf
				<label for="search-bar" class="w-[500px] flex p-[12px_20px] transition-all duration-300 gap-[10px] ring-1 ring-[#E8EBF4] focus-within:ring-2 focus-within:ring-[#FF6B18] rounded-[50px] group">
					<div class="w-5 h-5 flex shrink-0">
						<img src="{{asset('assets/images/icons/search-normal.svg')}}" alt="icon" />
					</div>
					<input
						autocomplete="off"
						type="text"
						id="search-bar"
						name="keyword"
						placeholder="Search hot trendy news today..."
						class="appearance-none font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] outline-none focus:ring-0 w-full"
					/>
				</label>
			</form>
		</div>
		<div class="flex items-center gap-3">
			<a href=""
				class="rounded-full p-[12px_22px] flex gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">Upgrade
				Pro</a>
			<a href=""
				class="rounded-full p-[12px_22px] flex gap-[10px] font-bold transition-all duration-300 bg-[#FF6B18] text-white hover:shadow-[0_10px_20px_0_#FF6B1880]">
				<div class="w-6 h-6 flex shrink-0">
                    <img src="{{asset('assets/images/icons/favorite-chart.svg')}}" alt="icon" />
				</div>
				<span>Post Ads</span>
			</a>
		</div>
</nav>