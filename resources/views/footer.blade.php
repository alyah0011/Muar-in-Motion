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

    @media (max-width: 768px) {
        .f-left, .f-right {
            width: 80%; /* Set width to 100% for smaller screens */
            margin-bottom: 10px; /* Adjust margin for smaller screens */
        }

        .f-left {
            width: 40%;
        }

        .f-right {
            width: 40%;
        }
        .partners img {
            max-height: 100px; /* Adjust maximum width for partner logos on smaller screens */
            width: auto;
            margin: 0 2px; /* Adjust margin for smaller screens */
        }

        .partners {
            flex-direction: column; /* Stack images vertically on smaller screens */
        }

        footer,
        footer p,
        footer a,
        footer strong {
            font-size: 14px; /* Adjust font size for smaller screens */
        }
    }

</style>


<footer>
    <div class="f-container">
        <div class="f-row">
            <div class="f-left">
                <strong style="font-size: 20px;">Muar-in-Motion</strong>
                <p>Our vision is to provide convenience
                    <br> and help you create your best experience in Muar</p>

                <br><br>

                <p>Contact us: mpmuar@johor.gov.my</p>
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
