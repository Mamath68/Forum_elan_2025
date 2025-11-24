<div class="container">
    <div class="row text-center text-md-start">
        <div class="col-md-4 mb-3">
            <h5>Mon Forum</h5>
            <p class="mb-0">Votre forum de confiance.</p>
        </div>

        <div class="col-md-4 mb-3">
            <h5>Liens</h5>
            <ul class="list-unstyled">
                <li><a href="#" class="text-white text-decoration-none">Accueil</a></li>
                <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
                <li><a href="index.php?ctrl=home&action=forumMentions" class="text-white text-decoration-none">Mentions
                        légales</a></li>
                <li><a href="index.php?ctrl=home&action=forumRules" class="text-white text-decoration-none">Règlement
                        d'usage du Forum</a></li>
            </ul>
        </div>

        <div class="col-md-4 mb-3">
            <h5>Nous suivre</h5>
            <a href="#" class="text-white text-decoration-none me-2">Facebook</a>
            <a href="#" class="text-white text-decoration-none">Instagram</a>
        </div>
    </div>

    <div class="text-center pt-3 border-top border-light mt-3">
        &copy; <?= date_create()->format( "Y" ) ?> Mon Forum – Tous droits réservés.
    </div>
</div>
