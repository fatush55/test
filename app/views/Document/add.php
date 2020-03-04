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

    <div class="row">
        <form class="col s8 offset-s2" method="post" action="/document/store">

            <div class="row">
                <div class="input-field col s12">
                    <input id="title" type="text" class="validate" name="title">
                    <label for="title">Title</label>
                </div>

                <div class="input-field col s6">
                    <select name="decision_id">
                        <option value="" disabled selected>Choose your option</option>
                        <?php foreach ($decision as $item): ?>
                            <option value="<?= $item['id'] ?>">
                                <?= $item['title'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label>Decision</label>
                </div>

                <div class="input-field col s6">
                    <select name="justice_id">
                        <option value="" disabled selected>Choose your option</option>
                        <?php foreach ($justice as $item): ?>
                            <option value="<?= $item['id'] ?>">
                                <?= $item['title'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label>Justice</label>
                </div>

                <div class="input-field col s12">
                    <textarea name="text"></textarea>
                </div>
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light add-button blue darken-4" type="submit">
                        Add
                        <i class="material-icons right">playlist_add</i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col s3 offset-s2">
            <a href="/" class="btn-floating btn-large waves-effect waves-light blue darken-4"><i class="material-icons">arrow_back</i></a>
        </div>
    </div>


</section>
