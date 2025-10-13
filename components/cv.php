<?php
$experiences = [
    [
        'title' => 'Stage Développeur Full Stack',
        'company' => 'Entreprise Tech',
        'period' => 'Juin 2024 - Août 2024',
        'description' => 'Développement d\'applications web avec Symfony et React. Participation à des projets clients et amélioration des performances.',
        'achievements' => [
            'Développement de 3 fonctionnalités majeures',
            'Optimisation des performances de 40%',
            'Mise en place de tests unitaires',
        ],
    ],
    [
        'title' => 'Projets Académiques',
        'company' => 'BTS SIO SLAM',
        'period' => '2024 - Présent',
        'description' => 'Réalisation de projets divers dans le cadre de la formation BTS SIO option SLAM.',
        'achievements' => [
            'Développement d\'applications web et desktop',
            'Travail en équipe sur des projets collaboratifs',
            'Présentation de projets devant un jury',
        ],
    ],
];

$languages = [
    ['name' => 'Français', 'level' => 'Langue maternelle'],
    ['name' => 'Anglais', 'level' => 'Niveau B2 - Intermédiaire'],
    ['name' => 'Espagnol', 'level' => 'Niveau A2 - Élémentaire'],
];

$interests = [
    'Programmation',
    'Open Source',
    'Veille Technologique',
    'Gaming',
    'Hackathons',
    'Nouvelles Technologies',
];
?>

<section id="cv" class="section section-bg">
    <div class="container">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center gradient-text">
            Curriculum Vitae
        </h2>
        <p class="text-center text-gray-400 mb-8 text-lg">
            Mon parcours professionnel et académique
        </p>

        <div class="text-center mb-12">
            <button class="btn btn-secondary">
                <i class="fas fa-download"></i>
                <span>Télécharger le CV</span>
            </button>
        </div>

        <div class="space-y-8">
            <div class="card">
                <div class="flex items-center space-x-3 mb-6">
                    <i class="fas fa-briefcase icon-lg text-blue-400"></i>
                    <h3 class="text-2xl font-semibold text-white">Expérience Professionnelle</h3>
                </div>

                <div class="space-y-6">
                    <?php foreach ($experiences as $index => $exp): ?>
                    <div style="border-left: 2px solid #3b82f6; padding-left: 1.5rem;">
                        <div class="flex flex-col md:flex-row md:items-start md:justify-between mb-2">
                            <div>
                                <h4 class="text-xl font-semibold text-white"><?php echo htmlspecialchars($exp['title']); ?></h4>
                                <p class="text-gray-300"><?php echo htmlspecialchars($exp['company']); ?></p>
                            </div>
                            <span class="text-gray-400 text-sm mt-1 md:mt-0"><?php echo htmlspecialchars($exp['period']); ?></span>
                        </div>
                        <p class="text-gray-400 mb-3"><?php echo htmlspecialchars($exp['description']); ?></p>
                        <ul class="space-y-1">
                            <?php foreach ($exp['achievements'] as $achievement): ?>
                            <li class="text-gray-300 text-sm flex items-start">
                                <span class="text-blue-400 mr-2">•</span>
                                <?php echo htmlspecialchars($achievement); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="card">
                    <div class="flex items-center space-x-3 mb-6">
                        <i class="fas fa-language icon-lg text-purple-400"></i>
                        <h3 class="text-2xl font-semibold text-white">Langues</h3>
                    </div>

                    <div class="space-y-4">
                        <?php foreach ($languages as $index => $language): ?>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-gray-300 font-medium"><?php echo htmlspecialchars($language['name']); ?></span>
                            </div>
                            <p class="text-gray-400 text-sm"><?php echo htmlspecialchars($language['level']); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="card">
                    <div class="flex items-center space-x-3 mb-6">
                        <i class="fas fa-heart icon-lg text-pink-400"></i>
                        <h3 class="text-2xl font-semibold text-white">Centres d'Intérêt</h3>
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <?php foreach ($interests as $index => $interest): ?>
                        <span class="tag tag-purple">
                            <?php echo htmlspecialchars($interest); ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="flex items-center space-x-3 mb-6">
                    <i class="fas fa-award icon-lg text-green-400"></i>
                    <h3 class="text-2xl font-semibold text-white">Certifications & Réalisations</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex items-start space-x-3">
                        <div style="width: 0.5rem; height: 0.5rem; background-color: #4ade80; border-radius: 50%; margin-top: 0.5rem; flex-shrink: 0;"></div>
                        <div>
                            <h4 class="text-white font-semibold">Participation à des Hackathons</h4>
                            <p class="text-gray-400 text-sm">
                                Plusieurs participations à des événements de développement
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div style="width: 0.5rem; height: 0.5rem; background-color: #4ade80; border-radius: 50%; margin-top: 0.5rem; flex-shrink: 0;"></div>
                        <div>
                            <h4 class="text-white font-semibold">Projets Open Source</h4>
                            <p class="text-gray-400 text-sm">
                                Contributions à divers projets open source sur GitHub
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div style="width: 0.5rem; height: 0.5rem; background-color: #4ade80; border-radius: 50%; margin-top: 0.5rem; flex-shrink: 0;"></div>
                        <div>
                            <h4 class="text-white font-semibold">Veille Technologique Active</h4>
                            <p class="text-gray-400 text-sm">
                                Suivi régulier des tendances et nouvelles technologies
                            </p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <div style="width: 0.5rem; height: 0.5rem; background-color: #4ade80; border-radius: 50%; margin-top: 0.5rem; flex-shrink: 0;"></div>
                        <div>
                            <h4 class="text-white font-semibold">Travail en Équipe</h4>
                            <p class="text-gray-400 text-sm">
                                Expérience en méthodologie Agile et gestion de projet
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
