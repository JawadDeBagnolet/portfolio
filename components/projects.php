<?php
$projects = [
    [
        'title' => 'Site de Gestion de Cinéma',
        'category' => 'Full Stack',
        'year' => '2024',
        'description' => 'Application complète de gestion de cinéma avec réservations en ligne',
        'technologies' => ['Symfony', 'PHP', 'MySQL', 'Bootstrap'],
        'image' => 'https://images.pexels.com/photos/7991579/pexels-photo-7991579.jpeg?auto=compress&cs=tinysrgb&w=800',
    ],
    [
        'title' => 'Gestion de Vols',
        'category' => 'Backend',
        'year' => '2024',
        'description' => 'Système de gestion et réservation de vols avec API REST',
        'technologies' => ['Symfony', 'PHP', 'SQL', 'API REST'],
        'image' => 'https://images.pexels.com/photos/358319/pexels-photo-358319.jpeg?auto=compress&cs=tinysrgb&w=800',
    ],
    [
        'title' => 'Gestion de Zoo',
        'category' => 'Desktop',
        'year' => '2024',
        'description' => 'Application de gestion complète pour zoo avec interface JavaFX',
        'technologies' => ['Java', 'JavaFX', 'MySQL'],
        'image' => 'https://images.pexels.com/photos/2832382/pexels-photo-2832382.jpeg?auto=compress&cs=tinysrgb&w=800',
    ],
    [
        'title' => 'MasterMind',
        'category' => 'Game',
        'year' => '2023',
        'description' => 'Jeu de réflexion classique avec interface graphique',
        'technologies' => ['Java', 'Swing'],
        'image' => 'https://images.pexels.com/photos/163064/play-stone-network-networked-interactive-163064.jpeg?auto=compress&cs=tinysrgb&w=800',
    ],
    [
        'title' => 'Tic-Tac-Toe',
        'category' => 'Game',
        'year' => '2023',
        'description' => 'Jeu de morpion avec IA',
        'technologies' => ['Java', 'JavaFX'],
        'image' => 'https://images.pexels.com/photos/262438/pexels-photo-262438.jpeg?auto=compress&cs=tinysrgb&w=800',
    ],
    [
        'title' => 'E-Commerce App',
        'category' => 'Full Stack',
        'year' => '2024',
        'description' => 'Plateforme e-commerce complète avec paiement en ligne',
        'technologies' => ['React', 'Node.js', 'MongoDB', 'Stripe'],
        'image' => 'https://images.pexels.com/photos/230544/pexels-photo-230544.jpeg?auto=compress&cs=tinysrgb&w=800',
    ],
    [
        'title' => 'API Task Management',
        'category' => 'Backend',
        'year' => '2024',
        'description' => 'API REST pour la gestion de tâches avec authentification JWT',
        'technologies' => ['Node.js', 'Express', 'MongoDB', 'JWT'],
        'image' => 'https://images.pexels.com/photos/3184357/pexels-photo-3184357.jpeg?auto=compress&cs=tinysrgb&w=800',
    ],
    [
        'title' => 'Analytics Dashboard',
        'category' => 'Frontend',
        'year' => '2023',
        'description' => 'Tableau de bord d\'analytique avec visualisations interactives',
        'technologies' => ['React', 'Chart.js', 'Tailwind CSS'],
        'image' => 'https://images.pexels.com/photos/265087/pexels-photo-265087.jpeg?auto=compress&cs=tinysrgb&w=800',
    ],
    [
        'title' => 'Weather Mobile App',
        'category' => 'Mobile',
        'year' => '2023',
        'description' => 'Application météo avec géolocalisation',
        'technologies' => ['React Native', 'API REST'],
        'image' => 'https://images.pexels.com/photos/1118873/pexels-photo-1118873.jpeg?auto=compress&cs=tinysrgb&w=800',
    ],
];
?>

<section id="projects" class="section">
    <div class="container-lg">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center gradient-text">
            Projets
        </h2>
        <p class="text-center text-gray-400 mb-12 text-lg">
            Une sélection de mes réalisations et projets académiques
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($projects as $index => $project): ?>
            <div class="project-card">
                <div class="project-image">
                    <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="<?php echo htmlspecialchars($project['title']); ?>">
                    <div class="project-year">
                        <?php echo htmlspecialchars($project['year']); ?>
                    </div>
                </div>

                <div class="project-content">
                    <div class="flex items-center justify-between mb-3">
                        <span class="project-category">
                            <?php echo htmlspecialchars($project['category']); ?>
                        </span>
                    </div>

                    <h3 class="project-title">
                        <?php echo htmlspecialchars($project['title']); ?>
                    </h3>

                    <p class="project-description">
                        <?php echo htmlspecialchars($project['description']); ?>
                    </p>

                    <div class="project-tech">
                        <?php foreach ($project['technologies'] as $tech): ?>
                        <span class="tech-tag">
                            <?php echo htmlspecialchars($tech); ?>
                        </span>
                        <?php endforeach; ?>
                    </div>

                    <div class="project-links">
                        <a href="#" class="project-link">
                            <i class="fab fa-github"></i>
                            <span>Code</span>
                        </a>
                        <a href="#" class="project-link">
                            <i class="fas fa-external-link-alt"></i>
                            <span>Demo</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
