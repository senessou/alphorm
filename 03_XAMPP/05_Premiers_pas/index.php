<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Liste des tâches</title>
        <style media="screen">
            body {
                display: flex;
                flex-direction: column;
            }
            header {
                background-color: #F2F2F2;
                align-items: center;
                align-content: center;
                display: flex;
                height: 50px;
                flex-grow: 0;
            }
            header p {
                margin: 0.5rem 3rem;
            }
            main {
                flex-grow: 1;
                flex-shrink: 1;
            }
            .columns {
                display: flex;
            }
            .column-task-status {
                flex-grow: 1;
                flex-shrink: 1;
                padding: 0.5rem;
            }
            .column-task-status:not(:last-of-type) {
                border-right: 1px solid #CCC;
            }
            .column-options {
                position: fixed;
                top: 0;
                width: 200px;
                right: 0;
            }
        </style>
    </head>
    <body>
        <header>
            <p>Liste des tâches de ma To-Do-List</p>
            <p>
                <?php echo date('H:i:s'); ?>
            </p>
        </header>
        <main>
            <div class="columns">
                <section class="column-task-status">
                    <h1>Réserve</h1>
                </section>
                <section class="column-task-status">
                    <h1>A faire</h1>

                </section>
                <section class="column-task-status">
                    <h1>En cours</h1>

                </section>
                <section class="column-task-status">
                    <h1>A valider</h1>

                </section>
                <section class="column-task-status">
                    <h1>Terminées</h1>

                </section>
            </div>
        </main>
        <aside class="column-options">
            <h1>Options</h1>
        </aside>
        <footer>
        </footer>
    </body>
</html>
