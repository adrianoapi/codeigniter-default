
<?php if ($usuarios): ?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <th># resp</th>
            <th>Nome</th>
            <th>Email</th>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?= $usuario->id ?></td>
                        <td><?= $usuario->titulo ?></td>
                        <td><?= $usuario->descricao ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php echo $pagination; ?>
<?php else: ?>
    <p class="alert alert-info">Página inexistente</p>
<?php endif; ?>