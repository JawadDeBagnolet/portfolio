<nav class="nav" id="navigation">
    <div class="nav-container">
        <div class="nav-content">
            <div class="logo">
                Portfolio
            </div>

            <div class="nav-items">
                <button class="nav-item" onclick="scrollToSection('#hero')">Accueil</button>
                <button class="nav-item" onclick="scrollToSection('#about')">À propos</button>
                <button class="nav-item" onclick="scrollToSection('#formation')">Formation</button>
                <button class="nav-item" onclick="scrollToSection('#projects')">Projets</button>
                <button class="nav-item" onclick="scrollToSection('#skills')">Compétences</button>
                <button class="nav-item" onclick="scrollToSection('#techwatch')">Veille</button>
                <button class="nav-item" onclick="scrollToSection('#cv')">CV</button>
                <button class="nav-item" onclick="scrollToSection('#contact')">Contact</button>
            </div>

            <button class="mobile-menu-btn" onclick="toggleMobileMenu()">
                <i class="fas fa-bars" id="menu-icon"></i>
            </button>
        </div>
    </div>

    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-content">
            <button class="mobile-nav-item" onclick="scrollToSection('#hero')">Accueil</button>
            <button class="mobile-nav-item" onclick="scrollToSection('#about')">À propos</button>
            <button class="mobile-nav-item" onclick="scrollToSection('#formation')">Formation</button>
            <button class="mobile-nav-item" onclick="scrollToSection('#projects')">Projets</button>
            <button class="mobile-nav-item" onclick="scrollToSection('#skills')">Compétences</button>
            <button class="mobile-nav-item" onclick="scrollToSection('#techwatch')">Veille</button>
            <button class="mobile-nav-item" onclick="scrollToSection('#cv')">CV</button>
            <button class="mobile-nav-item" onclick="scrollToSection('#contact')">Contact</button>
        </div>
    </div>
</nav>
