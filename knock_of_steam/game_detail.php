<!DOCTYPE html>
<html lang="en">
  <?php echo file_get_contents('components/head.html'); ?>

  <body class="body_style" style="background:#222; font-family:Arial, sans-serif; margin:0; padding:0;">

    <?php
      echo file_get_contents('components/nav.html');
      echo file_get_contents('components/basket.html');
    ?>
    <div class="game-details">
      <a href="#" class="back-button" onclick="window.location.href='index.php'; return false;">← Back to Explore</a>
      
      <div class="game-header">
        <img src="" alt="Game Cover" class="game-cover">
        
        <div class="game-info">
          <div class="head">
            <div class="title-price">
              <h1 class="game-title">Loading...</h1>
              <div class="price">£0.00</div>
            </div>
            <a href="#" class="add-to-basket">Add to Basket</a>
          </div>
          <div class="game-summary">
            <p class="game-description">Loading game info...</p>
          </div>
          <p class="game-meta"><strong>Genre:</strong> <span class="game-genre">N/A</span></p>
          <p class="game-meta"><strong>Release:</strong> <span class="game-release">N/A</span></p>
          <p class="game-meta"><strong>Reviews:</strong> <span class="game-review">N/A</span></p>
        </div>
      </div>
    </div>

    <hr style="margin:40px 0; border:1px">
    <div class="game-info sim">
      <h1>Similar games</h1>
    </div>
    <div style="margin-bottom: 20px">
      <?php include_once "card_template.php"; ?>
      <?php include "cards.php"; ?>
    </div>
  </body>
</html>
<?php
  echo file_get_contents('components/footer.html');
?>

<script src="random_card_gerater.js" defer></script>
<script src="assets/js/basket.js"></script>
<script>
  const url = new URL(window.location.href);
  const code = [...url.searchParams.keys()][0] || url.searchParams.get('code');

  if (!code) {
    console.error("No game code found in URL");
  } else {
    // --- Load JSON and find game ---
    fetch('card_game.json')
      .then(res => res.json())
      .then(games => {
        const game = games.find(g => g.code === code);

        if (!game) {
          console.error("Game not found:", code);
          document.querySelector('.game-title').textContent = "Game not found";
          return;
        }

        // --- Update page content ---
        document.querySelector('.game-title').textContent = game.name;
        document.querySelector('.price').textContent = `£${game.price}`;
        document.querySelector('.game-cover').src = game.cover;
        document.querySelector('.game-genre').textContent = game.genre;
        document.querySelector('.game-review').textContent = game.positive_or_negative;
        document.querySelector('.game-description').textContent = game.summary;
        document.querySelector('.game-release').textContent = game.release;

        const addToBasketButton = document.querySelector('.add-to-basket');
        addToBasketButton.addEventListener('click', (e) => {
          e.preventDefault();
          const item = {
            code: game.code,
            name: game.name,
            price: game.price,
            cover: game.cover
          };
          window.top.postMessage({ type: 'add-to-cart', game: item }, '*');
        });
      })
      .catch(err => console.error("Error loading game data:", err));
  }
</script>



<style>
    .body_style {
      color: white;
    }
    .sim{
      margin-left:50px;
    }
    .head { 
      display: flex; 
      align-items: baseline;
      justify-content: space-between; 
      gap: 15px; 
    }
    .title-price {
      display: flex;
      align-items: baseline; 
      gap: 15px; 
    }
    .price {
      background: linear-gradient(135deg, #ffb347, #ffcc33);
      color: #111;
      font-weight: bold;
      font-size: 1rem;
      padding: 5px 10px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    .game-details {
      max-width: 1200px;
      margin: 0 auto;
    }
    .game-header {
      display: flex;
      gap: 50px;
      margin-bottom: 5px;
    }
    .add-to-basket {
      display: inline-block;
      background: #ffb347;
      color: #222;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      font-weight: bold;
      margin-top: 15px;
      cursor: pointer;
    }

    .add-to-basket:hover {
      background: #ffcc66;
    }
    .game-cover {
      width: 300px;
      height: 400px;
      object-fit: cover;
      border-radius: 8px;
    }
    .game-info h1 {
      color: #ffbb55ff;
      margin-top: 0;
    }
    .game-meta {
      color: #aaa;
      margin: 10px 0;
    }
    .game-summary {
      line-height: 1.6;
      margin-top: 5px;
    }
    .back-button {
      display: inline-block;
      background: #ffbb55ff;
      color: #222;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      margin-bottom: 20px;
      margin-top: 20px;
      font-weight: bold;
    }
    .back-button:hover {
      background: #ffcc66;
    }
  </style>