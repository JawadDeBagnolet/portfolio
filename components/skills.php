<?php
$skillCategories = [
    [
        'title' => 'Langages',
        'icon' => 'fas fa-code',
        'color' => 'blue',
        'skills' => [
            ['name' => 'PHP', 'level' => 90],
            ['name' => 'JavaScript', 'level' => 85],
            ['name' => 'Java', 'level' => 80],
            ['name' => 'HTML/CSS', 'level' => 95],
            ['name' => 'Python', 'level' => 70],
            ['name' => 'SQL', 'level' => 85],
        ],
    ],
    [
        'title' => 'Frameworks & Bibliothèques',
        'icon' => 'fas fa-server',
        'color' => 'purple',
        'skills' => [
            ['name' => 'Symfony', 'level' => 85],
            ['name' => 'React', 'level' => 80],
            ['name' => 'Vue.js', 'level' => 75],
            ['name' => 'Node.js', 'level' => 80],
            ['name' => 'jQuery', 'level' => 70],
            ['name' => 'Bootstrap', 'level' => 85],
            ['name' => 'Tailwind CSS', 'level' => 90],
            ['name' => 'JavaFX', 'level' => 75],
        ],
    ],
    [
        'title' => 'Bases de Données',
        'icon' => 'fas fa-database',
        'color' => 'pink',
        'skills' => [
            ['name' => 'MySQL', 'level' => 85],
            ['name' => 'MongoDB', 'level' => 75],
            ['name' => 'PostgreSQL', 'level' => 70],
        ],
    ],
    [
        'title' => 'Outils & Technologies',
        'icon' => 'fas fa-tools',
        'color' => 'green',
        'skills' => [
            ['name' => 'Git/GitHub', 'level' => 85],
            ['name' => 'WordPress', 'level' => 75],
            ['name' => 'JWT', 'level' => 80],
            ['name' => 'Stripe', 'level' => 70],
            ['name' => 'Chart.js', 'level' => 75],
            ['name' => 'React Native', 'level' => 70],
        ],
    ],
];

function getColorClasses($color) {
    $colors = [
        'blue' => [
            'icon' => 'text-blue-400',
            'bar' => 'progress-blue',
            'border' => 'border-blue-500',
        ],
        'purple' => [
            'icon' => 'text-purple-400',
            'bar' => 'progress-purple',
            'border' => 'border-purple-500',
        ],
        'pink' => [
            'icon' => 'text-pink-400',
            'bar' => 'progress-pink',
            'border' => 'border-pink-500',
        ],
        'green' => [
            'icon' => 'text-green-400',
            'bar' => 'progress-green',
            'border' => 'border-green-500',
        ],
    ];
    return $colors[$color];
}
?>

<section id="skills" class="section section-bg">
    <div class="container-lg">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center gradient-text">
            Compétences
        </h2>
        <p class="text-center text-gray-400 mb-12 text-lg">
            Technologies et outils que je maîtrise
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach ($skillCategories as $index => $category): ?>
            <?php $colors = getColorClasses($category['color']); ?>
            <div class="skill-category">
                <div class="skill-header">
                    <i class="<?php echo $category['icon']; ?> icon-lg <?php echo $colors['icon']; ?>"></i>
                    <h3 class="skill-title"><?php echo htmlspecialchars($category['title']); ?></h3>
                </div>

                <div class="space-y-4">
                    <?php foreach ($category['skills'] as $skill): ?>
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name"><?php echo htmlspecialchars($skill['name']); ?></span>
                            <span class="skill-level"><?php echo $skill['level']; ?>%</span>
                        </div>
                        <div class="progress-bar">
                            <div class="progress-fill <?php echo $colors['bar']; ?>" style="width: <?php echo $skill['level']; ?>%"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
