fetch("./card_game.json")
  .then(response => response.json())
  .then(gamedata => {
    const template = document.getElementById('card-template');
    const wrappers = document.querySelectorAll('.cardsWrapper');
    const cardsPerWrapper = 10;

    function shuffle(array) {
      for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
      return array;
    }

    gamedata = shuffle(gamedata);

    wrappers.forEach((wrapper, index) => {
      const container = wrapper.querySelector('.cardsContainer');
      const scrollLeftBtn = wrapper.querySelector('.cardsScrollLeft');
      const scrollRightBtn = wrapper.querySelector('.cardsScrollRight');

      for (let i = 0; i < cardsPerWrapper; i++) {
        const data = gamedata[(index * cardsPerWrapper + i) % gamedata.length];
        const clone = template.content.cloneNode(true);

        clone.querySelector('.cardsName').textContent = data.name;
        clone.querySelector('.cardsPrice').textContent = `£${data.price}`;
        clone.querySelector('.cardsImage').src = data.cover;
        clone.querySelector('.cardsGenre').textContent = data.genre;
        clone.querySelector('.cardsReview').textContent = `Reviews: ${data.positive_or_negative}`;
        clone.querySelector('.cardsContent').textContent = data.summary;
        clone.querySelector('.cardsRelease').textContent = `Release: ${data.release}`;
        clone.querySelector('.cardsLink').href = `game_detail.php?${encodeURIComponent(data.code)}`;

        container.appendChild(clone);
      }

      scrollLeftBtn.addEventListener('click', () => {
        container.scrollBy({ left: -270, behavior: 'smooth' });
      });

      scrollRightBtn.addEventListener('click', () => {
        container.scrollBy({ left: 270, behavior: 'smooth' });
      });
    });
  })
  .catch(error => console.error("Error loading game data:", error));
