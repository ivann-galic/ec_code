<?php ob_start(); ?>

    <div class="row">
        <div class="col-6 offset-2 contact_title">
            <h1>Nous contacter</h1>
        </div>
    </div>

    <form action="#" method="POST">
            <div class="row">
                <div class="col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2">
                    <div class="form-group">
                        <label for="input_name">Votre nom</label>
                        <input type="text" name="name" class="form-control" id="input_name" required>
                    </div>
                </div>

                <div class="col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2">
                    <div class="form-group">
                        <label for="input_last_name">Votre prénom</label>
                        <input type="text" name="last_name" class="form-control" id="input_last_name" required>
                    </div>
                </div>

                <div class="col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2 section_mail">
                    <div class="form-group">
                        <label for="input_email">Votre email</label>
                        <input type="email" name="email" class="form-control" id="input_email" required>
                    </div>
                </div>

                <div class="col-sm-8 col-md-8 col-lg-6 col-xl-6 offset-2 section_message">
                    <div class="form-group">
                        <label for="input_message">Votre message</label>
                        <textarea id="imput_message" name="message" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </div>
    </form>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>