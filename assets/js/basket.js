const BasketStore = {
  items: JSON.parse(localStorage.getItem('basket') || '[]'),

  save() {
    localStorage.setItem('basket', JSON.stringify(this.items));
    this.updateCartBadge();
    this.renderBasket();
  },

  addToBasket(game) {
    this.items.push(game);
    this.save();
  },

  clear() {
    this.items = [];
    this.save();
  },

  updateCartBadge() {
    document.getElementById('cart-count').textContent = this.items.length;
  },

  renderBasket() {
    const basketItems = document.getElementById('basket-items');
    basketItems.innerHTML = '';
    if (this.items.length === 0) {
      basketItems.innerHTML = '<p class="empty">Your basket is empty.</p>';
      return;
    }

    this.items.forEach((item, index) => {
      const div = document.createElement('div');
      div.className = 'basket-item';
      div.innerHTML = `
        <span>${item.name}</span>
        <div>
          <span> £${item.price}</span>
          <button class="remove-btn" data-index="${index}">
            <i class="fa-solid fa-trash"></i>
          </button>
        </div>
      `;
      basketItems.appendChild(div);
    });

    basketItems.querySelectorAll('.remove-btn').forEach(btn => {
      btn.addEventListener('click', e => {
        const i = e.currentTarget.dataset.index;
        BasketStore.items.splice(i, 1);
        BasketStore.save();
      });
    });
  }
};

// Initialization
const links = document.querySelectorAll('.nav-links a');
const iframe = document.getElementById('content-frame');
const basketPanel = document.getElementById('basket-panel');
const cartBtn = document.getElementById('cart-btn');
const closeBasketBtn = document.getElementById('close-basket');
const buyBtn = document.getElementById('buy-btn');

BasketStore.updateCartBadge();
BasketStore.renderBasket();

// Listen for add-to-cart messages from iframe
window.addEventListener('message', (event) => {
  if (event.data?.type === 'add-to-cart' && event.data.game) {
    BasketStore.addToBasket(event.data.game);
  }
});

links.forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();
    iframe.src = link.dataset.page;
    links.forEach(l => l.classList.remove('active'));
    link.classList.add('active');
  });
});

cartBtn.addEventListener('click', (e) => {
  e.preventDefault();
  basketPanel.classList.toggle('hidden');
});
closeBasketBtn.addEventListener('click', () => basketPanel.classList.add('hidden'));

buyBtn.addEventListener('click', () => {
  if (BasketStore.items.length === 0) {
    alert('Your basket is empty!');
    return;
  }
  alert('Purchase successful!');
  BasketStore.clear();
});
