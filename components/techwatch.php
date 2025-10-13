<?php
$articles = [
    [
        'title' => 'L\'IA dans le Développement',
        'category' => 'Intelligence Artificielle',
        'date' => '15 Mars 2024',
        'description' => 'Comment l\'intelligence artificielle révolutionne le développement logiciel et améliore la productivité des développeurs.',
        'image' => 'https://images.pexels.com/photos/8386440/pexels-photo-8386440.jpeg?auto=compress&cs=tinysrgb&w=800',
        'tags' => ['IA', 'Développement', 'Productivité'],
    ],
    [
        'title' => 'React 18 - Nouvelles Fonctionnalités',
        'category' => 'Frontend',
        'date' => '10 Mars 2024',
        'description' => 'Découverte des nouvelles fonctionnalités de React 18, notamment le rendu concurrent et les transitions automatiques.',
        'image' => 'https://images.pexels.com/photos/11035471/pexels-photo-11035471.jpeg?auto=compress&cs=tinysrgb&w=800',
        'tags' => ['React', 'JavaScript', 'Frontend'],
    ],
    [
        'title' => 'Cybersécurité en 2024',
        'category' => 'Sécurité',
        'date' => '5 Mars 2024',
        'description' => 'Les enjeux de la cybersécurité et les meilleures pratiques pour protéger les applications web modernes.',
        'image' => 'https://images.pexels.com/photos/60504/security-protection-anti-virus-software-60504.jpeg?auto=compress&cs=tinysrgb&w=800',
        'tags' => ['Sécurité', 'Web', 'Best Practices'],
    ],
    [
        'title' => 'DevOps & Cloud Native',
        'category' => 'Infrastructure',
        'date' => '1 Mars 2024',
        'description' => 'L\'évolution des pratiques DevOps et l\'adoption des architectures cloud native pour les applications modernes.',
        'image' => 'https://images.pexels.com/photos/2881229/pexels-photo-2881229.jpeg?auto=compress&cs=tinysrgb&w=800',
        'tags' => ['DevOps', 'Cloud', 'Infrastructure'],
    ],
];
?>

<section id="techwatch" class="section">
    <div class="container-lg">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center gradient-text">
            Veille Technologique
        </h2>
        <p class="text-center text-gray-400 mb-12 text-lg">
            Articles et actualités sur les technologies émergentes
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($articles as $index => $article): ?>
            <div class="project-card">
                <div class="project-image">
                    <img src="<?php echo htmlspecialchars($article['image']); ?>" alt="<?php echo htmlspecialchars($article['title']); ?>">
                    <div class="project-year">
                        <?php echo htmlspecialchars($article['category']); ?>
                    </div>
                </div>

                <div class="project-content">
                    <div class="flex items-center space-x-2 text-gray-400 text-sm mb-3">
                        <i class="fas fa-calendar icon"></i>
                        <span><?php echo htmlspecialchars($article['date']); ?></span>
                    </div>

                    <h3 class="project-title">
                        <?php echo htmlspecialchars($article['title']); ?>
                    </h3>

                    <p class="project-description"><?php echo htmlspecialchars($article['description']); ?></p>

                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php foreach ($article['tags'] as $tag): ?>
                        <span class="tag tag-purple">
                            <?php echo htmlspecialchars($tag); ?>
                        </span>
                        <?php endforeach; ?>
                    </div>

                    <a href="#" class="project-link">
                        <span>Lire l'article</span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 text-center">
            <button class="btn btn-primary">
                <i class="fas fa-newspaper"></i>
                <span>Voir tous les articles</span>
            </button>
        </div>
    </div>
</section>
