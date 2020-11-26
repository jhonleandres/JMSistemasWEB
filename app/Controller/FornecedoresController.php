<?php

namespace Mini\Controller;

use Mini\Model\Fornecedor;

class FornecedoresController
{

    public function index()
    {
        $Fornecedor = new Fornecedor();
        $funcionarios = $Funcionario->getAllFornecedores();

        require APP . 'view/_templates/header.php';
        require APP . 'view/fornecedor/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if (isset($_POST["submit_add_fornecedor"])) {
            $Fornecedor = new Fornecedor();
            $Fornecedor->add($_POST["name"]);
        }

        header('location: ' . URL . 'fornecedor/index');
    }

    public function delete($funcionario_id)
    {
        if (isset($funcionario_id)) {
            $Fornecedor = new Fornecedor();
            $Fornecedor->delete($fornecedor_id);
        }

        header('location: ' . URL . 'fornecedor/index');
    }

    public function edit($fornecedor_id)
    {
        if (isset($fornecedor_id)) {
            $Fornecedor = new Fornecedor();
            $fornecedor = $Fornecedor->getFornecedor($fornecedor_id);

            
            if ($fornecedor === false) {
                $page = new \Mini\Controller\ErrorController();
                $page->index();
            } else {
                require APP . 'view/_templates/header.php';
                require APP . 'view/fornecedor/edit.php';
                require APP . 'view/_templates/footer.php';
            }
        } else {
           header('location: ' . URL . 'funcionarios/index');
        }
    }

    public function update()
    {
        if (isset($_POST["submit_update_fornecedor"])) {
            $Fornecedor = new Fornecedor();
            $Fornecedor->update($_POST["name"], $_POST['fornecedor_id']);
        }

        header('location: ' . URL . 'fornecedor/index');
    }

}
