<?php ob_start(); ?>


    <form action="#" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input_name">Votre nom</label>
                        <input type="text" name="name" class="form-control" id="input_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input_last_name">Votre prénom</label>
                        <input type="text" name="last_name" class="form-control" id="input_last_name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="input_email">Votre email</label>
                        <input type="email" name="email" class="form-control" id="input_email">
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="input_message">Votre message</label>
                        <textarea id="imput_message" name="message" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
            </div>
    </form>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>