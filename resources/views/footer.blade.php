<style>
    footer {
        /* margin-top: 100px; */
        display: flex;
        color: white;
        background: #1310A3;
        width: 100%;
        height: auto;
        padding: 60px;
        align-items: center;
        justify-content: space-between; /* Added to push f-left to the left and f-right to the right */
    }

    .f-container {
        width: 100%;
        max-width: 1200px; /* Adjust the maximum width as needed */
        margin: 0 auto;
    }

    .f-row {
        display: flex;
        justify-content: space-between; /* Added for additional spacing between f-left and f-right */
        width: 100%;
    }

    .f-left {
        width: 48%; /* Adjust the width as needed */
    }

    .f-right {
        width: 48%; /* Adjust the width as needed */
        text-align: right; /* Align text to the right */
    }

    .partners {
        /* Add styles for the partners section if needed */
        display: flex; /* Make the container a flex container */
        align-items: center;
        justify-content: flex-end; /* Align items vertically in the flex container */
        order: 2;
    }

    .partners h3 {
        /* Add styles for the partners heading if needed */
    }

    .partners img {
        /* Add styles for partner logos if needed */
        max-width: auto;
        margin-top: 20px;
        margin-bottom: 20px;
        height: 100px;
        margin-left: 10px;
    }

    /* Add any additional styles as needed */

</style>


<footer>
    <div class="f-container">
        <div class="f-row">
            <div class="f-left">
                <strong style="font-size: 20px;">Muar-in-Motion</strong>
                <p>Our vision is to provide convenience
                    <br> and help you create your best experience in Muar</p>

                <br><br>

                <p>Contact us: hidayah_rahman@iium.edu.my</p>
                <!-- <p>Phone: 123-456-7890</p> -->
            </div>
            <div class="f-right">
                <strong style="font-size: 20px;">Main Collaborators</strong>
                <div class="partners">
                    <img src="/build/assets/icons/iium.png" alt="Partner 1 logo">
                    <img src="/build/assets/icons/gg.png" alt="Partner 2 logo">
                    <img src="/build/assets/icons/mpm.png" alt="Partner 3 logo">
                    <!-- <img src="/build/assets/icons/bhtravel.png" alt="Partner 4 logo"> -->
                </div>
                <a href="https://flagship.iium.edu.my/muara/">About Us</a> <!-- | -->
                <!-- <a href="#">Terms & Conditions</a> -->
            </div>
        </div>
    </div>
</footer>
