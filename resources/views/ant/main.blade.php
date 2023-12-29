<style>
    .section{
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 120px;
    }
    .accom, .trans {
        display: flex;
        flex-direction: column;
        padding: 50px;
        margin-top: 120px;
    }

    .categories {
        display: flex; /* Use flexbox */
        justify-content: center; /* Center items horizontally */
        gap: 150px; /* Add some space between items */
        margin-top: 20px; /* Add margin to the top for spacing */
    }

    .cat {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .categories .cat:hover .icon img {
        transform: scale(1.2); /* Adjust the scale factor as needed */
        transition: transform 0.3s ease; /* Add a smooth transition effect */
    }

    .section h2{
        color: #0D0E10;
        font-size: 3vw;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: 0px;
    }

    .accom h2, .trans h2 {
        color: #0D0E10;
        font-size: 3vw;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        letter-spacing: 0px;
    }

    .carousel-container {
        position: relative;
    }

    .prev, .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 24px; /* Adjust the font size as needed */
        cursor: pointer;
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }

    .carousel {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 80%;
        height: 424px;
        overflow: hidden;
        margin: 0 auto; /* Center horizontally */
        margin-top: 40px;
    }

    .carousel-item {
        flex: 0 0 30%;
        height: 100%;
        position: relative;
        border-radius: 20px;
        overflow: hidden;
    }

    .carousel-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .carousel-item:hover img {
        transform: scale(1.2); /* Zoom in by 20% on hover */
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -ms-transform: scale(1.2);
        -o-transform: scale(1.2);
    }

    .attraction-details {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        background-color: rgba(0, 0, 0, 0.7);
        color: white;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    .attraction-rating {
        display: flex;
    }

    .c-flex {
        display: flex;
        justify-content: space-between;
    }
</style>

<x-app-layout>

    <div style="background-image: url('/build/assets/eventsbg.png'); background-repeat: repeat; min-height: 100vh;">
        
        <div class="section">
            <h2>
                    {{ __('Accommodation & Transportation') }}
            </h2>

            <p>Explore options for accommodation and transportation in Muar.</p>

            <br>

            <div class="categories">

                <a href="/accommodation" class="cat">
                    <div class="icon"><img src="/build/assets/icons/accomm.png" alt="Accommodation Icon" style="width: 200px; height: 200px;"></div>
                    <p>Accommodation</p>
                </a>

                <a href="/transportation" class="cat">
                    <div class="icon"><img src="/build/assets/icons/transpo.png" alt=" Transportation Icon" style="width: 200px; height: 200px;"></div>
                    <p>Transportation</p>
                </a>

            </div>
        </div>

        <div class="accom">

            <h2>
                {{ __('Recommended Accommodation') }}
            </h2>

            <div class="carousel-container">
                <div class="carousel">

                    <div class="prev" onclick="prevAttractionSlide()">&#10094;</div>
                    
                    @forelse($topAccommodations as $accommodation)
                        <div class="carousel-item">
                            
                            <img src="{{ asset('storage/' . $accommodation->acco_img) }}" alt="{{ $accommodation->acco_name }}">
                            <div class="attraction-details">
                                <a href="{{ route('accommodation.show', $accommodation->acco_id) }}">{{ $accommodation->acco_name }}</a>
                                <div class="attraction-price-range">
                                    From RM {{ $accommodation->acco_price_range ?? 'Not available' }}
                                </div>
                                <div class="c-flex">
                                    <div class="attraction-rating">
                                        <img src="/build/assets/icons/star.svg" alt="Icon Description" style="width: 20px; height: 20px;">
                                        {{ $accommodation->acco_average_rating }}
                                    </div>
        
                                    <div class="attraction-review" style="color: orange;">{{ $accommodation->reviews_count }} Reviews</div>
                                </div>
                            </div>
                            
                        </div>
                    @empty
                        <p>No top attractions found.</p>
                    @endforelse
                    
                    
                </div>  
                
                <div class="next" onclick="nextAttractionSlide()">&#10095;</div>
            </div>
        </div>
        
        <div class="trans">

            <h2>
                {{ __('Transportation Options') }}
            </h2>

            <div class="carousel-container">
                <div class="carousel">

                    <div class="prev" onclick="prevEventSlide()">&#10094;</div>
                    
                    @forelse($topTransportations as $transportation)
                        <div class="carousel-item">
                            
                            <img src="{{ asset('storage/' . $transportation->trans_img) }}" alt="{{ $transportation->trans_name }}">
                            <div class="attraction-details">
                                <a href="{{ $transportation->trans_website }}" target="_blank">{{ $transportation->trans_name }}</a>
                            </div>
                            
                        </div>
                    @empty
                        <p>No top attractions found.</p>
                    @endforelse
                    
                    
                </div>  
                
                <div class="next" onclick="nextEventSlide()">&#10095;</div>
            </div>

        </div>
    </div>

    
    <script>
        let attractionIndex = 0;
        let eventIndex = 0;

        const attractionCarousel = document.querySelector('.accom .carousel');
        const eventCarousel = document.querySelector('.trans .carousel');

        const attractionItems = document.querySelectorAll('.accom .carousel-item');
        const eventItems = document.querySelectorAll('.trans .carousel-item');

        const attractionTotalItems = attractionItems.length;
        const eventTotalItems = eventItems.length;

        function showAttractionSlides() {
            attractionItems.forEach(item => {
                const itemIndex = Array.from(attractionItems).indexOf(item);
                const isVisible = itemIndex >= attractionIndex && itemIndex < attractionIndex + 3;

                item.style.display = isVisible ? 'flex' : 'none';
            });
        }

        function showEventSlides() {
            eventItems.forEach(item => {
                const itemIndex = Array.from(eventItems).indexOf(item);
                const isVisible = itemIndex >= eventIndex && itemIndex < eventIndex + 3;

                item.style.display = isVisible ? 'flex' : 'none';
            });
        }

        function nextAttractionSlide() {
            if (attractionIndex + 3 < attractionTotalItems) {
                attractionIndex += 1;
            } else {
                attractionIndex = 0;
            }

            showAttractionSlides();
        }

        function prevAttractionSlide() {
            if (attractionIndex - 3 >= 0) {
                attractionIndex -= 1;
            } else {
                attractionIndex = attractionTotalItems - 3;
            }

            showAttractionSlides();
        }

        function nextEventSlide() {
            if (eventIndex + 3 < eventTotalItems) {
                eventIndex += 1;
            } else {
                eventIndex = 0;
            }

            showEventSlides();
        }

        function prevEventSlide() {
            if (eventIndex - 3 >= 0) {
                eventIndex -= 1;
            } else {
                eventIndex = eventTotalItems - 3;
            }

            showEventSlides();
        }

        // Initial calls to show the first set of items
        showAttractionSlides();
        showEventSlides();
    </script>


</x-app-layout>