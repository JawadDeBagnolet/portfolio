<?php
$formations = [
    [
        'degree' => 'BTS SIO SLAM',
        'school' => 'Services Informatiques aux Organisations',
        'period' => '2024 - 2026',
        'description' => 'Spécialisation Solutions Logicielles et Applications Métiers',
        'skills' => [
            'Développement d\'applications',
            'Développement web',
            'Gestion de bases de données',
            'Architecture logicielle',
            'Gestion de projet',
        ],
    ],
    [
        'degree' => 'Baccalauréat',
        'school' => 'Enseignement Général',
        'period' => '2021 - 2024',
        'description' => 'Formation générale avec spécialisation scientifique',
        'skills' => ['Mathématiques' , 'Physique - Chimie'],
    ],
];
?>

<section id="formation" class="section section-bg">
    <div class="container">
        <h2 class="text-4xl md:text-5xl font-bold mb-12 text-center gradient-text">
            Formation
        </h2>

        <div class="space-y-8">
            <?php foreach ($formations as $index => $formation): ?>
            <div class="card">
                <div class="flex flex-col md:flex md:flex-row md:items-start md:justify-between mb-4">
                    <div class="flex items-start space-x-4 mb-4 md:mb-0">
                        <i class="fas fa-graduation-cap icon text-blue-400 flex-shrink-0 mt-1"></i>
                        <div>
                            <h3 class="text-2xl font-semibold text-white mb-1">
                                <?php echo htmlspecialchars($formation['degree']); ?>
                            </h3>
                            <p class="text-gray-300"><?php echo htmlspecialchars($formation['school']); ?></p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 text-gray-400">
                        <i class="fas fa-calendar icon"></i>
                        <span><?php echo htmlspecialchars($formation['period']); ?></span>
                    </div>
                </div>

                <p class="text-gray-300 mb-4"><?php echo htmlspecialchars($formation['description']); ?></p>

                <div class="flex flex-wrap gap-2">
                    <?php foreach ($formation['skills'] as $skill): ?>
                    <span class="tag tag-blue">
                        <?php echo htmlspecialchars($skill); ?>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
