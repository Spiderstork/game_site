<div class="carousel">
  <button class="carousel-btn2 scroll-btn2 prev2">&#8249;</button>
  <div class="carousel-track"></div>
  <button class="carousel-btn2 scroll-btn2 next2">&#8250;</button>

  <template id="carousel-slide-template">
    <div class="container">
      <div class="big_img">
      <a class="cardsLink" href="#">
        <div class="carousel_priceTag cardsPrice"></div> 
        <img class="main-img" />
      </a>
      </div>

      <div class="content">
        <div class="name text_pretty">
          <h1></h1>
        </div>

        <div class="img1"><img></div>
        <div class="img2"><img></div>
        <div class="img3"><img></div>
        <div class="img4"><img></div>

        <div class="text text_pretty">
          <p></p>
        </div>
      </div>
    </div>
  </template>
</div>

<script>
fetch("carousel.json")
  .then(response => response.json())
  .then(carouselData => {
    const track = document.querySelector(".carousel-track");
    const slideTemplate = document.getElementById("carousel-slide-template");

    carouselData.forEach(data => {
      const slide = slideTemplate.content.cloneNode(true);

      slide.querySelector(".name h1").textContent = data.title;
      slide.querySelector(".main-img").src = data.bigImage;
      slide.querySelector(".text p").textContent = data.text;
      slide.querySelector('.cardsPrice').textContent = `£${data.price}`;
      slide.querySelector('.cardsLink').href = `game_detail.php?${encodeURIComponent(data.code)}`;

      const thumbDivs = [".img1 img", ".img2 img", ".img3 img", ".img4 img"];
      thumbDivs.forEach((selector, i) => {
        const thumb = slide.querySelector(selector);
        if (data.thumbnails[i]) thumb.src = data.thumbnails[i];
      });

      thumbDivs.forEach((selector, i) => {
        const thumb = slide.querySelector(selector);
        const mainImg = slide.querySelector(".main-img");
        if (thumb) {
          thumb.addEventListener("mouseenter", () => {
            mainImg.src = thumb.src;
          });
          thumb.addEventListener("mouseleave", () => {
            mainImg.src = data.bigImage;
          });
        }
      });

      track.appendChild(slide);
    });

    let index = 0;
    const totalSlides = carouselData.length;

    function showSlide(i) {
      index = (i + totalSlides) % totalSlides;
      const slideWidth = track.querySelector(".container").clientWidth;
      track.style.transform = `translateX(${-index * slideWidth}px)`;
    }

    document.querySelector(".carousel-btn2.prev2")
      .addEventListener("click", () => showSlide(index - 1));
    document.querySelector(".carousel-btn2.next2")
      .addEventListener("click", () => showSlide(index + 1));

    showSlide(0);
  })
  .catch(error => console.error("Error loading carousel data:", error));
</script>

<style>
    <style>
  body {
    min-height: 100vh;
    background-color: #222;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .carousel {
    position: relative;
    width: 100%;
    max-width: 1400px;
    aspect-ratio: 7 / 2; 
    margin: 20px auto;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.5);
    background: #111;
  }

  .carousel-track {
    display: flex;
    transition: transform 0.5s ease-in-out;
    width: 100%;
    height: 100%;
  }
  .carousel_priceTag {
    position: absolute;
    top: 10px;
    left: 55px;
    background: linear-gradient(135deg, #ffb347, #ffcc33);
    color: #111;
    font-weight: bold;
    font-size: 1rem;
    padding: 5px 10px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    z-index: 10;
  }

  .carousel-track .container {
    flex: 0 0 100%;
    display: grid;
    grid-template-columns: 2fr 1fr;
    grid-template-areas: "big_img content";
    height: 100%;
  }

  .big_img {
    grid-area: big_img;
    overflow: hidden;
    position: relative;
  }

  .big_img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 10px;
    transition: transform 0.3s;
  }

  .big_img img:hover {
    transform: scale(1.05);
  }

  .content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 0.6fr 0.7fr 0.7fr 1.4fr;
    grid-template-areas:
      "name name"
      "img1 img2"
      "img3 img4"
      "text text";
    grid-area: content;
    padding: 10px;
  }

  .name {
    grid-area: name;
    text-align: left;
    color: white;
    padding: 10px;
    margin: 0;
    font-size: clamp(1rem, 2vw, 1.4rem);
  }

  .img1, .img2, .img3, .img4 {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    padding: 6px;
  }

  .content img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 6px;
    cursor: pointer;
    transition: transform 0.3s ease;
  }

  .content img:hover {
    transform: scale(1.05);
  }

  .text {
    grid-area: text;
  }

  .text p {
    margin: 0;
    text-align: justify;
  }

  .text::first-letter {
    font-size: 1.1rem;
    font-weight: bold;
    color: #ff9800;
  }

  .text_pretty {
    color: #f0f0f0;
    padding: 8px 12px;
    background: rgba(0, 0, 0, 0.5);
    border-left: 3px solid #ff9800;
    border-radius: 6px;
    line-height: 1.4;
    font-size: clamp(0.8rem, 1vw, 1rem);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    letter-spacing: 0.3px;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.4);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    max-height: 150px;
    overflow: hidden;
  }

  .carousel-btn2 {
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

  .carousel-btn2:hover {
    background-color: rgba(255, 255, 255, 0.3);
  }

  .carousel-btn2.prev2 { left: 0; }
  .carousel-btn2.next2 { right: 0; }

  @media (max-width: 1024px) {
    .carousel {
      aspect-ratio: 5 / 3;
      max-width: 1000px;
    }

    .carousel-track .container {
      grid-template-columns: 1.5fr 1fr;
    }
  }

  @media (max-width: 768px) {
    .carousel {
      aspect-ratio: 4 / 3;
      max-width: 95%;
    }

    .carousel-track .container {
      grid-template-columns: 1fr;
      grid-template-areas:
        "big_img"
        "content";
    }

    .content {
      grid-template-columns: 1fr 1fr;
      grid-template-rows: auto auto auto;
      grid-template-areas:
        "name name"
        "img1 img2"
        "text text";
      padding: 8px;
    }

    .img3, .img4 { display: none; } 
    .carousel-btn2 { width: 35px; }
  }

  @media (max-width: 480px) {
    .carousel {
      aspect-ratio: 1 / 1;
      border-radius: 10px;
    }

    .content {
      grid-template-columns: 1fr;
      grid-template-areas:
        "name"
        "text";
    }

    .img1, .img2, .img3, .img4 { display: none; }
    .carousel-btn2 { display: none; } 
    .text_pretty {
      font-size: 0.8rem;
      max-height: none;
    }
  }
</style>
