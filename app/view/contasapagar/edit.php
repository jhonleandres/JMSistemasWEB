<div class="container">

    <div>
        <h3>Editar um Conta</h3>
        <form action="<?php echo URL; ?>contasapagar/update" method="POST">
            <label>Fornecedor</label>
            <input type="text" name="nameFornecedor" value="<?php echo htmlspecialchars($billstopay->nameFornecedor, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Descrição</label>
            <input type="text" name="descrition" value="<?php echo htmlspecialchars($billstopay->descrition, ENT_QUOTES, 'UTF-8'); ?>" required />
            <label>Preço</label>
            <input type="text" name="price" value="<?php echo htmlspecialchars($billstopay->price, ENT_QUOTES, 'UTF-8'); ?>" required/>
            <label>Vencimento</label>
            <input type="text" name="dueDate" value="<?php echo htmlspecialchars($billstopay->dueDate, ENT_QUOTES, 'UTF-8'); ?>" required/>
            <input type="hidden" name="billstopay_id" value="<?php echo htmlspecialchars($billstopay->id, ENT_QUOTES, 'UTF-8'); ?>" />
            <input type="submit" name="submit_update_billstopay" value="Editar" />
        </form>
    </div>
</div>

