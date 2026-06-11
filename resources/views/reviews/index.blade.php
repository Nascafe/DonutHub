@extends('layouts.storefront')

@section('title', 'Customer Reviews — DonutHub')

@section('content')
    {{-- Header Section --}}
    <section class="bg-gradient-to-br from-cream via-donut-pink-50 to-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="text-donut-pink-500 font-semibold text-sm uppercase tracking-widest">Feedback & Love</span>
            <h1 class="font-display text-4xl sm:text-5xl font-bold text-donut-brown-700 mt-3">Customer Reviews</h1>
            <p class="text-gray-500 mt-4 max-w-2xl mx-auto">See what our community has to say about their fresh-glazed experiences, and share your own sweet thoughts!</p>
            
            {{-- Overall Rating Summary Badge --}}
            <div class="mt-8 inline-flex items-center gap-4 bg-white px-6 py-4 rounded-3xl border border-gray-100 shadow-sm">
                <span class="text-4xl font-extrabold text-donut-brown-700">4.9</span>
                <div>
                    <div class="flex gap-0.5">
                        @for($i = 1; $i <= 5; $i++)
                            <svg class="w-5 h-5 text-amber-400 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        @endfor
                    </div>
                    <p class="text-xs text-gray-400 font-semibold mt-1">Average Customer Rating</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Reviews Section --}}
    <section class="py-12 bg-cream min-h-[50vh]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Left: Write a Review Form (1 Column) --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm sticky top-24">
                        @auth
                            <h2 class="text-xl font-bold text-donut-brown-700 mb-2">Write a Review</h2>
                            <p class="text-sm text-gray-400 mb-6">Tell us about your donut experience! Your feedback helps us bake better treats.</p>
                            
                            <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
                                @csrf

                                {{-- Rating Selector --}}
                                <div>
                                    <label class="block text-sm font-bold text-donut-brown-600 mb-2">Your Rating</label>
                                    <div class="flex gap-2" x-data="{ hoverRating: 0, rating: 5 }">
                                        <input type="hidden" name="rating" x-model="rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            <button type="button" 
                                                    @click="rating = {{ $i }}"
                                                    @mouseenter="hoverRating = {{ $i }}"
                                                    @mouseleave="hoverRating = 0"
                                                    class="w-8 h-8 focus:outline-none transition-all hover:scale-110">
                                                <svg :class="(hoverRating || rating) >= {{ $i }} ? 'text-amber-400' : 'text-gray-200'" 
                                                     class="w-full h-full fill-current transition-colors duration-150" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            </button>
                                        @endfor
                                    </div>
                                    @error('rating')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Comment Input --}}
                                <div>
                                    <label for="comment" class="block text-sm font-bold text-donut-brown-600 mb-2">Comment</label>
                                    <textarea id="comment" name="comment" rows="4" required
                                              placeholder="What was your favorite flavor? How was the glazing? Share your experience..."
                                              class="w-full rounded-2xl border-gray-200 text-sm focus:border-donut-pink-500 focus:ring-donut-pink-500 transition-all"></textarea>
                                    @error('comment')
                                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Submit --}}
                                <button type="submit" 
                                        class="w-full py-3 bg-gradient-to-r from-donut-pink-500 to-donut-pink-600 text-white font-bold text-sm rounded-full shadow-lg shadow-donut-pink-500/25 hover:shadow-donut-pink-500/40 hover:scale-[1.02] active:scale-[0.98] transition-all">
                                    Submit Review 🍩
                                </button>
                            </form>
                        @else
                            <div class="text-center py-6">
                                <span class="text-5xl block mb-4">🔒</span>
                                <h3 class="font-bold text-donut-brown-700 mb-2">Sign In to Leave a Review</h3>
                                <p class="text-sm text-gray-500 mb-6">Only registered members can share reviews. Join our donut family today!</p>
                                <div class="flex flex-col gap-3">
                                    <a href="{{ route('login') }}" class="w-full py-2.5 rounded-full border-2 border-donut-pink-200 text-donut-pink-600 font-semibold text-sm hover:bg-donut-pink-50 transition-colors">
                                        Sign In
                                    </a>
                                    <a href="{{ route('register') }}" class="w-full py-2.5 rounded-full bg-donut-pink-500 text-white font-semibold text-sm hover:bg-donut-pink-600 shadow-md transition-all">
                                        Register Now
                                    </a>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>

                {{-- Right: Reviews Feed (2 Columns) --}}
                <div class="lg:col-span-2 space-y-6">
                    @if($reviews->isEmpty())
                        <div class="bg-white rounded-3xl p-12 text-center border border-gray-100 shadow-sm">
                            <span class="text-5xl block mb-4">💬</span>
                            <h3 class="text-xl font-bold text-donut-brown-700 mb-2">No Reviews Yet</h3>
                            <p class="text-gray-500 max-w-sm mx-auto">Be the first to share your thoughts about DonutHub's artisan glazed creations!</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            @foreach($reviews as $review)
                                <div class="bg-white rounded-3xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between">
                                    <div>
                                        {{-- Rating stars --}}
                                        <div class="flex gap-0.5 mb-4">
                                            @for($i = 1; $i <= 5; $i++)
                                                <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-amber-400' : 'text-gray-200' }} fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                            @endfor
                                        </div>

                                        {{-- Comment --}}
                                        <p class="text-sm text-gray-600 italic leading-relaxed mb-6">
                                            "{{ $review->comment }}"
                                        </p>
                                    </div>

                                    {{-- User info --}}
                                    <div class="flex items-center gap-3 pt-4 border-t border-gray-50">
                                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-donut-pink-400 to-donut-pink-600 flex items-center justify-center text-white text-xs font-bold shrink-0">
                                            {{ substr($review->user->name ?? 'U', 0, 1) }}
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-bold text-gray-800 text-xs truncate">{{ $review->user->name ?? 'Anonymous' }}</p>
                                            <p class="text-[10px] text-gray-400 font-semibold mt-0.5">{{ $review->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Pagination links --}}
                        <div class="mt-8">
                            {{ $reviews->links() }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </section>
@endsection
