<section>

    <?php if (!empty($_SESSION['error'])): ?>
        <div class="row">
            <div class="col s4 offset-s4 alert text-center red darken-4 center-align">
                <i id="closed-btn" class="fas fa-times closed-btn"></i>
                <h6 class="">Error!</h6>
                <?= $_SESSION['error'] ?>
            </div>
        </div>
        <?php if (!empty($_SESSION['error'])) unset($_SESSION['error']) ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['success'])): ?>
        <div class="row">
            <div class="col s4 offset-s4 alert text-center teal darken-2 center-align">
                <i id="closed-btn" class="fas fa-times closed-btn"></i>
                <h6 class="">Success!</h6>
                <?= $_SESSION['success'] ?>
            </div>
        </div>
        <?php if (!empty($_SESSION['success'])) unset($_SESSION['success']) ?>
    <?php endif; ?>

    <div>
        <h4 class="center-align" style="color: #01579b">Register</h4>
    </div>

    <div class="row">
        <form class="col s8 offset-s2" method="post" action="/user/signup">

            <div class="row">
                <div class="input-field col s12">
                    <input id="name" type="text" class="validate" name="name">
                    <label for="name">Name</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="password" type="password" class="validate" name="password">
                    <label for="password">Password</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input id="email" type="email" class="validate" name="email">
                    <label for="email">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light add-button light-blue darken-4" type="submit">
                        sign up
                        <i class="material-icons right">person_add</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

</section>
