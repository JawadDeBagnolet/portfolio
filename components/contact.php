<?php
// Handle form submission
$message = '';
$error = '';

if ($_POST) {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message_content = htmlspecialchars($_POST['message'] ?? '');
    
    if (empty($name) || empty($email) || empty($subject) || empty($message_content)) {
        $error = 'Tous les champs sont obligatoires.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'L\'adresse email n\'est pas valide.';
    } else {
        // Here you would typically send an email or save to database
        // For now, we'll just show a success message
        $message = 'Votre message a été envoyé avec succès !';
    }
}
?>

<section id="contact" class="section">
    <div class="container">
        <h2 class="text-4xl md:text-5xl font-bold mb-4 text-center gradient-text">
            Contact
        </h2>
        <p class="text-center text-gray-400 mb-12 text-lg">
            N'hésitez pas à me contacter pour toute question ou opportunité
        </p>

        <?php if ($message): ?>
        <div style="background-color: rgba(34, 197, 94, 0.1); border: 1px solid #22c55e; color: #22c55e; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem; text-align: center;">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>

        <?php if ($error): ?>
        <div style="background-color: rgba(239, 68, 68, 0.1); border: 1px solid #ef4444; color: #ef4444; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem; text-align: center;">
            <?php echo $error; ?>
        </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-6">
                <div class="card">
                    <h3 class="text-2xl font-semibold mb-6 text-white">Informations de Contact</h3>

                    <div class="space-y-4">
                        <div class="contact-item">
                            <i class="fas fa-envelope contact-icon text-blue-400"></i>
                            <div class="contact-details">
                                <h4 class="font-semibold mb-1">Email</h4>
                                <a href="mailto:contact@example.com" class="hover:text-blue-400 transition-colors">
                                    contact@example.com
                                </a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <i class="fas fa-phone contact-icon text-purple-400"></i>
                            <div class="contact-details">
                                <h4 class="font-semibold mb-1">Téléphone</h4>
                                <a href="tel:+33123456789" class="hover:text-purple-400 transition-colors">
                                    +33 1 23 45 67 89
                                </a>
                            </div>
                        </div>

                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt contact-icon text-pink-400"></i>
                            <div class="contact-details">
                                <h4 class="font-semibold mb-1">Localisation</h4>
                                <p class="text-gray-300">France</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <h3 class="text-2xl font-semibold mb-6 text-white">Réseaux Sociaux</h3>

                    <div class="social-links">
                        <a href="https://github.com" target="_blank" rel="noopener noreferrer" class="social-link">
                            <div class="social-icon">
                                <i class="fab fa-github"></i>
                            </div>
                            <div class="social-details">
                                <h4 class="font-semibold">GitHub</h4>
                                <p class="text-sm text-gray-400">Voir mes projets</p>
                            </div>
                        </a>

                        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer" class="social-link">
                            <div class="social-icon">
                                <i class="fab fa-linkedin"></i>
                            </div>
                            <div class="social-details">
                                <h4 class="font-semibold">LinkedIn</h4>
                                <p class="text-sm text-gray-400">Mon profil professionnel</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <h3 class="text-2xl font-semibold mb-6 text-white">Envoyez-moi un Message</h3>

                <form method="POST" class="space-y-4">
                    <div class="form-group">
                        <label for="name" class="form-label">
                            Nom
                        </label>
                        <input
                            type="text"
                            id="name"
                            name="name"
                            required
                            class="form-input"
                            placeholder="Votre nom"
                            value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>"
                        />
                    </div>

                    <div class="form-group">
                        <label for="email" class="form-label">
                            Email
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            required
                            class="form-input"
                            placeholder="votre@email.com"
                            value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"
                        />
                    </div>

                    <div class="form-group">
                        <label for="subject" class="form-label">
                            Sujet
                        </label>
                        <input
                            type="text"
                            id="subject"
                            name="subject"
                            required
                            class="form-input"
                            placeholder="Sujet de votre message"
                            value="<?php echo htmlspecialchars($_POST['subject'] ?? ''); ?>"
                        />
                    </div>

                    <div class="form-group">
                        <label for="message" class="form-label">
                            Message
                        </label>
                        <textarea
                            id="message"
                            name="message"
                            required
                            rows="5"
                            class="form-input form-textarea"
                            placeholder="Votre message..."
                        ><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                    </div>

                    <button
                        type="submit"
                        class="btn btn-primary"
                        style="width: 100%;"
                    >
                        <i class="fas fa-paper-plane"></i>
                        <span>Envoyer le Message</span>
                    </button>
                </form>
            </div>
        </div>

        <div class="footer">
            <p>
                © 2024 Portfolio. Tous droits réservés.
            </p>
        </div>
    </div>
</section>
