<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Développeur Full Stack</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 text-white">
        <?php include 'components/navigation.php'; ?>
        <?php include 'components/hero.php'; ?>
        <?php include 'components/about.php'; ?>
        <?php include 'components/formation.php'; ?>
        <?php include 'components/projects.php'; ?>
        <?php include 'components/skills.php'; ?>
        <?php include 'components/techwatch.php'; ?>
        <?php include 'components/cv.php'; ?>
        <?php include 'components/contact.php'; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>