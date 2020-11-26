<div class="container">
    <div>
        <h3>Editar um Fornecedor</h3>
        <form action="<?php echo URL; ?>fornecedor/update" method="POST">
            <label>Nome</label>
            <input type="text" name="name" value="<?php echo htmlspecialchars($fornecedor->name, ENT_QUOTES, 'UTF-8'); ?>" required />
            <input type="hidden" name="fornecedor_id" value="<?php echo htmlspecialchars($fornecedor->id, ENT_QUOTES, 'UTF-8'); ?>" />
        </form>
    </div>
</div>

