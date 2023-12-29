<style>
    .section{
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 120px;
    }

    .categories {
        display: flex; /* Use flexbox */
        justify-content: center; /* Center items horizontally */
        gap: 20px; /* Add some space between items */
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

    .section2{
        display: flex;
        flex-direction: column;
        padding: 50px;
        margin-top: 120px;
    }

    .section2 h2{
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
                    {{ __('Attractions') }}
            </h2>

            <p>Explore attractions in Muar by categories</p>

            <br>

            <div class="categories">

                <a href="/category/recreational" class="cat">
                    <div class="icon"><img src="/build/assets/icons/recreational.png" alt="Recreational Icon" style="width: 200px; height: auto;"></div>
                    <p>Recreational</p>
                </a>

                <a href="/category/food and beverage" class="cat">
                    <div class="icon"><img src="/build/assets/icons/food.png" alt=" FnB Icon" style="width: 200px; height: auto;"></div>
                    <p>Food and beverage</p>
                </a>

                <a href="/category/cultural" class="cat">
                    <div class="icon"><img src="/build/assets/icons/culture.png" alt="Culture Icon" style="width: 200px; height: auto;"></div>
                    <p>Cultural</p>
                </a>
            </div>

            <div class="categories">

                <a href="/category/heritage" class="cat">
                    <div class="icon"><img src="/build/assets/icons/heritage.png" alt="Heritage Icon" style="width: 200px; height: auto;"></div>
                    <p>Heritage</p>
                </a>

                <a href="/category/shopping" class="cat">
                    <div class="icon"><img src="/build/assets/icons/shopping.png" alt="Shopping Icon" style="width: 200px; height: auto;"></div>
                    <p>Shopping</p>
                </a>

                <a href="/category/landmark" class="cat">
                    <div class="icon"><img src="/build/assets/icons/landmark.png" alt="Landmark Icon" style="width: 200px; height: auto;"></div>
                    <p>Landmark</p>
                </a>


            </div>
        </div>


        <div class="section2">

            <h2>
                {{ __('Discover Top Choices by Visitors') }}
            </h2>

            <div class="carousel-container">
                <div class="carousel">

                    <div class="prev" onclick="prevSlide()">&#10094;</div>
                    
                    @forelse($topAttractions as $attraction)
                        <div class="carousel-item">
                            
                            <img src="{{ asset('storage/' . $attraction->att_img) }}" alt="{{ $attraction->att_name }}">
                            <div class="attraction-details">
                                <a href="{{ route('attraction.detail', $attraction->att_id) }}">{{ $attraction->att_name }}</a>
                                <div class="c-flex">
                                    <div class="attraction-rating">
                                        <img src="/build/assets/icons/star.svg" alt="Icon Description" style="width: 20px; height: 20px;">
                                        {{ $attraction->average_rating }}
                                    </div>
        
                                    <div class="attraction-review" style="color: orange;">{{ $attraction->reviews_count }} Reviews</div>
                                </div>
                            </div>
                            
                        </div>
                    @empty
                        <p>No top attractions found.</p>
                    @endforelse
                    
                    
                </div>  
                
                <div class="next" onclick="nextSlide()">&#10095;</div>
            </div>

        </div>

        <script>
            let currentIndex = 0;
            const carousel = document.querySelector('.carousel');
            const items = document.querySelectorAll('.carousel-item');
            const totalItems = items.length;

            function showSlides() {
                items.forEach(item => {
                    const itemIndex = Array.from(items).indexOf(item);
                    const isVisible = itemIndex >= currentIndex && itemIndex < currentIndex + 3;

                    item.style.display = isVisible ? 'flex' : 'none';
                });
            }

            function nextSlide() {
                if (currentIndex + 3 < totalItems) {
                    currentIndex += 1;
                } else {
                    currentIndex = 0;
                }

                showSlides();
            }

            function prevSlide() {
                if (currentIndex - 3 >= 0) {
                    currentIndex -= 1;
                } else {
                    currentIndex = totalItems - 3;
                }

                showSlides();
            }

            // Initial call to show the first set of items
            showSlides();
        </script>


</x-app-layout>