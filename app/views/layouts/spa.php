<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="images/todo.png" type="image/png"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
          integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M"
          crossorigin="anonymous"
    >
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">
    <title>SPA</title>
</head>
<body>

<nav>
    <div class="nav-wrapper light-blue darken-4 body-nav">
        <a href="/" class="brand-logo"> <i class="material-icons">assignment_turned_in</i>SPA</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php if (!empty($_SESSION['user'])): ?>

                <li><span class="nav_user_name"><?= $_SESSION['user']['name'] ?></span></li>
                <li><a href="/user/logout">Log Out</a></li>

            <?php else: ?>

                <li><a href="/user/login">Log In</a></li>
                <li><a href="/user/signup">Sign Up</a></li>

            <?php endif; ?>
        </ul>
    </div>

    <a class='dropdown-trigger btn burger-button transparent' href='#' data-target='dropdown1'>
        <i class="material-icons burger-button-icon">dehaze</i>
    </a>

    <ul id='dropdown1' class='dropdown-content '>


        <?php if (!empty($_SESSION['user'])): ?>

            <li><a href="/user/logout" style="color: #01579b"><i class="material-icons">reply</i>Log Out</a></li>

        <?php else: ?>
            <li><a href="/user/login" style="color: #01579b"><i class="material-icons">account_box</i>Log In</a></li>
            <li><a href="/user/signup" style="color: #01579b"><i class="material-icons">person_add</i>Sign Up</a></li>
        <?php endif; ?>
    </ul>

</nav>



<?= $content ?>

<footer class="page-footer light-blue darken-4  ">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer
                    content.</p>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            © 2014 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
    </div>
</footer>


<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">

    </div>
    <div class="modal-footer blue darken-4">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat" style="color: white">Close</a>
    </div>
</div>

<script>
    const path = '<?= PATH ?>';
</script>

<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
<script src="/js/main.js"></script>
<script src="/js/document-show.js"></script>
<script src="/js/search.js"></script>
<!--<script src="/js/CKeditor-link.js"></script>-->

</body>
</html>
