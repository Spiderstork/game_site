<!DOCTYPE html>
<html lang="en">    
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game Carousel1</title>
</head>
<body>
  <div class="carousel1">
    <button class="carousel-btn1 prev1">&#8249;</button>
    <div class="carousel-slides1">
      <img src="https://shared.akamai.steamstatic.com/store_item_assets/steam/apps/3008130/cc54d8961d51eab78fd3fb8507a866a621c2a025/header.jpg?t=1758271419" alt="Zelda1">
      <img src="https://gmedia.playstation.com/is/image/SIEPDC/the-crew-motorfest-hero-banner-desktop-01-en-30may23?$native$" alt="Cyberpunk1">
      <img src="https://metro.co.uk/wp-content/uploads/2020/06/SDV-752x430-bb62.jpg?quality=90&strip=all" alt="Elden Ring1">
    </div>
    <button class="carousel-btn1 next1">&#8250;</button>
  </div>

</body>
</html>


<script>
  // there is alot of ones because it was conflicting with other things and i was to lazy to write whole new names so sorry
    const slides1 = document.querySelector('.carousel-slides1');
    const prevBtn1 = document.querySelector('.carousel-btn1.prev1');
    const nextBtn1 = document.querySelector('.carousel-btn1.next1');
    const totalSlides1 = document.querySelectorAll('.carousel-slides1 img').length;

    let index1 = 0;
    let autoPlay1;

    function showSlide1(i) {
      const slideWidth1 = slides1.querySelector("img").clientWidth;
      index1 = (i + totalSlides1) % totalSlides1;
      slides1.style.transform = `translateX(${-index1 * slideWidth1}px)`;
      resetTimer1();
    }

    function resetTimer1() {
      clearInterval(autoPlay1);
      autoPlay1 = setInterval(() => showSlide1(index1 + 1), 5000);
    }

    prevBtn1.addEventListener('click', () => showSlide1(index1 - 1));
    nextBtn1.addEventListener('click', () => showSlide1(index1 + 1));
    resetTimer1();
</script>

<style>
    .carousel1 {
      position: relative;
      width: 800px;
      height: 400px;
      margin: 20px auto;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0,0,0,0.5);
    }
    .carousel-slides1 {
      display: flex;
      width: 100%;
      height: 100%;
      transition: transform 0.5s ease-in-out;
    }
    .carousel-slides1 img {
      width: 800px;
      height: 400px;
      object-fit: cover;
      flex-shrink: 0;
    }
    .carousel-btn1 {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(255, 255, 255, 0.15);
      border: none;
      font-size: 24px;
      cursor: pointer;
      border-radius: 0;
      z-index: 10;
      height: 100%;
      width: 50px;
      padding: 0;
      color: white;
      backdrop-filter: blur(2px);
      transition: background-color 0.3s ease;
    }
    .carousel-btn1.prev1 {}
    .carousel-btn1.next1 { right: 0px; }
    body {
      background-color: #222;
      font-family: Arial, sans-serif;
    }
</style>
