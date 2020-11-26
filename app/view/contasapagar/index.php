<div class="container">
    <h1>Contas a Pagar</h1>
    <div class="box">
        <h3>Adicionar um cliente</h3>
        <form action="<?php echo URL; ?>contasapagar/add" method="POST">
            <label>Fornecedor</label>
            <input type="text" name="nameFornecedor" value="" required />
            <label>Descrição</label>
            <input type="text" name="descrition" value="" required />
            <label>Preço</label>
            <input type="text" name="price" value="" required />
            <label>Vencimento</label>
            <input type="text" name="dueDate" value="" />
            <label>Status</label>
            <input type="text" name="status" value="" />
            <input type="submit" name="submit_add_billstopay" value="Enviar" />
        </form>
    </div>
    <!-- main content output -->
    <div class="box">
        <h3>Lista de Contas a Pagar</h3>
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>ID</td>
                <td>Fornecedor</td>
                <td>Descrição</td>
                <td>Preço</td>
                <td>Vencimento</td>
                <td>Status</td>
                <td>Lançado em</td>
                <td>Excluir</td>
                <td>Editar</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($billstopay as $billtopay) { ?>
                <tr>
                    <td><?php if (isset($billtopay->id)) echo htmlspecialchars($billtopay->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($billtopay->nameFornecedor)) echo htmlspecialchars($billtopay->nameFornecedor, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($billtopay->descrition)) echo htmlspecialchars($billtopay->descrition, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($billtopay->price)) echo htmlspecialchars($billtopay->price, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($billtopay->dueDate)) echo htmlspecialchars($billtopay->dueDate, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($billtopay->status)) echo htmlspecialchars($billtopay->dueDate, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($billtopay->releaseDate)) echo htmlspecialchars($billtopay->releaseDate, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'contasapagar/delete/' . htmlspecialchars($billtopay->id, ENT_QUOTES, 'UTF-8'); ?>">Excluir</a></td>
                    <td><a href="<?php echo URL . 'contasapagar/edit/' . htmlspecialchars($billtopay->id, ENT_QUOTES, 'UTF-8'); ?>">Editar</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
