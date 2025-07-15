<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Customer - Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Montserrat:wght@500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/product-cust.css">
</head>
<body>
    <header class="main-header">
        <div class="header-logo-wrap">
            <img src="/images/logo2.png" alt="Logo" class="header-logo">
        </div>
        <nav class="header-menu">
            <a href="/customer/dashboard" class="header-link">Service</a>
            <a href="/product-customer" class="header-link active">Product</a>
            <a href="#" class="header-link" onclick="openTestimoniModal(); return false;">Testimonial</a>
            <a href="#" class="header-link">Help</a>
        </nav>
        <div class="header-user" id="headerUser">
            <span class="header-username">Ethan Maxwell</span>
            <img src="https://ui-avatars.com/api/?name=Ethan+Maxwell&background=eeeeee&color=141414&size=128" alt="Profile" class="header-profile">
            <div class="dropdown-menu" id="dropdownMenu" style="display:none;">
                <a href="/" class="dropdown-item">Logout</a>
            </div>
        </div>
    </header>
    <div class="hero-section">
        <img src="/images/Main Picture.jpg" alt="Main Hero" class="hero-image">
        <img src="/images/logo.png" alt="Logo Tengah" class="hero-logo-center">
        <div class="hero-title">Product</div>
        <div class="hero-breadcrumb">
            <span class="breadcrumb-home">Home</span>
            <span class="breadcrumb-separator">&gt;</span>
            <span class="breadcrumb-current">Product</span>
        </div>
    </div>
    <!-- Product Content Container -->
    <div class="product-content-container">
        <!-- Category Bar -->
        <div class="product-category-bar">
            <div class="category-rectangle" id="cat-1"><span class="icon-check">&#10003;</span></div><span style="margin-right:2rem;">Oil</span>
            <div class="category-rectangle" id="cat-2"><span class="icon-check">&#10003;</span></div><span style="margin-right:2rem;">Second Part</span>
            <div class="category-rectangle" id="cat-3"><span class="icon-check">&#10003;</span></div><span style="margin-right:2rem;">New Part</span>
            <div class="category-rectangle" id="cat-4"><span class="icon-check">&#10003;</span></div><span>Apparel</span>
        </div>
        <!-- Product Card Grid -->
        <div class="product-card-grid">
            <!-- Card 1 -->
            <div class="product-card">
                <img src="/images/motul-oil.jpg" alt="Motul Oil" class="product-image">
                <div class="product-info">
                    <div class="product-title">Motul Oil</div>
                    <div class="product-category">Sparepart</div>
                    <div class="product-price">Rp350.000</div>
                    <button class="product-btn contact">Contact</button>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="product-card">
                <img src="/images/ohlins-suspension.jpg" alt="Ohlins Suspension Shocks" class="product-image">
                <div class="product-info">
                    <div class="product-title">Ohlins Suspension Shocks</div>
                    <div class="product-category">Motor Part</div>
                    <div class="product-price">Rp28.900.000</div>
                    <button class="product-btn buy">Contact</button>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="product-card">
                <img src="/images/kawasaki-h2r.jpg" alt="Kawasaki H2R" class="product-image">
                <div class="product-info">
                    <div class="product-title">Kawasaki H2R</div>
                    <div class="product-category">Motor Sport</div>
                    <div class="product-price">Rp760.000.000</div>
                    <button class="product-btn buy">Contact</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimoni Modal Pop Up (copy dari dashboard, pastikan class dan id sama) -->
    <div id="testimoniModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" onclick="closeTestimoniModal()">&times;</span>
            <h2>Rate Our Service</h2>
            <div class="star-rating">
                <span class="star" data-value="1">&#9734;</span>
                <span class="star" data-value="2">&#9734;</span>
                <span class="star" data-value="3">&#9734;</span>
                <span class="star" data-value="4">&#9734;</span>
                <span class="star" data-value="5">&#9734;</span>
            </div>
            <textarea id="testimoniMessage" placeholder="Your Message" rows="4" style="width:100%;margin-top:1rem;"></textarea>
            <button class="submit-testimoni-btn" style="margin-top:1.5rem;">Submit</button>
        </div>
    </div>
    <script>
        // Toggle dropdown on click user/profile
        const headerUser = document.getElementById('headerUser');
        const dropdownMenu = document.getElementById('dropdownMenu');
        headerUser.addEventListener('click', function(e) {
            e.stopPropagation();
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        });
        // Hide dropdown if click outside
        document.addEventListener('click', function() {
            dropdownMenu.style.display = 'none';
        });

        // Interaktif kategori: hanya satu yang aktif
        const rectangles = document.querySelectorAll('.category-rectangle');
        rectangles.forEach(rect => {
            rect.addEventListener('click', function() {
                rectangles.forEach(r => r.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // Modal Testimoni
        function openTestimoniModal() {
            document.getElementById('testimoniModal').style.display = 'block';
        }
        function closeTestimoniModal() {
            document.getElementById('testimoniModal').style.display = 'none';
        }
        // Star rating interaction
        const stars = document.querySelectorAll('.star-rating .star');
        stars.forEach((star, idx) => {
            star.addEventListener('click', function() {
                stars.forEach((s, i) => {
                    s.innerHTML = i <= idx ? '&#9733;' : '&#9734;';
                });
            });
        });
    </script>
    <!-- Spacer to make page longer -->
    <div style="min-height: 300px;"></div>
    <!-- Pre Footer Bar -->
    <div class="pre-footer-bar" style="display: flex; align-items: center; justify-content: center; background: #141414; min-height: 4.94rem; width: 100%;">
        <span style="color: #fff; font-family: 'Poppins', sans-serif; font-size: 1.125rem; font-weight: 400; text-align: center;">
            Need help renting a car? Please call 
            <span style="color: #FE8400; font-weight: 600;">+1-333-444-5555</span>
        </span>
    </div>
    <!-- Footer -->
    <footer class="footer-bar">
        <div class="footer-content">
            <img src="/images/logo.png" alt="Mifta Motor Sport Logo" class="footer-logo">
            <div class="footer-socials" style="margin-left: auto; display: flex; gap: 1rem; align-items: center; padding-right: 2rem;">
                <a href="#" target="_blank" style="width: 2rem; height: 2rem; display: flex; align-items: center; justify-content: center;">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.7666 0.5C25.5632 0.5 27.4613 0.500416 28.9062 1.25098C30.1239 1.88348 31.1165 2.87613 31.749 4.09375C32.4996 5.53867 32.5 7.43682 32.5 11.2334V21.7666C32.5 25.5632 32.4996 27.4613 31.749 28.9062C31.1165 30.1239 30.1239 31.1165 28.9062 31.749C27.4613 32.4996 25.5632 32.5 21.7666 32.5H19.167V20.9443H22.7227L23.4336 16.5H19.167V13.3887C19.167 12.1443 19.6119 11.167 21.5674 11.167H23.6113V7.07812C22.456 6.90039 21.212 6.7227 20.0566 6.72266C16.4122 6.72266 13.834 8.94437 13.834 12.9443V16.5H9.83398V20.9443H13.834V32.5H11.2334C7.43682 32.5 5.53867 32.4996 4.09375 31.749C2.87613 31.1165 1.88348 30.1239 1.25098 28.9062C0.500416 27.4613 0.5 25.5632 0.5 21.7666V11.2334C0.5 7.43682 0.500415 5.53867 1.25098 4.09375C1.88348 2.87613 2.87613 1.88348 4.09375 1.25098C5.53867 0.500415 7.43682 0.5 11.2334 0.5H21.7666Z" fill="#FE8400"/>
                    </svg>
                </a>
                <a href="#" target="_blank" style="width: 2rem; height: 2rem; display: flex; align-items: center; justify-content: center;">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_252_574)">
                            <path d="M21.7842 0.5C25.5808 0.5 27.4789 0.500416 28.9238 1.25098C30.1414 1.88348 31.1341 2.87613 31.7666 4.09375C32.4996 5.53867 32.5176 7.43682 32.5176 11.2334V21.7666C32.5176 25.5632 32.5172 27.4613 31.7666 28.9062C31.1341 30.1239 30.1239 31.1165 28.9238 31.749C27.4789 32.4996 25.5808 32.5 21.7842 32.5H11.251C7.4544 32.5 5.55625 32.4996 4.09375 31.749C2.87613 31.1165 1.88348 30.1239 1.25098 28.9062C0.500416 27.4613 0.5 25.5632 0.5 21.7666V11.2334C0.5 7.43682 0.500415 5.53867 1.25098 4.09375C1.88348 2.87613 2.87613 1.88348 4.09375 1.25098C5.53867 0.500415 7.43682 0.5 11.251 0.5H21.7842ZM16.498 4.86426C13.3399 4.86426 12.943 4.87712 11.7021 4.93359C10.4635 4.99033 9.61775 5.18687 8.87793 5.47461C8.11282 5.77177 7.464 6.1696 6.81738 6.81641C6.17013 7.46319 5.77181 8.11284 5.47363 8.87793C5.18524 9.61796 4.98934 10.4641 4.93359 11.7021C4.87809 12.9431 4.86328 13.3401 4.86328 16.5C4.86328 19.6602 4.87736 20.0557 4.93359 21.2969C4.99056 22.5357 5.1871 23.3812 5.47461 24.1211C5.77205 24.8864 6.16941 25.5358 6.81641 26.1826C7.46289 26.8298 8.11218 27.2282 8.87695 27.5254C9.61723 27.8131 10.4628 28.0097 11.7012 28.0664C12.9423 28.1229 13.3391 28.1367 16.499 28.1367C19.6592 28.1367 20.0548 28.1229 21.2959 28.0664C22.5345 28.0097 23.3808 27.8131 24.1211 27.5254C24.8862 27.2282 25.5351 26.8299 26.1816 26.1826C26.8288 25.5359 27.2263 24.8861 27.5244 24.1211C27.8104 23.3811 28.0063 22.535 28.0645 21.2969C28.1202 20.0559 28.1348 19.66 28.1348 16.5C28.1348 13.3399 28.1202 12.9433 28.0645 11.7021C28.0063 10.4635 27.8104 9.61777 27.5244 8.87793C27.2263 8.11267 26.8288 7.46313 26.1816 6.81641C25.5345 6.16924 24.887 5.77156 24.1211 5.47461C23.3793 5.18685 22.5327 4.99032 21.2939 4.93359C20.0531 4.87712 19.6577 4.86426 16.498 4.86426ZM15.4561 6.96094C15.7658 6.96045 16.1118 6.96094 16.5 6.96094C19.6068 6.96094 19.9753 6.97159 21.2021 7.02734C22.3365 7.07922 22.9521 7.26945 23.3623 7.42871C23.9053 7.63962 24.2932 7.89156 24.7002 8.29883C25.1072 8.70595 25.359 9.09392 25.5703 9.63672C25.7296 10.0464 25.92 10.6623 25.9717 11.7969C26.0274 13.0235 26.0391 13.392 26.0391 16.4971C26.0391 19.6025 26.0274 19.9716 25.9717 21.1982C25.9198 22.3327 25.7296 22.9487 25.5703 23.3584C25.3595 23.901 25.1071 24.2876 24.7002 24.6943C24.2929 25.1016 23.9056 25.3545 23.3623 25.5654C22.9526 25.7254 22.3363 25.914 21.2021 25.9658C19.9755 26.0216 19.6068 26.0342 16.5 26.0342C13.3936 26.0342 13.025 26.0216 11.7988 25.9658C10.6643 25.9135 10.0481 25.7237 9.6377 25.5645C9.09476 25.3536 8.70703 25.1016 8.2998 24.6943C7.89261 24.2871 7.64008 23.9006 7.42871 23.3574C7.26945 22.9477 7.07997 22.3317 7.02832 21.1973C6.97256 19.9706 6.96094 19.6015 6.96094 16.4941C6.96094 13.3399 6.97257 13.0206 7.02832 11.7939C7.08019 10.6597 7.26947 10.044 7.42871 9.63379C7.63961 9.09076 7.89254 8.70219 8.2998 8.29492C8.70693 7.88786 9.09487 7.63614 9.6377 7.4248C10.0479 7.2648 10.6643 7.07556 11.7988 7.02344C12.8718 6.97497 13.288 6.96043 15.4561 6.95801V6.96094ZM16.5 10.5244C13.2001 10.5246 10.5245 13.2 10.5244 16.5C10.5244 19.8 13.2001 22.4745 16.5 22.4746C19.8 22.4746 22.4746 19.8001 22.4746 16.5C22.4745 13.1999 19.8 10.5244 16.5 10.5244ZM16.5 12.6211C18.642 12.6211 20.3788 14.3578 20.3789 16.5C20.3789 18.6421 18.642 20.3789 16.5 20.3789C14.3579 20.3788 12.6221 18.642 12.6221 16.5C12.6221 14.3578 14.3579 12.6212 16.5 12.6211ZM22.5684 8.90039C21.8647 8.97204 21.3154 9.56625 21.3154 10.2891C21.3156 11.0598 21.9411 11.6855 22.7119 11.6855C23.4825 11.6853 24.1072 11.0597 24.1074 10.2891C24.1074 9.5183 23.4826 8.89282 22.7119 8.89258L22.5684 8.90039Z" fill="#FE8400"/>
                        </g>
                        <defs>
                            <radialGradient id="paint0_radial_252_574" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(9.01762 34.9647) rotate(-90) scale(31.7144 29.4969)">
                                <stop stop-color="#FFDD55"/>
                                <stop offset="0.1" stop-color="#FFDD55"/>
                                <stop offset="0.5" stop-color="#FF543E"/>
                                <stop offset="1" stop-color="#C837AB"/>
                            </radialGradient>
                            <clipPath id="clip0_252_574">
                                <rect width="32" height="32" fill="white" transform="translate(0.5 0.5)"/>
                            </clipPath>
                        </defs>
                    </svg>
                </a>
                <a href="#" target="_blank" style="width: 2rem; height: 2rem; display: flex; align-items: center; justify-content: center;">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.7666 0.5C25.5632 0.5 27.4613 0.500416 28.9062 1.25098C30.1239 1.88348 31.1165 2.87613 31.749 4.09375C32.4996 5.53867 32.5 7.43682 32.5 11.2334V21.7666C32.5 25.5632 32.4996 27.4613 31.749 28.9062C31.1165 30.1239 30.1239 31.1165 28.9062 31.749C27.4613 32.4996 25.5632 32.5 21.7666 32.5H11.2334C7.43682 32.5 5.53867 32.4996 4.09375 31.749C2.87613 31.1165 1.88348 30.1239 1.25098 28.9062C0.500416 27.4613 0.5 25.5632 0.5 21.7666V11.2334C0.5 7.43682 0.500415 5.53867 1.25098 4.09375C1.88348 2.87613 2.87613 1.88348 4.09375 1.25098C5.53867 0.500415 7.43682 0.5 11.2334 0.5H21.7666ZM21.1406 8.07715C18.7997 8.07724 16.9024 10.1304 16.9023 12.665C16.9023 13.0194 16.9394 13.3738 17.0117 13.71C13.4899 13.5192 10.3659 11.6929 8.27637 8.91309C7.90945 9.59446 7.70117 10.3849 7.70117 11.2207C7.70122 12.8104 8.44935 14.2182 9.58789 15.0449C8.89281 15.0177 8.23793 14.8088 7.66602 14.4727V14.5273C7.66602 16.7531 9.12789 18.6064 11.0684 19.0244C10.7101 19.1334 10.3362 19.1885 9.95117 19.1885C9.67831 19.1885 9.41145 19.1609 9.15234 19.1064C9.69246 20.9233 11.258 22.2588 13.1123 22.2861C11.6619 23.5216 9.83293 24.2578 7.84766 24.2578C7.50592 24.2578 7.1693 24.2306 6.83789 24.1943C8.71378 25.4933 10.9406 26.2559 13.335 26.2559C21.1296 26.2557 25.3925 19.2607 25.3926 13.2012C25.3926 13.0013 25.3896 12.8014 25.3818 12.6016C26.2096 11.9565 26.9268 11.148 27.4961 10.2305C26.7373 10.5939 25.9184 10.8392 25.0605 10.9482C25.9374 10.385 26.6089 9.48511 26.9268 8.41309C26.1069 8.93992 25.2005 9.32159 24.2334 9.52148C23.4608 8.63116 22.3594 8.07715 21.1406 8.07715Z" fill="#FE8400"/>
                    </svg>
                </a>
            </div>
        </div>
    </footer>
</body>
</html> 