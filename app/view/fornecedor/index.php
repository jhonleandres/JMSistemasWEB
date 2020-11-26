<div class="container">
    <h1>Fornecedor</h1>
    <div class="box">
        <h3>Adicionar um fornecedor</h3>
        <form action="<?php echo URL; ?>fornecedor/add" method="POST">
            <label>Nome</label>
            <input type="text" name="name" value="" required />
            <input type="submit" name="submit_add_fornecedor" value="Enviar" />
        </form>
    </div>
    <div class="box">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>ID</td>
                <td>Nome</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($fornecedores as $fornecedor) { ?>
                <tr>
                    <td><?php if (isset($fornecedor->id)) echo htmlspecialchars($fornecedor->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($fornecedor->nome)) echo htmlspecialchars($fornecedor->name, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'fornecedor/delete/' . htmlspecialchars($fornecedor->id, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'fornecedor/edit/' . htmlspecialchars($fornecedor->id, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
