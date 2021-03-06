<section>

    <div class="row">
        <form action="/search" autocomplete="off">
            <div class="row">
                <div class="input-field col s2 offset-s9 search-inp">
                    <input type="text" class="typeahead validate" id="typeahead" name="s" placeholder="Search">
                    <i class="material-icons prefix ">search</i>
                    <input type="submit" value="">
                </div>
            </div>
        </form>
    </div>

</section>

<section>

    <table class="striped centered" style="margin-left: 5px">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Decision</th>
            <th>Justice</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($documents)): ?>
            <?php foreach ($documents as $doc): ?>
                <tr>
                    <td><?= $doc['id'] ?></td>
                    <td><?= $doc['title'] ?></td>
                    <td><?= $doc['decision'] ?></td>
                    <td><?= $doc['justice'] ?></td>
                    <td>
                        <a class="waves-effect waves-light btn modal-trigger doc-show blue darken-4"
                           data-id="<?= $doc['id'] ?>" href="#modal1">
                            Show
                        </a>

                        <?php if ($admin): ?>
                            <a href="/document/edit?id=<?= $doc['id'] ?>" style="margin-left: 1rem"
                               class="btn-floating btn-large waves-effect waves-light blue darken-4">
                                <i class="material-icons">edit</i>
                            </a>
                        <?php endif; ?>

                        <?php if ($admin): ?>
                            <a href="/document/remove?id=<?= $doc['id'] ?>" style="margin-left: 1rem"
                               class="btn-floating btn-large waves-effect waves-light blue darken-4 delete">
                                <i class="material-icons">delete</i>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>

</section>

