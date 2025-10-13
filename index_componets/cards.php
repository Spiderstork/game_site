<div class="cardsWrapper">
  <button class="cardsScrollBtn cardsScrollLeft">&#8249;</button>
  <div class="cardsContainer"></div>
  <button class="cardsScrollBtn cardsScrollRight">&#8250;</button>
</div>

<style>
.cardsWrapper {
  position: relative;
  width: 100%;
  max-width: 1400px;
  margin: auto;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 40px;
  box-sizing: border-box;
}

.cardsContainer {
  display: flex;
  gap: 20px;
  overflow: hidden;
  scroll-behavior: smooth;
  width: 100%;
  flex-wrap: nowrap;
}

.cardsScrollBtn {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(114, 114, 114, 0.8); 
  color: white;
  border: none;
  font-size: 24px;
  padding: 10px;
  cursor: pointer;
  border-radius: 8px;
  z-index: 10;
  height: 100%;
  width: 35px;
}

.cardsScrollLeft { left: 0; }
.cardsScrollRight { right: 0; }

body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.cardsBox {
  width: clamp(180px, 22vw, 250px);
  height: clamp(260px, 35vw, 350px);
  border-radius: 8px;
  overflow: hidden;
  position: relative;
  cursor: pointer;
  transition: transform 0.3s;
  flex-shrink: 0;
}

.priceTag {
  position: absolute;
  top: 10px;
  left: 10px;
  background: linear-gradient(135deg, #ffb347, #ffcc33);
  color: #111;
  font-weight: bold;
  font-size: 1rem;
  padding: 5px 10px;
  border-radius: 8px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  z-index: 10;
}


.cardsBox:hover {
  transform: scale(1.05);
}

.cardsBox img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.cardsInfo {
  position: absolute;
  bottom: -100%;
  left: 0;
  width: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  color: #fff;
  padding: 10px;
  box-sizing: border-box;
  transition: bottom 0.5s;
}

.cardsBox:hover .cardsInfo {
  bottom: 0;
}

.cardsGrid {
  display: grid;
  grid-template-areas:
    "cardsNa cardsNa cardsYe"
    "cardsGe cardsCo cardsCo"
    "cardsRe cardsCo cardsCo";
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: auto auto auto;
  gap: 5px;
}

.cardsNa {
  grid-area: cardsNa;
  font-size: 1rem;
  font-weight: bold;
}

.cardsYe {
  grid-area: cardsYe;
  text-align: right;
  font-size: 0.7rem;
}

.cardsGe {
  grid-area: cardsGe;
  font-size: 0.7rem;
  border: 2px solid rgba(255, 255, 255, 0.3); 
  border-radius: 5px;
  text-align: center;
}

.cardsRe {
  grid-area: cardsRe;
  font-size: 0.7rem;
  color: green;
  border: 2px solid rgba(255, 255, 255, 0.3); 
  border-radius: 5px;
  text-align: center;
}

.cardsCo {
  grid-area: cardsCo;
  font-size: 0.9rem;
  line-height: 1.2;
  border: 2px solid rgba(255, 255, 255, 0.3); 
  border-radius: 5px;
  text-align: center;
  display: -webkit-box;
  -webkit-box-orient: vertical;
  -webkit-line-clamp: 6;
  overflow: hidden;
  word-break: break-word;
  max-height: calc(1.2em * 7);
  width: 100%;
}

/* --- Responsive tweaks --- */
@media (max-width: 1024px) {
  .cardsWrapper {
    padding: 0 20px;
  }
  .cardsScrollBtn {
    width: 30px;
    font-size: 20px;
  }
}

@media (max-width: 768px) {
  .cardsWrapper {
    padding: 0 10px;
  }
  .cardsBox {
    width: clamp(140px, 40vw, 200px);
    height: clamp(220px, 55vw, 300px);
  }
  .cardsScrollBtn {
    height: 50%;
  }
}

@media (max-width: 480px) {
  .cardsBox {
    width: 70vw;
    height: 60vw;
  }
  .cardsScrollBtn {
    display: none;
  }
}

</style>