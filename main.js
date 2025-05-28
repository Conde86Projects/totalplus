// Header Scroll Effect
window.addEventListener('scroll', function() {
    const header = document.querySelector('.header');
    if (window.scrollY > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

// Menu Mobile
const menuToggle = document.createElement('button');
menuToggle.className = 'menu-toggle';
menuToggle.innerHTML = `
    <svg class="icon" viewBox="0 0 24 24">
        <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
    </svg>
`;

document.querySelector('.main-navigation').prepend(menuToggle);

document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.querySelector('.menu-toggle');
    const mainMenu = document.querySelector('.main-menu');
    
    if (menuToggle && mainMenu) {
        menuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            mainMenu.classList.toggle('active');
        });
        
        // Fechar menu ao clicar fora
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.main-navigation')) {
                mainMenu.classList.remove('active');
            }
        });
    }
    
    // Verificar se o WooCommerce está carregado
    if (typeof WC !== 'undefined' && WC.cart) {
        const updateCartCount = () => {
            const count = WC.cart.get_cart_contents_count();
            const cartCount = document.querySelector('.cart-count');
            if (cartCount) {
                cartCount.textContent = count;
            }
        };

        // Atualizar ao carregar
        updateCartCount();
        
        // Ouvir eventos de atualização
        document.addEventListener('added_to_cart', updateCartCount);
        document.addEventListener('removed_from_cart', updateCartCount);
    }
});

// Atualizar contadores
document.addEventListener('added_to_wishlist', function() {
    const wishlistCount = document.querySelector('.wishlist-count');
    if (wishlistCount) {
        wishlistCount.textContent = yith_wcwl_l10n.count;
    }
});

document.addEventListener('removed_from_wishlist', function() {
    const wishlistCount = document.querySelector('.wishlist-count');
    if (wishlistCount) {
        wishlistCount.textContent = yith_wcwl_l10n.count;
    }
}); 
